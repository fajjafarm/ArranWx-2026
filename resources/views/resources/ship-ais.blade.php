@extends('layouts.vertical', ['title' => 'Ship AIS Map'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => 'Ship AIS Map'])

    <div class="container">
        <h4 class="mb-2">Ships Near Arran</h4> <!-- Reduced margin -->
        @if (isset($error))
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endif
        @if (!empty($mapParams))
            <div id="vesselfinder-map" style="width: {{ $mapParams['width'] }}; height: {{ $mapParams['height'] }}px; margin-top: 0;"></div>
            <script type="text/javascript">
                var width = "{{ $mapParams['width'] }}";
                var height = "{{ $mapParams['height'] }}";
                var latitude = {{ $mapParams['latitude'] }};
                var longitude = {{ $mapParams['longitude'] }};
                var zoom = {{ $mapParams['zoom'] }};
                var names = {{ $mapParams['names'] ? 'true' : 'false' }};
            </script>
            <script type="text/javascript" src="https://www.vesselfinder.com/aismap.js"></script>
        @else
            <p class="text-muted">Map unavailable.</p>
        @endif

        @if (!empty($vesselLinks))
            <h5 class="mt-3">Tracked Vessels</h5>
            <ul class="list-group">
                @foreach ($vesselLinks as $vessel)
                    <li class="list-group-item">
                        <a href="{{ route($vessel['route']) }}">{{ $vessel['name'] }}</a> (IMO: {{ $vessel['imo'] }})
                        <p class="text-muted mb-0">{{ $vessel['status'] }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <h5 class="mt-3">Sources</h5>
        <ul class="list-unstyled">
            <li><a href="https://www.vesselfinder.com/" target="_blank">VesselFinder</a> - Real-time AIS ship tracking</li>
            <li><a href="https://www.calmac.co.uk/" target="_blank">CalMac Ferries</a> - Ship details and schedules</li>
        </ul>
    </div>

    <style>
        #vesselfinder-map { margin-top: 0 !important; }
        .page-title { margin-bottom: 0.5rem !important; } /* Adjust if page-title adds space */
    </style>
@endsection