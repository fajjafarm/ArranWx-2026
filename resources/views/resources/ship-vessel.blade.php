@extends('layouts.vertical', ['title' => $vesselName])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => $vesselName])

    <div class="container">
        <h4 class="mb-2">{{ $vesselName }} Tracking</h4> <!-- Reduced margin -->
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
                var imo = "{{ $mapParams['imo'] }}";
                var show_track = {{ $mapParams['show_track'] ? 'true' : 'false' }};
            </script>
            <script type="text/javascript" src="https://www.vesselfinder.com/aismap.js"></script>
            @if (isset($vesselStatus))
                <p class="text-muted mt-2">{{ $vesselStatus }}</p>
            @endif
        @else
            <p class="text-muted">Map unavailable.</p>
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