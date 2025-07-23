@extends('layouts.vertical')

@section('html-attribute', 'lang="en"')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">10-Day Weather Forecast for Arran Hills</h4>
            </div>
        </div>
    </div>

    <!-- Location Search Form -->
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" id="location-search" class="form-control" placeholder="Search for a location (e.g., Brodick, Isle of Arran)">
        </div>
        <div class="col-md-6">
            <select id="hill-select" class="form-select">
                <option value="goatfell">Goat Fell (874m)</option>
                <option value="beinntarsuinn">Beinn Tarsuinn (826m)</option>
                <option value="cir-mhor">Cir Mhòr (799m)</option>
                <option value="caisteal-abadhail">Caisteal Abadail (815m)</option>
            </select>
        </div>
    </div>

    <!-- Forecast Content -->
    <div id="forecast-content">
        @foreach ($forecasts as $day => $data)
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ $day }} | {{ $data['date'] }}</h5>
                    <div class="d-flex justify-content-between">
                        <span>Sunrise: {{ $data['sunrise'] }}</span>
                        <span>Sunset: {{ $data['sunset'] }}</span>
                        <span>Moonrise: {{ $data['moonrise'] }}</span>
                        <span>Moonset: {{ $data['moonset'] }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Weather</th>
                                    <th>Temperature (°C)</th>
                                    <th>Feels Like (°C)</th>
                                    <th>Wind Speed (m/s)</th>
                                    <th>Wind Gust (m/s)</th>
                                    <th>Wind Direction</th>
                                    <th>Cloud Level (m)</th>
                                    <th>Snow Level (m)</th>
                                    <th>Snow Cover</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['hours'] as $hour)
                                    <tr>
                                        <td>{{ $hour['time'] }}</td>
                                        <td>
                                            <img src="/images/weather-icons/{{ $hour['icon'] }}.svg" alt="{{ $hour['condition'] }}" width="30">
                                            {{ $hour['condition'] }}
                                        </td>
                                        <td>{{ $hour['temperature'] }}</td>
                                        <td>{{ $hour['feels_like'] }}</td>
                                        <td>{{ $hour['wind_speed'] }}</td>
                                        <td>{{ $hour['wind_gust'] }}</td>
                                        <td>{{ $hour['wind_direction'] }}</td>
                                        <td>{{ $hour['cloud_level'] }}</td>
                                        <td>{{ $hour['snow_level'] === 'above' ? '-' : $hour['snow_level'] }}</td>
                                        <td>TBD</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- JavaScript for Dynamic Location Search -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hillSelect = document.getElementById('hill-select');
    const locationSearch = document.getElementById('location-search');

    hillSelect.addEventListener('change', function () {
        fetchForecast(hillSelect.value);
    });

    locationSearch.addEventListener('input', function () {
        if (locationSearch.value.length > 3) {
            fetchForecast(locationSearch.value);
        }
    });

    function fetchForecast(location) {
        fetch('/weather/forecast?location=' + encodeURIComponent(location))
            .then(response => response.json())
            .then(data => {
                // Update forecast-content dynamically
                document.getElementById('forecast-content').innerHTML = data.html;
            })
            .catch(error => console.error('Error fetching forecast:', error));
    }
});
</script>

<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
}
.card-header {
    font-size: 1.2rem;
}
.table-responsive {
    overflow-x: auto;
}
</style>
@endsection