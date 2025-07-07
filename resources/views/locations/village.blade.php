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
        /* Temperature scale (2°C increments from -40°C to +50°C, using original solid colours) */
        .temp-cell-minus-40 { background: #1e3c72; color: white; }
        .temp-cell-minus-38 { background: #2a4a8a; color: white; }
        .temp-cell-minus-36 { background: #355892; color: white; }
        .temp-cell-minus-34 { background: #40669a; color: white; }
        .temp-cell-minus-32 { background: #4b74a2; color: white; }
        .temp-cell-minus-30 { background: #5682aa; color: white; }
        .temp-cell-minus-28 { background: #6190b2; color: white; }
        .temp-cell-minus-26 { background: #6c9eba; color: white; }
        .temp-cell-minus-24 { background: #77acc2; color: white; }
        .temp-cell-minus-22 { background: #82bac9; color: white; }
        .temp-cell-minus-20 { background: #8dc8d1; color: white; }
        .temp-cell-minus-18 { background: #98d6d9; color: white; }
        .temp-cell-minus-16 { background: #a3e4e1; color: black; }
        .temp-cell-minus-14 { background: #aef2e9; color: black; }
        .temp-cell-minus-12 { background: #b9fff1; color: black; }
        .temp-cell-minus-10 { background: #c4e8e1; color: black; }
        .temp-cell-minus-8 { background: #cfd1d1; color: black; }
        .temp-cell-minus-6 { background: #dabac1; color: black; }
        .temp-cell-minus-4 { background: #e5a3b1; color: black; }
        .temp-cell-minus-2 { background: #f08ca1; color: black; }
        .temp-cell-0 { background: #fb7591; color: black; }
        .temp-cell-2 { background: #f65e81; color: black; }
        .temp-cell-4 { background: #f14771; color: black; }
        .temp-cell-6 { background: #ed3061; color: white; }
        .temp-cell-8 { background: #e91951; color: white; }
        .temp-cell-10 { background: #e50241; color: white; }
        .temp-cell-12 { background: #e00b4b; color: white; }
        .temp-cell-14 { background: #db1455; color: white; }
        .temp-cell-16 { background: #d61d5f; color: white; }
        .temp-cell-18 { background: #d12669; color: white; }
        .temp-cell-20 { background: #cc2f73; color: white; }
        .temp-cell-22 { background: #c7387d; color: white; }
        .temp-cell-24 { background: #c24187; color: white; }
        .temp-cell-26 { background: #bd4a91; color: white; }
        .temp-cell-28 { background: #b8539b; color: white; }
        .temp-cell-30 { background: #b35ca5; color: white; }
        .temp-cell-32 { background: #ae65af; color: white; }
        .temp-cell-34 { background: #a96eb9; color: white; }
        .temp-cell-36 { background: #a477c3; color: white; }
        .temp-cell-38 { background: #9f80cd; color: white; }
        .temp-cell-40 { background: #9a89d7; color: white; }
        .temp-cell-42 { background: #9592e1; color: white; }
        .temp-cell-44 { background: #909beb; color: white; }
        .temp-cell-46 { background: #8ba4f5; color: white; }
        .temp-cell-48 { background: #86adff; color: white; }
        .temp-cell-50 { background: #81b6ff; color: white; }
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
                                                    'default' => 'wi-na',
                                                ];
                                                $iconClass = $iconMap[$forecast['condition']] ?? $iconMap['default'];

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
                                                $tempClass = 'temp-cell-0';
                                                if ($tempValue !== null) {
                                                    $tempKey = min(50, max(-40, round($tempValue / 2) * 2));
                                                    $tempClass = 'temp-cell-' . ($tempKey < 0 ? 'minus-' . abs($tempKey) : $tempKey);
                                                    Log::debug("Temperature: {$tempValue}, TempClass: {$tempClass}"); // Debug log
                                                }

                                                $rowGradient = '';
                                                if ($tempValue !== null) {
                                                    $hue = min(max(($tempValue + 5) / 40 * 360, 180), 360);
                                                    $rowGradient = "background: linear-gradient(90deg, hsl($hue, 20%, 95%), hsl($hue, 20%, 85%));";
                                                }

                                                $direction = is_numeric($forecast['wind_from_direction_degrees']) ? floatval($forecast['wind_from_direction_degrees']) : null;
                                                $ordinal = $forecast['wind_direction'] ?? '';
                                                $arrowRotation = is_numeric($direction) ? ($direction + 180) % 360 : 0;
                                            @endphp
                                            <tr style="{{ $rowGradient }}">
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