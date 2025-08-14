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
    public function index(Request $request)
    {
        $lat = $request->query('lat', 55.541664);
        $lon = $request->query('lon', -5.1249847);
        $locationName = $request->query('location', 'Isle of Arran');
        $title = "Marine Forecast - $locationName";
        
        $marineData = $this->getSevenDayMarineForecast($lat, $lon);
        $weatherData = $this->getTenDayForecast($lat, $lon, null, 'Europe/London');
        
        Log::info('Marine data', ['marineData' => $marineData]);
        Log::info('Weather data', ['weatherData' => $weatherData]);
        
        $chart_labels = [];
        $chart_data = [
            'wave_height' => [],
            'sea_surface_temperature' => [],
            'sea_level_height_msl' => [],
        ];
        
        $forecast_days = [];
        $marineTimes = $marineData['hourly']['time'] ?? [];
        $currentTime = Carbon::now('Europe/London')->startOfHour(); // Start from current hour (2025-08-13 20:00 BST)
        
        foreach ($weatherData as $day) {
            $date = Carbon::parse($day['date'])->toDateString();
            foreach ($day['forecasts'] as $forecast) {
                $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time']);
                if ($weatherTime->lessThan($currentTime)) {
                    Log::debug('Skipping past weather timestamp', ['weatherTime' => $weatherTime->toIso8601String()]);
                    continue; // Skip timestamps before current hour
                }
                
                $hour = $weatherTime->format('H:00');
                
                $closestMarine = null;
                $minDiff = PHP_INT_MAX;
                foreach ($marineTimes as $index => $marineTime) {
                    if ($index >= 168) break; // Limit to 7 days
                    $marineCarbon = Carbon::parse($marineTime);
                    $diff = abs($weatherTime->diffInMinutes($marineCarbon));
                    if ($diff <= 60 && $diff < $minDiff) {
                        $closestMarine = $index;
                        $minDiff = $diff;
                    }
                }
                
                if ($closestMarine === null) {
                    Log::debug('No matching marine data for weather timestamp', [
                        'weatherTime' => $weatherTime->toIso8601String(),
                    ]);
                    continue;
                }
                
                $marineCarbon = Carbon::parse($marineTimes[$closestMarine]);
                
                $hourly = [
                    'time' => $weatherTime->toIso8601String(),
                    'wave_height' => is_numeric($marineData['hourly']['wave_height'][$closestMarine] ?? null) ? $marineData['hourly']['wave_height'][$closestMarine] : null,
                    'sea_surface_temperature' => is_numeric($marineData['hourly']['sea_surface_temperature'][$closestMarine] ?? null) ? $marineData['hourly']['sea_surface_temperature'][$closestMarine] : null,
                    'sea_level_height_msl' => is_numeric($marineData['hourly']['sea_level_height_msl'][$closestMarine] ?? null) ? $marineData['hourly']['sea_level_height_msl'][$closestMarine] : null,
                    'wave_direction' => is_numeric($marineData['hourly']['wave_direction'][$closestMarine] ?? null) ? $marineData['hourly']['wave_direction'][$closestMarine] : null,
                    'wave_period' => is_numeric($marineData['hourly']['wave_period'][$closestMarine] ?? null) ? $marineData['hourly']['wave_period'][$closestMarine] : null,
                    'ocean_current_velocity' => is_numeric($marineData['hourly']['ocean_current_velocity'][$closestMarine] ?? null) ? $marineData['hourly']['ocean_current_velocity'][$closestMarine] : null,
                    'ocean_current_direction' => is_numeric($marineData['hourly']['ocean_current_direction'][$closestMarine] ?? null) ? $marineData['hourly']['ocean_current_direction'][$closestMarine] : null,
                    'weather' => $forecast['condition'] ?? 'N/A',
                    'temperature' => is_numeric($forecast['temperature'] ?? null) ? $forecast['temperature'] : null,
                    'temp_class' => $this->getTemperatureClass($forecast['temperature'] ?? null),
                    'iconUrl' => asset("svg/" . ($this->iconMap[$forecast['condition']] ?? $this->iconMap['unknown'])),
                    'wind_speed' => is_numeric($forecast['wind_speed'] ?? null) ? $forecast['wind_speed'] : null,
                    'wind_gusts' => is_numeric($forecast['wind_speed'] ?? null) ? $forecast['wind_speed'] * 1.4 : null, // Reused gust formula
                    'wind_direction' => is_numeric($forecast['wind_direction'] ?? null) ? $forecast['wind_direction'] : null,
                    'beaufort' => $this->calculateBeaufort($forecast['wind_speed'] ?? null),
                ];
                
                $forecast_days[$date][$hour] = $hourly;
                
                if ($hourly['wave_height'] !== null && $hourly['sea_surface_temperature'] !== null && $hourly['sea_level_height_msl'] !== null) {
                    $chart_labels[] = $weatherTime->format('M d H:i');
                    $chart_data['wave_height'][] = $hourly['wave_height'];
                    $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'];
                    $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'];
                }
                
                Log::debug('Hourly data', [
                    'time' => $hourly['time'],
                    'weather' => $hourly['weather'],
                    'temperature' => $hourly['temperature'],
                    'wind_speed' => $hourly['wind_speed'],
                    'wind_gusts' => $hourly['wind_gusts'],
                    'wind_direction' => $hourly['wind_direction'],
                    'wave_direction' => $hourly['wave_direction'],
                    'ocean_current_direction' => $hourly['ocean_current_direction'],
                    'chart_entry' => [
                        'label' => $weatherTime->format('M d H:i'),
                        'wave_height' => $hourly['wave_height'],
                        'sea_surface_temperature' => $hourly['sea_surface_temperature'],
                        'sea_level_height_msl' => $hourly['sea_level_height_msl'],
                    ],
                ]);
            }
        }
        
        Log::info('Forecast days', ['count' => count($forecast_days)]);
        Log::info('Chart labels', ['count' => count($chart_labels), 'sample' => array_slice($chart_labels, 0, 5)]);
        Log::info('Chart data', ['sample' => array_map(function($key) use ($chart_data) {
            return array_slice($chart_data[$key], 0, 5);
        }, array_keys($chart_data))]);
        
        $warnings = [
            [
                'title' => 'High Wave Warning',
                'description' => 'Wave heights expected to exceed 2 meters on August 10, 2025.',
                'severity' => 'warning',
                'time' => '2025-08-10T00:00:00Z',
            ],
        ];
        
        return view('locations.marine-forecast', compact('lat', 'lon', 'title', 'forecast_days', 'chart_labels', 'chart_data', 'warnings'));
    }
    
    public function indexBySlug($slug, $layout = null)
    {
        $location = Location::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])->firstOrFail();
        $lat = $location->latitude;
        $lon = $location->longitude;
        $title = "Marine Forecast - {$location->name}";
        
        $marineData = $this->getSevenDayMarineForecast($lat, $lon);
        $weatherData = $this->getTenDayForecast($lat, $lon, $location->altitude, $location->timezone ?? 'Europe/London');
        
        Log::info('Marine data (slug)', ['marineData' => $marineData]);
        Log::info('Weather data (slug)', ['weatherData' => $weatherData]);
        
        $chart_labels = [];
        $chart_data = [
            'wave_height' => [],
            'sea_surface_temperature' => [],
            'sea_level_height_msl' => [],
        ];
        
        $forecast_days = [];
        $marineTimes = $marineData['hourly']['time'] ?? [];
        $currentTime = Carbon::now('Europe/London')->startOfHour(); // Start from current hour
        
        foreach ($weatherData as $day) {
            $date = Carbon::parse($day['date'])->toDateString();
            foreach ($day['forecasts'] as $forecast) {
                $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time']);
                if ($weatherTime->lessThan($currentTime)) {
                    Log::debug('Skipping past weather timestamp (slug)', ['weatherTime' => $weatherTime->toIso8601String()]);
                    continue;
                }
                
                $hour = $weatherTime->format('H:00');
                
                $closestMarine = null;
                $minDiff = PHP_INT_MAX;
                foreach ($marineTimes as $index => $marineTime) {
                    if ($index >= 168) break;
                    $marineCarbon = Carbon::parse($marineTime);
                    $diff = abs($weatherTime->diffInMinutes($marineCarbon));
                    if ($diff <= 60 && $diff < $minDiff) {
                        $closestMarine = $index;
                        $minDiff = $diff;
                    }
                }
                
                if ($closestMarine === null) {
                    Log::debug('No matching marine data for weather timestamp (slug)', [
                        'weatherTime' => $weatherTime->toIso8601String(),
                    ]);
                    continue;
                }
                
                $marineCarbon = Carbon::parse($marineTimes[$closestMarine]);
                
                $hourly = [
                    'time' => $weatherTime->toIso8601String(),
                    'wave_height' => is_numeric($marineData['hourly']['wave_height'][$closestMarine] ?? null) ? $marineData['hourly']['wave_height'][$closestMarine] : null,
                    'sea_surface_temperature' => is_numeric($marineData['hourly']['sea_surface_temperature'][$closestMarine] ?? null) ? $marineData['hourly']['sea_surface_temperature'][$closestMarine] : null,
                    'sea_level_height_msl' => is_numeric($marineData['hourly']['sea_level_height_msl'][$closestMarine] ?? null) ? $marineData['hourly']['sea_level_height_msl'][$closestMarine] : null,
                    'wave_direction' => is_numeric($marineData['hourly']['wave_direction'][$closestMarine] ?? null) ? $marineData['hourly']['wave_direction'][$closestMarine] : null,
                    'wave_period' => is_numeric($marineData['hourly']['wave_period'][$closestMarine] ?? null) ? $marineData['hourly']['wave_period'][$closestMarine] : null,
                    'ocean_current_velocity' => is_numeric($marineData['hourly']['ocean_current_velocity'][$closestMarine] ?? null) ? $marineData['hourly']['ocean_current_velocity'][$closestMarine] : null,
                    'ocean_current_direction' => is_numeric($marineData['hourly']['ocean_current_direction'][$closestMarine] ?? null) ? $marineData['hourly']['ocean_current_direction'][$closestMarine] : null,
                    'weather' => $forecast['condition'] ?? 'N/A',
                    'temperature' => is_numeric($forecast['temperature'] ?? null) ? $forecast['temperature'] : null,
                    'temp_class' => $this->getTemperatureClass($forecast['temperature'] ?? null),
                    'iconUrl' => asset("svg/" . ($this->iconMap[$forecast['condition']] ?? $this->iconMap['unknown'])),
                    'wind_speed' => is_numeric($forecast['wind_speed'] ?? null) ? $forecast['wind_speed'] : null,
                    'wind_gusts' => is_numeric($forecast['wind_speed'] ?? null) ? $forecast['wind_speed'] * 1.4 : null, // Reused gust formula
                    'wind_direction' => is_numeric($forecast['wind_direction'] ?? null) ? $forecast['wind_direction'] : null,
                    'beaufort' => $this->calculateBeaufort($forecast['wind_speed'] ?? null),
                ];
                
                $forecast_days[$date][$hour] = $hourly;
                
                if ($hourly['wave_height'] !== null && $hourly['sea_surface_temperature'] !== null && $hourly['sea_level_height_msl'] !== null) {
                    $chart_labels[] = $weatherTime->format('M d H:i');
                    $chart_data['wave_height'][] = $hourly['wave_height'];
                    $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'];
                    $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'];
                }
                
                Log::debug('Hourly data (slug)', [
                    'time' => $hourly['time'],
                    'weather' => $hourly['weather'],
                    'temperature' => $hourly['temperature'],
                    'wind_speed' => $hourly['wind_speed'],
                    'wind_gusts' => $hourly['wind_gusts'],
                    'wind_direction' => $hourly['wind_direction'],
                    'wave_direction' => $hourly['wave_direction'],
                    'ocean_current_direction' => $hourly['ocean_current_direction'],
                    'chart_entry' => [
                        'label' => $weatherTime->format('M d H:i'),
                        'wave_height' => $hourly['wave_height'],
                        'sea_surface_temperature' => $hourly['sea_surface_temperature'],
                        'sea_level_height_msl' => $hourly['sea_level_height_msl'],
                    ],
                ]);
            }
        }
        
        Log::info('Forecast days (slug)', ['count' => count($forecast_days)]);
        Log::info('Chart labels (slug)', ['count' => count($chart_labels), 'sample' => array_slice($chart_labels, 0, 5)]);
        Log::info('Chart data (slug)', ['sample' => array_map(function($key) use ($chart_data) {
            return array_slice($chart_data[$key], 0, 5);
        }, array_keys($chart_data))]);
        
        $warnings = [
            [
                'title' => 'High Wave Warning',
                'description' => 'Wave heights expected to exceed 2 meters on August 10, 2025.',
                'severity' => 'warning',
                'time' => '2025-08-10T00:00:00Z',
            ],
        ];
        
        $template = 'locations.marine-forecast';
        return view($template, compact('lat', 'lon', 'title', 'forecast_days', 'chart_labels', 'chart_data', 'warnings'));
    }
    
    protected function getSevenDayMarineForecast($lat, $lon)
    {
        $cacheKey = "marine_forecast_{$lat}_{$lon}";
        $cacheTtl = 21600;
        
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
    
    protected function calculateBeaufort($windSpeed)
    {
        if ($windSpeed === null) return 0;
        $windSpeedKnots = $windSpeed * 0.868976; // Convert mph to knots
        if ($windSpeedKnots < 1) return 0;
        if ($windSpeedKnots < 4) return 1;
        if ($windSpeedKnots < 7) return 2;
        if ($windSpeedKnots < 11) return 3;
        if ($windSpeedKnots < 17) return 4;
        if ($windSpeedKnots < 22) return 5;
        if ($windSpeedKnots < 28) return 6;
        if ($windSpeedKnots < 34) return 7;
        if ($windSpeedKnots < 41) return 8;
        if ($windSpeedKnots < 48) return 9;
        if ($windSpeedKnots < 56) return 10;
        if ($windSpeedKnots < 64) return 11;
        return 12;
    }
}