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
        $forecasts = $this->getTenDayForecast($lat, $lon, null);

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
        $altitude = $location->altitude;
        $timezone = $location->timezone ?? 'Europe/London';
        $title = "{$location->name} Weather";

        // Fetch all available forecast data
        $forecasts = $this->getTenDayForecast($lat, $lon, $altitude, $timezone);

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
        $forecasts = (new self)->getTenDayForecast($lat, $lon, null);
        return view('index', compact('lat', 'lon', 'title', 'forecasts'));
    }

    /**
     * Fetch all available weather forecast data for a given latitude, longitude, altitude, and timezone.
     *
     * @param float $lat
     * @param float $lon
     * @param int|null $altitude
     * @param string|null $timezone
     * @return array
     */
    protected function getTenDayForecast($lat, $lon, $altitude = null, $timezone = 'Europe/London')
    {
        try {
            // Fetch data from yr.no complete endpoint
            $url = "https://api.met.no/weatherapi/locationforecast/2.0/complete?lat={$lat}&lon={$lon}";
            if ($altitude !== null) {
                $url .= "&altitude={$altitude}";
            }
            $response = Http::withHeaders([
                'User-Agent' => 'ArranWeather/1.0 (contact@arranweather.com)',
            ])->timeout(30)->get($url);

            if ($response->failed()) {
                Log::error('yr.no complete API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'url' => $url,
                ]);
                return [];
            }

            $data = $response->json();

            // Fetch sun/moon data from SunriseSunset.io API
            $sunMoonData = [];
            $today = Carbon::today($timezone);
            for ($i = 0; $i < 10; $i++) { // Fetch for 10 days
                $date = $today->copy()->addDays($i)->format('Y-m-d');
                $sunMoonUrl = "https://api.sunrisesunset.io/json?lat={$lat}&lng={$lon}&date={$date}";
                $sunMoonResponse = Http::timeout(30)->get($sunMoonUrl);

                if ($sunMoonResponse->successful() && $sunMoonResponse->json()['status'] === 'OK') {
                    $results = $sunMoonResponse->json()['results'];
                    Log::info('SunriseSunset.io API response', [
                        'date' => $date,
                        'url' => $sunMoonUrl,
                        'response' => $results,
                    ]);

                    // Parse times, converting from "4:45 AM" format to H:i in local timezone
                    $sunMoonData[$date] = [
                        'sunrise' => isset($results['sunrise']) && $results['sunrise'] !== '-' ? Carbon::createFromFormat('g:i A', $results['sunrise'], $timezone)->format('H:i') : 'N/A',
                        'sunset' => isset($results['sunset']) && $results['sunset'] !== '-' ? Carbon::createFromFormat('g:i A', $results['sunset'], $timezone)->format('H:i') : 'N/A',
                        'moonrise' => isset($results['moonrise']) && $results['moonrise'] !== '-' ? Carbon::createFromFormat('g:i A', $results['moonrise'], $timezone)->format('H:i') : 'N/A',
                        'moonset' => isset($results['moonset']) && $results['moonset'] !== '-' ? Carbon::createFromFormat('g:i A', $results['moonset'], $timezone)->format('H:i') : 'N/A',
                        'moonphase' => null, // SunriseSunset.io does not provide moonphase
                    ];
                } else {
                    Log::error('SunriseSunset.io API request failed', [
                        'status' => $sunMoonResponse->status(),
                        'body' => $sunMoonResponse->body(),
                        'date' => $date,
                        'url' => $sunMoonUrl,
                    ]);
                    $sunMoonData[$date] = [
                        'sunrise' => 'N/A',
                        'sunset' => 'N/A',
                        'moonrise' => 'N/A',
                        'moonset' => 'N/A',
                        'moonphase' => null,
                    ];
                }
            }

            // Extract all timeseries data from yr.no
            $timeseries = $data['properties']['timeseries'] ?? [];
            $forecasts = collect($timeseries)
                ->map(function ($entry) {
                    $details = $entry['data']['instant']['details'] ?? [];
                    $next_1_hours = $entry['data']['next_1_hours'] ?? null;
                    $next_6_hours = $entry['data']['next_6_hours'] ?? null;

                    return [
                        'time' => $entry['time'],
                        'condition' => $next_1_hours ? ($next_1_hours['summary']['symbol_code'] ?? 'N/A') : ($next_6_hours['summary']['symbol_code'] ?? 'N/A'),
                        'temperature' => $details['air_temperature'] ?? 'N/A',
                        'dew_point' => $details['dew_point_temperature'] ?? 'N/A',
                        'precipitation' => $next_1_hours ? ($next_1_hours['details']['precipitation_amount'] ?? 0) : ($next_6_hours['details']['precipitation_amount'] ?? 0),
                        'wind_speed' => $details['wind_speed'] ?? 'N/A',
                        'wind_gust' => $details['wind_speed_of_gust'] ?? 'N/A',
                        'wind_direction' => $details['wind_from_direction'] ?? 'N/A',
                        'cloud_area_fraction' => $details['cloud_area_fraction'] ?? 'N/A',
                        'fog_area_fraction' => $details['fog_area_fraction'] ?? 'N/A',
                        'relative_humidity' => $details['relative_humidity'] ?? 'N/A',
                        'air_pressure' => $details['air_pressure_at_sea_level'] ?? 'N/A',
                        'ultraviolet_index' => $details['ultraviolet_index_clear_sky'] ?? 'N/A',
                    ];
                })
                ->groupBy(function ($entry) use ($timezone) {
                    return Carbon::parse($entry['time'], $timezone)->format('Y-m-d');
                })
                ->map(function ($dayData, $date) use ($sunMoonData, $timezone) {
                    $daySunMoon = $sunMoonData[$date] ?? [
                        'sunrise' => 'N/A',
                        'sunset' => 'N/A',
                        'moonrise' => 'N/A',
                        'moonset' => 'N/A',
                        'moonphase' => null,
                    ];
                    return [
                        'date' => $date,
                        'sunrise' => $daySunMoon['sunrise'],
                        'sunset' => $daySunMoon['sunset'],
                        'moonrise' => $daySunMoon['moonrise'],
                        'moonset' => $daySunMoon['moonset'],
                        'moonphase' => $daySunMoon['moonphase'],
                        'forecasts' => $dayData->toArray(),
                    ];
                })
                ->values()
                ->toArray();

            return $forecasts;
        } catch (\Exception $e) {
            Log::error('Error fetching forecast data', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
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

        $forecasts = $this->getTenDayForecast($lat, $lon, null);

        return response()->json([
            'status' => $forecasts ? 'success' : 'error',
            'data' => $forecasts,
            'message' => $forecasts ? null : 'Unable to fetch weather data',
        ], $forecasts ? 200 : 500);
    }
}