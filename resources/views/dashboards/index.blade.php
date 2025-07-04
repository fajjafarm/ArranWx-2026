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
        // Get query parameters from URL
        const urlParams = new URLSearchParams(window.location.search);
        const initialLat = parseFloat(urlParams.get('lat')) || 55.5820; // Default to Arran center
        const initialLon = parseFloat(urlParams.get('lon')) || -5.2093;

        // Initialize Leaflet Map
        var map = L.map('map').setView([initialLat, initialLon], 11);
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

        // Weather data fetch from WeatherController
        function fetchWeather(lat = initialLat, lon = initialLon) {
            fetch(`/api/weather?lat=${lat}&lon=${lon}`)
                .then(response => response.json())
                .then(data => {
                    let weatherTable = document.getElementById('weather-data');
                    weatherTable.innerHTML = '';
                    if (data.status === 'success') {
                        data.data.forEach(forecast => {
                            let row = `
                                <tr>
                                    <td>${new Date(forecast.time).toLocaleString()}</td>
                                    <td>${forecast.temp}</td>
                                    <td>${forecast.weather}</td>
                                    <td>${forecast.rain}</td>
                                    <td>${forecast.wind}</td>
                                </tr>`;
                            weatherTable.innerHTML += row;
                        });
                    } else {
                        weatherTable.innerHTML = `<tr><td colspan="5">${data.message}</td></tr>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching weather:', error);
                    document.getElementById('weather-data').innerHTML = '<tr><td colspan="5">Unable to fetch weather data</td></tr>';
                });
        }

        // Initial weather fetch
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
                        // Update URL with new coordinates
                        window.history.pushState({}, '', `/?lat=${lat}&lon=${lon}`);
                    } else {
                        alert('Location not found');
                    }
                })
                .catch(error => {
                    console.error('Error searching location:', error);
                    alert('Error searching location');
                });
        });
    </script>
@endsection