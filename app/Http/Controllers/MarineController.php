<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MarineController extends WeatherController
{
    /**
     * Display the marine forecast for a given location.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $lat = $request->query('lat', 55.541664); // Default to Isle of Arran
        $lon = $request->query('lon', -5.1249847);
        $locationName = $request->query('location', 'Isle of Arran');
        $title = "Marine Forecast - $locationName";
        
        // Fetch marine and weather data
        $marineData = $this->getSevenDayMarineForecast($lat, $lon);
        $weatherData = $this->getTenDayForecast($lat, $lon, null, 'Europe/London');
        
        // Prepare chart data (7 days = 168 hours)
        $chart_labels = [];
        $chart_data = [
            'wave_height' => [],
            'sea_surface_temperature' => [],
            'sea_level_height_msl' => [],
        ];
        
        // Merge data for tables
        $forecast_days = [];
        $marineTimes = $marineData['hourly']['time'] ?? [];
        $weatherTimes = [];
        
        // Collect weather data timestamps
        foreach ($weatherData as $day) {
            foreach ($day['forecasts'] as $forecast) {
                $weatherTimes[] = Carbon::parse($day['date'] . ' ' . $forecast['time'])->toIso8601String();
            }
        }
        
        // Process marine data and match with weather data
        foreach ($marineTimes as $index => $time) {
            if ($index >= 168) break; // Limit to 7 days
            $date = Carbon::parse($time)->toDateString();
            $hourly = [
                'time' => $time,
                'wave_height' => $marineData['hourly']['wave_height'][$index] ?? null,
                'sea_surface_temperature' => $marineData['hourly']['sea_surface_temperature'][$index] ?? null,
                'sea_level_height_msl' => $marineData['hourly']['sea_level_height_msl'][$index] ?? null,
                'wave_direction' => $marineData['hourly']['wave_direction'][$index] ?? null,
                'wave_period' => $marineData['hourly']['wave_period'][$index] ?? null,
                'ocean_current_velocity' => $marineData['hourly']['ocean_current_velocity'][$index] ?? null,
                'ocean_current_direction' => $marineData['hourly']['ocean_current_direction'][$index] ?? null,
            ];
            
            // Find matching weather data
            $weatherMatch = null;
            foreach ($weatherData as $day) {
                foreach ($day['forecasts'] as $forecast) {
                    $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time'])->toIso8601String();
                    if ($weatherTime === $time) {
                        $weatherMatch = $forecast;
                        break 2;
                    }
                }
            }
            
            $hourly['weather'] = $weatherMatch['condition'] ?? 'N/A';
            $hourly['temperature'] = $weatherMatch['temperature'] ?? null;
            $hourly['iconUrl'] = $weatherMatch ? asset("svg/" . ($this->iconMap[$weatherMatch['condition']] ?? $this->iconMap['unknown'])) : asset("svg/unknown.svg");
            
            $forecast_days[$date][] = $hourly;
            
            // Chart data
            $chart_labels[] = Carbon::parse($time)->format('M d H:i');
            $chart_data['wave_height'][] = $hourly['wave_height'];
            $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'];
            $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'];
        }
        
        // Placeholder for weather warnings
        $warnings = [
            [
                'title' => 'High Wave Warning',
                'description' => 'Wave heights expected to exceed 2 meters on August 10, 2025.',
                'severity' => 'warning',
                'time' => '2025-08-10T00:00:00Z',
            ],
        ];
        
        return view('marine-forecast', compact('lat', 'lon', 'title', 'forecast_days', 'chart_labels', 'chart_data', 'warnings'));
    }
    
    /**
     * Display the marine forecast for a specific location using a slug.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function indexBySlug($slug)
    {
        $location = Location::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])->firstOrFail();
        $lat = $location->latitude;
        $lon = $location->longitude;
        $title = "Marine Forecast - {$location->name}";
        
        // Fetch marine and weather data
        $marineData = $this->getSevenDayMarineForecast($lat, $lon);
        $weatherData = $this->getTenDayForecast($lat, $lon, $location->altitude, $location->timezone ?? 'Europe/London');
        
        // Prepare chart data
        $chart_labels = [];
        $chart_data = [
            'wave_height' => [],
            'sea_surface_temperature' => [],
            'sea_level_height_msl' => [],
        ];
        
        // Merge data for tables
        $forecast_days = [];
        $marineTimes = $marineData['hourly']['time'] ?? [];
        $weatherTimes = [];
        
        foreach ($weatherData as $day) {
            foreach ($day['forecasts'] as $forecast) {
                $weatherTimes[] = Carbon::parse($day['date'] . ' ' . $forecast['time'])->toIso8601String();
            }
        }
        
        foreach ($marineTimes as $index => $time) {
            if ($index >= 168) break; // Limit to 7 days
            $date = Carbon::parse($time)->toDateString();
            $hourly = [
                'time' => $time,
                'wave_height' => $marineData['hourly']['wave_height'][$index] ?? null,
                'sea_surface_temperature' => $marineData['hourly']['sea_surface_temperature'][$index] ?? null,
                'sea_level_height_msl' => $marineData['hourly']['sea_level_height_msl'][$index] ?? null,
                'wave_direction' => $marineData['hourly']['wave_direction'][$index] ?? null,
                'wave_period' => $marineData['hourly']['wave_period'][$index] ?? null,
                'ocean_current_velocity' => $marineData['hourly']['ocean_current_velocity'][$index] ?? null,
                'ocean_current_direction' => $marineData['hourly']['ocean_current_direction'][$index] ?? null,
            ];
            
            // Find matching weather data
            $weatherMatch = null;
            foreach ($weatherData as $day) {
                foreach ($day['forecasts'] as $forecast) {
                    $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time'])->toIso8601String();
                    if ($weatherTime === $time) {
                        $weatherMatch = $forecast;
                        break 2;
                    }
                }
            }
            
            $hourly['weather'] = $weatherMatch['condition'] ?? 'N/A';
            $hourly['temperature'] = $weatherMatch['temperature'] ?? null;
            $hourly['iconUrl'] = $weatherMatch ? asset("svg/" . ($this->iconMap[$weatherMatch['condition']] ?? $this->iconMap['unknown'])) : asset("svg/unknown.svg");
            
            $forecast_days[$date][] = $hourly;
            
            // Chart data
            $chart_labels[] = Carbon::parse($time)->format('M d H:i');
            $chart_data['wave_height'][] = $hourly['wave_height'];
            $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'];
            $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'];
        }
        
        // Placeholder for weather warnings
        $warnings = [
            [
                'title' => 'High Wave Warning',
                'description' => 'Wave heights expected to exceed 2 meters on August 10, 2025.',
                'severity' => 'warning',
                'time' => '2025-08-10T00:00:00Z',
            ],
        ];
        
        return view('marine-forecast', compact('lat', 'lon', 'title', 'forecast_days', 'chart_labels', 'chart_data', 'warnings'));
    }
    
    /**
     * Fetch 7-day marine forecast data from Open-Meteo API.
     *
     * @param float $lat
     * @param float $lon
     * @return array
     */
    protected function getSevenDayMarineForecast($lat, $lon)
    {
        $cacheKey = "marine_forecast_{$lat}_{$lon}";
        $cacheTtl = 21600; // 6 hours in seconds
        
        $marineData = Cache::get($cacheKey);
        if ($marineData !== null) {
            $cacheAge = Carbon::now()->diffInSeconds(Carbon::createFromTimestamp(Cache::get($cacheKey . '_timestamp') ?? 0));
            if ($cacheAge < $cacheTtl) {
                Log::info('Returning cached marine forecast', ['key' => $cacheKey, 'age' => $cacheAge]);
                return $marineData;
            }
        }
        
        try {
            $url = "https://marine-api.open-meteo.com/v1/marine?latitude={$lat}&longitude={$lon}&hourly=wave_height,sea_surface_temperature,sea_level_height_msl,wave_direction,wave_period,ocean_current_velocity,ocean_current_direction&wind_speed_unit=mph";
            $response = Http::get($url);
            
            if ($response->successful()) {
                $marineData = $response->json();
                Cache::put($cacheKey, $marineData, $cacheTtl);
                Cache::put($cacheKey . '_timestamp', time(), $cacheTtl);
                Log::info('Fetched and cached marine forecast', ['lat' => $lat, 'lon' => $lon]);
                return $marineData;
            } else {
                Log::error('Open-Meteo API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'url' => $url,
                ]);
                return ['hourly' => []];
            }
        } catch (\Exception $e) {
            Log::error('Error fetching marine forecast data', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'lat' => $lat,
                'lon' => $lon,
            ]);
            return ['hourly' => []];
        }
    }
}