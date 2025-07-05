extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4">{{ $title }}</h1>
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
        // Initialize with lat and lon from controller
        const initialLat = {{ $lat }};
        const initialLon = {{ $lon }};

        // Initialize Leaflet Map with zoom level 10
        var map = L.map('map').setView([initialLat, initialLon], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Define custom icons for each location type
        const villageIcon = L.divIcon({
            className: 'custom-icon',
            html: '<i class="leaflet-marker-icon" style="color: green; font-size: 24px;">●</i>',
            iconSize: [24, 24],
            iconAnchor: [12, 12],
            popupAnchor: [0, -12]
        });

        const hillIcon = L.divIcon({
            className: 'custom-icon',
            html: '<i class="leaflet-marker-icon" style="color: gray; font-size: 24px;">●</i>',
            iconSize: [24, 24],
            iconAnchor: [12, 12],
            popupAnchor: [0, -12]
        });

        const marineIcon = L.divIcon({
            className: 'custom-icon',
            html: '<i class="leaflet-marker-icon" style="color: blue; font-size: 24px;">●</i>',
            iconSize: [24, 24],
            iconAnchor: [12, 12],
            popupAnchor: [0, -12]
        });

        // Fetch locations from Laravel backend
        fetch('/api/locations')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    let icon;
                    switch (location.type) {
                        case 'Village':
                            icon = villageIcon;
                            break;
                        case 'Hill':
                            icon = hillIcon;
                            break;
                        case 'Marine':
                            icon = marineIcon;
                            break;
                        default:
                            icon = L.Icon.Default; // Fallback
                    }

                    let popupContent = `
                        <b>${location.name}</b><br>
                        ${location.alternative_name ? `Alternative Name: ${location.alternative_name}<br>` : ''}
                        Type: ${location.type}<br>
                        Altitude: ${location.altitude} m
                    `;
                    L.marker([location.latitude, location.longitude], { icon: icon })
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
                                    <td>${forecast.temperature}</td>
                                    <td>${forecast.condition}</td>
                                    <td>${forecast.precipitation}</td>
                                    <td>${forecast.wind_speed}</td>
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
                        map.setView([lat, lon], 10);
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
