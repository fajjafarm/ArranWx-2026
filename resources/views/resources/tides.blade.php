@extends('layouts.vertical', ['title' => $location->name . ' Tide Forecast'])

@section('html-attribute')
    data-sidenav-size="full"
@endsection

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css">
    <style>
        .forecast-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .forecast-table th, .forecast-table td { padding: 8px; text-align: center; border-bottom: 1px solid #ddd; font-size: 14px; vertical-align: middle; }
        .forecast-table th { background-color: #f8f9fa; font-weight: bold; }
        .day-header { background-color: #e9ecef; font-size: 16px; padding: 10px; text-align: left; }
        .weather-icon { font-size: 24px; color: #555; }
        .sun-moon-icon { font-size: 18px; color: #777; margin-right: 5px; vertical-align: middle; }
        .day-header span { margin-right: 15px; }
        .wind-direction { width: 36px; height: 36px; position: relative; margin: 0 auto; display: inline-block; vertical-align: middle; }
        .wind-arrow { width: 0; height: 0; border-left: 8px solid transparent; border-right: 8px solid transparent; border-bottom: 16px solid #000000; position: absolute; top: 50%; left: 50%; transform-origin: center bottom; z-index: 2; }
        .wind-arrow-tail { position: absolute; width: 6px; background: #000000; top: -10px; left: -3px; z-index: 1; }
        .wind-dir-text { font-size: 12px; font-weight: bold; }
        .beaufort-key, .gradient-key { margin-top: 20px; padding: 10px; background: #f8f9fa; border-radius: 5px; }
        .beaufort-key table, .gradient-key table { width: 100%; border-collapse: collapse; }
        .beaufort-key td, .gradient-key td { padding: 5px; text-align: center; font-size: 12px; }
        @media (max-width: 768px) {
            .forecast-table { display: block; overflow-x: auto; white-space: nowrap; }
            .forecast-table th, .forecast-table td { padding: 6px; font-size: 12px; }
            .weather-icon { font-size: 18px; }
            .sun-moon-icon { font-size: 14px; margin-right: 3px; }
            .day-header { font-size: 14px; }
            .day-header span { margin-right: 10px; }
            .beaufort-key td, .gradient-key td { font-size: 10px; padding: 3px; }
            .wind-direction { width: 24px; height: 24px; }
            .wind-arrow { border-left: 5px solid transparent; border-right: 5px solid transparent; border-bottom: 10px solid #000000; }
            .wind-arrow-tail { width: 4px; top: -6px; left: -2px; }
            .wind-dir-text { font-size: 10px; }
        }
    </style>
@endsection

@section('content')
    <!-- Placeholder for domId in case required by external library -->
    <div id="domId" style="display: none;"></div>

    @include('layouts.partials.page-title', ['subtitle' => 'Tide Forecast', 'title' => $location->name])

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <!-- Header: Map, Title, Description -->
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000({{ $location->longitude }},{{ $location->latitude }})/{{ $location->longitude }},{{ $location->latitude }},12,0/150x150?access_token={{ env('MAPBOX_ACCESS_TOKEN') }}"
                                 alt="Map of {{ $location->name }}"
                                 class="img-fluid rounded">
                        </div>
                        <div class="col-md-9 text-start">
                            <h2 class="card-title">{{ $location->name }} Tide Forecast</h2>
                            <p class="text-muted">
                                {{ $location->description ?? 'Tide forecast for ' . $location->name . ', located at latitude ' . $location->latitude . ', longitude ' . $location->longitude . ', altitude ' . ($location->altitude ?? 0) . ' meters above sea level.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Placeholder Content -->
                    <div class="text-center">
                        <h5 class="text-muted fs-13 text-uppercase">
                            {{ $location->name }} Tide Forecast
                        </h5>
                        <p class="text-muted mt-4">Tide forecast data for {{ $location->name }} will be available soon.</p>
                    </div>

                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-light mt-3">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Tide forecast page loaded for {{ $location->name }}');
        });
    </script>
@endsection