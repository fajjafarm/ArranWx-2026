@extends('layouts.vertical', ['title' => 'Planes Near Arran'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => 'Planes Near Arran'])

    <div class="container">
        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width=1200 height=1000 src="https://www.airnavradar.com/?widget=1&z=8&lat=55.59770&lng=-5.43830&showLabels=true&showAirlineLogo=true&showAircraftModel=true&showFn=true&showRoute=true&class=A,B,G,C,M,H,?"></iframe>
    </div>
@endsection