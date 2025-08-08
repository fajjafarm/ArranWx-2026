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
            'times' => [],
        ];
        
        $forecast_days = [];
        $marineTimes = $marineData['hourly']['time'] ?? [];
        
        foreach ($marineTimes as $index => $time) {
            if ($index >= 168) break; // Limit to 7 days
            $marineCarbon = Carbon::parse($time);
            $date = $marineCarbon->toDateString();
            $hour = $marineCarbon->format('H:00');
            
            if (isset($forecast_days[$date][$hour])) continue;
            
            $hourly = [
                'time' => $marineCarbon->toIso8601String(),
                'wave_height' => $marineData['hourly']['wave_height'][$index] ?? null,
                'sea_surface_temperature' => $marineData['hourly']['sea_surface_temperature'][$index] ?? null,
                'sea_level_height_msl' => $marineData['hourly']['sea_level_height_msl'][$index] ?? null,
                'wave_direction' => $marineData['hourly']['wave_direction'][$index] ?? null,
                'wave_period' => $marineData['hourly']['wave_period'][$index] ?? null,
                'ocean_current_velocity' => $marineData['hourly']['ocean_current_velocity'][$index] ?? null,
                'ocean_current_direction' => $marineData['hourly']['ocean_current_direction'][$index] ?? null,
                'weather' => 'N/A',
                'temperature' => null,
                'temp_class' => 'temp-cell-0',
                'iconUrl' => asset("svg/unknown.svg"),
                'wind_speed' => null,
                'wind_gusts' => null,
                'wind_direction' => null,
                'beaufort' => 0,
            ];
            
            $closestWeather = null;
            $minDiff = PHP_INT_MAX;
            foreach ($weatherData as $day) {
                foreach ($day['forecasts'] as $forecast) {
                    $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time']);
                    $diff = abs($marineCarbon->diffInMinutes($weatherTime));
                    if ($diff <= 60 && $diff < $minDiff) {
                        $closestWeather = $forecast;
                        $minDiff = $diff;
                        $hourly['time'] = $weatherTime->toIso8601String();
                    }
                }
            }
            
            if ($closestWeather) {
                $hourly['weather'] = $closestWeather['condition'] ?? 'N/A';
                $hourly['temperature'] = $closestWeather['temperature'] ?? null;
                $hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']);
                $hourly['iconUrl'] = asset("svg/" . ($this->iconMap[$closestWeather['condition']] ?? $this->iconMap['unknown']));
                $hourly['wind_speed'] = $closestWeather['wind_speed'] ?? null;
                $hourly['wind_gusts'] = $closestWeather['wind_gusts'] ?? null;
                $hourly['wind_direction'] = $closestWeather['wind_direction'] ?? null;
                $hourly['beaufort'] = $this->calculateBeaufort($hourly['wind_speed']);
            }
            
            $forecast_days[$date][$hour] = $hourly;
            
            $chart_labels[] = $marineCarbon->format('Y-m-d H:i:s');
            $chart_data['wave_height'][] = $hourly['wave_height'] ?? null;
            $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'] ?? null;
            $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'] ?? null;
            $chart_data['times'][] = $marineCarbon->toIso8601String();
            
            Log::debug('Hourly data', ['time' => $hourly['time'], 'weather' => $hourly['weather'], 'temperature' => $hourly['temperature'], 'wind_speed' => $hourly['wind_speed']]);
        }
        
        Log::info('Forecast days', ['count' => count($forecast_days)]);
        Log::info('Chart labels', ['count' => count($chart_labels), 'sample' => array_slice($chart_labels, 0, 5)]);
        
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
            'times' => [],
        ];
        
        $forecast_days = [];
        $marineTimes = $marineData['hourly']['time'] ?? [];
        
        foreach ($marineTimes as $index => $time) {
            if ($index >= 168) break;
            $marineCarbon = Carbon::parse($time);
            $date = $marineCarbon->toDateString();
            $hour = $marineCarbon->format('H:00');
            
            if (isset($forecast_days[$date][$hour])) continue;
            
            $hourly = [
                'time' => $marineCarbon->toIso8601String(),
                'wave_height' => $marineData['hourly']['wave_height'][$index] ?? null,
                'sea_surface_temperature' => $marineData['hourly']['sea_surface_temperature'][$index] ?? null,
                'sea_level_height_msl' => $marineData['hourly']['sea_level_height_msl'][$index] ?? null,
                'wave_direction' => $marineData['hourly']['wave_direction'][$index] ?? null,
                'wave_period' => $marineData['hourly']['wave_period'][$index] ?? null,
                'ocean_current_velocity' => $marineData['hourly']['ocean_current_velocity'][$index] ?? null,
                'ocean_current_direction' => $marineData['hourly']['ocean_current_direction'][$index] ?? null,
                'weather' => 'N/A',
                'temperature' => null,
                'temp_class' => 'temp-cell-0',
                'iconUrl' => asset("svg/unknown.svg"),
                'wind_speed' => null,
                'wind_gusts' => null,
                'wind_direction' => null,
                'beaufort' => 0,
            ];
            
            $closestWeather = null;
            $minDiff = PHP_INT_MAX;
            foreach ($weatherData as $day) {
                foreach ($day['forecasts'] as $forecast) {
                    $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time']);
                    $diff = abs($marineCarbon->diffInMinutes($weatherTime));
                    if ($diff <= 60 && $diff < $minDiff) {
                        $closestWeather = $forecast;
                        $minDiff = $diff;
                        $hourly['time'] = $weatherTime->toIso8601String();
                    }
                }
            }
            
            if ($closestWeather) {
                $hourly['weather'] = $closestWeather['condition'] ?? 'N/A';
                $hourly['temperature'] = $closestWeather['temperature'] ?? null;
                $hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']);
                $hourly['iconUrl'] = asset("svg/" . ($this->iconMap[$closestWeather['condition']] ?? $this->iconMap['unknown']));
                $hourly['wind_speed'] = $closestWeather['wind_speed'] ?? null;
                $hourly['wind_gusts'] = $closestWeather['wind_gusts'] ?? null;
                $hourly['wind_direction'] = $closestWeather['wind_direction'] ?? null;
                $hourly['beaufort'] = $this->calculateBeaufort($hourly['wind_speed']);
            }
            
            $forecast_days[$date][$hour] = $hourly;
            
            $chart_labels[] = $marineCarbon->format('Y-m-d H:i:s');
            $chart_data['wave_height'][] = $hourly['wave_height'] ?? null;
            $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'] ?? null;
            $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'] ?? null;
            $chart_data['times'][] = $marineCarbon->toIso8601String();
            
            Log::debug('Hourly data (slug)', ['time' => $hourly['time'], 'weather' => $hourly['weather'], 'temperature' => $hourly['temperature'], 'wind_speed' => $hourly['wind_speed']]);
        }
        
        Log::info('Forecast days (slug)', ['count' => count($forecast_days)]);
        Log::info('Chart labels (slug)', ['count' => count($chart_labels), 'sample' => array_slice($chart_labels, 0, 5)]);
        
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