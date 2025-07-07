@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css" />
    <style>
        .header-village {
            background: linear-gradient(90deg, #28a745, #34c759);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .warning-placeholder {
            font-style: italic;
            opacity: 0.8;
        }
        .forecast-table th {
            background: #f8f9fa;
            font-weight: 600;
        }
        .day-heading {
            font-size: 1.3em;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .day-heading .sun-moon-info {
            font-size: 0.9em;
            color: #555;
            margin-left: 20px;
        }
        .day-heading .sun-moon-info i {
            font-size: 20px;
            margin-right: 5px;
        }
        /* Temperature scale with solid colours based on your custom ranges and colours */
        .forecast-table td.temp-cell-minus-40 { background: #01081e; color: white; }
        .forecast-table td.temp-cell-minus-30 { background: #020f39; color: white; }
        .forecast-table td.temp-cell-minus-20 { background: #02154f; color: white; }
        .forecast-table td.temp-cell-minus-15 { background: #082376; color: black; }
        .forecast-table td.temp-cell-minus-10 { background: #435897; color: black; }
        .forecast-table td.temp-cell-minus-8 { background: #3075ac; color: black; }
        .forecast-table td.temp-cell-minus-6 { background: #38aec4; color: black; }
        .forecast-table td.temp-cell-minus-4 { background: #38aec4; color: black; }
        .forecast-table td.temp-cell-minus-2 { background: #60c3c1; color: black; }
        .forecast-table td.temp-cell-0 { background: #7fcebc; color: black; }
        .forecast-table td.temp-cell-2 { background: #91d5ba; color: black; }
        .forecast-table td.temp-cell-4 { background: #b6e3b7; color: black; }
        .forecast-table td.temp-cell-6 { background: #cfebb2; color: white; }
        .forecast-table td.temp-cell-8 { background: #e3ecab; color: white; }
        .forecast-table td.temp-cell-10 { background: #ffeea1; color: white; }
        .forecast-table td.temp-cell-12 { background: #ffe796; color: white; }
        .forecast-table td.temp-cell-14 { background: #ffd881; color: white; }
        .forecast-table td.temp-cell-16 { background: #ffc96c; color: white; }
        .forecast-table td.temp-cell-18 { background: #ffc261; color: white; }
        .forecast-table td.temp-cell-20 { background: #ffb34c; color: white; }
        .forecast-table td.temp-cell-22 { background: #fc9f46; color: white; }
        .forecast-table td.temp-cell-24 { background: #f67639; color: white; }
        .forecast-table td.temp-cell-27 { background: #e13d32; color: white; }
        .forecast-table td.temp-cell-30 { background: #c30031; color: white; }
        .forecast-table td.temp-cell-35 { background: #70001c; color: white; }
        .forecast-table td.temp-cell-40 { background: #3a000e; color: white; }
        .forecast-table td.temp-cell-45 { background: #1f0007; color: white; }
        .forecast-table td.temp-cell-50 { background: #100002; color: white; }
        .forecast-table td.temp-cell-fallback { background: #ff0000; color: white; }
        /* Solid colours for other cells */
        .forecast-table td.rain-cell { background: #74ebd5; color: black; }
        .forecast-table td.fog-cell { background: #d3cce3; color: black; }
        .forecast-table td.humidity-cell { background: #a1c4fd; color: black; }
        .forecast-table td.pressure-cell { background: #d4fc79; color: black; }
        .forecast-table td.dew-point-cell { background: #b3e5fc; color: black; }
        .forecast-table td.uv-cell { background: #f3e5f5; color: black; }
        .forecast-table td.direction-cell { background: #ffecd2; color: black; }
        .forecast-table td.condition-cell { background: #ffffff; color: black; }
        .forecast-table td { background: #ffffff; color: black; }
        /* Beaufort scale solid colours for wind */
        .wind-cell-0 { background: #e6f3e6; color: black; }e5024
        .wind-cell-1 { background: #d4edda; color: black; }
        .wind-cell-2 { background: #c3e6cb; color: black; }
        .wind-cell-3 { background: #b1dfbb; color: black; }
        .wind-cell-4 { background: #a3e4d7; color: black; }
        .wind-cell-5 { background: #81ecec; color: black; }
        .wind-cell-6 { background: #80deea; color: white; }
        .wind-cell-7 { background: #4fc3f7; color: white; }
        .wind-cell-8 { background: #42a5f5; color: white; }
        .wind-cell-9 { background: #0288d1; color: white; }
        .wind-cell-10 { background: #ffca28; color: white; }
        .wind-cell-11 { background: #ef6c00; color: white; }
        .wind-cell-12 { background: #d32f2f; color: white; }
        .condition-cell i {
            font-size: 24px;
        }
        .direction-cell i {
            font-size: 34px;
            font-weight: bold;
        }
        .forecast-table td {
            vertical-align: middle;
            text-align: center;
        }
        .api-source-footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4">{{ $title }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="header-village">
                    <h4>Weather Warnings</h4>
                    <p class="warning-placeholder">No warnings currently available. Check back later.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detailed Weather Forecast</h4>
                    </div>
                    <div class="card-body">
                        @if (!empty($forecasts))
                            @foreach ($forecasts as $day)
                                <div class="day-heading">
                                    {{ \Carbon\Carbon::parse($day['date'])->format('D, M d') }}
                                    <span class="sun-moon-info">
                                        <i class="wi wi-sunrise"></i> {{ $day['sunrise'] }} |
                                        <i class="wi wi-sunset"></i> {{ $day['sunset'] }} |
                                        <i class="wi wi-moonrise"></i> {{ $day['moonrise'] }} |
                                        <i class="wi wi-moonset"></i> {{ $day['moonset'] }} |
                                        @if ($day['moonphase'] !== null)
                                            <i class="wi {{ $day['moonphase'] <= 0.125 ? 'wi-moon-new' : ($day['moonphase'] <= 0.375 ? 'wi-moon-first-quarter' : ($day['moonphase'] <= 0.625 ? 'wi-moon-full' : ($day['moonphase'] <= 0.875 ? 'wi-moon-last-quarter' : 'wi-moon-new'))) }}"></i> {{ round($day['moonphase'] * 100) }}%
                                        @else
                                            Moon Phase: N/A
                                        @endif
                                    </span>
                                </div>
                                <table class="table table-striped table-bordered forecast-table">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Condition</th>
                                            <th>Temperature (°C)</th>
                                            <th>Dew Point (°C)</th>
                                            <th>Rainfall (mm)</th>
                                            <th>Wind Speed (m/s)</th>
                                            <th>Wind Gust (m/s)</th>
                                            <th>Cloud Cover (%)</th>
                                            <th>Fog (%)</th>
                                            <th>Humidity (%)</th>
                                            <th>Pressure (hPa)</th>
                                            <th>UV Index</th>
                                            <th>Wind Direction</th>
                                            <th>Wind Dir (Ordinal)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($day['forecasts'] as $index => $forecast)
                                            @php
                                                $iconMap = [
                                                    'clearsky_day' => 'wi-day-sunny',
                                                    'clearsky_night' => 'wi-night-clear',
                                                    'fair_day' => 'wi-day-sunny-overcast',
                                                    'fair_night' => 'wi-night-partly-cloudy',
                                                    'partlycloudy_day' => 'wi-day-cloudy',
                                                    'partlycloudy_night' => 'wi-night-cloudy',
                                                    'cloudy' => 'wi-cloudy',
                                                    'rain' => 'wi-rain',
                                                    'lightrain' => 'wi-sprinkle',
                                                    'heavyrain' => 'wi-rain-wind',
                                                    'rainshowers_day' => 'wi-day-showers',
                                                    'rainshowers_night' => 'wi-night-showers',
                                                    'snow' => 'wi-snow',
                                                    'sleet' => 'wi-sleet',
                                                    'fog' => 'wi-fog',
                                                    'lightssleetshowers_day' => 'wi-day-sleet',
                                                    'lightssleetshowers_night' => 'wi-night-sleet',
                                                    'heavysleetshowers_day' => 'wi-day-sleet-storm',
                                                    'heavysleetshowers_night' => 'wi-night-sleet-storm',
                                                    'lightsnowshowers_day' => 'wi-day-snow',
                                                    'lightsnowshowers_night' => 'wi-night-snow',
                                                    'heavysnowshowers_day' => 'wi-day-snow-wind',
                                                    'heavysnowshowers_night' => 'wi-night-snow-wind',
                                                    'unknown' => 'wi-na',
                                                ];
                                                $iconClass = $iconMap[$forecast['condition']] ?? $iconMap['unknown'];

                                                $beaufort = match (true) {
                                                    !is_numeric($forecast['wind_speed']) => 0,
                                                    $forecast['wind_speed'] < 0.5 => 0,
                                                    $forecast['wind_speed'] < 1.6 => 1,
                                                    $forecast['wind_speed'] < 3.4 => 2,
                                                    $forecast['wind_speed'] < 5.5 => 3,
                                                    $forecast['wind_speed'] < 8.0 => 4,
                                                    $forecast['wind_speed'] < 10.8 => 5,
                                                    $forecast['wind_speed'] < 13.9 => 6,
                                                    $forecast['wind_speed'] < 17.2 => 7,
                                                    $forecast['wind_speed'] < 20.8 => 8,
                                                    $forecast['wind_speed'] < 24.5 => 9,
                                                    $forecast['wind_speed'] < 28.5 => 10,
                                                    $forecast['wind_speed'] < 32.7 => 11,
                                                    default => 12,
                                                };
                                                $gustBeaufort = match (true) {
                                                    !is_numeric($forecast['wind_gust']) => 0,
                                                    $forecast['wind_gust'] < 0.5 => 0,
                                                    $forecast['wind_gust'] < 1.6 => 1,
                                                    $forecast['wind_gust'] < 3.4 => 2,
                                                    $forecast['wind_gust'] < 5.5 => 3,
                                                    $forecast['wind_gust'] < 8.0 => 4,
                                                    $forecast['wind_gust'] < 10.8 => 5,
                                                    $forecast['wind_gust'] < 13.9 => 6,
                                                    $forecast['wind_gust'] < 17.2 => 7,
                                                    $forecast['wind_gust'] < 20.8 => 8,
                                                    $forecast['wind_gust'] < 24.5 => 9,
                                                    $forecast['wind_gust'] < 28.5 => 10,
                                                    $forecast['wind_gust'] < 32.7 => 11,
                                                    default => 12,
                                                };
                                                $windClass = "wind-cell-$beaufort";
                                                $gustClass = "wind-cell-$gustBeaufort";

                                                $tempValue = is_numeric($forecast['temperature']) ? floatval($forecast['temperature']) : null;
                                                $tempClass = 'temp-cell-fallback'; // Default fallback
                                                if ($tempValue !== null) {
                                                    $tempKey = null;
                                                    $tempRanges = [-40, -30, -20, -15, -10, -8, -6, -4, -2, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 27, 30, 35, 40, 45, 50];
                                                    foreach ($tempRanges as $range) {
                                                        if ($tempValue <= $range) {
                                                            $tempKey = $range;
                                                            break;
                                                        }
                                                    }
                                                    $tempKey = $tempKey ?? 50; // Default to 50 if above max
                                                    $tempClass = 'temp-cell-' . ($tempKey < 0 ? 'minus-' . abs($tempKey) : $tempKey);
                                                    Log::debug("Temperature: {$tempValue}, TempClass: {$tempClass}");
                                                }

                                                $direction = is_numeric($forecast['wind_from_direction_degrees']) ? floatval($forecast['wind_from_direction_degrees']) : null;
                                                $ordinal = $forecast['wind_direction'] ?? '';
                                                $arrowRotation = is_numeric($direction) ? ($direction + 180) % 360 : 0;
                                            @endphp
                                            <tr>
                                                <td>{{ $forecast['time'] }}</td>
                                                <td class="condition-cell">
                                                    <i class="wi {{ $iconClass }}"></i>
                                                </td>
                                                <td class="{{ $tempClass }}">{{ is_numeric($forecast['temperature']) ? round($forecast['temperature'], 1) : $forecast['temperature'] }}</td>
                                                <td class="dew-point-cell">{{ is_numeric($forecast['dew_point']) ? round($forecast['dew_point'], 1) : $forecast['dew_point'] }}</td>
                                                <td class="rain-cell">{{ is_numeric($forecast['precipitation']) ? round($forecast['precipitation'], 1) : $forecast['precipitation'] }}</td>
                                                <td class="{{ $windClass }}">{{ is_numeric($forecast['wind_speed']) ? round($forecast['wind_speed'], 1) : $forecast['wind_speed'] }}</td>
                                                <td class="{{ $gustClass }}">{{ is_numeric($forecast['wind_gust']) ? round($forecast['wind_gust'], 1) : $forecast['wind_gust'] }}</td>
                                                <td class="fog-cell">{{ is_numeric($forecast['cloud_area_fraction']) ? round($forecast['cloud_area_fraction'], 1) : $forecast['cloud_area_fraction'] }}</td>
                                                <td class="fog-cell">{{ is_numeric($forecast['fog_area_fraction']) ? round($forecast['fog_area_fraction'], 1) : $forecast['fog_area_fraction'] }}</td>
                                                <td class="humidity-cell">{{ is_numeric($forecast['relative_humidity']) ? round($forecast['relative_humidity'], 1) : $forecast['relative_humidity'] }}</td>
                                                <td class="pressure-cell">{{ is_numeric($forecast['air_pressure']) ? round($forecast['air_pressure'], 1) : $forecast['air_pressure'] }}</td>
                                                <td class="uv-cell">{{ is_numeric($forecast['ultraviolet_index']) ? round($forecast['ultraviolet_index'], 1) : $forecast['ultraviolet_index'] }}</td>
                                                <td class="direction-cell">
                                                    @if (is_numeric($direction))
                                                        <i class="wi wi-direction-up" style="transform: rotate({{ $arrowRotation }}deg);"></i>
                                                    @else
                                                        {{ $forecast['wind_direction'] }}
                                                    @endif
                                                </td>
                                                <td>{{ $ordinal ?: 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <p class="text-danger">Unable to load forecast data. Please try again later.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="api-source-footer">
            Data sourced from <a href="https://api.met.no/" target="_blank">yr.no</a> for weather forecasts and <a href="https://sunrisesunset.io/api/" target="_blank">SunriseSunset.io</a> for sun and moon data.
        </div>
    </div>
@endsection