<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Location;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function getForecast($slug)
    {
        $location = Location::where('slug', $slug)->firstOrFail();
        $lat = $location->latitude;
        $lon = $location->longitude;
        $altitude = $location->altitude ?? 0;

        // Fetch weather data from yr.no
        $response = Http::withHeaders([
            'User-Agent' => 'Arranweather/1.0 (https://2026.arranweather.com; info@arranweather.com)',
        ])->get("https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=$lat&lon=$lon");

        if ($response->failed()) {
            Log::error("Failed to fetch weather data for {$location->name}", ['status' => $response->status(), 'body' => $response->body()]);
            return response()->view('errors.503', [], 503);
        }

        $data = $response->json();
        $timeseries = $data['properties']['timeseries'] ?? [];
        $forecasts = [];
        $previousPressure = null;
        $hourlyData = [];

        foreach ($timeseries as $entry) {
            if (!isset($entry['time'], $entry['data']['instant']['details'])) {
                Log::warning("Skipping invalid timeseries entry for {$location->name}", ['entry' => $entry]);
                continue;
            }
            $time = Carbon::parse($entry['time'])->setTimezone('Europe/London');
            if ($time->minute === 0 && $time->hour % 2 === 0 && $time->diffInDays(Carbon::now('Europe/London')) <= 10) {
                $date = $time->toDateString();
                $details = $entry['data']['instant']['details'];
                $next1Hour = $entry['data']['next_1_hours'] ?? ['summary' => ['symbol_code' => 'N/A'], 'details' => ['precipitation_amount' => 0]];
                if ($next1Hour['summary']['symbol_code'] === 'N/A') {
                    $next1Hour = $entry['data']['next_6_hours'] ?? ['summary' => ['symbol_code' => 'N/A'], 'details' => ['precipitation_amount' => 0]];
                }

                $windSpeed = $details['wind_speed'] ?? 0;
                $cloudCover = $details['cloud_area_fraction'] ?? 0;
                $pressure = $details['air_pressure_at_sea_level'] ?? null;
                $altitude = $location->altitude ?? 0;

                $gustFactor = $location->type === 'Hill' ? 1.6 : 1.5;
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
                $altitudeMultiplier = $location->type === 'Hill' ? (1 + ($altitude / 100) * 0.015) : 1;
                $windGust = $details['wind_speed_of_gust'] ?? ($windSpeed * $gustFactor * $altitudeMultiplier);

                $symbolCode = $next1Hour['summary']['symbol_code'] ?? 'N/A';
                $condition = $conditionsMap[str_replace(['_day', '_night'], '', $symbolCode)] ?? 'unknown';
                if ($time->hour >= 20 || $time->hour <= 1) {
                    $condition = str_replace('_day', '_night', $condition);
                }

                $hourlyData[$date][] = [
                    'time' => $time->format('H:i'),
                    'temperature' => $details['air_temperature'] ?? null,
                    'precipitation' => $next1Hour['details']['precipitation_amount'] ?? 0,
                    'condition' => $condition,
                    'wind_speed' => $windSpeed,
                    'wind_gust' => round($windGust, 1),
                    'wind_direction' => $this->degreesToCardinal($details['wind_from_direction'] ?? null),
                    'wind_from_direction_degrees' => $details['wind_from_direction'] ?? null,
                    'pressure' => $pressure,
                ];
            }
        }
        $hourlyData = array_slice($hourlyData, 0, 10, true); // 10 days
        Log::info("Processed 2-hourly data for {$location->name}", ['days' => count($hourlyData), 'dates' => array_keys($hourlyData)]);

        // Group by day and fetch sun/moon data
        foreach ($hourlyData as $date => $data) {
            $sunMoonData = $this->getSunMoonData($lat, $lon, $date);
            $forecasts[$date] = [
                'date' => $date,
                'sunrise' => $sunMoonData['sunrise'] ?? 'N/A',
                'sunset' => $sunMoonData['sunset'] ?? 'N/A',
                'moonrise' => $sunMoonData['moonrise'] ?? 'N/A',
                'moonset' => $sunMoonData['moonset'] ?? 'N/A',
                'moonphase' => null, // Not available from SunriseSunset.io
                'forecasts' => $data,
            ];
        }

        $title = "{$location->name} Weather | Arranweather.com";
        return view('locations.village', compact('forecasts', 'title'));
    }

    private function getSunMoonData($lat, $lon, $date)
    {
        $response = Http::get("https://api.sunrisesunset.io/json?lat=$lat&lng=$lon&date=$date");
        if ($response->successful()) {
            $data = $response->json();
            return [
                'sunrise' => Carbon::parse($data['results']['sunrise'])->setTimezone('Europe/London')->format('H:i'),
                'sunset' => Carbon::parse($data['results']['sunset'])->setTimezone('Europe/London')->format('H:i'),
                'moonrise' => Carbon::parse($data['results']['moonrise'])->setTimezone('Europe/London')->format('H:i'),
                'moonset' => Carbon::parse($data['results']['moonset'])->setTimezone('Europe/London')->format('H:i'),
            ];
        }
        Log::error("Failed to fetch sun/moon data for $date", ['lat' => $lat, 'lon' => $lon, 'status' => $response->status()]);
        return ['sunrise' => 'N/A', 'sunset' => 'N/A', 'moonrise' => 'N/A', 'moonset' => 'N/A'];
    }

    private function degreesToCardinal($degrees)
    {
        if ($degrees === null) return null;
        $directions = ['N', 'NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW', 'SW', 'WSW', 'W', 'WNW', 'NW', 'NNW'];
        $index = round($degrees / 22.5) % 16;
        return $directions[$index];
    }
}
