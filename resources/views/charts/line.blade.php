@extends('layouts.vertical', ['title' => ' Apex Line Charts'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Apex', 'title' => 'Line Charts'])
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Simple line chart</h4>
                    <div dir="ltr">
                        <div id="line-chart" class="apex-charts" data-colors="#ffbc00"></div>
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
                    <h4 class="header-title mb-4">Line with Data Labels</h4>
                    <div dir="ltr">
                        <div id="line-chart-datalabel" class="apex-charts" data-colors="#6c757d,#727cf5"></div>
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
                    <h4 class="header-title mb-4">Zoomable Timeseries</h4>
                    <div dir="ltr">
                        <div id="line-chart-zoomable" class="apex-charts" data-colors="#fa5c7c"></div>
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
                    <h4 class="header-title mb-4">Line Chart with Annotations</h4>
                    <div dir="ltr">
                        <div id="line-chart-annotations" class="apex-charts" data-colors="#39afd1"></div>
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
                    <h4 class="header-title mb-4">Syncing charts</h4>
                    <div id="line-chart-syncing2" data-colors="#727cf5"></div>
                    <div dir="ltr">
                        <div id="line-chart-syncing" class="apex-charts" data-colors="#6c757d"></div>
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
                    <h4 class="header-title mb-4">Gradient Line Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-gradient" class="apex-charts"></div>
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
                    <h4 class="header-title mb-4">Missing / Null values</h4>
                    <div dir="ltr">
                        <div id="line-chart-missing" class="apex-charts" data-colors="#ffbc00,#0acf97,#39afd1"></div>
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
                    <h4 class="header-title mb-4">Dashed Line Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-dashed" class="apex-charts" data-colors="#6c757d,#0acf97,#39afd1"></div>
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
                    <h4 class="header-title mb-3">Stepline Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-stepline" class="apex-charts" data-colors="#0acf97"></div>
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
                    <h4 class="header-title">Brush Chart</h4>
                    <div dir="ltr">
                        <div id="chart-line2" class="apex-charts" data-colors="#727cf5"></div>
                        <div id="chart-line" class="apex-charts" data-colors="#39afd1"></div>
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
                    <h4 class="header-title">Realtime Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-realtime" class="apex-charts" data-colors="#39afd1"></div>
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
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    @vite(['resources/js/pages/chart-apex-line.js'])
@endsection
