@extends('layouts.vertical', ['title' => 'Earthquakes near Arran'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => 'Earthquakes near Arran'])

    <div class="container">
        @if ($message)
            <div class="alert alert-info" role="alert">
                {{ $message }}
            </div>
        @endif
        @if (!empty($earthquakeData))
            <!-- Leaflet Map -->
            <div id="quake-map" style="height: 400px; margin-bottom: 20px;"></div>
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <script>
                var map = L.map('quake-map').setView([55.6, -5.3], 7); // Center on Arran
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Plot quakes
                var quakes = @json($earthquakeData);
                quakes.forEach(function(quake) {
                    if (quake.latitude && quake.longitude) {
                        var marker = L.marker([quake.latitude, quake.longitude]).addTo(map);
                        // Tooltip on hover
                        marker.bindTooltip(
                            quake.time + '<br>Magnitude: ' + quake.magnitude.toFixed(1),
                            { direction: 'top', className: 'leaflet-tooltip' }
                        );
                        // Popup on click
                        marker.bindPopup(
                            '<b>' + quake.place + '</b><br>' +
                            'Magnitude: ' + quake.magnitude.toFixed(1) + '<br>' +
                            'Distance: ' + (quake.distance || 'N/A') + ' miles<br>' +
                            '<a href="' + quake.link + '" target="_blank">View on BGS</a>'
                        );
                    }
                });
            </script>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>Location</th>
                        <th>Magnitude</th>
                        <th>Distance (miles)</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($earthquakeData as $quake)
                        <tr class="{{ $quake['highlight'] ? 'table-warning' : '' }}">
                            <td>{{ $quake['time'] }}</td>
                            <td>{{ $quake['place'] }}</td>
                            <td>{{ number_format($quake['magnitude'], 1) }}</td>
                            <td>{{ isset($quake['distance']) ? $quake['distance'] : 'N/A' }}</td>
                            <td><a href="{{ $quake['link'] }}" target="_blank">View on BGS</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No earthquake data available in the database for the last 60 days.</p>
        @endif
        <p class="text-muted mt-3">{{ $copyright }}</p>
    </div>

    <style>
        .leaflet-tooltip {
            font-size: 12px;
            padding: 4px 8px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            border-radius: 4px;
        }
    </style>
@endsection