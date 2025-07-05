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
        /* Temperature gradients (Met Office-inspired) */
        .temp-cell-cold { background: linear-gradient(90deg, #1e3c72, #2a5298); color: white; }
        .temp-cell-cool { background: linear-gradient(90deg, #3b5998, #8b9dc3); color: white; }
        .temp-cell-mild { background: linear-gradient(90deg, #dfe3ee, #f7f7f7); color: black; }
        .temp-cell-warm { background: linear-gradient(90deg, #f7e1b5, #f4c542); color: black; }
        .temp-cell-hot { background: linear-gradient(90deg, #ff9a9e, #ff6a61); color: white; }
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
                                        <i class="wi wi-sunrise"></i> {{ $day['sunrise'] ?? 'N/A' }} |
                                        <i class="wi wi-sunset"></i> {{ $day['sunset'] ?? 'N/A' }} |
                                        <i class="wi wi-moonrise"></i> {{ $day['moonrise'] ?? 'N/A' }} |
                                        <i class="wi wi-moonset"></i> {{ $day['moonset'] ?? 'N/A' }} |
                                        <i class="wi {{ $day['moonphase'] ? ($day['moonphase'] <= 0.125 ? 'wi-moon-new' : ($day['moonphase'] <= 0.375 ? 'wi-moon-first-quarter' : ($day['moonphase'] <= 0.625 ? 'wi-moon-full' : ($day['moonphase'] <= 0.875 ? 'wi-moon-last-quarter' : 'wi-moon-new')))) : 'wi-moon-new' }}"></i> {{ $day['moonphase'] ? round($day['moonphase'] * 100) . '%' : 'N/A' }}
                                    </span>
                                </div>
                                <table class="table table-striped table-bordered forecast-table">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Condition</th>
                                            <th>Temperature (°C)</th>
                                            <th>Rainfall (mm)</th>
                                            <th>Wind (m/s)</th>
                                            <th>Wind Gust (m/s)</th>
                                            <th>Fog (%)</th>
                                            <th>Humidity (%)</th>
                                            <th>Pressure (hPa)</th>
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
                                                    // Add more mappings as needed
                                                    'default' => 'wi-na',
                                                ];
                                                $iconClass = $iconMap[$forecast['condition']] ?? $iconMap['default'];

                                                // Beaufort scale for wind (m/s)
                                                $beaufort = match (true) {
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

                                                // Met Office-inspired temperature scale
                                                $tempValue = is_numeric($forecast['temperature']) ? floatval($forecast['temperature']) : null;
                                                $tempClass = $tempValue !== null ? match (true) {
                                                    $tempValue <= 0 => 'temp-cell-cold',
                                                    $tempValue <= 10 => 'temp-cell-cool',
                                                    $tempValue <= 20 => 'temp-cell-mild',
                                                    $tempValue <= 30 => 'temp-cell-warm',
                                                    default => 'temp-cell-hot',
                                                } : '';

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
                                                <td class="rain-cell">{{ is_numeric($forecast['precipitation']) ? round($forecast['precipitation'], 1) : $forecast['precipitation'] }}</td>
                                                <td class="{{ $windClass }}">{{ is_numeric($forecast['wind_speed']) ? round($forecast['wind_speed'], 1) : $forecast['wind_speed'] }}</td>
                                                <td class="{{ $gustClass }}">{{ is_numeric($forecast['wind_gust']) ? round($forecast['wind_gust'], 1) : $forecast['wind_gust'] }}</td>
                                                <td class="fog-cell">{{ is_numeric($forecast['cloud_area_fraction']) ? round($forecast['cloud_area_fraction'], 1) : $forecast['cloud_area_fraction'] }}</td>
                                                <td class="humidity-cell">{{ is_numeric($forecast['relative_humidity']) ? round($forecast['relative_humidity'], 1) : $forecast['relative_humidity'] }}</td>
                                                <td class="pressure-cell">{{ is_numeric($forecast['air_pressure']) ? round($forecast['air_pressure'], 1) : $forecast['air_pressure'] }}</td>
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
    </div>
@endsection