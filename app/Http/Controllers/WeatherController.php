<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class WeatherController extends Controller
{
    protected $iconMap = [
        'clearsky_day' => 'clearsky_day.svg',
        'clearsky_night' => 'clearsky_night.svg',
        'fair_day' => 'fair_day.svg',
        'fair_night' => 'fair_night.svg',
        'partlycloudy_day' => 'partlycloudy_day.svg',
        'partlycloudy_night' => 'partlycloudy_night.svg',
        'cloudy' => 'cloudy.svg',
        'lightrain' => 'lightrain.svg',
        'rain' => 'rain.svg',
        'heavyrain' => 'heavyrain.svg',
        'rainshowers_day' => 'rainshowers_day.svg',
        'rainshowers_night' => 'rainshowers_night.svg',
        'snow' => 'snow.svg',
        'sleet' => 'sleet.svg',
        'fog' => 'fog.svg',
        'lightrainshowers_day' => 'lightrainshowers_day.svg',
        'lightssleetshowers_day' => 'lightssleetshowers_day.svg',
        'lightssleetshowers_night' => 'lightssleetshowers_night.svg',
        'heavysleetshowers_day' => 'heavysleetshowers_day.svg',
        'heavysleetshowers_night' => 'heavysleetshowers_night.svg',
        'lightsnowshowers_day' => 'lightsnowshowers_day.svg',
        'lightsnowshowers_night' => 'lightsnowshowers_night.svg',
        'heavysnowshowers_day' => 'heavysnowshowers_day.svg',
        'heavysnowshowers_night' => 'heavysnowshowers_night.svg',
        'unknown' => 'unknown.svg',
    ];

    protected function getTemperatureClass($temperature)
    {
        if ($temperature === null) return 'temp-cell-fallback';
        $tempRanges = [-40, -30, -20, -15, -10, -8, -6, -4, -2, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 27, 30, 35, 40, 45, 50];
        foreach ($tempRanges as $range) {
            if ($temperature <= $range) {
                return 'temp-cell-' . ($range < 0 ? 'minus-' . abs($range) : $range);
            }
        }
        return 'temp-cell-' . ($temperature >= 50 ? '50' : 'fallback');
    }

    protected function getWindClass($windGust)
    {
        $beaufort = match (true) {
            $windGust < 0.5 => 0,
            $windGust < 1.6 => 1,
            $windGust < 3.4 => 2,
            $windGust < 5.5 => 3,
            $windGust < 8.0 => 4,
            $windGust < 10.8 => 5,
            $windGust < 13.9 => 6,
            $windGust < 17.2 => 7,
            $windGust < 20.8 => 8,
            $windGust < 24.5 => 9,
            $windGust < 28.5 => 10,
            $windGust < 32.7 => 11,
            default => 12,
        };
        return "wind-cell-$beaufort";
    }

    protected function getRainStyle($precipitation)
    {
        $value = max(0, min(10, floatval($precipitation ?? 0)));
        if ($value === 0) {
            return 'background-color: #ffffff; color: black;';
        }
        $intensity = ($value > 0 ? ($value - 0.01) / 9.99 : 0);
        $r1 = 179; $g1 = 229; $b1 = 252; // #b3e5fc
        $r2 = 67; $g2 = 88; $b2 = 151; // #435897
        $r = dechex(max(0, min(255, floor($r1 + ($r2 - $r1) * $intensity))));
        $g = dechex(max(0, min(255, floor($g1 + ($g2 - $g1) * $intensity))));
        $b = dechex(max(0, min(255, floor($b1 + ($b2 - $b1) * $intensity))));
        return "background-color: #$r$g$b; color: black; transition: background 0.3s ease;";
    }

    protected function getFeelsLike($temperature, $windSpeed)
    {
        $temp = floatval($temperature ?? 0);
        $wind = floatval($windSpeed ?? 0);
        if ($temp <= 10 && $wind > 4.8) {
            return round(13.12 + 0.6215 * $temp - 11.37 * pow($wind, 0.16) + 0.3965 * $temp * pow($wind, 0.16), 1);
        }
        return round($temp, 1);
    }

    /**
     * Display the main weather dashboard.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $lat = $request->query('lat', 55.5820);
        $lon = $request->query('lon', -5.2093);
        $title = 'Arran Weather';
        $forecasts = $this->getTenDayForecast($lat, $lon, null, 'Europe/London'); // Explicit timezone
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
        $location = Location::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])->firstOrFail();
        $lat = $location->latitude;
        $lon = $location->longitude;
        $altitude = $location->altitude;
        $timezone = $location->timezone ?? 'Europe/London'; // Ensure fallback
        $title = "{$location->name} Weather";
        $forecasts = $this->getTenDayForecast($lat, $lon, $altitude, $timezone, $location);
        $template = match ($location->type) {
            'Village' => 'locations.village',
            'Hill' => 'locations.hill',
            'Marine' => 'locations.marine',
            default => 'index',
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
        $forecasts = (new self)->getTenDayForecast($lat, $lon, null, 'Europe/London'); // Explicit timezone
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
        $cacheKey = "forecast_{$lat}_{$lon}_{$altitude}_" . md5($timezone ?? 'default');
        $cacheTtl = 21600; // 6 hours in seconds

        // Force cache refresh for testing (remove after verification)
        Cache::forget($cacheKey);
        Cache::forget($cacheKey . '_timestamp');

        $forecasts = Cache::get($cacheKey);
        if ($forecasts !== null) {
            $cacheAge = Carbon::now()->diffInSeconds(Carbon::createFromTimestamp(Cache::get($cacheKey . '_timestamp') ?? 0));
            if ($cacheAge < $cacheTtl) {
                Log::info('Returning cached forecast', ['key' => $cacheKey, 'age' => $cacheAge]);
                return $forecasts;
            }
        }

        try {
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
            $sunMoonData = [];
            $startDate = Carbon::today($timezone ?: 'Europe/London'); // Fallback timezone
            for ($i = 0; $i < 10; $i++) {
                $date = $startDate->copy()->addDays($i)->format('Y-m-d');
                $sunMoonUrl = "https://api.sunrisesunset.io/json?lat={$lat}&lng={$lon}&date={$date}";
                $sunMoonResponse = Http::timeout(30)->get($sunMoonUrl);

                if ($sunMoonResponse->successful() && $sunMoonResponse->json()['status'] === 'OK') {
                    $results = $sunMoonResponse->json()['results'];
                    $sunMoonData[$date] = [
                        'sunrise' => isset($results['sunrise']) && $results['sunrise'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['sunrise'], $timezone ?: 'Europe/London')->format('H:i') : 'N/A',
                        'sunset' => isset($results['sunset']) && $results['sunset'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['sunset'], $timezone ?: 'Europe/London')->format('H:i') : 'N/A',
                        'moonrise' => isset($results['moonrise']) && $results['moonrise'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['moonrise'], $timezone ?: 'Europe/London')->format('H:i') : 'N/A',
                        'moonset' => isset($results['moonset']) && $results['moonset'] !== '-' ? Carbon::createFromFormat('h:i:s A', $results['moonset'], $timezone ?: 'Europe/London')->format('H:i') : 'N/A',
                        'moonphase' => null,
                    ];
                    Log::info('SunriseSunset.io API response', ['date' => $date, 'url' => $sunMoonUrl, 'response' => $results]);
                } else {
                    Log::error('SunriseSunset.io API request failed', [
                        'status' => $sunMoonResponse->status(),
                        'body' => $sunMoonResponse->body(),
                        'date' => $date,
                        'url' => $sunMoonUrl,
                    ]);
                    $sunMoonData[$date] = ['sunrise' => 'N/A', 'sunset' => 'N/A', 'moonrise' => 'N/A', 'moonset' => 'N/A', 'moonphase' => null];
                }
            }

            $timeseries = $data['properties']['timeseries'] ?? [];
            $forecasts = [];
            $previousPressure = null;

            foreach ($timeseries as $entry) {
                if (!isset($entry['time'], $entry['data']['instant']['details'])) {
                    Log::warning("Skipping invalid timeseries entry", ['entry' => $entry]);
                    continue;
                }
                $effectiveTimezone = $timezone ?: 'Europe/London'; // Ensure valid timezone
                Log::debug('Processing timeseries entry', ['time' => $entry['time'], 'timezone' => $effectiveTimezone]);
                $time = Carbon::parse($entry['time'])->setTimezone($effectiveTimezone); // Line 178
                if ($time->minute === 0 && $time->diffInDays($startDate) < 10) {
                    $date = $time->toDateString();
                    $details = $entry['data']['instant']['details'];
                    $next1Hour = $entry['data']['next_1_hours'] ?? ['summary' => ['symbol_code' => 'N/A'], 'details' => ['precipitation_amount' => 0]];
                    if ($next1Hour['summary']['symbol_code'] === 'N/A') {
                        $next1Hour = $entry['data']['next_6_hours'] ?? ['summary' => ['symbol_code' => 'N/A'], 'details' => ['precipitation_amount' => 0]];
                    }

                    $windSpeed = $details['wind_speed'] ?? 0;
                    $cloudCover = $details['cloud_area_fraction'] ?? 0;
                    $pressure = $details['air_pressure_at_sea_level'] ?? null;
                    $locationType = $location ? $location->type ?? 'Village' : 'Village';
                    $locationAltitude = $location ? $location->altitude ?? 0 : ($altitude ?? 0);

                    $gustFactor = $locationType === 'Hill' ? 1.6 : 1.5;
                    if ($cloudCover > 75) $gustFactor += 0.2;
                    elseif ($cloudCover < 25) $gustFactor -= 0.1;
                    if ($previousPressure !== null && $pressure !== null) {
                        $pressureChange = $previousPressure - $pressure;
                        if ($pressureChange > 1) $gustFactor += 0.2;
                        elseif ($pressureChange < -1) $gustFactor -= 0.1;
                    }
                    $previousPressure = $pressure;
                    $altitudeMultiplier = $locationType === 'Hill' ? (1 + ($locationAltitude / 100) * 0.015) : 1;
                    $windGust = $details['wind_speed_of_gust'] ?? ($windSpeed * $gustFactor * $altitudeMultiplier);

                    $symbolCode = $next1Hour['summary']['symbol_code'] ?? 'unknown';
                    $condition = $symbolCode; // Use the raw symbol_code instead of mapping
                    if ($symbolCode === 'N/A' || !isset($this->iconMap[$symbolCode])) {
                        Log::warning("Unmapped or missing symbol_code", ['time' => $time, 'symbol_code' => $symbolCode, 'entry' => $entry]);
                    }
                    $condition = $symbolCode;
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
                        'temp_class' => $this->getTemperatureClass($details['air_temperature'] ?? null),
                        'wind_class' => $this->getWindClass($windGust),
                        'rain_style' => $this->getRainStyle($next1Hour['details']['precipitation_amount'] ?? 0),
                        'iconUrl' => asset("svg/" . ($this->iconMap[$condition] ?? $this->iconMap['unknown'])),
                        'feels_like' => $this->getFeelsLike($details['air_temperature'] ?? null, $windSpeed),
                    ];
                }
            }

            $formattedForecasts = [];
            foreach ($forecasts as $date => $dayData) {
                $daySunMoon = $sunMoonData[$date] ?? [
                    'sunrise' => 'N/A', 'sunset' => 'N/A', 'moonrise' => 'N/A', 'moonset' => 'N/A', 'moonphase' => null,
                ];
                $formattedForecasts[] = [
                    'date' => $date,
                    'sunrise' => $daySunMoon['sunrise'],
                    'sunset' => $daySunMoon['sunset'],
                    'moonrise' => $daySunMoon['moonrise'],
                    'moonset' => $daySunMoon['moonset'],
                    'moonphase' => $daySunMoon['moonphase'],
                    'forecasts' => $dayData,
                ];
            }

            Log::info('Processed 10-day forecast', [
                'lat' => $lat, 'lon' => $lon, 'altitude' => $altitude, 'timezone' => $effectiveTimezone, 'days' => count($formattedForecasts),
            ]);

            Cache::put($cacheKey, $formattedForecasts, $cacheTtl);
            Cache::put($cacheKey . '_timestamp', time(), $cacheTtl);

            return $formattedForecasts;
        } catch (\Exception $e) {
            Log::error('Error fetching forecast data', [
                'error' => $e->getMessage(), 'trace' => $e->getTraceAsString(), 'lat' => $lat, 'lon' => $lon,
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
        $request->validate(['lat' => 'required|numeric|between:-90,90', 'lon' => 'required|numeric|between:-180,180']);
        $lat = $request->query('lat');
        $lon = $request->query('lon');
        $forecasts = $this->getTenDayForecast($lat, $lon, null, 'Europe/London'); // Explicit timezone
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