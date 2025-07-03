@extends('layouts.vertical', ['title' => 'Apex BUbble Chart'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Apex', 'title' => ' Bubble Chart'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Simple Bubble Chart</h4>
                    <div dir="ltr">
                        <div id="simple-bubble" class="apex-charts" data-colors="#727cf5,#ffbc00,#fa5c7c"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">3D Bubble Chart</h4>
                    <div dir="ltr">
                        <div id="second-bubble" class="apex-charts" data-colors="#727cf5,#0acf97,#fa5c7c,#39afd1"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('scripts')

    @vite(['resources/js/pages/chart-apex-bubble.js'])
@endsection
