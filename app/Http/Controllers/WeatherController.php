<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class WeatherController extends Controller
{
    /**
     * Display the main weather dashboard.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get lat and lon from query parameters, default to Arran center
        $lat = $request->query('lat', 55.5820);
        $lon = $request->query('lon', -5.2093);
        $title = 'Arran Weather';

        // Fetch all available forecast data
        $forecasts = $this->getTenDayForecast($lat, $lon);

        return view('index', compact('lat', 'lon', 'title', 'forecasts'));
    }

    /**
     * Display the weather dashboard for a specific location using a slug.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function indexBySlug($slug)
    {
        // Find location by slug (case-insensitive, replacing hyphens with spaces)
        $location = Location::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])->firstOrFail();

        $lat = $location->latitude;
        $lon = $location->longitude;
        $title = "{$location->name} Weather";

        // Fetch all available forecast data
        $forecasts = $this->getTenDayForecast($lat, $lon);

        // Select template based on location type
        $template = match ($location->type) {
            'Village' => 'locations.village',
            'Hill' => 'locations.hill',
            'Marine' => 'locations.marine',
            default => 'index', // Fallback
        };

        return view($template, compact('lat', 'lon', 'title', 'forecasts'));
    }

    /**
     * Display the weather dashboard for a specific location with manual parameters.
     *
     * @param float $lat
     * @param float $lon
     * @param string $title
     * @return \Illuminate\View\View
     */
    public static function indexWithParams($lat, $lon, $title)
    {
        $forecasts = (new self)->getTenDayForecast($lat, $lon);
        return view('index', compact('lat', 'lon', 'title', 'forecasts'));
    }

    /**
     * Fetch all available weather forecast data for a given latitude and longitude.
     *
     * @param float $lat
     * @param float $lon
     * @return array
     */
    protected function getTenDayForecast($lat, $lon)
    {
        try {
            // Fetch data from yr.no complete endpoint
            $response = Http::withHeaders([
                'User-Agent' => 'ArranWeather/1.0 (contact@arranweather.com)',
            ])->timeout(30)->get("https://api.met.no/weatherapi/locationforecast/2.0/complete?lat={$lat}&lon={$lon}");

            if ($response->successful()) {
                $data = $response->json();

                // Extract all timeseries data
                $forecasts = collect($data['properties']['timeseries'])
                    ->map(function ($entry) {
                        $details = $entry['data']['instant']['details'] ?? [];
                        $next_1_hours = $entry['data']['next_1_hours'] ?? null;
                        $next_6_hours = $entry['data']['next_6_hours'] ?? null;
                        $next_12_hours = $entry['data']['next_12_hours']['summary'] ?? null;

                        return [
                            'time' => $entry['time'],
                            'condition' => $next_1_hours ? ($next_1_hours['summary']['symbol_code'] ?? 'N/A') : ($next_6_hours['summary']['symbol_code'] ?? 'N/A'),
                            'temperature' => $details['air_temperature'] ?? 'N/A',
                            'precipitation' => $next_1_hours ? ($next_1_hours['details']['precipitation_amount'] ?? 0) : ($next_6_hours['details']['precipitation_amount'] ?? 0),
                            'wind_speed' => $details['wind_speed'] ?? 'N/A',
                            'wind_gust' => $details['wind_speed_of_gust'] ?? 'N/A',
                            'cloud_area_fraction' => $details['cloud_area_fraction'] ?? 'N/A',
                            'relative_humidity' => $details['relative_humidity'] ?? 'N/A',
                            'air_pressure' => $details['air_pressure_at_sea_level'] ?? 'N/A',
                            'wind_direction' => $details['wind_from_direction'] ?? 'N/A',
                            'sunrise' => $next_12_hours['sunrise']['time'] ?? 'N/A',
                            'sunset' => $next_12_hours['sunset']['time'] ?? 'N/A',
                            'moonrise' => $next_12_hours['moonrise']['time'] ?? 'N/A',
                            'moonset' => $next_12_hours['moonset']['time'] ?? 'N/A',
                            'moonphase' => $next_12_hours['moonphase'] ?? null,
                        ];
                    })
                    ->groupBy(function ($entry) {
                        return \Carbon\Carbon::parse($entry['time'])->format('Y-m-d');
                    })
                    ->map(function ($dayData, $date) {
                        // Take sun/moon data from the first entry of the day
                        $firstEntry = $dayData->first();
                        return [
                            'date' => $date,
                            'sunrise' => $firstEntry['sunrise'] !== 'N/A' ? \Carbon\Carbon::parse($firstEntry['sunrise'])->format('H:i') : 'N/A',
                            'sunset' => $firstEntry['sunset'] !== 'N/A' ? \Carbon\Carbon::parse($firstEntry['sunset'])->format('H:i') : 'N/A',
                            'moonrise' => $firstEntry['moonrise'] !== 'N/A' ? \Carbon\Carbon::parse($firstEntry['moonrise'])->format('H:i') : 'N/A',
                            'moonset' => $firstEntry['moonset'] !== 'N/A' ? \Carbon\Carbon::parse($firstEntry['moonset'])->format('H:i') : 'N/A',
                            'moonphase' => is_numeric($firstEntry['moonphase']) ? floatval($firstEntry['moonphase']) : null,
                            'forecasts' => $dayData->map(function ($entry) {
                                // Remove sun/moon data from individual forecasts
                                return [
                                    'time' => $entry['time'],
                                    'condition' => $entry['condition'],
                                    'temperature' => $entry['temperature'],
                                    'precipitation' => $entry['precipitation'],
                                    'wind_speed' => $entry['wind_speed'],
                                    'wind_gust' => $entry['wind_gust'],
                                    'cloud_area_fraction' => $entry['cloud_area_fraction'],
                                    'relative_humidity' => $entry['relative_humidity'],
                                    'air_pressure' => $entry['air_pressure'],
                                    'wind_direction' => $entry['wind_direction'],
                                ];
                            })->toArray(),
                        ];
                    })
                    ->values()
                    ->toArray();

                return $forecasts;
            } else {
                Log::error('yr.no API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return [];
            }
        } catch (\Exception $e) {
            Log::error('Error fetching forecast data', [
                'error' => $e->getMessage(),
                'lat' => $lat,
                'lon' => $lon,
            ]);
            return [];
        }
    }

    /**
     * Fetch weather forecast for a given latitude and longitude (API endpoint).
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWeather(Request $request)
    {
        // Validate input parameters
        $request->validate([
            'lat' => 'required|numeric|between:-90,90',
            'lon' => 'required|numeric|between:-180,180',
        ]);

        $lat = $request->query('lat');
        $lon = $request->query('lon');

        $forecasts = $this->getTenDayForecast($lat, $lon);

        return response()->json([
            'status' => $forecasts ? 'success' : 'error',
            'data' => $forecasts,
            'message' => $forecasts ? null : 'Unable to fetch weather data',
        ], $forecasts ? 200 : 500);
    }
}