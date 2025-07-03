@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4">Arran Weather</h1>
            </div>
        </div>

        <div class="row">
            <!-- Left Column: Leaflet Map -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Isle of Arran Map</h4>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 500px;"></div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Weather Data -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Weather Forecast</h4>
                        <form id="location-search" class="d-flex">
                            <input type="text" id="location-input" class="form-control me-2" placeholder="Search for a location..." />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Temperature (°C)</th>
                                    <th>Condition</th>
                                    <th>Precipitation (mm)</th>
                                    <th>Wind (m/s)</th>
                                </tr>
                            </thead>
                            <tbody id="weather-data">
                                <!-- Weather data will be populated via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Future feature rows can be added here -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>Placeholder for additional features (e.g., historical weather, alerts, etc.)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Initialize Leaflet Map
        var map = L.map('map').setView([55.5820, -5.2093], 11); // Centered on Isle of Arran
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fetch locations from Laravel backend
        fetch('/api/locations')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    let popupContent = `
                        <b>${location.name}</b><br>
                        ${location.alternative_name ? `Alternative Name: ${location.alternative_name}<br>` : ''}
                        Type: ${location.type}<br>
                        Altitude: ${location.altitude} m
                    `;
                    L.marker([location.latitude, location.longitude])
                        .addTo(map)
                        .bindPopup(popupContent);
                });
            });

        // Weather data fetch from yr.no (using a proxy API for simplicity)
        function fetchWeather(lat = 55.5820, lon = -5.2093) {
            fetch(`https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=${lat}&lon=${lon}`, {
                headers: {
                    'User-Agent': 'ArranWeather/1.0 (contact@arranweather.com)'
                }
            })
                .then(response => response.json())
                .then(data => {
                    let weatherTable = document.getElementById('weather-data');
                    weatherTable.innerHTML = '';
                    data.properties.timeseries.slice(0, 5).forEach(time => {
                        let row = `
                            <tr>
                                <td>${new Date(time.time).toLocaleString()}</td>
                                <td>${time.data.instant.details.air_temperature}</td>
                                <td>${time.data.next_1_hours?.summary.symbol_code || 'N/A'}</td>
                                <td>${time.data.next_1_hours?.details.precipitation_amount || 0}</td>
                                <td>${time.data.instant.details.wind_speed}</td>
                            </tr>`;
                        weatherTable.innerHTML += row;
                    });
                });
        }

        // Initial weather fetch for Arran
        fetchWeather();

        // Location search functionality
        document.getElementById('location-search').addEventListener('submit', function(e) {
            e.preventDefault();
            let query = document.getElementById('location-input').value;
            // Use Nominatim for geocoding
            fetch(`https://nominatim.openstreetmap.org/search?q=${query}&format=json`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        let { lat, lon } = data[0];
                        map.setView([lat, lon], 11);
                        fetchWeather(lat, lon);
                    } else {
                        alert('Location not found');
                    }
                });
        });
    </script>
@endsection