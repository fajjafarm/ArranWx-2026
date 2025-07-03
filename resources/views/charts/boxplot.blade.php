@extends('layouts.vertical', ['title' => ' Apex Boxplot Charts'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Apex', 'title' => 'Boxplot Charts'])
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Basic Boxplot</h4>
                    <div dir="ltr">
                        <div id="basic-boxplot" class="apex-charts" data-colors="#727cf5,#0acf97"></div>
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
                    <h4 class="header-title mb-4">Scatter Boxplot </h4>
                    <div dir="ltr">
                        <div id="scatter-boxplot" class="apex-charts" data-colors="#fa5c7c,#6c757d"></div>
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
                    <h4 class="header-title mb-4">Horizontal BoxPlot</h4>
                    <div dir="ltr">
                        <div id="horizontal-boxplot" class="apex-charts" data-colors="#727cf5,#0acf97,#e3eaef"></div>
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
    @vite(['resources/js/pages/chart-apex-boxplot.js'])
@endsection
