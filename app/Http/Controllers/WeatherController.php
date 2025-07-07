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
    protected $conditionsMap = [
        'clearsky' => 'clearsky',
        'fair' => 'fair',
        'partlycloudy' => 'partlycloudy',
        'cloudy' => 'cloudy',
        'rain' => 'rain',
        'lightrain' => 'lightrain',
        'heavyrain' => 'heavyrain',
        'rainshowers' => 'rainshowers',
        'snow' => 'snow',
        'sleet' => 'sleet',
        'fog' => 'fog',
    ];

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
        $forecasts = $this->getTenDayForecast($lat, $lon, null, null);

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
        $forecasts = $this->getTenDayForecast($lat, $lon, $altitude, $timezone, $location);

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
        $forecasts = (new self)->getTenDayForecast($lat, $lon, null, null);
        return view('index', compact('lat', 'lon', 'title', 'forecasts'));
    }

    /**
     * Fetch all available weather forecast data for a given latitude, longitude, altitude, and timezone.
     *
     * @param float $lat
     * @param float $lon
     * @param int|null $altitude
     * @param string|null $timezone
     * @param Location|null $location
     * @return array
     */
    protected function getTenDayForecast($lat, $lon, $altitude = null, $timezone = 'Europe/London', $location = null)
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

                    // Parse times, converting from "4:48:59 AM" format to H:i in local timezone
                    $sunMoonData[$date] = [
                        'sunrise' => isset($results['sunrise']) && $results['sunrise'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['sunrise'], $timezone)->format('H:i') : 'N/A',
                        'sunset' => isset($results['sunset']) && $results['sunset'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['sunset'], $timezone)->format('H:i') : 'N/A',
                        'moonrise' => isset($results['moonrise']) && $results['moonrise'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['moonrise'], $timezone)->format('H:i') : 'N/A',
                        'moonset' => isset($results['moonset']) && $results['moonset'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['moonset'], $timezone)->format('H:i') : 'N/A',
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

            // Extract and process timeseries data with wind gust calculation
            $timeseries = $data['properties']['timeseries'] ?? [];
            $forecasts = [];
            $previousPressure = null;

            foreach ($timeseries as $entry) {
                if (!isset($entry['time'], $entry['data']['instant']['details'])) {
                    Log::warning("Skipping invalid timeseries entry", ['entry' => $entry]);
                    continue;
                }
                $time = Carbon::parse($entry['time'])->setTimezone($timezone);
                if ($time->minute === 0 && $time->hour % 2 === 0 && $time->diffInDays(Carbon::now($timezone)) <= 10) {
                    $date = $time->toDateString();
                    $details = $entry['data']['instant']['details'];
                    $next1Hour = $entry['data']['next_1_hours'] ?? ['summary' => ['symbol_code' => 'N/A'], 'details' => ['precipitation_amount' => 0]];
                    if ($next1Hour['summary']['symbol_code'] === 'N/A') {
                        $next1Hour = $entry['data']['next_6_hours'] ?? ['summary' => ['symbol_code' => 'N/A'], 'details' => ['precipitation_amount' => 0]];
                    }

                    $windSpeed = $details['wind_speed'] ?? 0;
                    $cloudCover = $details['cloud_area_fraction'] ?? 0;
                    $pressure = $details['air_pressure_at_sea_level'] ?? null;

                    // Determine location type and altitude
                    $locationType = $location ? $location->type ?? 'Village' : 'Village';
                    $locationAltitude = $location ? $location->altitude ?? 0 : ($altitude ?? 0);

                    $gustFactor = $locationType === 'Hill' ? 1.6 : 1.5;
                    if ($cloudCover > 75) {
                        $gustFactor += 0.2;
                    } elseif ($cloudCover < 25) {
                        $gustFactor -= 0.1;
                    }
                    if ($previousPressure !== null && $pressure !== null) {
                        $pressureChange = $previousPressure - $pressure;
                        if ($pressureChange > 1) {
                            $gustFactor += 0.2;
                        } elseif ($pressureChange < -1) {
                            $gustFactor -= 0.1;
                        }
                    }
                    $previousPressure = $pressure;
                    $altitudeMultiplier = $locationType === 'Hill' ? (1 + ($locationAltitude / 100) * 0.015) : 1;
                    $windGust = $details['wind_speed_of_gust'] ?? ($windSpeed * $gustFactor * $altitudeMultiplier);

                    $symbolCode = $next1Hour['summary']['symbol_code'] ?? 'N/A';
                    $condition = $this->conditionsMap[str_replace(['_day', '_night'], '', $symbolCode)] ?? 'unknown';
                    if ($time->hour >= 20 || $time->hour <= 1) {
                        $condition = str_replace('_day', '_night', $condition);
                    }

                    $forecasts[$date][] = [
                        'time' => $time->format('H:i'),
                        'temperature' => $details['air_temperature'] ?? null,
                        'dew_point' => $details['dew_point_temperature'] ?? null,
                        'precipitation' => $next1Hour['details']['precipitation_amount'] ?? 0,
                        'condition' => $condition,
                        'wind_speed' => $windSpeed,
                        'wind_gust' => round($windGust, 1),
                        'wind_direction' => $this->degreesToCardinal($details['wind_from_direction'] ?? null),
                        'wind_from_direction_degrees' => $details['wind_from_direction'] ?? null,
                        'cloud_area_fraction' => $details['cloud_area_fraction'] ?? null,
                        'fog_area_fraction' => $details['fog_area_fraction'] ?? null,
                        'relative_humidity' => $details['relative_humidity'] ?? null,
                        'air_pressure' => $details['air_pressure_at_sea_level'] ?? null,
                        'ultraviolet_index' => $details['ultraviolet_index_clear_sky'] ?? null,
                    ];
                }
            }

            // Limit to 10 days and merge with sun/moon data
            $forecasts = array_slice($forecasts, 0, 10, true);
            foreach ($forecasts as $date => &$dayData) {
                $daySunMoon = $sunMoonData[$date] ?? [
                    'sunrise' => 'N/A',
                    'sunset' => 'N/A',
                    'moonrise' => 'N/A',
                    'moonset' => 'N/A',
                    'moonphase' => null,
                ];
                $dayData = array_merge($dayData, [
                    'date' => $date,
                    'sunrise' => $daySunMoon['sunrise'],
                    'sunset' => $daySunMoon['sunset'],
                    'moonrise' => $daySunMoon['moonrise'],
                    'moonset' => $daySunMoon['moonset'],
                    'moonphase' => $daySunMoon['moonphase'],
                ]);
            }
            unset($dayData); // Clean up reference

            Log::info('Processed 10-day forecast', [
                'lat' => $lat,
                'lon' => $lon,
                'altitude' => $altitude,
                'timezone' => $timezone,
                'days' => count($forecasts),
            ]);

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

        $forecasts = $this->getTenDayForecast($lat, $lon, null, null);

        return response()->json([
            'status' => $forecasts ? 'success' : 'error',
            'data' => $forecasts,
            'message' => $forecasts ? null : 'Unable to fetch weather data',
        ], $forecasts ? 200 : 500);
    }

    /**
     * Convert degrees to cardinal direction.
     *
     * @param float|null $degrees
     * @return string|null
     */
    private function degreesToCardinal($degrees)
    {
        if ($degrees === null) return null;
        $directions = ['N', 'NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW', 'SW', 'WSW', 'W', 'WNW', 'NW', 'NNW'];
        $index = round($degrees / 22.5) % 16;
        return $directions[$index];
    }
}