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
        
        foreach ($marineTimes as $index => $time) {
            if ($index >= 168) break; // Limit to 7 days
            $marineCarbon = Carbon::parse($time);
            $date = $marineCarbon->toDateString();
            $hour = $marineCarbon->format('H:00');
            
            if (isset($forecast_days[$date][$hour])) continue;
            
            $hourly = [
                'time' => $marineCarbon->toIso8601String(),
                'wave_height' => is_numeric($marineData['hourly']['wave_height'][$index] ?? null) ? $marineData['hourly']['wave_height'][$index] : null,
                'sea_surface_temperature' => is_numeric($marineData['hourly']['sea_surface_temperature'][$index] ?? null) ? $marineData['hourly']['sea_surface_temperature'][$index] : null,
                'sea_level_height_msl' => is_numeric($marineData['hourly']['sea_level_height_msl'][$index] ?? null) ? $marineData['hourly']['sea_level_height_msl'][$index] : null,
                'wave_direction' => is_numeric($marineData['hourly']['wave_direction'][$index] ?? null) ? $marineData['hourly']['wave_direction'][$index] : null,
                'wave_period' => is_numeric($marineData['hourly']['wave_period'][$index] ?? null) ? $marineData['hourly']['wave_period'][$index] : null,
                'ocean_current_velocity' => is_numeric($marineData['hourly']['ocean_current_velocity'][$index] ?? null) ? $marineData['hourly']['ocean_current_velocity'][$index] : null,
                'ocean_current_direction' => is_numeric($marineData['hourly']['ocean_current_direction'][$index] ?? null) ? $marineData['hourly']['ocean_current_direction'][$index] : null,
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
                $hourly['temperature'] = is_numeric($closestWeather['temperature'] ?? null) ? $closestWeather['temperature'] : null;
                $hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']);
                $hourly['iconUrl'] = asset("svg/" . ($this->iconMap[$closestWeather['condition']] ?? $this->iconMap['unknown']));
                $hourly['wind_speed'] = is_numeric($closestWeather['wind_speed'] ?? null) ? $closestWeather['wind_speed'] : null;
                $hourly['wind_gusts'] = $hourly['wind_speed'] !== null ? $hourly['wind_speed'] * 1.4 : null; // Custom gust formula
                $hourly['wind_direction'] = is_numeric($closestWeather['wind_direction'] ?? null) ? $closestWeather['wind_direction'] : null;
                $hourly['beaufort'] = $this->calculateBeaufort($hourly['wind_speed']);
            }
            
            $forecast_days[$date][$hour] = $hourly;
            
            if ($hourly['wave_height'] !== null && $hourly['sea_surface_temperature'] !== null && $hourly['sea_level_height_msl'] !== null) {
                $chart_labels[] = $marineCarbon->format('M d H:i');
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
                    'label' => $marineCarbon->format('M d H:i'),
                    'wave_height' => $hourly['wave_height'],
                    'sea_surface_temperature' => $hourly['sea_surface_temperature'],
                    'sea_level_height_msl' => $hourly['sea_level_height_msl'],
                ],
            ]);
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
        
        foreach ($marineTimes as $index => $time) {
            if ($index >= 168) break;
            $marineCarbon = Carbon::parse($time);
            $date = $marineCarbon->toDateString();
            $hour = $marineCarbon->format('H:00');
            
            if (isset($forecast_days[$date][$hour])) continue;
            
            $hourly = [
                'time' => $marineCarbon->toIso8601String(),
                'wave_height' => is_numeric($marineData['hourly']['wave_height'][$index] ?? null) ? $marineData['hourly']['wave_height'][$index] : null,
                'sea_surface_temperature' => is_numeric($marineData['hourly']['sea_surface_temperature'][$index] ?? null) ? $marineData['hourly']['sea_surface_temperature'][$index] : null,
                'sea_level_height_msl' => is_numeric($marineData['hourly']['sea_level_height_msl'][$index] ?? null) ? $marineData['hourly']['sea_level_height_msl'][$index] : null,
                'wave_direction' => is_numeric($marineData['hourly']['wave_direction'][$index] ?? null) ? $marineData['hourly']['wave_direction'][$index] : null,
                'wave_period' => is_numeric($marineData['hourly']['wave_period'][$index] ?? null) ? $marineData['hourly']['wave_period'][$index] : null,
                'ocean_current_velocity' => is_numeric($marineData['hourly']['ocean_current_velocity'][$index] ?? null) ? $marineData['hourly']['ocean_current_velocity'][$index] : null,
                'ocean_current_direction' => is_numeric($marineData['hourly']['ocean_current_direction'][$index] ?? null) ? $marineData['hourly']['ocean_current_direction'][$index] : null,
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
                    if ($diff <= 60 && $minDiff) {
                        $closestWeather = $forecast;
                        $minDiff = $diff;
                        $hourly['time'] = $weatherTime->toIso8601String();
                    }
                }
            }
            
            if ($closestWeather) {
                $hourly['weather'] = $closestWeather['condition'] ?? 'N/A';
                $hourly['temperature'] = is_numeric($closestWeather['temperature'] ?? null) ? $closestWeather['temperature'] : null;
                $hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']);
                $hourly['iconUrl'] = asset("svg/" . ($this->iconMap[$closestWeather['condition']] ?? $this->iconMap['unknown']));
                $hourly['wind_speed'] = is_numeric($closestWeather['wind_speed'] ?? null) ? $closestWeather['wind_speed'] : null;
                $hourly['wind_gusts'] = $hourly['wind_speed'] !== null ? $hourly['wind_speed'] * 1.4 : null; // Custom gust formula
                $hourly['wind_direction'] = is_numeric($closestWeather['wind_direction'] ?? null) ? $closestWeather['wind_direction'] : null;
                $hourly['beaufort'] = $this->calculateBeaufort($hourly['wind_speed']);
            }
            
            $forecast_days[$date][$hour] = $hourly;
            
            if ($hourly['wave_height'] !== null && $hourly['sea_surface_temperature'] !== null && $hourly['sea_level_height_msl'] !== null) {
                $chart_labels[] = $marineCarbon->format('M d H:i');
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
                    'label' => $marineCarbon->format('M d H:i'),
                    'wave_height' => $hourly['wave_height'],
                    'sea_surface_temperature' => $hourly['sea_surface_temperature'],
                    'sea_level_height_msl' => $hourly['sea_level_height_msl'],
                ],
            ]);
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
```

<xaiArtifact artifact_id="f6f7f28a-c151-44bd-a4d9-52ef3090f114" artifact_version_id="417025dc-1b1c-43c4-aacf-fcf8daab3afe" title="locations/marine-forecast.blade.php" contentType="text/html">
```blade
@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ $title }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Marine Forecast</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($warnings))
            <div class="row mb-3">
                @foreach($warnings as $warning)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-{{ $warning['severity'] }} shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-{{ $warning['severity'] }}">{{ $warning['title'] }}</h5>
                                <p class="card-text">{{ $warning['description'] }}</p>
                                <p class="card-text"><small class="text-muted">Issued: {{ \Carbon\Carbon::parse($warning['time'])->format('D, j M Y H:i') }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="location-search" action="{{ route('marine.forecast') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="location" placeholder="Search for a location (e.g., London)" value="{{ $title }}">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($chart_labels) && !empty($chart_data['wave_height']))
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">7-Day Marine Forecast Overview</h5>
                            <canvas id="marineChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning">
                        No chart data available for the selected location.
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($forecast_days))
            @foreach($forecast_days as $date => $data)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ \Carbon\Carbon::parse($date)->format('l, j F Y') }}</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Time</th>
                                                <th>Weather</th>
                                                <th>Air Temp (°C)</th>
                                                <th>Sea Temp (°C)</th>
                                                <th>Wind Speed (mph)</th>
                                                <th>Wind Gusts (mph)</th>
                                                <th>Wind Dir</th>
                                                <th>Beaufort</th>
                                                <th>Wave Height (m)</th>
                                                <th>Sea Level (m)</th>
                                                <th>Wave Dir</th>
                                                <th>Wave Period (s)</th>
                                                <th>Current Vel (mph)</th>
                                                <th>Current Dir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $hourly)
                                                @php
                                                    $cardinal = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW', 'N'];
                                                    $windDir = is_numeric($hourly['wind_direction']) ? round($hourly['wind_direction'] / 45) * 45 : null;
                                                    $windCardinal = $windDir !== null ? $cardinal[intval($windDir / 45) % 8] : 'N/A';
                                                    $waveDir = is_numeric($hourly['wave_direction']) ? round($hourly['wave_direction'] / 45) * 45 : null;
                                                    $waveCardinal = $waveDir !== null ? $cardinal[intval($waveDir / 45) % 8] : 'N/A';
                                                    $currentDir = is_numeric($hourly['ocean_current_direction']) ? round($hourly['ocean_current_direction'] / 45) * 45 : null;
                                                    $currentCardinal = $currentDir !== null ? $cardinal[intval($currentDir / 45) % 8] : 'N/A';
                                                @endphp
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($hourly['time'])->format('H:i') }}</td>
                                                    <td>
                                                        <img src="{{ $hourly['iconUrl'] }}" alt="{{ $hourly['weather'] }}" width="24" height="24" class="me-1">
                                                        {{ $hourly['weather'] }}
                                                    </td>
                                                    <td class="{{ $hourly['temp_class'] }}">{{ $hourly['temperature'] ? number_format($hourly['temperature'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['sea_surface_temperature'] ? number_format($hourly['sea_surface_temperature'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['wind_speed'] ? number_format($hourly['wind_speed'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['wind_gusts'] ? number_format($hourly['wind_gusts'], 1) : 'N/A' }}</td>
                                                    <td>
                                                        @if($windDir !== null)
                                                            <i class="ti ti-arrow-up" style="transform: rotate({{ $windDir }}deg);"></i>
                                                            {{ $windCardinal }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $hourly['beaufort'] }}</td>
                                                    <td>{{ $hourly['wave_height'] ? number_format($hourly['wave_height'], 2) : 'N/A' }}</td>
                                                    <td>{{ $hourly['sea_level_height_msl'] ? number_format($hourly['sea_level_height_msl'], 2) : 'N/A' }}</td>
                                                    <td>
                                                        @if($waveDir !== null)
                                                            <i class="ti ti-arrow-up" style="transform: rotate({{ $waveDir }}deg);"></i>
                                                            {{ $waveCardinal }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $hourly['wave_period'] ? number_format($hourly['wave_period'], 2) : 'N/A' }}</td>
                                                    <td>{{ $hourly['ocean_current_velocity'] ? number_format($hourly['ocean_current_velocity'], 2) : 'N/A' }}</td>
                                                    <td>
                                                        @if($currentDir !== null)
                                                            <i class="ti ti-arrow-up" style="transform: rotate({{ $currentDir }}deg);"></i>
                                                            {{ $currentCardinal }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning">
                        No forecast data available for the selected location.
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if(!empty($chart_labels) && !empty($chart_data['wave_height']))
        @push('footer-scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    try {
                        const chartData = @json($chart_data);
                        const labels = @json($chart_labels);
                        
                        console.log('Chart Data:', chartData);
                        console.log('Chart Labels:', labels);
                        
                        if (!labels.length || !chartData.wave_height.length) {
                            console.error('Invalid chart data:', { labels, chartData });
                            return;
                        }
                        
                        const ctx = document.getElementById('marineChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'Wave Height (m)',
                                        data: chartData.wave_height,
                                        borderColor: '#007bff',
                                        backgroundColor: 'rgba(0, 123, 255, 0.1)',
                                        fill: true,
                                        tension: 0.4
                                    },
                                    {
                                        label: 'Sea Surface Temperature (°C)',
                                        data: chartData.sea_surface_temperature,
                                        borderColor: '#28a745',
                                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                                        fill: true,
                                        tension: 0.4
                                    },
                                    {
                                        label: 'Sea Level Height (m)',
                                        data: chartData.sea_level_height_msl,
                                        borderColor: '#dc3545',
                                        backgroundColor: 'rgba(220, 53, 69, 0.1)',
                                        fill: true,
                                        tension: 0.4
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    x: {
                                        title: { display: true, text: 'Time' },
                                        ticks: {
                                            maxTicksLimit: 20
                                        }
                                    },
                                    y: {
                                        title: { display: true, text: 'Value' },
                                        beginAtZero: false
                                    }
                                },
                                plugins: {
                                    legend: { position: 'top' },
                                    tooltip: { mode: 'index', intersect: false }
                                }
                            }
                        });
                    } catch (error) {
                        console.error('Chart.js error:', error);
                    }
                });
            </script>
        @endpush
    @endif
@endsection