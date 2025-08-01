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
        .condition-cell img {
            width: 36px;
            height: 36px;
            vertical-align: middle;
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
        .table-weather { 
            width: 100%; 
            border-collapse: collapse; 
        }
        .table-weather th, .table-weather td { 
            padding: 8px; 
            text-align: center; 
            border: 1px solid #dee2e6; 
            background-color: transparent; /* Default background reset */
        }
        /* Custom striping for Time and Weather columns only */
        .table-weather tr:nth-child(odd) td:nth-child(1),
        .table-weather tr:nth-child(odd) td:nth-child(2) {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            .table-weather { display: block; overflow-x: auto; }
            .table-weather th, .table-weather td { padding: 6px; font-size: 12px; }
            .condition-cell img { width: 27px; height: 27px; }
        }
    </style>
@endsection

@section('js')
    <script>
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
            document.querySelectorAll('.rain-cell').forEach(cell => {
                cell.dataset.precipitation = cell.textContent;
                cell.dataset.originalStyle = cell.getAttribute('style');
            });
            updatePrecipitation();
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
                        <h4 class="card-title">10-Day Hill Weather Forecast</h4>
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
                                <table class="table-weather">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Weather</th>
                                            <th>Temp.</th>
                                            <th>Feels Like</th>
                                            <th>Dew Point</th>
                                            <th>Precip.</th>
                                            <th>Wind Speed</th>
                                            <th>Wind Gust</th>
                                            <th>Beaufort Scale</th>
                                            <th>Wind Cardinal</th>
                                            <th>Direction</th>
                                            <th>UV Index</th>
                                            <th>Humidity</th>
                                            <th>Cloud Cover</th>
                                            <th>Cloud Base</th>
                                            <th>Snow Level</th>
                                            <th>Snow Cover</th>
                                        </tr>
                                        <tr>
                                            <th>BST</th>
                                            <th></th>
                                            <th>°C</th>
                                            <th>°C</th>
                                            <th>°C</th>
                                            <th>mm</th>
                                            <th>mph</th>
                                            <th>mph</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>%</th>
                                            <th>%</th>
                                            <th>m AGL</th>
                                            <th>m</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($day['forecasts'] as $forecast)
                                            <tr>
                                                <td>{{ $forecast['time'] }}</td>
                                                <td class="condition-cell">
                                                    @if (filter_var($forecast['iconUrl'], FILTER_VALIDATE_URL))
                                                        <img src="{{ $forecast['iconUrl'] }}" alt="{{ $forecast['condition'] }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                                                        <span style="display:none;">{{ $forecast['condition'] }}</span>
                                                    @else
                                                        <span>{{ $forecast['condition'] }}</span>
                                                    @endif
                                                </td>
                                                <td class="temp-cell" data-temp="{{ $forecast['temperature'] }}" style="background: {{ get_temperature_color($forecast['temperature']) }}; color: {{ get_temperature_text_color($forecast['temperature']) }};">{{ $forecast['temperature'] }}</td>
                                                <td class="temp-cell" data-temp="{{ $forecast['feels_like'] ?? $forecast['temperature'] }}" style="background: {{ get_temperature_color($forecast['feels_like'] ?? $forecast['temperature']) }}; color: {{ get_temperature_text_color($forecast['feels_like'] ?? $forecast['temperature']) }};">{{ $forecast['feels_like'] ?? $forecast['temperature'] }}</td>
                                                <td class="temp-cell" data-temp="{{ $forecast['dew_point_calculated'] }}" style="background: {{ get_temperature_color($forecast['dew_point_calculated']) }}; color: {{ get_temperature_text_color($forecast['dew_point_calculated']) }};">{{ $forecast['dew_point_calculated'] }}</td>
                                                <td class="rain-cell" data-precipitation="{{ $forecast['precipitation'] }}" style="background: {{ get_precipitation_color($forecast['precipitation']) }};">{{ $forecast['precipitation'] }}</td>
                                                <td class="wind-speed {{ $forecast['wind_class'] }}" data-original="{{ $forecast['wind_speed'] }}" style="background: {{ get_wind_color($forecast['wind_speed'], 'mph') }}; color: {{ get_wind_text_color($forecast['wind_speed'], 'mph') }}">{{ $forecast['wind_speed'] }}</td>
                                                <td class="wind-gust {{ $forecast['wind_class'] }}" data-original="{{ $forecast['wind_gust'] }}" style="background: {{ get_wind_color($forecast['wind_gust'], 'mph') }}; color: {{ get_wind_text_color($forecast['wind_gust'], 'mph') }}">{{ $forecast['wind_gust'] }}</td>
                                                <td class="beaufort-cell" style="background: {{ get_wind_color($forecast['wind_gust'], 'mph') }}; color: {{ get_wind_text_color($forecast['wind_gust'], 'mph') }}">{{ $forecast['beaufort_scale'] }}</td>
                                                <td>{{ $forecast['wind_direction'] ?: 'N/A' }}</td>
                                                <td class="direction-cell">
                                                    @if (is_numeric($forecast['wind_from_direction_degrees']))
                                                        <i class="wi wi-direction-up" style="transform: rotate({{ ($forecast['wind_from_direction_degrees'] + 180) % 360 }}deg);"></i>
                                                    @else
                                                        {{ $forecast['wind_direction'] }}
                                                    @endif
                                                </td>
                                                <td class="uv-cell" style="background: {{ get_uv_color($forecast['ultraviolet_index']) }};">{{ round($forecast['ultraviolet_index'], 1) }}</td>
                                                <td class="humidity-cell" style="background: {{ get_humidity_color($forecast['relative_humidity']) }};">{{ round($forecast['relative_humidity'], 1) }}</td>
                                                <td style="background: {{ get_cloud_cover_color($forecast['cloud_area_fraction']) }};">{{ round($forecast['cloud_area_fraction']) }}</td>
                                                <td style="background: {{ get_cloud_base_color($forecast['cloud_level']) }};">{{ $forecast['cloud_level'] }}</td>
                                                <td style="background: {{ get_snow_level_color($forecast['snow_level'] ?? 0) }};">{{ $forecast['snow_level'] ?? '-' }}</td>
                                                <td>Placeholder</td>
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
                <tr><td style="background: #01081e; color: white;">≤ -40</td><td style="background: #020f39; color: white;">-30</td><td style="background: #02154f; color: white;">-20</td><td style="background: #082376; color: white;">-15</td><td style="background: #435897; color: white;">-10</td></tr>
                <tr><td style="background: #3075ac; color: white;">-8</td><td style="background: #38aec4; color: black;">-6</td><td style="background: #38aec4; color: black;">-4</td><td style="background: #60c3c1; color: black;">-2</td><td style="background: #7fcebc; color: black;">0</td></tr>
                <tr><td style="background: #91d5ba; color: black;">2</td><td style="background: #b6e3b7; color: black;">4</td><td style="background: #cfebb2; color: black;">6</td><td style="background: #e3ecab; color: black;">8</td><td style="background: #ffeea1; color: black;">10</td></tr>
                <tr><td style="background: #ffe796; color: black;">12</td><td style="background: #ffd881; color: black;">14</td><td style="background: #ffc96c; color: black;">16</td><td style="background: #ffc261; color: black;">18</td><td style="background: #ffb34c; color: black;">20</td></tr>
                <tr><td style="background: #fc9f46; color: black;">22</td><td style="background: #f67639; color: black;">24</td><td style="background: #e13d32; color: black;">27</td><td style="background: #c30031; color: white;">30</td><td style="background: #70001c; color: white;">35</td></tr>
                <tr><td style="background: #3a000e; color: white;">40</td><td style="background: #1f0007; color: white;">45</td><td style="background: #100002; color: white;">≥ 50</td></tr>
            </table>
            <h4>Beaufort Scale Key (knots)</h4>
            <table>
                <tr><td style="background: #ADD8E6; color: black;">0-0.5 (Calm)</td><td style="background: #00CED1; color: black;">0.5-1.5 (Light Air)</td><td style="background: #19B481; color: black;">1.6-3.3 (Light Breeze)</td></tr>
                <tr><td style="background: #32CD32; color: black;">3.4-5.4 (Gentle Breeze)</td><td style="background: #98E619; color: black;">5.5-7.9 (Moderate Breeze)</td><td style="background: #FFFF00; color: black;">8.0-10.7 (Fresh Breeze)</td></tr>
                <tr><td style="background: #FFE45C; color: black;">10.8-13.8 (Strong Breeze)</td><td style="background: #FFDAB9; color: black;">13.9-17.1 (Near Gale)</td><td style="background: #F4B899; color: black;">17.2-20.7 (Gale)</td></tr>
                <tr><td style="background: #E9967A; color: black;">20.8-24.4 (Strong Gale)</td><td style="background: #F44B3D; color: black;">24.5-28.4 (Storm)</td><td style="background: #FF0000; color: white;">28.5-32.6 (Violent Storm)</td></tr>
                <tr><td style="background: #8A2BE2; color: white;">≥32.7 (Hurricane)</td></tr>
            </table>
            <h4>Precipitation Scale Key (mm)</h4>
            <table>
                <tr><td style="background: #ffffff; color: black;">0 (No Rain)</td><td style="background: #afe0f9; color: black;">0.1-2 (Light)</td><td style="background: #7dc4e6; color: black;">2.1-5 (Moderate)</td></tr>
                <tr><td style="background: #4da8d3; color: black;">5.1-10 (Heavy)</td><td style="background: #1a8cc0; color: white;">10.1-20 (Very Heavy)</td><td style="background: #0066b3; color: white;">>20 (Extreme)</td></tr>
            </table>
            <h4>UV Index Scale Key</h4>
            <table>
                <tr><td style="background: #e6ffe6; color: black;">0-2 (Low)</td><td style="background: #ccffcc; color: black;">3-5 (Moderate)</td><td style="background: #ffff99; color: black;">6-7 (High)</td></tr>
                <tr><td style="background: #ffd700; color: black;">8-10 (Very High)</td><td style="background: #ff8c00; color: white;">11+ (Extreme)</td></tr>
            </table>
            <h4>Humidity Scale Key (%)</h4>
            <table>
                <tr><td style="background: #e6f3ff; color: black;">0-30 (Very Dry)</td><td style="background: #b3d9ff; color: black;">31-50 (Dry)</td><td style="background: #80cfff; color: black;">51-70 (Comfortable)</td></tr>
                <tr><td style="background: #4db8ff; color: black;">71-85 (Humid)</td><td style="background: #1a94ff; color: white;">86-100 (Very Humid)</td></tr>
            </table>
            <h4>Cloud Cover Scale Key (%)</h4>
            <table>
                <tr><td style="background: #ffffff; color: black;">0-10 (Clear)</td><td style="background: #e6f3ff; color: black;">11-50 (Partly Cloudy)</td><td style="background: #b3d9ff; color: black;">51-90 (Mostly Cloudy)</td></tr>
                <tr><td style="background: #80cfff; color: black;">91-100 (Overcast)</td></tr>
            </table>
            <h4>Cloud Base Scale Key (m AGL)</h4>
            <table>
                <tr><td style="background: #ffffff; color: black;">0-500 (Low)</td><td style="background: #e6f3ff; color: black;">501-2000 (Medium)</td><td style="background: #b3d9ff; color: black;">2001-5000 (High)</td></tr>
                <tr><td style="background: #80cfff; color: black;">>5000 (Very High)</td></tr>
            </table>
            <h4>Snow Level Scale Key (m)</h4>
            <table>
                <tr><td style="background: #ffffff; color: black;">0 (No Snow)</td><td style="background: #e6f3ff; color: black;">1-1000 (Low)</td><td style="background: #b3d9ff; color: black;">1001-2000 (Moderate)</td></tr>
                <tr><td style="background: #80cfff; color: black;">>2000 (High)</td></tr>
            </table>
        </div>
        <div class="api-source-footer">
            Data sourced from <a href="https://api.met.no/" target="_blank">yr.no</a> for weather forecasts and <a href="https://sunrisesunset.io/api/" target="_blank">SunriseSunset.io</a> for sun and moon data.
        </div>
    </div>
@endsection