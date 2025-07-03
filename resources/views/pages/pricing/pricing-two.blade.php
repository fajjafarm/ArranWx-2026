@extends('layouts.vertical', ['title' => 'Pricing Two'])


@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pricing', 'title' => 'Pricing Two'])
    <div class="row justify-content-center">
        <div class="col-xxl-9">

            <!-- Pricing Title-->
            <div class="text-center">
                <h3 class="mb-2">Our Plans and Pricing</h3>
                <p class="text-muted w-50 m-auto">
                    We have plans and prices that fit your business perfectly. Make your client site a
                    success with our products.
                </p>
            </div>

            <div class="row mt-sm-5 align-items-end justify-content-center mt-3 mb-3">
                <div class="col-lg-4">
                    <div class="card card-pricing h-100">
                        <div class="card-header p-3 border-bottom border-dashed">
                            <h3 class=" fw-semibold">Solo Plan</h3>
                            <h5 class="mt-2 mb-0 fw-normal text-muted">Tailored for individual professionals and
                                hobbyists.</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted fs-3 fw-bold">$</span>
                                <h1 class="display-5  fw-bold mb-0"> 229</h1>
                                <div class="d-block">
                                    <p class=" fw-semibold fs-5 mb-0">One-time payment</p>
                                    <p class="text-muted fw-semibold fs-5 mb-0">plus local taxes</p>
                                </div>
                            </div>
                            <h4 class="text-primary fw-semibold my-3">What's Included :</h4>
                            <ul class="d-flex flex-column gap-2 list-unstyled fs-16 fw-medium">
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Single user license
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Access to all components
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Lifetime access
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Unlimited projects
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Customer support
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Free updates
                                </li>

                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#!" class="btn btn-outline-primary w-100">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-pricing h-100">
                        <div class="card-header p-3 border-bottom border-dashed">
                            <h3 class=" fw-semibold">Startup Plan</h3>
                            <h5 class="mt-2 mb-0 text-muted fw-normal">Best suited for experienced developers and
                                small teams.</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted fs-3 fw-bold">$</span>
                                <h1 class="display-5  fw-bold mb-0"> 399</h1>
                                <div class="d-block">
                                    <p class=" fw-semibold fs-5 mb-0">One-time payment</p>
                                    <p class="text-muted fw-semibold fs-5 mb-0">plus local taxes</p>
                                </div>
                            </div>
                            <h4 class="text-primary fw-semibold my-3">What's Included :</h4>
                            <ul class="d-flex flex-column gap-2 list-unstyled fs-16 fw-medium">
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    5 user license
                                </li>

                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Access to all components
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Lifetime access
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Unlimited projects
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Priority tech support
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Customer support
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Free updates
                                </li>

                            </ul>
                        </div>

                        <div class="card-footer">
                            <a href="#!" class="btn btn-primary  w-100">Buy Now</a>
                        </div>

                        <span
                            class="position-absolute top-0 translate-middle start-50 bg-primary-subtle px-3 py-1 text-primary rounded-pill fw-semibold">
                            Most Popular
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-pricing h-100">
                        <div class="card-header p-3 border-bottom border-dashed">
                            <h3 class=" fw-semibold">Organization Plan</h3>
                            <h5 class="mt-2 mb-0 text-muted fw-normal">Ideal for large teams and organization</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted fs-3 fw-bold">$</span>
                                <h1 class="display-5  fw-bold mb-0"> 799</h1>
                                <div class="d-block">
                                    <p class=" fw-semibold fs-5 mb-0">One-time payment</p>
                                    <p class="text-muted fw-semibold fs-5 mb-0">plus local taxes</p>
                                </div>
                            </div>
                            <h4 class="text-primary fw-semibold my-3">What's Included :</h4>
                            <ul class="d-flex flex-column gap-2 list-unstyled fs-16 fw-medium">
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    25 user license
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Access to all components
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Lifetime access
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Unlimited projects
                                </li>

                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Customer support
                                </li>
                                <li>
                                    <i class="ti ti-checks text-primary fs-4 align-middle me-1"></i>
                                    Free updates
                                </li>

                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#!" class="btn btn-outline-primary  w-100">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@endsection
