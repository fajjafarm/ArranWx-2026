@extends('layouts.vertical', ['title' => 'Arran Webcams'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => 'Arran Webcams'])

    <div class="container">
        <p>View live webcams from around the Isle of Arran, including ferry terminals, scenic views, and road conditions. Note: Some webcams may require cookies to be enabled, open in a new tab, or update every 15 minutes (road cameras).</p>
        <p>For more road camera details, visit the <a href="{{ $nacRoadCamsLink }}" target="_blank">North Ayrshire Council Road Cams page</a>.</p>

        <div class="row">
            @foreach ($webcams as $webcam)
                <div class="col-md-6 mb-4">
                    <h3>{{ $webcam['title'] }}</h3>
                    <p>Source: {{ $webcam['source'] }}</p>
                    @if ($webcam['type'] === 'iframe')
                        <iframe
                            src="{{ $webcam['url'] }}"
                            width="100%"
                            height="300px"
                            frameborder="0"
                            scrolling="no"
                            allowfullscreen
                            loading="lazy"
                        ></iframe>
                    @elseif ($webcam['type'] === 'image')
                        <img
                            src="{{ $webcam['url'] }}"
                            alt="{{ $webcam['title'] }}"
                            width="100%"
                            style="height: 300px; object-fit: cover;"
                            loading="lazy"
                        >
                        <p class="text-muted small mt-1">Updated every 15 minutes</p>
                    @else
                        <p>This webcam is available on an external site. <a href="{{ $webcam['url'] }}" target="_blank" class="btn btn-primary btn-sm">View Webcam</a></p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection