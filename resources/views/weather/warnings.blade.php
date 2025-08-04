@extends('layouts.vertical')

@section('html-attribute', 'lang="en"')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Weather & Service Warnings</h4>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('weather.warnings') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="location" class="form-control" placeholder="Enter location (e.g., Isle of Arran, KA27)" value="{{ $location }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Weather Warnings -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Weather Warnings</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Severity</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metOfficeWarnings as $warning)
                                    @include('weather.warning-card', ['warning' => $warning])
                                @endforeach
                                @foreach ($yrNoWarnings as $warning)
                                    @include('weather.warning-card', ['warning' => $warning])
                                @endforeach
                                @foreach ($marineWarnings as $warning)
                                    @include('weather.warning-card', ['warning' => $warning])
                                @endforeach
                                @foreach ($floodWarnings as $warning)
                                    @include('weather.warning-card', ['warning' => $warning])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ferry Status -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ferry Status</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Route</th>
                                    <th>Description</th>
                                    <th>Severity</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ferryStatuses as $status)
                                    <tr>
                                        <td>{{ $status['route'] }}</td>
                                        <td>{{ $status['description'] }}</td>
                                        <td>
                                            <span class="badge {{ $status['severity'] == 'Amber' ? 'bg-warning' : ($status['severity'] == 'Red' ? 'bg-danger' : ($status['severity'] == 'Yellow' ? 'bg-info' : 'bg-success')) }} rounded-pill">
                                                {{ $status['severity'] }}
                                            </span>
                                        </td>
                                        <td>{{ $status['time'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Travel Warnings -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Travel Warnings</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($busWarnings as $warning)
                                    <tr>
                                        <td>{{ $warning['type'] }}</td>
                                        <td>{{ $warning['description'] }}</td>
                                        <td>{{ $warning['time'] }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($trainWarnings as $warning)
                                    <tr>
                                        <td>{{ $warning['type'] }}</td>
                                        <td>{{ $warning['description'] }}</td>
                                        <td>{{ $warning['time'] }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($roadWarnings as $warning)
                                    <tr>
                                        <td>{{ $warning['type'] }}</td>
                                        <td>{{ $warning['description'] }}</td>
                                        <td>{{ $warning['time'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Utility Faults -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Utility Faults</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($powerFaults as $fault)
                                    <tr>
                                        <td>{{ $fault['type'] }}</td>
                                        <td>{{ $fault['description'] }}</td>
                                        <td>{{ $fault['status'] }}</td>
                                        <td>{{ $fault['time'] }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($waterFaults as $fault)
                                    <tr>
                                        <td>{{ $fault['type'] }}</td>
                                        <td>{{ $fault['description'] }}</td>
                                        <td>{{ $fault['status'] }}</td>
                                        <td>{{ $fault['time'] }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($phoneFaults as $fault)
                                    <tr>
                                        <td>{{ $fault['type'] }}</td>
                                        <td>{{ $fault['description'] }}</td>
                                        <td>{{ $fault['status'] }}</td>
                                        <td>{{ $fault['time'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection