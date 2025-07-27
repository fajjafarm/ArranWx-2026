@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css">
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
        .weather-card {
            border: 1px solid #dee2e6;
            margin-bottom: 10px;
            padding: 8px;
            background: #fff;
        }
        .condition-cell img {
            width: 36px;
            height: 36px;
            vertical-align: middle;
        }
        .direction-cell i {
            font-size: 34px;
            font-weight: bold;
        }
        .rain-cell {
            transition: background 0.3s ease;
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
        @media (max-width: 768px) {
            .condition-cell img { width: 27px; height: 27px; }
        }
    </style>
@endsection

@section('js')
    <script>
        function convertWindSpeed(value, fromUnit, toUnit) {
            const conversions = {
                'mph': { 'mph': 1, 'km/h': 1.60934, 'knots': 0.868976, 'm/s': 0.44704 },
                'km/h': { 'mph': 0.621371, 'km/h': 1, 'knots': 0.539957, 'm/s': 0.277778 },
                'knots': { 'mph': 1.15078, 'km/h': 1.852, 'knots': 1, 'm/s': 0.514444 },
                'm/s': { 'mph': 2.23694, 'km/h': 3.6, 'knots': 1.94384, 'm/s': 1 }
            };
            return (value * conversions[fromUnit][toUnit]).toFixed(1);
        }

        function updateWindSpeeds() {
            const unit = document.querySelector('input[name="windUnit"]:checked').value;
            document.querySelectorAll('.wind-speed, .wind-gust').forEach(cell => {
                let value = parseFloat(cell.dataset.original) || 0;
                if (!isNaN(value)) {
                    const originalBeaufort = parseInt(cell.className.match(/wind-cell-(\d+)/)?.[1]) || 0;
                    cell.textContent = convertWindSpeed(value, 'mph', unit);
                    cell.className = `wind-speed ${originalBeaufort >= 0 && originalBeaufort <= 12 ? `wind-cell-${originalBeaufort}` : 'wind-cell-0'}`;
                }
            });
        }

        function updatePrecipitation() {
            const unit = document.querySelector('input[name="rainUnit"]:checked').value;
            document.querySelectorAll('.rain-cell').forEach(cell => {
                let value = parseFloat(cell.dataset.precipitation) || 0;
                if (!isNaN(value)) {
                    cell.textContent = unit === 'inches' ? (value * 0.0393701).toFixed(2) : value;
                    value = Math.min(10, Math.max(0, value / (unit === 'inches' ? 0.0393701 : 1)));
                    cell.setAttribute('style', cell.dataset.originalStyle);
                    if (value === 0) {
                        cell.style.backgroundColor = '#ffffff';
                    } else {
                        const intensity = (value > 0 ? (value - 0.01) / 9.99 : 0);
                        const r1 = 179; const g1 = 229; const b1 = 252;
                        const r2 = 67; const g2 = 88; const b2 = 151;
                        const r = Math.max(0, Math.min(255, Math.floor(r1 + (r2 - r1) * intensity))).toString(16).padStart(2, '0');
                        const g = Math.max(0, Math.min(255, Math.floor(g1 + (g2 - g1) * intensity))).toString(16).padStart(2, '0');
                        const b = Math.max(0, Math.min(255, Math.floor(b1 + (b2 - b1) * intensity))).toString(16).padStart(2, '0');
                        cell.style.backgroundColor = `#${r}${g}${b}`;
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.wind-speed, .wind-gust').forEach(cell => {
                let value = parseFloat(cell.textContent) || 0;
                cell.dataset.original = value;
                const beaufort = parseInt(cell.className.match(/wind-cell-(\d+)/)?.[1]) || 0;
                cell.className = `wind-speed ${beaufort >= 0 && beaufort <= 12 ? `wind-cell-${beaufort}` : 'wind-cell-0'}`;
                cell.textContent = convertWindSpeed(value, 'mph', 'mph'); // Default to mph
            });
            document.querySelectorAll('.rain-cell').forEach(cell => {
                cell.dataset.precipitation = cell.textContent;
                cell.dataset.originalStyle = cell.getAttribute('style');
            });
            updatePrecipitation();
            document.querySelectorAll('input[name="windUnit"]').forEach(radio => {
                radio.addEventListener('change', updateWindSpeeds);
            });
            document.querySelectorAll('input[name="rainUnit"]').forEach(radio => {
                radio.addEventListener('change', updatePrecipitation);
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
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
                        <h4 class="card-title">{{ $title }} 10-Day Hill Weather Forecast</h4>
                        <div class="unit-switch">
                            Wind Speed Unit:
                            <label><input type="radio" name="windUnit" value="mph" checked> mph</label>
                            <label><input type="radio" name="windUnit" value="km/h"> km/h</label>
                            <label><input type="radio" name="windUnit" value="knots"> knots</label>
                            <label><input type="radio" name="windUnit" value="m/s"> m/s</label>
                        </div>
                        <div class="unit-switch">
                            Precipitation Unit:
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
                                @foreach ($day['forecasts'] as $forecast)
                                    <div class="weather-card">
                                        <p><strong>Time:</strong> {{ $forecast['time'] }} BST</p>
                                        <p><strong>Weather:</strong> <img src="{{ $forecast['iconUrl'] }}" alt="{{ $forecast['condition'] }}"> {{ $forecast['condition'] }}</p>
                                        <p><strong>Temp.:</strong> {{ $forecast['temperature'] }}°C</p>
                                        <p><strong>Feels Like:</strong> {{ $forecast['feels_like'] ?? $forecast['temperature'] }}°C</p>
                                        <p><strong>Dew Point:</strong> {{ $forecast['dew_point_calculated'] }}°C</p>
                                        <p><strong>Precip.:</strong> <span class="rain-cell" data-precipitation="{{ $forecast['precipitation'] }}" style="{{ $forecast['rain_style'] }}">{{ $forecast['precipitation'] }}</span>mm</p>
                                        <p><strong>Wind Speed:</strong> <span class="wind-speed {{ $forecast['wind_class'] }}" data-original="{{ $forecast['wind_speed'] }}">{{ $forecast['wind_speed'] }}</span>mph</p>
                                        <p><strong>Wind Gust:</strong> <span class="wind-gust {{ $forecast['wind_class'] }}" data-original="{{ $forecast['wind_gust'] }}">{{ $forecast['wind_gust'] }}</span>mph</p>
                                        <p><strong>Wind Cardinal:</strong> {{ $forecast['wind_direction'] ?: 'N/A' }}</p>
                                        <p><strong>Direction:</strong> <i class="wi wi-direction-up" style="transform: rotate({{ ($forecast['wind_from_direction_degrees'] + 180) % 360 }}deg);"></i></p>
                                        <p><strong>Beaufort Scale:</strong> {{ $forecast['beaufort_scale'] }}</p>
                                        <p><strong>UV Index:</strong> {{ round($forecast['ultraviolet_index'], 1) }}</p>
                                        <p><strong>Humidity:</strong> {{ round($forecast['relative_humidity'], 1) }}%</p>
                                        <p><strong>Cloud Cover:</strong> {{ round($forecast['cloud_area_fraction']) }}%</p>
                                        <p><strong>Cloud Base:</strong> {{ $forecast['cloud_level'] }}m AGL</p>
                                        <p><strong>Snow Level:</strong> {{ $forecast['snow_level'] ?? '-' }}m</p>
                                        <p><strong>Snow Cover:</strong> Placeholder</p>
                                    </div>
                                @endforeach
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