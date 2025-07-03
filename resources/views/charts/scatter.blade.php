@extends('layouts.vertical', ['title' => ' Apex Scatter Charts'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Apex', 'title' => 'Scatter Charts'])
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Scatter (XY) Chart</h4>
                    <div dir="ltr">
                        <div id="basic-scatter" class="apex-charts" data-colors="#39afd1,#ffbc00,#727cf5"></div>
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
                    <h4 class="header-title">Scatter Chart - Datetime</h4>
                    <div dir="ltr">
                        <div id="datetime-scatter" class="apex-charts"
                            data-colors="#6c757d,#ffbc00,#727cf5,#0acf97,#fa5c7c"></div>
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
                    <h4 class="header-title">Scatter - Images</h4>
                    <div dir="ltr">
                        <div id="scatter-images" class="apex-charts scatter-images-chart" data-colors="#3b5998,#e1306c">
                        </div>
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
    @vite(['resources/js/pages/chart-apex-scatter.js'])
@endsection
