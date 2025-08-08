@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('content')
    <!-- Start Content -->
    <div class="container-fluid">
        <!-- Start Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ $title }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('second', ['dashboards', 'index']) }}">Home</a></li>
                            <li class="breadcrumb-item active">Marine Forecast</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Weather Warnings -->
        @if(!empty($warnings))
            <div class="row mb-3">
                @foreach($warnings as $warning)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-{{ $warning['severity'] }} shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-{{ $warning['severity'] }}">{{ $warning['title'] }}</h5>
                                <p class="card-text">{{ $warning['description'] }}</p>
                                <p class="card-text"><small class="text-muted">Issued: {{ \Carbon\Carbon::parse($warning['time'])->format('D, j M Y H:i') }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Search Bar -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="location-search" action="{{ route('marine.forecast') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="location" placeholder="Search for a location (e.g., London)" value="{{ $title }}">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphs -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">7-Day Marine Forecast Overview</h5>
                        <canvas id="marineChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Tables -->
        @foreach($forecast_days as $date => $data)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ \Carbon\Carbon::parse($date)->format('l, j F Y') }}</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Time</th>
                                            <th>Weather</th>
                                            <th>Temp (°C)</th>
                                            <th>Wave Height (m)</th>
                                            <th>Sea Temp (°C)</th>
                                            <th>Sea Level (m)</th>
                                            <th>Wave Dir (°)</th>
                                            <th>Wave Period (s)</th>
                                            <th>Current Vel (mph)</th>
                                            <th>Current Dir (°)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $hourly)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($hourly['time'])->format('H:i') }}</td>
                                                <td>
                                                    <img src="{{ $hourly['iconUrl'] }}" alt="{{ $hourly['weather'] }}" width="24" height="24" class="me-1">
                                                    {{ $hourly['weather'] }}
                                                </td>
                                                <td class="{{ $this->getTemperatureClass($hourly['temperature']) }}">{{ number_format($hourly['temperature'], 1) ?? 'N/A' }}</td>
                                                <td>{{ number_format($hourly['wave_height'], 2) }}</td>
                                                <td>{{ number_format($hourly['sea_surface_temperature'], 1) }}</td>
                                                <td>{{ number_format($hourly['sea_level_height_msl'], 2) }}</td>
                                                <td>{{ round($hourly['wave_direction']) }}</td>
                                                <td>{{ number_format($hourly['wave_period'], 2) }}</td>
                                                <td>{{ number_format($hourly['ocean_current_velocity'], 2) }}</td>
                                                <td>{{ round($hourly['ocean_current_direction']) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- End Content -->

    <!-- Chart.js Script -->
    @push('footer-scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('marineChart').getContext('2d');
                const marineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($chart_labels),
                        datasets: [
                            {
                                label: 'Wave Height (m)',
                                data: @json($chart_data['wave_height']),
                                borderColor: '#007bff',
                                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                                fill: true,
                                tension: 0.4
                            },
                            {
                                label: 'Sea Surface Temperature (°C)',
                                data: @json($chart_data['sea_surface_temperature']),
                                borderColor: '#28a745',
                                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                                fill: true,
                                tension: 0.4
                            },
                            {
                                label: 'Sea Level Height (m)',
                                data: @json($chart_data['sea_level_height_msl']),
                                borderColor: '#dc3545',
                                backgroundColor: 'rgba(220, 53, 69, 0.1)',
                                fill: true,
                                tension: 0.4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: { display: true, text: 'Time' },
                                ticks: {
                                    maxTicksLimit: 20 // Limit labels for readability over 7 days
                                }
                            },
                            y: {
                                title: { display: true, text: 'Value' },
                                beginAtZero: false
                            }
                        },
                        plugins: {
                            legend: { position: 'top' },
                            tooltip: { mode: 'index', intersect: false }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection