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
        /* Temperature scale (2°C increments from -40°C to +50°C, matching image) */
        .temp-cell-minus-40 { background: linear-gradient(90deg, #1e3c72, #1e3c72); color: white; }
        .temp-cell-minus-38 { background: linear-gradient(90deg, #2a4a8a, #2a4a8a); color: white; }
        .temp-cell-minus-36 { background: linear-gradient(90deg, #355892, #355892); color: white; }
        .temp-cell-minus-34 { background: linear-gradient(90deg, #40669a, #40669a); color: white; }
        .temp-cell-minus-32 { background: linear-gradient(90deg, #4b74a2, #4b74a2); color: white; }
        .temp-cell-minus-30 { background: linear-gradient(90deg, #5682aa, #5682aa); color: white; }
        .temp-cell-minus-28 { background: linear-gradient(90deg, #6190b2, #6190b2); color: white; }
        .temp-cell-minus-26 { background: linear-gradient(90deg, #6c9eba, #6c9eba); color: white; }
        .temp-cell-minus-24 { background: linear-gradient(90deg, #77acc2, #77acc2); color: white; }
        .temp-cell-minus-22 { background: linear-gradient(90deg, #82bac9, #82bac9); color: white; }
        .temp-cell-minus-20 { background: linear-gradient(90deg, #8dc8d1, #8dc8d1); color: white; }
        .temp-cell-minus-18 { background: linear-gradient(90deg, #98d6d9, #98d6d9); color: white; }
        .temp-cell-minus-16 { background: linear-gradient(90deg, #a3e4e1, #a3e4e1); color: black; }
        .temp-cell-minus-14 { background: linear-gradient(90deg, #aef2e9, #aef2e9); color: black; }
        .temp-cell-minus-12 { background: linear-gradient(90deg, #b9fff1, #b9fff1); color: black; }
        .temp-cell-minus-10 { background: linear-gradient(90deg, #c4e8e1, #c4e8e1); color: black; }
        .temp-cell-minus-8 { background: linear-gradient(90deg, #cfd1d1, #cfd1d1); color: black; }
        .temp-cell-minus-6 { background: linear-gradient(90deg, #dabac1, #dabac1); color: black; }
        .temp-cell-minus-4 { background: linear-gradient(90deg, #e5a3b1, #e5a3b1); color: black; }
        .temp-cell-minus-2 { background: linear-gradient(90deg, #f08ca1, #f08ca1); color: black; }
        .temp-cell-0 { background: linear-gradient(90deg, #fb7591, #fb7591); color: black; }
        .temp-cell-2 { background: linear-gradient(90deg, #f65e81, #f65e81); color: black; }
        .temp-cell-4 { background: linear-gradient(90deg, #f14771, #f14771); color: black; }
        .temp-cell-6 { background: linear-gradient(90deg, #ed3061, #ed3061); color: white; }
        .temp-cell-8 { background: linear-gradient(90deg, #e91951, #e91951); color: white; }
        .temp-cell-10 { background: linear-gradient(90deg, #e50241, #e50241); color: white; }
        .temp-cell-12 { background: linear-gradient(90deg, #e00b4b, #e00b4b); color: white; }
        .temp-cell-14 { background: linear-gradient(90deg, #db1455, #db1455); color: white; }
        .temp-cell-16 { background: linear-gradient(90deg, #d61d5f, #d61d5f); color: white; }
        .temp-cell-18 { background: linear-gradient(90deg, #d12669, #d12669); color: white; }
        .temp-cell-20 { background: linear-gradient(90deg, #cc2f73, #cc2f73); color: white; }
        .temp-cell-22 { background: linear-gradient(90deg, #c7387d, #c7387d); color: white; }
        .temp-cell-24 { background: linear-gradient(90deg, #c24187, #c24187); color: white; }
        .temp-cell-26 { background: linear-gradient(90deg, #bd4a91, #bd4a91); color: white; }
        .temp-cell-28 { background: linear-gradient(90deg, #b8539b, #b8539b); color: white; }
        .temp-cell-30 { background: linear-gradient(90deg, #b35ca5, #b35ca5); color: white; }
        .temp-cell-32 { background: linear-gradient(90deg, #ae65af, #ae65af); color: white; }
        .temp-cell-34 { background: linear-gradient(90deg, #a96eb9, #a96eb9); color: white; }
        .temp-cell-36 { background: linear-gradient(90deg, #a477c3, #a477c3); color: white; }
        .temp-cell-38 { background: linear-gradient(90deg, #9f80cd, #9f80cd); color: white; }
        .temp-cell-40 { background: linear-gradient(90deg, #9a89d7, #9a89d7); color: white; }
        .temp-cell-42 { background: linear-gradient(90deg, #9592e1, #9592e1); color: white; }
        .temp-cell-44 { background: linear-gradient(90deg, #909beb, #909beb); color: white; }
        .temp-cell-46 { background: linear-gradient(90deg, #8ba4f5, #8ba4f5); color: white; }
        .temp-cell-48 { background: linear-gradient(90deg, #86adff, #86adff); color: white; }
        .temp-cell-50 { background: linear-gradient(90deg, #81b6ff, #81b6ff); color: white; }
        /* Beaufort scale gradients for wind */
        .wind-cell-0 { background: linear-gradient(90deg, #e6f3e6, #b3d9b3); color: black; } /* Calm */
        .wind-cell-1 { background: linear-gradient(90deg, #d4edda, #a3d8a9); color: black; } /* Light air */
        .wind-cell-2 { background: linear-gradient(90deg, #c3e6cb, #92d3a0); color: black; } /* Light breeze */
        .wind-cell-3 { background: linear-gradient(90deg, #b1dfbb, #81ce95); color: black; } /* Gentle breeze */
        .wind-cell-4 { background: linear-gradient(90deg, #a3e4d7, #73c9b7); color: black; } /* Moderate breeze */
        .wind-cell-5 { background: linear-gradient(90deg, #81ecec, #52d0d0); color: black; } /* Fresh breeze */
        .wind-cell-6 { background: linear-gradient(90deg, #80deea, #4fc3f7); color: white; } /* Strong breeze */
        .wind-cell-7 { background: linear-gradient(90deg, #4fc3f7, #0288d1); color: white; } /* Near gale */
        .wind-cell-8 { background: linear-gradient(90deg, #42a5f5, #0277bd); color: white; } /* Gale */
        .wind-cell-9 { background: linear-gradient(90deg, #0288d1, #01579b); color: white; } /* Strong gale */
        .wind-cell-10 { background: linear-gradient(90deg, #ffca28, #ff8f00); color: white; } /* Storm */
        .wind-cell-11 { background: linear-gradient(90deg, #ef6c00, #d84315); color: white; } /* Violent storm */
        .wind-cell-12 { background: linear-gradient(90deg, #d32f2f, #b71c1c); color: white; } /* Hurricane */
        /* Other gradients */
        .rain-cell { background: linear-gradient(90deg, #74ebd5, #acb6e5); color: black; }
        .fog-cell { background: linear-gradient(90deg, #d3cce3, #e9e4f0); color: black; }
        .humidity-cell { background: linear-gradient(90deg, #a1c4fd, #c2e9fb); color: black; }
        .pressure-cell { background: linear-gradient(90deg, #d4fc79, #96e6a1); color: black; }
        .dew-point-cell { background: linear-gradient(90deg, #b3e5fc, #81d4fa); color: black; }
        .uv-cell { background: linear-gradient(90deg, #f3e5f5, #e1bee7); color: black; }
        .direction-cell { background: linear-gradient(90deg, #ffecd2, #fcb69f); color: black; }
        .condition-cell i {
            font-size: 24px;
        }
        .direction-cell i {
            font-size: 34px;
            font-weight: bold;
        }
        .forecast-table td {
            vertical-align: middle;
        }
        .temp-scale {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }
        .temp-scale li {
            padding: 5px 10px;
            border-bottom: 1px solid #eee;
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
                                                // Map yr.no symbol_code to Weather Icons
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
                                                    'default' => 'wi-na',
                                                ];
                                                $iconClass = $iconMap[$forecast['condition']] ?? $iconMap['default'];

                                                // Beaufort scale for wind (m/s)
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
                                                $windClass = "wind-cell-$beaufort";
                                                $gustClass = "wind-cell-$beaufort";

                                                // Met Office temperature colour scale (2°C increments)
                                                $tempValue = is_numeric($forecast['temperature']) ? floatval($forecast['temperature']) : null;
                                                $tempClass = '';
                                                if ($tempValue !== null) {
                                                    // Round to nearest 2°C increment, clamping between -40 and +50
                                                    $tempKey = min(50, max(-40, round($tempValue / 2) * 2));
                                                    $tempClass = 'temp-cell-' . ($tempKey < 0 ? 'minus-' . abs($tempKey) : $tempKey);
                                                }

                                                // Row gradient based on temperature progression
                                                $rowGradient = '';
                                                if ($tempValue !== null) {
                                                    $hue = min(max(($tempValue + 5) / 40 * 360, 180), 360); // Map -5°C to 35°C to hues 180 (blue) to 360 (red)
                                                    $rowGradient = "background: linear-gradient(90deg, hsl($hue, 20%, 95%), hsl($hue, 20%, 85%));";
                                                }

                                                // Compass ordinal for wind direction
                                                $direction = is_numeric($forecast['wind_direction']) ? floatval($forecast['wind_direction']) : null;
                                                $ordinal = '';
                                                if ($direction !== null) {
                                                    $angle = fmod($direction + 11.25, 360) / 22.5;
                                                    $ordinals = ['N', 'NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW', 'SW', 'WSW', 'W', 'WNW', 'NW', 'NNW'];
                                                    $ordinal = $ordinals[floor($angle)];
                                                }

                                                // Arrow rotation (opposite direction)
                                                $arrowRotation = is_numeric($direction) ? ($direction + 180) % 360 : 0;
                                            @endphp
                                            <tr style="{{ $rowGradient }}">
                                                <td>{{ \Carbon\Carbon::parse($forecast['time'])->format('H:i') }}</td>
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
                                <ul class="temp-scale">
                                    <li>-40°C: #1e3c72</li>
                                    <li>-38°C: #2a4a8a</li>
                                    <li>-36°C: #355892</li>
                                    <li>-34°C: #40669a</li>
                                    <li>-32°C: #4b74a2</li>
                                    <li>-30°C: #5682aa</li>
                                    <li>-28°C: #6190b2</li>
                                    <li>-26°C: #6c9eba</li>
                                    <li>-24°C: #77acc2</li>
                                    <li>-22°C: #82bac9</li>
                                    <li>-20°C: #8dc8d1</li>
                                    <li>-18°C: #98d6d9</li>
                                    <li>-16°C: #a3e4e1</li>
                                    <li>-14°C: #aef2e9</li>
                                    <li>-12°C: #b9fff1</li>
                                    <li>-10°C: #c4e8e1</li>
                                    <li>-8°C: #cfd1d1</li>
                                    <li>-6°C: #dabac1</li>
                                    <li>-4°C: #e5a3b1</li>
                                    <li>-2°C: #f08ca1</li>
                                    <li>0°C: #fb7591</li>
                                    <li>2°C: #f65e81</li>
                                    <li>4°C: #f14771</li>
                                    <li>6°C: #ed3061</li>
                                    <li>8°C: #e91951</li>
                                    <li>10°C: #e50241</li>
                                    <li>12°C: #e00b4b</li>
                                    <li>14°C: #db1455</li>
                                    <li>16°C: #d61d5f</li>
                                    <li>18°C: #d12669</li>
                                    <li>20°C: #cc2f73</li>
                                    <li>22°C: #c7387d</li>
                                    <li>24°C: #c24187</li>
                                    <li>26°C: #bd4a91</li>
                                    <li>28°C: #b8539b</li>
                                    <li>30°C: #b35ca5</li>
                                    <li>32°C: #ae65af</li>
                                    <li>34°C: #a96eb9</li>
                                    <li>36°C: #a477c3</li>
                                    <li>38°C: #9f80cd</li>
                                    <li>40°C: #9a89d7</li>
                                    <li>42°C: #9592e1</li>
                                    <li>44°C: #909beb</li>
                                    <li>46°C: #8ba4f5</li>
                                    <li>48°C: #86adff</li>
                                    <li>50°C: #81b6ff</li>
                                </ul>
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