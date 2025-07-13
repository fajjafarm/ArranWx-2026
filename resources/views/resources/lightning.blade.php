@extends('layouts.vertical', ['title' => 'Lightning Strikes'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Resources', 'title' => 'Lightning Strikes Near Arran'])

    <div class="container">
        <iframe src="{{ $mapUrl }}" width="100%" height="600px" frameborder="0"></iframe>
    </div>
@endsection