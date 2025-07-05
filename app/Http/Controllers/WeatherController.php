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

        // Fetch 10-day forecast
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

        // Fetch 10-day forecast
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
     * Fetch 10-day weather forecast for a given latitude and longitude.
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

                // Aggregate daily forecasts (10 days)
                $forecasts = collect($data['properties']['timeseries'])
                    ->groupBy(function ($entry) {
                        return date('Y-m-d', strtotime($entry['time']));
                    })
                    ->take(10)
                    ->map(function ($dayData, $date) {
                        // Get daily summary
                        $firstEntry = $dayData->first();
                        $temperatures = $dayData->pluck('data.instant.details.air_temperature');
                        $precipitations = $dayData->pluck('data.next_1_hours.details.precipitation_amount')
                            ->filter()->sum();
                        $windSpeeds = $dayData->pluck('data.instant.details.wind_speed');
                        $windGusts = $dayData->pluck('data.instant.details.wind_speed_of_gust');
                        $cloudAreaFractions = $dayData->pluck('data.instant.details.cloud_area_fraction');

                        return [
                            'date' => $date,
                            'condition' => $firstEntry['data']['next_1_hours']['summary']['symbol_code'] ?? 'N/A',
                            'temperature_avg' => round($temperatures->avg(), 1),
                            'temperature_min' => round($temperatures->min(), 1),
                            'temperature_max' => round($temperatures->max(), 1),
                            'precipitation' => round($precipitations, 1),
                            'wind_speed' => round($windSpeeds->avg(), 1),
                            'wind_gust' => round($windGusts->max(), 1),
                            'fog' => round($cloudAreaFractions->avg(), 1), // Proxy for fog
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
            Log::error('Error fetching 10-day forecast', [
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