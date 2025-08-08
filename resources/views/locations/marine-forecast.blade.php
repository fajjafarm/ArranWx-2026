@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('content')
    <!-- Start Content -->
    <div class="container-fluid">
        <!-- Start Page Title -->
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
        <!-- End Page Title -->

        <!-- Weather Warnings -->
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

        <!-- Search Bar -->
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

        <!-- Graphs -->
        @if(!empty($chart_labels))
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

        <!-- Daily Tables -->
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
                                                <th>Temp (°C)</th>
                                                <th>Wave Height (m)</th>
                                                <th>Sea Temp (°C)</th>
                                                <th>Sea Level (m)</th>
                                                <th>Wave Dir (°)</th>
                                                <th>Wave Period (s)</th>
                                                <th>Current Vel (mph)</th>
                                                <th>Current Dir (°)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $hourly)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($hourly['time'])->format('H:i') }}</td>
                                                    <td>
                                                        <img src="{{ $hourly['iconUrl'] }}" alt="{{ $hourly['weather'] }}" width="24" height="24" class="me-1">
                                                        {{ $hourly['weather'] }}
                                                    </td>
                                                    <td class="{{ $hourly['temp_class'] }}">{{ number_format($hourly['temperature'], 1) ?? 'N/A' }}</td>
                                                    <td>{{ number_format($hourly['wave_height'], 2) ?? 'N/A' }}</td>
                                                    <td>{{ number_format($hourly['sea_surface_temperature'], 1) ?? 'N/A' }}</td>
                                                    <td>{{ number_format($hourly['sea_level_height_msl'], 2) ?? 'N/A' }}</td>
                                                    <td>{{ round($hourly['wave_direction']) ?? 'N/A' }}</td>
                                                    <td>{{ number_format($hourly['wave_period'], 2) ?? 'N/A' }}</td>
                                                    <td>{{ number_format($hourly['ocean_current_velocity'], 2) ?? 'N/A' }}</td>
                                                    <td>{{ round($hourly['ocean_current_direction']) ?? 'N/A' }}</td>
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
    <!-- End Content -->

    <!-- Chart.js Script -->
    @if(!empty($chart_labels))
        @push('footer-scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const ctx = document.getElementById('marineChart').getContext('2d');
                    const marineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($chart_labels),
                            datasets: [
                                {
                                    label: 'Wave Height (m)',
                                    data: @json($chart_data['wave_height']),
                                    borderColor: '#007bff',
                                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                                    fill: true,
                                    tension: 0.4
                                },
                                {
                                    label: 'Sea Surface Temperature (°C)',
                                    data: @json($chart_data['sea_surface_temperature']),
                                    borderColor: '#28a745',
                                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                                    fill: true,
                                    tension: 0.4
                                },
                                {
                                    label: 'Sea Level Height (m)',
                                    data: @json($chart_data['sea_level_height_msl']),
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
                                        maxTicksLimit: 20 // Limit labels for readability over 7 days
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
                });
            </script>
        @endpush
    @endif
@endsection
```

### Changes in marine-forecast.blade.php
- **Fixed Route Error**: Changed `{{ route('marine-forecast') }}` to `{{ route('marine.forecast') }}` in the search form to match the route name defined in `web.php`.
- **Fixed Previous Error**: Replaced `<td class="{{ $this->getTemperatureClass($hourly['temperature']) }}">` with `<td class="{{ $hourly['temp_class'] }}">` to use the precomputed temperature class, addressing the `Using $this when not in object context` error.
- **Fallback Messages**: Kept `@if(!empty($chart_labels))` and `@if(!empty($forecast_days))` to display warnings if data is missing, preventing blank pages as you previously experienced.
- **Null Checks**: Retained `?? 'N/A'` for all table fields to handle missing data gracefully.
- **Breadcrumb**: Kept `route('dashboards.index')` for the Home link, aligning with `web.php`.

### Step 2: Verify web.php
Ensure the marine forecast routes in `web.php` are correct. Based on your previous `web.php`, they are defined as:

```php
Route::get('/marine-forecast', [App\Http\Controllers\MarineController::class, 'index'])->name('marine.forecast');
Route::get('/marine-forecast/{slug}', [App\Http\Controllers\MarineController::class, 'indexBySlug'])->name('marine.forecast.slug');
Route::get('/marine-forecast/{slug}/{layout?}', [App\Http\Controllers\MarineController::class, 'indexBySlug'])->name('marine.forecast.slug.layout');
```

These routes are correct and use `marine.forecast` as the name for the base route, which matches the updated Blade template. No changes are needed here unless you want to rename the route to `marine-forecast` (without the dot) for consistency with the Blade template’s original code. If you prefer that, update `web.php`:

```php
Route::get('/marine-forecast', [App\Http\Controllers\MarineController::class, 'index'])->name('marine-forecast');
```

Then revert the Blade template’s form to `{{ route('marine-forecast') }}`. However, using `marine.forecast` is consistent with Laravel’s naming conventions (e.g., `resources.flight-radar` in your `web.php`), so I recommend keeping the dot notation.

### Step 3: Update MarineController.php
The `MarineController.php` needs to include `$hourly['temp_class']` to support the updated Blade template. Since you’ve confirmed the page is working (except for the route and `$this` errors), I’ll provide the controller with the temperature class computation, retaining the flexible timestamp matching and logging.

<xaiArtifact artifact_id="cac6240a-81e8-4552-9336-a87926895451" artifact_version_id="b3f007ca-f7cf-4389-af19-d0d82829239c" title="MarineController.php" contentType="text/x-php">
```php
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
        
        Log::info('Marine data', ['marineData' => $marineData]);
        Log::info('Weather data', ['weatherData' => $weatherData]);
        
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
        
        Log::info('Marine times', ['count' => count($marineTimes)]);
        Log::info('Weather times', ['count' => count($weatherTimes)]);
        
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
            
            // Find matching weather data (within 1 hour)
            $weatherMatch = null;
            $marineCarbon = Carbon::parse($time);
            foreach ($weatherData as $day) {
                foreach ($day['forecasts'] as $forecast) {
                    $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time']);
                    if ($marineCarbon->diffInMinutes($weatherTime) <= 60) {
                        $weatherMatch = $forecast;
                        $hourly['time'] = $weatherTime->toIso8601String(); // Align with weather time
                        break 2;
                    }
                }
            }
            
            $hourly['weather'] = $weatherMatch['condition'] ?? 'N/A';
            $hourly['temperature'] = $weatherMatch['temperature'] ?? null;
            $hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']); // Compute temperature class
            $hourly['iconUrl'] = $weatherMatch ? asset("svg/" . ($this->iconMap[$weatherMatch['condition']] ?? $this->iconMap['unknown'])) : asset("svg/unknown.svg");
            
            $forecast_days[$date][] = $hourly;
            
            // Chart data
            $chart_labels[] = Carbon::parse($hourly['time'])->format('M d H:i');
            $chart_data['wave_height'][] = $hourly['wave_height'];
            $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'];
            $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'];
        }
        
        Log::info('Forecast days', ['count' => count($forecast_days)]);
        
        // Placeholder for weather warnings
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
    
    /**
     * Display the marine forecast for a specific location using a slug.
     *
     * @param string $slug
     * @param string|null $layout
     * @return \Illuminate\View\View
     */
    public function indexBySlug($slug, $layout = null)
    {
        $location = Location::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])->firstOrFail();
        $lat = $location->latitude;
        $lon = $location->longitude;
        $title = "Marine Forecast - {$location->name}";
        
        // Fetch marine and weather data
        $marineData = $this->getSevenDayMarineForecast($lat, $lon);
        $weatherData = $this->getTenDayForecast($lat, $lon, $location->altitude, $location->timezone ?? 'Europe/London');
        
        Log::info('Marine data (slug)', ['marineData' => $marineData]);
        Log::info('Weather data (slug)', ['weatherData' => $weatherData]);
        
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
        
        Log::info('Marine times (slug)', ['count' => count($marineTimes)]);
        Log::info('Weather times (slug)', ['count' => count($weatherTimes)]);
        
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
            
            // Find matching weather data (within 1 hour)
            $weatherMatch = null;
            $marineCarbon = Carbon::parse($time);
            foreach ($weatherData as $day) {
                foreach ($day['forecasts'] as $forecast) {
                    $weatherTime = Carbon::parse($day['date'] . ' ' . $forecast['time']);
                    if ($marineCarbon->diffInMinutes($weatherTime) <= 60) {
                        $weatherMatch = $forecast;
                        $hourly['time'] = $weatherTime->toIso8601String(); // Align with weather time
                        break 2;
                    }
                }
            }
            
            $hourly['weather'] = $weatherMatch['condition'] ?? 'N/A';
            $hourly['temperature'] = $weatherMatch['temperature'] ?? null;
            $hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']); // Compute temperature class
            $hourly['iconUrl'] = $weatherMatch ? asset("svg/" . ($this->iconMap[$weatherMatch['condition']] ?? $this->iconMap['unknown'])) : asset("svg/unknown.svg");
            
            $forecast_days[$date][] = $hourly;
            
            // Chart data
            $chart_labels[] = Carbon::parse($hourly['time'])->format('M d H:i');
            $chart_data['wave_height'][] = $hourly['wave_height'];
            $chart_data['sea_surface_temperature'][] = $hourly['sea_surface_temperature'];
            $chart_data['sea_level_height_msl'][] = $hourly['sea_level_height_msl'];
        }
        
        Log::info('Forecast days (slug)', ['count' => count($forecast_days)]);
        
        // Placeholder for weather warnings
        $warnings = [
            [
                'title' => 'High Wave Warning',
                'description' => 'Wave heights expected to exceed 2 meters on August 10, 2025.',
                'severity' => 'warning',
                'time' => '2025-08-10T00:00:00Z',
            ],
        ];
        
        $template = 'locations.marine-forecast'; // Default template
        // Example: if ($layout === 'stacked') { $template = 'locations.marine-stacked'; }
        
        return view($template, compact('lat', 'lon', 'title', 'forecast_days', 'chart_labels', 'chart_data', 'warnings'));
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
```

### Changes in MarineController.php
- **Temperature Class**: Added `$hourly['temp_class'] = $this->getTemperatureClass($hourly['temperature']);` in both `index` and `indexBySlug` to compute the temperature class, fixing the `Using $this when not in object context` error.
- **Timestamp Matching**: Kept the flexible 1-hour window for matching Open-Meteo and yr.no timestamps to ensure data alignment.
- **Logging**: Retained logging to help diagnose issues.
- **No Route Changes**: The controller doesn’t directly affect the route name, but it’s updated to support the Blade template’s use of `$hourly['temp_class']`.

### Additional Notes
- **Previous Issues**:
  - **Blank Page**: You confirmed the page is working, suggesting data fetching is successful. The fallback messages in the updated Blade template ensure no blank pages if data is missing.
  - **Using $this Error**: Fixed by moving `getTemperatureClass` to the controller.
- **Weather Warnings**: The placeholder warnings should be replaced with real data from `WeatherWarningController`. Update the controller:
  ```php
  $warnings = app(WeatherWarningController::class)->index($request)->getData()['data'] ?? [];
  ```
  Ensure `WeatherWarningController::index` returns warnings in the format `['title', 'description', 'severity', 'time']`.
- **Search Functionality**: The search form now points to the correct route, but the `index` method ignores the `location` query parameter. To support searching, add geocoding logic:
  ```php
  if ($request->has('location') && $locationName !== 'Isle of Arran') {
      $response = Http::get("https://nominatim.openstreetmap.org/search", [
          'q' => $request->query('location'),
          'format' => 'json',
          'limit' => 1,
      ]);
      if ($response->successful() && !empty($response->json())) {
          $lat = $response->json()[0]['lat'] ?? 55.541664;
          $lon = $response->json()[0]['lon'] ?? -5.1249847;
          $locationName = $request->query('location');
          $title = "Marine Forecast - $locationName";
      }
  }