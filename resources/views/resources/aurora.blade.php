@extends('layouts.vertical', ['title' => 'Aurora Borealis Forecast'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => 'Aurora Borealis Forecast'])

    <div class="container">
        <h4>3-Day Aurora Forecast (June 1–3, 2025)</h4>
        @if ($auroraData['message'])
            <div class="alert alert-info" role="alert">
                {{ $auroraData['message'] }}
            </div>
        @endif

        <!-- Leaflet.js Map -->
        <h5>Aurora Visibility Map (Estimated, weather dependant)</h5>
        <div id="aurora-map" style="height: 400px; margin-bottom: 20px;"></div>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script>
            var map = L.map('aurora-map').setView([54, -2], 6); // Center on UK
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var maxKp = @json($auroraData['max_kp']);
            var bands = [
                { kp: 7, color: 'rgba(255, 99, 132, 0.5)', lat: 50, label: 'Southern UK (~50°N, Kp≥7)' },
                { kp: 5, color: 'rgba(255, 159, 64, 0.5)', lat: 54, label: 'Central UK (~54°N, Kp≥5)' },
                { kp: 4, color: 'rgba(54, 162, 235, 0.5)', lat: 58, label: 'Northern Scotland (~58°N, Kp≥4)' },
                { kp: 0, color: 'rgba(75, 192, 192, 0.5)', lat: 60, label: 'Minimal Visibility (Kp<4)' }
            ];

            // Add bands up to maxKp
            bands.forEach(function(band) {
                if (maxKp >= band.kp) {
                    var polygon = L.polygon([
                        [band.lat, -10], [band.lat, 5], // UK longitude range
                        [band.lat + (band.kp === 0 ? 10 : bands.find(b => b.kp > band.kp)?.lat || 70), 5],
                        [band.lat + (band.kp === 0 ? 10 : bands.find(b => b.kp > band.kp)?.lat || 70), -10]
                    ], {
                        color: band.color,
                        fillColor: band.color,
                        fillOpacity: 0.5, // Increased opacity
                        weight: 2 // Increased border weight
                    }).addTo(map);
                    polygon.bindTooltip(band.label, { sticky: true });
                }
            });

            // Add legend
            var legend = L.control({ position: 'bottomright' });
            legend.onAdd = function() {
                var div = L.DomUtil.create('div', 'info legend');
                div.style.background = 'white';
                div.style.padding = '6px 8px';
                div.style.border = '1px solid #ccc';
                bands.forEach(function(band) {
                    if (maxKp >= band.kp) {
                        div.innerHTML += '<i style="background:' + band.color + ';width:18px;height:18px;display:inline-block;"></i> ' +
                            band.label + '<br>';
                    }
                });
                return div;
            };
            legend.addTo(map);
        </script>

        <!-- Chart.js Bar Chart -->
        <h5>Kp Index Forecast</h5>
        <canvas id="kp-chart" style="max-height: 400px; margin-bottom: 20px;"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
        <script>
            try {
                var kpData = @json($auroraData['kp_forecast']);
                
                // Fallback if kpData is empty
                var labels = kpData && kpData.length ? kpData.map(item => item.label || 'Unknown') : ['No Data'];
                var kpValues = kpData && kpData.length ? kpData.map(item => item.kp || 0) : [0];

                var ctx = document.getElementById('kp-chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Kp Index',
                            data: kpValues,
                            backgroundColor: kpValues.map(kp => {
                                if (kp >= 7) return 'rgba(255, 99, 132, 0.7)';
                                if (kp >= 5) return 'rgba(255, 159, 64, 0.7)';
                                if (kp >= 4) return 'rgba(54, 162, 235, 0.7)';
                                return 'rgba(75, 192, 192, 0.7)';
                            }),
                            borderColor: 'rgba(0, 0, 0, 0.1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 9,
                                title: { display: true, text: 'Kp Index' }
                            },
                            x: {
                                title: { display: true, text: 'Date & Time (BST)' }
                            }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            } catch (error) {
                console.error('Chart.js error:', error);
            }
        </script>

        @if (!empty($auroraData['kp_forecast']))
            <!-- Kp Strength Table -->
            <h5>Kp Index and Aurora Visibility</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kp</th>
                        <th>G-Scale</th>
                        <th>Visibility in UK</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>0–1</td><td>G0</td><td>Unlikely anywhere</td><td>Quiet, no aurora visible.</td></tr>
                    <tr><td>2–3</td><td>G0</td><td>Far northern Scotland</td><td>Weak activity, faint aurora possible.</td></tr>
                    <tr><td>4</td><td>G0</td><td>Northern Scotland (~58°N)</td><td>Minor activity, aurora visible in north.</td></tr>
                    <tr><td>5</td><td>G1</td><td>Scotland, Northern Ireland (~54°N)</td><td>Minor storm, aurora in northern UK.</td></tr>
                    <tr><td>6</td><td>G2</td><td>Central UK (~53°N)</td><td>Moderate storm, bright aurora in north, visible in central areas.</td></tr>
                    <tr><td>7</td><td>G3</td><td>Northern England (~52°N)</td><td>Strong storm, aurora widely visible.</td></tr>
                    <tr><td>8</td><td>G4</td><td>Southern UK (~50°N)</td><td>Severe storm, aurora across UK.</td></tr>
                    <tr><td>9</td><td>G5</td><td>Southern UK and beyond</td><td>Extreme storm, vivid aurora nationwide.</td></tr>
                </tbody>
            </table>
        @else
            <p class="text-muted">No aurora forecast data available.</p>
        @endif

        <!-- Source Links -->
        <h5>Sources</h5>
        <ul class="list-unstyled">
            <li><a href="https://www.swpc.noaa.gov/" target="_blank">NOAA Space Weather Prediction Center</a> - Kp Index Forecast</li>
        </ul>
    </div>

    <style>
        .info.legend {
            background: white;
            padding: 6px 8px;
            border: 1px solid #ccc;
            font-size: 12px;
        }
    </style>
@endsection