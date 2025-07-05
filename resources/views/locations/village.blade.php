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
        .forecast-table .date-header {
            background: #e9ecef;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }
        .temp-cell {
            background: linear-gradient(90deg, #4b6cb7, #182848);
            color: white;
        }
        .rain-cell {
            background: linear-gradient(90deg, #74ebd5, #acb6e5);
            color: black;
        }
        .wind-cell {
            background: linear-gradient(90deg, #f4e2d8, #d6ae7b);
            color: black;
        }
        .gust-cell {
            background: linear-gradient(90deg, #ff9a9e, #fad0c4);
            color: black;
        }
        .fog-cell {
            background: linear-gradient(90deg, #d3cce3, #e9e4f0);
            color: black;
        }
        .humidity-cell {
            background: linear-gradient(90deg, #a1c4fd, #c2e9fb);
            color: black;
        }
        .pressure-cell {
            background: linear-gradient(90deg, #d4fc79, #96e6a1);
            color: black;
        }
        .direction-cell {
            background: linear-gradient(90deg, #ffecd2, #fcb69f);
            color: black;
        }
        .condition-cell i {
            color: #28a745;
            font-size: 24px;
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forecasts as $day)
                                        <tr class="date-header">
                                            <td colspan="10">{{ \Carbon\Carbon::parse($day['date'])->format('D, M d') }}</td>
                                        </tr>
                                        @foreach ($day['forecasts'] as $forecast)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($forecast['time'])->format('H:i') }}</td>
                                                <td class="condition-cell">
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
                                                    @endphp
                                                    <i class="wi {{ $iconClass }}"></i>
                                                </td>
                                                <td class="temp-cell">{{ is_numeric($forecast['temperature']) ? round($forecast['temperature'], 1) : $forecast['temperature'] }}</td>
                                                <td class="rain-cell">{{ is_numeric($forecast['precipitation']) ? round($forecast['precipitation'], 1) : $forecast['precipitation'] }}</td>
                                                <td class="wind-cell">{{ is_numeric($forecast['wind_speed']) ? round($forecast['wind_speed'], 1) : $forecast['wind_speed'] }}</td>
                                                <td class="gust-cell">{{ is_numeric($forecast['wind_gust']) ? round($forecast['wind_gust'], 1) : $forecast['wind_gust'] }}</td>
                                                <td class="fog-cell">{{ is_numeric($forecast['cloud_area_fraction']) ? round($forecast['cloud_area_fraction'], 1) : $forecast['cloud_area_fraction'] }}</td>
                                                <td class="humidity-cell">{{ is_numeric($forecast['relative_humidity']) ? round($forecast['relative_humidity'], 1) : $forecast['relative_humidity'] }}</td>
                                                <td class="pressure-cell">{{ is_numeric($forecast['air_pressure']) ? round($forecast['air_pressure'], 1) : $forecast['air_pressure'] }}</td>
                                                <td class="direction-cell">{{ is_numeric($forecast['wind_direction']) ? round($forecast['wind_direction'], 1) : $forecast['wind_direction'] }}</td>
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