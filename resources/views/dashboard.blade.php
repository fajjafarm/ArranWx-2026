@extends('layouts.vertical')

@section('html-attribute')
lang="en"
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-3">Arran Weather</h1>
            <p class="text-muted">Weather forecast and points of interest for the Isle of Arran</p>
        </div>
    </div>

    <div class="row">
        <!-- Left Column: Leaflet Map -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Isle of Arran Map</h5>
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
        </div>

        <!-- Right Column: Weather Data (Placeholder) -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Weather Forecast</h5>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="locationSearch" placeholder="Search for a location...">
                    </div>
                    <p class="text-muted">Weather data from yr.no will be displayed here in a modern table format.</p>
                    <!-- Placeholder for weather table -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Temperature</th>
                                <th>Condition</th>
                                <th>Wind</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center">Enter a location to view weather data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet Map Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Leaflet map centered on Isle of Arran
        var map = L.map('map').setView([55.5820, -5.2023], 11);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Define icons for different categories
        var icons = {
            Village: L.icon({ iconUrl: '/images/markers/village.png', iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34] }),
            Marine: L.icon({ iconUrl: '/images/markers/marine.png', iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34] }),
            Pier: L.icon({ iconUrl: '/images/markers/pier.png', iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34] }),
            Hill: L.icon({ iconUrl: '/images/markers/hill.png', iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34] })
        };

        // Sample locations (replace with actual database fetch in Laravel controller)
        var locations = @json($locations);

        // Add markers to the map
        locations.forEach(function (location) {
            var marker = L.marker([location.latitude, location.longitude], { icon: icons[location.category] })
                .addTo(map)
                .bindPopup(`<b>${location.name}</b><br>Category: ${location.category}<br>Altitude: ${location.altitude}m`);
        });

        // Search functionality (basic client-side example)
        document.getElementById('locationSearch').addEventListener('input', function (e) {
            var searchTerm = e.target.value.toLowerCase();
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    var popupContent = layer.getPopup().getContent().toLowerCase();
                    if (popupContent.includes(searchTerm)) {
                        layer.addTo(map);
                    } else {
                        map.removeLayer(layer);
                    }
                }
            });
        });
    });
</script>
@endsection