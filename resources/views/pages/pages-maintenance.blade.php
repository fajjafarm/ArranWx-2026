<!DOCTYPE html>
<html data-layout="topnav">

<head>
    @include('layouts.partials.title-meta', ['title' => 'Maintenance Page'])

    @include('layouts.partials.head-css')
</head>

<body class="h-100">

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">

                    <a href="/" class="auth-brand mb-3">
                        <img src="/images/logo-dark.png" alt="dark logo" height="24" class="logo-dark">
                        <img src="/images/logo.png" alt="logo light" height="24" class="logo-light">
                    </a>

                    <div>
                        <h3 class="fw-semibold text-dark">Ooop's ! </h3>
                    </div>

                    <img src="/images/png/maintenance.png" alt="" class="img-fluid mt-3" height="320">

                    <h5 class="fw-bold my-3 fs-20 text-dark lh-base">We are Under Scheduled Maintenance</h5>

                    <a href="{{ route('second', ['dashboards', 'index']) }}" class="btn btn-primary">Back To Home <i
                            class="ti ti-home ms-1"></i></a>

                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer-scripts')

</body>

</html>
