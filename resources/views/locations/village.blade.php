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
        .forecast-table td.temp-cell-minus-40 { background: #01081e; color: white; }
        .forecast-table td.temp-cell-minus-30 { background: #020f39; color: white; }
        .forecast-table td.temp-cell-minus-20 { background: #02154f; color: white; }
        .forecast-table td.temp-cell-minus-15 { background: #082376; color: white; }
        .forecast-table td.temp-cell-minus-10 { background: #435897; color: white; }
        .forecast-table td.temp-cell-minus-8 { background: #3075ac; color: white; }
        .forecast-table td.temp-cell-minus-6 { background: #38aec4; color: black; }
        .forecast-table td.temp-cell-minus-4 { background: #38aec4; color: black; }
        .forecast-table td.temp-cell-minus-2 { background: #60c3c1; color: black; }
        .forecast-table td.temp-cell-0 { background: #7fcebc; color: black; }
        .forecast-table td.temp-cell-2 { background: #91d5ba; color: black; }
        .forecast-table td.temp-cell-4 { background: #b6e3b7; color: black; }
        .forecast-table td.temp-cell-6 { background: #cfebb2; color: black; }
        .forecast-table td.temp-cell-8 { background: #e3ecab; color: black; }
        .forecast-table td.temp-cell-10 { background: #ffeea1; color: black; }
        .forecast-table td.temp-cell-12 { background: #ffe796; color: black; }
        .forecast-table td.temp-cell-14 { background: #ffd881; color: black; }
        .forecast-table td.temp-cell-16 { background: #ffc96c; color: black; }
        .forecast-table td.temp-cell-18 { background: #ffc261; color: black; }
        .forecast-table td.temp-cell-20 { background: #ffb34c; color: black; }
        .forecast-table td.temp-cell-22 { background: #fc9f46; color: black; }
        .forecast-table td.temp-cell-24 { background: #f67639; color: black; }
        .forecast-table td.temp-cell-27 { background: #e13d32; color: black; }
        .forecast-table td.temp-cell-30 { background: #c30031; color: white; }
        .forecast-table td.temp-cell-35 { background: #70001c; color: white; }
        .forecast-table td.temp-cell-40 { background: #3a000e; color: white; }
        .forecast-table td.temp-cell-45 { background: #1f0007; color: white; }
        .forecast-table td.temp-cell-50 { background: #100002; color: white; }
        .forecast-table td.temp-cell-fallback { background: #ff0000; color: white; }
        .forecast-table td.rain-cell {
            background: #ffffff;
            color: black;
            transition: background 0.3s ease;
        }
        .forecast-table td.fog-cell { background: #d3cce3; color: black; }
        .forecast-table td.humidity-cell { background: #a1c4fd; color: black; }
        .forecast-table td.pressure-cell { background: #d4fc79; color: black; }
        .forecast-table td.uv-cell {
            background: #f3e5f5;
            color: black;
            text-align: center;
        }
        .forecast-table td.direction-cell { background: #ffecd2; color: black; }
        .forecast-table td.condition-cell { background: #ffffff; color: black; }
        .forecast-table td { background: #ffffff; color: black; }
        .wind-cell-0 { background: #e6f3e6; color: black; }
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
        .scale-keys {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .scale-keys h4 {
            margin-bottom: 10px;
            font-size: 1.1em;
        }
        .scale-keys table {
            width: 100%;
            border-collapse: collapse;
        }
        .scale-keys td {
            padding: 5px 10px;
            border: 1px solid #dee2e6;
        }
        .unit-switch {
            margin: 10px 0;
        }
        .unit-switch label {
            margin-right: 15px;
        }
        .table-weather { width: 100%; border-collapse: collapse; }
        .table-weather th, .table-weather td { padding: 8px; text-align: center; border-bottom: 1px solid #dee2e6; }
        .table-weather th { background-color: #f8f9fa; font-weight: 600; }
        .table-weather tbody tr:nth-child(even) { background-color: #f8f9fa; }
        @media (max-width: 768px) {
            .table-weather { display: block; overflow-x: auto; }
            .table-weather th, .table-weather td { padding: 6px; font-size: 12px; }
        }
    </style>
@endsection

@section('js')
    <script>
        function convertWindSpeed(value, fromUnit, toUnit) {
            const conversions = {
                'm/s': { 'mph': 2.23694, 'km/h': 3.6, 'knots': 1.94384, 'm/s': 1 },
                'mph': { 'm/s': 0.44704, 'km/h': 1.60934, 'knots': 0.868976, 'mph': 1 },
                'km/h': { 'm/s': 0.277778, 'mph': 0.621371, 'knots': 0.539957, 'km/h': 1 },
                'knots': { 'm/s': 0.514444, 'mph': 1.15078, 'km/h': 1.852, 'knots': 1 }
            };
            return (value * conversions[fromUnit][toUnit]).toFixed(1);
        }

        function interpolateColor(startColor, endColor, factor) {
            const r1 = parseInt(startColor.substr(1, 2), 16);
            const g1 = parseInt(startColor.substr(3, 2), 16);
            const b1 = parseInt(startColor.substr(5, 2), 16);
            const r2 = parseInt(endColor.substr(1, 2), 16);
            const g2 = parseInt(endColor.substr(3, 2), 16);
            const b2 = parseInt(endColor.substr(5, 2), 16);
            const r = Math.round(r1 + (r2 - r1) * factor).toString(16).padStart(2, '0');
            const g = Math.round(g1 + (g2 - g1) * factor).toString(16).padStart(2, '0');
            const b = Math.round(b1 + (b2 - b1) * factor).toString(16).padStart(2, '0');
            return `#${r}${g}${b}`;
        }

        function updateWindSpeeds() {
            const unit = document.querySelector('input[name="windUnit"]:checked').value;
            document.querySelectorAll('.wind-speed, .wind-gust').forEach(cell => {
                let value = parseFloat(cell.dataset.original) || 0;
                if (!isNaN(value)) {
                    cell.textContent = convertWindSpeed(value, 'm/s', unit);
                }
            });
        }

        function updateRainfall() {
            const unit = document.querySelector('input[name="rainUnit"]:checked').value;
            document.querySelectorAll('.rain-cell').forEach(cell => {
                let value = parseFloat(cell.dataset.precipitation) || 0;
                if (!isNaN(value)) {
                    cell.textContent = unit === 'inches' ? (value * 0.0393701).toFixed(2) : value;
                }
                value = Math.min(10, Math.max(0, value / (unit === 'inches' ? 0.0393701 : 1)));
                if (value === 0) {
                    cell.style.backgroundColor = '#ffffff';
                } else {
                    const intensity = (value > 0 ? (value - 0.01) / 9.99 : 0);
                    cell.style.backgroundColor = interpolateColor('#b3e5fc', '#435897', intensity);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.wind-speed, .wind-gust').forEach(cell => {
                let value = parseFloat(cell.textContent) || 0;
                cell.dataset.original = value;
                cell.textContent = convertWindSpeed(value, 'm/s', 'mph');
            });
            document.querySelectorAll('.rain-cell').forEach(cell => {
                cell.dataset.precipitation = cell.textContent;
            });
            updateRainfall();
            document.querySelectorAll('input[name="windUnit"]').forEach(radio => {
                radio.addEventListener('change', updateWindSpeeds);
            });
            document.querySelectorAll('input[name="rainUnit"]').forEach(radio => {
                radio.addEventListener('change', updateRainfall);
            });
        });
    </script>
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
                        <div class="unit-switch">
                            Wind Speed Unit:
                            <label><input type="radio" name="windUnit" value="mph" checked> mph</label>
                            <label><input type="radio" name="windUnit" value="km/h"> km/h</label>
                            <label><input type="radio" name="windUnit" value="knots"> knots</label>
                            <label><input type="radio" name="windUnit" value="m/s"> m/s</label>
                        </div>
                        <div class="unit-switch">
                            Rainfall Unit:
                            <label><input type="radio" name="rainUnit" value="mm" checked> mm</label>
                            <label><input type="radio" name="rainUnit" value="inches"> inches</label>
                        </div>
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
                                <table class="table table-striped table-weather">
                                    <thead>
                                        <tr>
                                            <th>Time (BST)</th>
                                            <th>Weather Conditions</th>
                                            <th>Temperature (°C)</th>
                                            <th>Rain</th>
                                            <th>Wind Speed</th>
                                            <th>Gust</th>
                                            <th>Direction</th>
                                            <th>Cardinal</th>
                                            <th>UV</th>
                                            <th>Pressure (hPa)</th>
                                            <th>Fog (%)</th>
                                            <th>Humidity (%)</th>
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
                                                $tempClass = 'temp-cell-fallback';
                                                if ($tempValue !== null) {
                                                    $tempKey = null;
                                                    $tempRanges = [-40, -30, -20, -15, -10, -8, -6, -4, -2, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 27, 30, 35, 40, 45, 50];
                                                    foreach ($tempRanges as $range) {
                                                        if ($tempValue <= $range) {
                                                            $tempKey = $range;
                                                            break;
                                                        }
                                                    }
                                                    $tempKey = $tempKey ?? 50;
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
                                                <td class="rain-cell" data-precipitation="{{ is_numeric($forecast['precipitation']) ? round($forecast['precipitation'], 1) : $forecast['precipitation'] }}">{{ is_numeric($forecast['precipitation']) ? round($forecast['precipitation'], 1) : $forecast['precipitation'] }}</td>
                                                <td class="wind-speed {{ $windClass }}">{{ is_numeric($forecast['wind_speed']) ? round($forecast['wind_speed'], 1) : $forecast['wind_speed'] }}</td>
                                                <td class="wind-gust {{ $gustClass }}">{{ is_numeric($forecast['wind_gust']) ? round($forecast['wind_gust'], 1) : $forecast['wind_gust'] }}</td>
                                                <td class="direction-cell">
                                                    @if (is_numeric($direction))
                                                        <i class="wi wi-direction-up" style="transform: rotate({{ $arrowRotation }}deg);"></i>
                                                    @else
                                                        {{ $forecast['wind_direction'] }}
                                                    @endif
                                                </td>
                                                <td>{{ $ordinal ?: 'N/A' }}</td>
                                                <td class="uv-cell">{{ is_numeric($forecast['ultraviolet_index']) ? round($forecast['ultraviolet_index']) : $forecast['ultraviolet_index'] }}</td>
                                                <td class="pressure-cell">{{ is_numeric($forecast['air_pressure']) ? round($forecast['air_pressure'], 1) : $forecast['air_pressure'] }}</td>
                                                <td class="fog-cell">{{ is_numeric($forecast['fog_area_fraction']) ? round($forecast['fog_area_fraction'], 1) : $forecast['fog_area_fraction'] }}</td>
                                                <td class="humidity-cell">{{ is_numeric($forecast['relative_humidity']) ? round($forecast['relative_humidity'], 1) : $forecast['relative_humidity'] }}</td>
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
        <div class="scale-keys">
            <h4>Temperature Scale Key (°C)</h4>
            <table>
                <tr><td class="temp-cell-minus-40">≤ -40</td><td class="temp-cell-minus-30">-30</td><td class="temp-cell-minus-20">-20</td><td class="temp-cell-minus-15">-15</td><td class="temp-cell-minus-10">-10</td></tr>
                <tr><td class="temp-cell-minus-8">-8</td><td class="temp-cell-minus-6">-6</td><td class="temp-cell-minus-4">-4</td><td class="temp-cell-minus-2">-2</td><td class="temp-cell-0">0</td></tr>
                <tr><td class="temp-cell-2">2</td><td class="temp-cell-4">4</td><td class="temp-cell-6">6</td><td class="temp-cell-8">8</td><td class="temp-cell-10">10</td></tr>
                <tr><td class="temp-cell-12">12</td><td class="temp-cell-14">14</td><td class="temp-cell-16">16</td><td class="temp-cell-18">18</td><td class="temp-cell-20">20</td></tr>
                <tr><td class="temp-cell-22">22</td><td class="temp-cell-24">24</td><td class="temp-cell-27">27</td><td class="temp-cell-30">30</td><td class="temp-cell-35">35</td></tr>
                <tr><td class="temp-cell-40">40</td><td class="temp-cell-45">45</td><td class="temp-cell-50">≥ 50</td></tr>
            </table>
            <h4>Beaufort Scale Key</h4>
            <table>
                <tr><td class="wind-cell-0">0: <0.5 m/s - Calm</td><td class="wind-cell-1">1: 0.5-1.5 m/s - Light Air</td><td class="wind-cell-2">2: 1.6-3.3 m/s - Light Breeze</td></tr>
                <tr><td class="wind-cell-3">3: 3.4-5.4 m/s - Gentle Breeze</td><td class="wind-cell-4">4: 5.5-7.9 m/s - Moderate Breeze</td><td class="wind-cell-5">5: 8.0-10.7 m/s - Fresh Breeze</td></tr>
                <tr><td class="wind-cell-6">6: 10.8-13.8 m/s - Strong Breeze</td><td class="wind-cell-7">7: 13.9-17.1 m/s - Near Gale</td><td class="wind-cell-8">8: 17.2-20.7 m/s - Gale</td></tr>
                <tr><td class="wind-cell-9">9: 20.8-24.4 m/s - Strong Gale</td><td class="wind-cell-10">10: 24.5-28.4 m/s - Storm</td><td class="wind-cell-11">11: 28.5-32.6 m/s - Violent Storm</td></tr>
                <tr><td class="wind-cell-12">12: ≥32.7 m/s - Hurricane</td></tr>
            </table>
        </div>
        <div class="api-source-footer">
            Data sourced from <a href="https://api.met.no/" target="_blank">yr.no</a> for weather forecasts and <a href="https://sunrisesunset.io/api/" target="_blank">SunriseSunset.io</a> for sun and moon data.
        </div>
    </div>
@endsection