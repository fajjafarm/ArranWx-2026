@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('title', $title)

@section('css')
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
                        <h4 class="card-title">10-Day Weather Forecast</h4>
                    </div>
                    <div class="card-body">
                        @if (!empty($forecasts))
                            <table class="table table-striped table-bordered forecast-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Condition</th>
                                        <th>Temperature (°C)</th>
                                        <th>Rainfall (mm)</th>
                                        <th>Wind (m/s)</th>
                                        <th>Wind Gust (m/s)</th>
                                        <th>Fog (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forecasts as $forecast)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($forecast['date'])->format('D, M d') }}</td>
                                            <td>{{ $forecast['condition'] }}</td>
                                            <td class="temp-cell">{{ $forecast['temperature_avg'] }} ({{ $forecast['temperature_min'] }} - {{ $forecast['temperature_max'] }})</td>
                                            <td class="rain-cell">{{ $forecast['precipitation'] }}</td>
                                            <td class="wind-cell">{{ $forecast['wind_speed'] }}</td>
                                            <td class="gust-cell">{{ $forecast['wind_gust'] }}</td>
                                            <td class="fog-cell">{{ $forecast['fog'] }}</td>
                                        </tr>
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