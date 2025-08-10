@extends('layouts.vertical')

@section('html-attribute')
    lang="en"
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ $title }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Marine Forecast</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

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

        @if(!empty($chart_labels) && !empty($chart_data['wave_height']))
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">7-Day Marine Forecast Overview</h5>
                            <div id="marineChart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning">
                        No chart data available for the selected location.
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($forecast_days))
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
                                                <th>Air Temp (°C)</th>
                                                <th>Sea Temp (°C)</th>
                                                <th>Wind Speed (mph)</th>
                                                <th>Wind Gusts (mph)</th>
                                                <th>Wind Dir</th>
                                                <th>Beaufort</th>
                                                <th>Wave Height (m)</th>
                                                <th>Sea Level (m)</th>
                                                <th>Wave Dir</th>
                                                <th>Wave Period (s)</th>
                                                <th>Current Vel (mph)</th>
                                                <th>Current Dir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $hourly)
                                                @php
                                                    $cardinal = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW', 'N'];
                                                    $windDir = is_numeric($hourly['wind_direction']) ? round($hourly['wind_direction'] / 45) * 45 : null;
                                                    $windCardinal = $windDir !== null ? $cardinal[intval($windDir / 45) % 8] : 'N/A';
                                                    $waveDir = is_numeric($hourly['wave_direction']) ? round($hourly['wave_direction'] / 45) * 45 : null;
                                                    $waveCardinal = $waveDir !== null ? $cardinal[intval($waveDir / 45) % 8] : 'N/A';
                                                    $currentDir = is_numeric($hourly['ocean_current_direction']) ? round($hourly['ocean_current_direction'] / 45) * 45 : null;
                                                    $currentCardinal = $currentDir !== null ? $cardinal[intval($currentDir / 45) % 8] : 'N/A';
                                                @endphp
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($hourly['time'])->format('H:i') }}</td>
                                                    <td>
                                                        <img src="{{ $hourly['iconUrl'] }}" alt="{{ $hourly['weather'] }}" width="24" height="24" class="me-1">
                                                        {{ $hourly['weather'] }}
                                                    </td>
                                                    <td class="{{ $hourly['temp_class'] }}">{{ $hourly['temperature'] ? number_format($hourly['temperature'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['sea_surface_temperature'] ? number_format($hourly['sea_surface_temperature'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['wind_speed'] ? number_format($hourly['wind_speed'], 1) : 'N/A' }}</td>
                                                    <td>{{ $hourly['wind_gusts'] ? number_format($hourly['wind_gusts'], 1) : 'N/A' }}</td>
                                                    <td>
                                                        @if($windDir !== null)
                                                            <i class="ti ti-arrow-up" style="transform: rotate({{ $windDir }}deg);"></i>
                                                            {{ $windCardinal }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $hourly['beaufort'] }}</td>
                                                    <td>{{ $hourly['wave_height'] ? number_format($hourly['wave_height'], 2) : 'N/A' }}</td>
                                                    <td>{{ $hourly['sea_level_height_msl'] ? number_format($hourly['sea_level_height_msl'], 2) : 'N/A' }}</td>
                                                    <td>
                                                        @if($waveDir !== null)
                                                            <i class="ti ti-arrow-up" style="transform: rotate({{ $waveDir }}deg);"></i>
                                                            {{ $waveCardinal }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $hourly['wave_period'] ? number_format($hourly['wave_period'], 2) : 'N/A' }}</td>
                                                    <td>{{ $hourly['ocean_current_velocity'] ? number_format($hourly['ocean_current_velocity'], 2) : 'N/A' }}</td>
                                                    <td>
                                                        @if($currentDir !== null)
                                                            <i class="ti ti-arrow-up" style="transform: rotate({{ $currentDir }}deg);"></i>
                                                            {{ $currentCardinal }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
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
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning">
                        No forecast data available for the selected location.
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if(!empty($chart_labels) && !empty($chart_data['wave_height']))
        @push('footer-scripts')
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    try {
                        const chartData = @json($chart_data);
                        const labels = @json($chart_labels);
                        
                        console.log('Chart Data:', chartData);
                        console.log('Chart Labels:', labels);
                        
                        if (!labels.length || !chartData.wave_height.length) {
                            console.error('Invalid chart data:', { labels, chartData });
                            return;
                        }
                        
                        const options = {
                            series: [
                                {
                                    name: 'Wave Height (m)',
                                    data: chartData.wave_height
                                },
                                {
                                    name: 'Sea Surface Temperature (°C)',
                                    data: chartData.sea_surface_temperature
                                },
                                {
                                    name: 'Sea Level Height (m)',
                                    data: chartData.sea_level_height_msl
                                }
                            ],
                            chart: {
                                height: 350,
                                type: 'line',
                                zoom: {
                                    enabled: true
                                },
                                animations: {
                                    enabled: true
                                }
                            },
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    legend: {
                                        position: 'bottom',
                                        offsetX: -10,
                                        offsetY: 0
                                    }
                                }
                            }],
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            xaxis: {
                                categories: labels,
                                title: {
                                    text: 'Time'
                                },
                                labels: {
                                    rotate: -45,
                                    rotateAlways: true
                                }
                            },
                            yaxis: {
                                title: {
                                    text: 'Value'
                                },
                                min: undefined,
                                forceNiceScale: true
                            },
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy HH:mm'
                                },
                            }
                        };

                        const chart = new ApexCharts(document.querySelector("#marineChart"), options);
                        chart.render();
                    } catch (error) {
                        console.error('ApexCharts error:', error);
                    }
                });
            </script>
        @endpush
    @endif
@endsection