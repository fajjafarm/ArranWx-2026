<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class WeatherController extends Controller
{
    public function show($slug)
    {
        // Find the location by slug
        $location = Location::whereRaw('LOWER(name) = ?', [strtolower(str_replace('-', ' ', $slug))])->firstOrFail();

        // Construct the yr.no API URL
        $url = "https://api.met.no/weatherapi/locationforecast/2.0/complete?lat={$location->latitude}&lon={$location->longitude}&altitude={$location->altitude}";

        // Make API request
        $response = Http::withHeaders([
            'User-Agent' => 'Arranweather/1.0 (contact@arranweather.com)',
        ])->get($url);

        if ($response->failed()) {
            return view('locations.village', [
                'title' => "{$location->name} Weather | Arranweather.com",
                'forecasts' => [],
            ]);
        }

        $data = $response->json();
        $forecasts = [];

        // Group forecasts by date
        foreach ($data['properties']['timeseries'] as $entry) {
            $time = Carbon::parse($entry['time']);
            $date = $time->format('Y-m-d');
            $forecastData = $entry['data']['instant']['details'];
            $next1Hour = $entry['data']['next_1_hours']['summary'] ?? null;
            $next6Hours = $entry['data']['next_6_hours']['summary'] ?? null;

            $forecast = [
                'time' => $time->toDateTimeString(),
                'condition' => $next1Hour ? $next1Hour['symbol_code'] : ($next6Hours ? $next6Hours['symbol_code'] : 'unknown'),
                'temperature' => $forecastData['air_temperature'] ?? 'N/A',
                'precipitation' => $next1Hour ? ($next1Hour['details']['precipitation_amount'] ?? 0) : 0,
                'wind_speed' => $forecastData['wind_speed'] ?? 'N/A',
                'wind_gust' => $forecastData['wind_speed_of_gust'] ?? 'N/A',
                'wind_direction' => $forecastData['wind_from_direction'] ?? 'N/A',
                'cloud_area_fraction' => $forecastData['cloud_area_fraction'] ?? 'N/A',
                'relative_humidity' => $forecastData['relative_humidity'] ?? 'N/A',
                'air_pressure' => $forecastData['air_pressure_at_sea_level'] ?? 'N/A',
            ];

            // Initialize day array if not exists
            if (!isset($forecasts[$date])) {
                $forecasts[$date] = [
                    'date' => $date,
                    'sunrise' => $entry['data']['next_12_hours']['summary']['sunrise']['time'] ?? 'N/A',
                    'sunset' => $entry['data']['next_12_hours']['summary']['sunset']['time'] ?? 'N/A',
                    'moonrise' => $entry['data']['next_12_hours']['summary']['moonrise']['time'] ?? 'N/A',
                    'moonset' => $entry['data']['next_12_hours']['summary']['moonset']['time'] ?? 'N/A',
                    'moonphase' => $entry['data']['next_12_hours']['summary']['moonphase'] ?? null,
                    'forecasts' => [],
                ];
            }

            $forecasts[$date]['forecasts'][] = $forecast;
        }

        // Format sun/moon times
        foreach ($forecasts as &$day) {
            $day['sunrise'] = $day['sunrise'] !== 'N/A' ? Carbon::parse($day['sunrise'])->format('H:i') : 'N/A';
            $day['sunset'] = $day['sunset'] !== 'N/A' ? Carbon::parse($day['sunset'])->format('H:i') : 'N/A';
            $day['moonrise'] = $day['moonrise'] !== 'N/A' ? Carbon::parse($day['moonrise'])->format('H:i') : 'N/A';
            $day['moonset'] = $day['moonset'] !== 'N/A' ? Carbon::parse($day['moonset'])->format('H:i') : 'N/A';
            $day['moonphase'] = is_numeric($day['moonphase']) ? floatval($day['moonphase']) : null;
        }

        return view('locations.village', [
            'title' => "{$location->name} Weather | Arranweather.com",
            'forecasts' => array_values($forecasts),
        ]);
    }
}