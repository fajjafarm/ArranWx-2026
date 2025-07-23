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