@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css">
    <style>
        .table-weather { 
            width: 100%; 
            border-collapse: collapse; 
            font-size: 14px;
        }
        .table-weather th, .table-weather td { 
            padding: 10px; 
            text-align: center; 
            border: 1px solid #dee2e6; 
            background-color: transparent;
            vertical-align: middle;
        }
        .table-weather th {
            background: #f8f9fa;
            font-weight: 600;
        }
        .table-weather tr:nth-child(odd) td:nth-child(1),
        .table-weather tr:nth-child(odd) td:nth-child(2) {
            background-color: #f8f9fa;
        }
        .condition-cell img {
            width: 36px;
            height: 36px;
            vertical-align: middle;
        }
        .direction-cell i {
            font-size: 28px;
            font-weight: bold;
        }
        .cardinal-cell {
            font-size: 14px;
        }
        .highlight-amber {
            background-color: #FFC107 !important;
        }
        .warning-icon {
            color: #D32F2F;
            margin-left: 5px;
            font-size: 18px;
            vertical-align: middle;
        }
        .top-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .top-card h6 {
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 16px;
        }
        .top-card p {
            margin: 0;
            font-size: 14px;
        }
        .api-source-footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }
        .chart-container {
            position: relative;
            height: 350px;
            overflow-x: auto;
            overflow-y: hidden;
            padding-bottom: 20px;
        }
        .chart {
            display: flex;
            align-items: flex-end;
            height: 300px;
            gap: 5px;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            position: relative;
        }
        .chart-bar {
            flex: 1;
            background-color: rgba(0, 123, 255, 0.5);
            border: 1px solid #007bff;
            position: relative;
            max-width: 40px;
            min-width: 20px;
        }
        .chart-bar-label {
            position: absolute;
            bottom: -20px;
            transform: rotate(-45deg);
            font-size: 12px;
            white-space: nowrap;
            left: 50%;
            transform-origin: left;
        }
        .chart-y-axis {
            position: absolute;
            left: -40px;
            top: 0;
            height: 100%;
            width: 40px;
            text-align: right;
            font-size: 12px;
        }
        .chart-y-label {
            position: absolute;
            right: 5px;
            font-size: 12px;
        }
        .chart-x-axis-label {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            font-weight: 600;
        }
        .chart-y-axis-title {
            position: absolute;
            top: 50%;
            left: -60px;
            transform: rotate(-90deg);
            font-size: 14px;
            font-weight: 600;
        }
        .fallback-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .fallback-table th, .fallback-table td {
            padding: 8px;
            border: 1px solid #dee2e6;
            text-align: center;
        }
        .fallback-table th {
            background: #f8f9fa;
            font-weight: 600;
        }
        @media (max-width: 768px) {
            .table-weather, .fallback-table { 
                display: block; 
                overflow-x: auto; 
                white-space: nowrap;
            }
            .table-weather th, .table-weather td, .fallback-table th, .fallback-table td { 
                padding: 6px; 
                font-size: 12px; 
            }
            .condition-cell img { 
                width: 27px; 
                height: 27px; 
            }
            .direction-cell i { 
                font-size: 24px; 
            }
            .warning-icon { 
                font-size: 16px; 
            }
            .top-card {
                padding: 10px;
            }
            .top-card h6 {
                font-size: 14px;
            }
            .top-card p {
                font-size: 12px;
            }
            .chart-bar {
                min-width: 15px;
            }
            .chart-bar-label {
                font-size: 10px;
            }
            .chart-y-label {
                font-size: 10px;
            }
        }
    </style>
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

        <!-- Top Cards for Live Sea State Warnings, Tides, and Ferry Updates -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="top-card">
                    <h6>Live Sea State Warnings</h6>
                    <p>No warnings currently. (Integrate <a href="https://www.metoffice.gov.uk/services/data" target="_blank">Met Office API</a> for live updates)</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top-card">
                    <h6>Tide Updates</h6>
                    <p>High Tide: 08:00 (2.5m) | Low Tide: 14:00 (0.5m). (Integrate <a href="https://admiraltyapi.portal.azure-api.net/" target="_blank">Admiralty Tide API</a>)</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top-card">
                    <h6>Ferry Updates</h6>
                    <p>Arran Ferry: On time. (Integrate <a href="https://www.calmac.co.uk/" target="_blank">CalMac API</a>)</p>
                </div>
            </div>
        </div>

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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hourly Wave Height Forecast</h5>
                        @if(!empty($chart_labels) && !empty($chart_data['wave_height']) && is_array($chart_data['wave_height']) && count($chart_data['wave_height']) > 0)
                            @php
                                $maxWaveHeight = max($chart_data['wave_height']);
                                $scaleFactor = $maxWaveHeight > 0 ? 250 / $maxWaveHeight : 1; // Scale to 250px max height
                                $yAxisTicks = [0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4]; // Static y-axis ticks
                                if ($maxWaveHeight > 4) {
                                    $yAxisTicks = array_map(function($i) use ($maxWaveHeight) {
                                        return round($i * $maxWaveHeight / 8, 1);
                                    }, range(0, 8));
                                }
                            @endphp
                            <div class="chart-container">
                                <div class="chart-y-axis">
                                    <span class="chart-y-axis-title">Wave Height (m)</span>
                                    @foreach(array_reverse($yAxisTicks) as $tick)
                                        <span class="chart-y-label" style="top: {{ ((max($yAxisTicks) - $tick) / max($yAxisTicks)) * 250 }}px;">{{ $tick }}</span>
                                    @endforeach
                                </div>
                                <div class="chart">
                                    @foreach($chart_data['wave_height'] as $index => $height)
                                        <div class="chart-bar" 
                                             style="height: {{ $height * $scaleFactor }}px;"
                                             title="{{ $chart_labels[$index] }}: {{ number_format($height, 2) }} m">
                                            <span class="chart-bar-label">{{ $chart_labels[$index] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="chart-x-axis-label">Time</div>
                            </div>
                            <!-- Fallback Table -->
                            <table class="fallback-table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Wave Height (m)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chart_labels as $index => $label)
                                        <tr>
                                            <td>{{ $label }}</td>
                                            <td>{{ number_format($chart_data['wave_height'][$index], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning">
                                No wave height data available for the selected location. Please check data sources or try another location.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($forecast_days))
            @foreach($forecast_days as $date => $data)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ \Carbon\Carbon::parse($date)->format('l, j F Y') }}</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm table-weather">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Time</th>
                                                <th>Weather</th>
                                                <th>Air Temp (°C)</th>
                                                <th>Sea Temp (°C)</th>
                                                <th>Wind Speed (mph)</th>
                                                <th>Wind Gusts (mph)</th>
                                                <th>Wind Dir</th>
                                                <th>Wind Cardinal</th>
                                                <th>Wave Height (m)</th>
                                                <th>Wave Dir</th>
                                                <th>Wave Cardinal</th>
                                                <th>Wave Period (s)</th>
                                                <th>Current Vel (mph)</th>
                                                <th>Current Dir</th>
                                                <th>Current Cardinal</th>
                                                <th>Sea Level (m)</th>
                                                <th>Beaufort</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $hourly)
                                                @php
                                                    $cardinal = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW', 'N'];
                                                    $windDir = is_numeric($hourly['wind_direction']) ? $hourly['wind_direction'] : null;
                                                    $windCardinal = $windDir !== null ? $cardinal[intval(round($windDir / 45)) % 8] : 'N/A';
                                                    $waveDir = is_numeric($hourly['wave_direction']) ? $hourly['wave_direction'] : null;
                                                    $waveCardinal = $waveDir !== null ? $cardinal[intval(round($waveDir / 45)) % 8] : 'N/A';
                                                    $currentDir = is_numeric($hourly['ocean_current_direction']) ? $hourly['ocean_current_direction'] : null;
                                                    $currentCardinal = $currentDir !== null ? $cardinal[intval(round($currentDir / 45)) % 8] : 'N/A';
                                                    $isClonaigSlip = abs($lat - 55.6951) < 0.001 && abs($lon - (-5.3967)) < 0.001;
                                                    $isLochranzaPier = abs($lat - 55.7059) < 0.001 && abs($lon - (-5.3022)) < 0.001;
                                                    $highlightRow = ($isClonaigSlip || $isLochranzaPier) && is_numeric($hourly['sea_level_height_msl']) && $hourly['sea_level_height_msl'] < -0.9;
                                                    $showWarning = ($isClonaigSlip || $isLochranzaPier) && is_numeric($hourly['sea_level_height_msl']) && $hourly['sea_level_height_msl'] < -1.0;
                                                @endphp
                                                <tr @if($highlightRow) style="background-color: #FFC107;" @endif>
                                                    <td>{{ \Carbon\Carbon::parse($hourly['time'])->format('H:i') }}</td>
                                                    <td class="condition-cell">
                                                        <img src="{{ $hourly['iconUrl'] }}" alt="{{ $hourly['weather'] }}" width="36" height="36">
                                                    </td>
                                                    <td class="{{ $hourly['temp_class'] }}">{{ $hourly['temperature'] ? number_format($hourly['temperature'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['sea_surface_temperature'] ? number_format($hourly['sea_surface_temperature'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['wind_speed'] ? number_format($hourly['wind_speed'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['wind_gusts'] ? number_format($hourly['wind_gusts'], 1) : 'N/A' }}</td>
                                                    <td class="direction-cell">
                                                        @if($windDir !== null)
                                                            <i class="wi wi-direction-up" style="transform: rotate({{ $windDir }}deg);"></i>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="cardinal-cell">{{ $windCardinal }}</td>
                                                    <td>{{ $hourly['wave_height'] ? number_format($hourly['wave_height'], 2) : 'N/A' }}</td>
                                                    <td class="direction-cell">
                                                        @if($waveDir !== null)
                                                            <i class="wi wi-direction-up" style="transform: rotate({{ $waveDir }}deg);"></i>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="cardinal-cell">{{ $waveCardinal }}</td>
                                                    <td>{{ $hourly['wave_period'] ? number_format($hourly['wave_period'], 2) : 'N/A' }}</td>
                                                    <td>{{ $hourly['ocean_current_velocity'] ? number_format($hourly['ocean_current_velocity'], 2) : 'N/A' }}</td>
                                                    <td class="direction-cell">
                                                        @if($currentDir !== null)
                                                            <i class="wi wi-direction-up" style="transform: rotate({{ $currentDir }}deg);"></i>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="cardinal-cell">{{ $currentCardinal }}</td>
                                                    <td>
                                                        {{ $hourly['sea_level_height_msl'] ? number_format($hourly['sea_level_height_msl'], 2) : 'N/A' }}
                                                        @if($showWarning)
                                                            <i class="wi wi-warning warning-icon"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{ $hourly['beaufort'] }}</td>
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
                        No forecast data available for the selected location. Please check data sources or try another location.
                    </div>
                </div>
            </div>
        @endif

        <div class="api-source-footer">
            Data sourced from <a href="https://api.met.no/" target="_blank">yr.no</a> for weather forecasts, 
            <a href="https://marine-api.open-meteo.com/" target="_blank">Open-Meteo</a> for marine data, 
            <a href="https://www.metoffice.gov.uk/services/data" target="_blank">Met Office</a> for sea state warnings (planned), 
            <a href="https://admiraltyapi.portal.azure-api.net/" target="_blank">Admiralty Tide API</a> for tide data (planned), 
            and <a href="https://www.calmac.co.uk/" target="_blank">CalMac</a> for ferry updates (planned).
        </div>
    </div>
@endsection