@extends('layouts.vertical', ['title' => ' Apex Candlestick Charts'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Apex', 'title' => 'Candlestick Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Simple Candlestick Chart</h4>
                    <div dir="ltr">
                        <div id="simple-candlestick" class="apex-charts" data-colors="#0acf97,#fa5c7c"></div>
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
                    <h4 class="header-title">Combo Candlestick Chart</h4>
                    <div dir="ltr">
                        <div id="combo-candlestick" class="apex-charts" data-colors="#0acf97,#fa5c7c"></div>
                        <div id="combo-bar-candlestick" class="apex-charts" data-colors="#727cf5,#ffbc00"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Category X-Axis</h4>
                    <div dir="ltr">
                        <div id="x-axis-candlestick" class="apex-charts" data-colors="#0acf97,#fa5c7c,#727cf5"></div>
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
                    <h4 class="header-title mb-3">Candlestick with Line</h4>
                    <div dir="ltr">
                        <div id="candlestick-with-line" class="apex-charts" data-colors="#727cf5,#0acf97,#fa5c7c"></div>
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
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.8.17/dayjs.min.js"></script>
    @vite(['resources/js/pages/chart-apex-candlestick.js'])
@endsection
