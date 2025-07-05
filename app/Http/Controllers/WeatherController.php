<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Location;
use Illuminate\Support\Str;

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
                        ];
                    })
                    ->groupBy(function ($entry) {
                        return \Carbon\Carbon::parse($entry['time'])->format('Y-m-d');
                    })
                    ->map(function ($dayData, $date) {
                        return [
                            'date' => $date,
                            'forecasts' => $dayData->toArray(),
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