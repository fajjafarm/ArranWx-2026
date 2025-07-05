@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        .forecast-table .date-header {
            background: #e9ecef;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
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
                                        <th>Wind Direction (°)</th>
                                        <th>Wind Dir (Ordinal)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forecasts as $day)
                                        <tr class="date-header">
                                            <td colspan="11">{{ \Carbon\Carbon::parse($day['date'])->format('D, M d') }}</td>
                                        </tr>
                                        @foreach ($day['forecasts'] as $forecast)
                                            @php
                                                // Map yr.no symbol_code to Font Awesome icons
                                                $iconMap = [
                                                    'clearsky_day' => 'fa-sun',
                                                    'clearsky_night' => 'fa-moon',
                                                    'fair_day' => 'fa-cloud-sun',
                                                    'fair_night' => 'fa-cloud-moon',
                                                    'partlycloudy_day' => 'fa-cloud-sun',
                                                    'partlycloudy_night' => 'fa-cloud-moon',
                                                    'cloudy' => 'fa-cloud',
                                                    'rain' => 'fa-cloud-rain',
                                                    'lightrain' => 'fa-cloud-rain',
                                                    'heavyrain' => 'fa-cloud-showers-heavy',
                                                    'rainshowers_day' => 'fa-cloud-rain',
                                                    'rainshowers_night' => 'fa-cloud-rain',
                                                    'snow' => 'fa-snowflake',
                                                    'sleet' => 'fa-cloud-meatball',
                                                    'fog' => 'fa-fog',
                                                    // Add more mappings as needed
                                                    'default' => 'fa-question',
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
                                                $tempClass = match (true) {
                                                    $forecast['temperature'] <= 0 => 'temp-cell-cold',
                                                    $forecast['temperature'] <= 10 => 'temp-cell-cool',
                                                    $forecast['temperature'] <= 20 => 'temp-cell-mild',
                                                    $forecast['temperature'] <= 30 => 'temp-cell-warm',
                                                    default => 'temp-cell-hot',
                                                };

                                                // Compass ordinal for wind direction
                                                $direction = is_numeric($forecast['wind_direction']) ? $forecast['wind_direction'] : null;
                                                $ordinal = '';
                                                if ($direction !== null) {
                                                    $angle = fmod($direction + 11.25, 360) / 22.5;
                                                    $ordinals = ['N', 'NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW', 'SW', 'WSW', 'W', 'WNW', 'NW', 'NNW'];
                                                    $ordinal = $ordinals[floor($angle)];
                                                }

                                                // Arrow rotation (opposite direction)
                                                $arrowRotation = is_numeric($direction) ? ($direction + 180) % 360 : 0;
                                            @endphp
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($forecast['time'])->format('H:i') }}</td>
                                                <td class="condition-cell">
                                                    <i class="fas {{ $iconClass }}"></i>
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
                                                        <i class="fas fa-arrow-up" style="transform: rotate({{ $arrowRotation }}deg);"></i>
                                                        {{ round($direction, 1) }}
                                                    @else
                                                        {{ $forecast['wind_direction'] }}
                                                    @endif
                                                </td>
                                                <td>{{ $ordinal ?: 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-danger">Unable to load forecast data. Please try again later.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
