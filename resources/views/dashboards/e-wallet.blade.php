@extends('layouts.vertical', ['title' => 'E-Wallet Dashboard'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')



        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">E-Wallet</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Osen</a></li>

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>

                    <li class="breadcrumb-item active">E-Wallet</li>
                </ol>
            </div>
        </div>




        <div class="row">
            <div class="col-xxl-9">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="d-flex card-header justify-content-between align-items-center">
                                <h4 class="header-title">Total Balance</h4>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle bg-light-subtle rounded drop-arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <h2 class="fw-bold">$92,652.36 <a href="#!" class="text-muted"><i class="ti ti-eye"></i></a></h2>

                                <div class="row g-2 mt-2 pt-1">
                                    <div class="col">
                                        <a href="#!" class="btn btn-primary w-100"><i class="ti ti-coin me-1"></i> Transfer</a>
                                    </div>
                                    <div class="col">
                                        <a href="#!" class="btn btn-info w-100"><i class="ti ti-coin me-1"></i> Request</a>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="row justify-content-between">
                                    <div class="col-sm-5">
                                        <iconify-icon icon="solar:money-bag-bold-duotone" class="fs-36 text-muted"></iconify-icon>
                                        <h3 class="mb-0 fw-bold mt-2 mb-1">$105.3k</h3>
                                        <p class="text-muted">Total Income</p>
                                        <span class="badge fs-12 badge-soft-danger"><i class="ti ti-arrow-badge-down"></i> 0.93%</span>
                                    </div> <!-- end col -->

                                    <div class="col-sm-7 text-end d-flex flex-column">
                                        <a href="javascript:void(0);" class="link-reset text-decoration-underline link-offset-2 fw-medium pb-2">
                                            View Details
                                        </a>
                                        <div class="text-end mt-auto">
                                            <div id="revenue-chart" data-colors="#6ac75a"></div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="row justify-content-between">
                                    <div class="col-sm-5">
                                        <iconify-icon icon="solar:hand-money-bold-duotone" class="fs-36 text-muted"></iconify-icon>
                                        <h3 class="mb-0 fw-bold mt-2 mb-1">$78.32k</h3>
                                        <p class="text-muted">Total Expense</p>
                                        <span class="badge fs-12 badge-soft-success"><i class="ti ti-arrow-badge-up"></i> 8.72%</span>
                                    </div> <!-- end col -->

                                    <div class="col-sm-7 text-end d-flex flex-column">
                                        <a href="javascript:void(0);" class="link-reset text-decoration-underline link-offset-2 fw-medium pb-2">
                                            View Details
                                        </a>
                                        <div class="text-end mt-auto">
                                            <div id="expenses-chart" data-colors="#465dff"></div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center gap-2">
                                <h4 class="header-title me-auto mb-0">Overview</h4>

                                <a href="javascript: void(0);" class="btn btn-soft-primary">
                                    Export <i class="ti ti-file-export ms-1"></i>
                                </a>

                                <div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-deafult-date="Jun to Aug" data-date-format="M Y" data-range-date="true">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="ti ti-calendar fs-15"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="bg-light bg-opacity-50">
                                    <div class="row text-center">
                                        <div class="col-md col-6">
                                            <p class="text-muted mt-3 mb-1">Revenue</p>
                                            <h4 class="mb-3">
                                                <span class="ti ti-square-rounded-arrow-down text-success me-1"></span>
                                                <span class="fw-semibold">$29.5k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md col-6">
                                            <p class="text-muted mt-3 mb-1">Expenses</p>
                                            <h4 class="mb-3">
                                                <span class="ti ti-square-rounded-arrow-up text-danger me-1"></span>
                                                <span class="fw-semibold">$15.07k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md col-6">
                                            <p class="text-muted mt-3 mb-1">Investment</p>
                                            <h4 class="mb-3">
                                                <span class="ti ti-chart-infographic me-1"></span>
                                                <span class="fw-semibold">$3.6k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md col-6">
                                            <p class="text-muted mt-3 mb-1">Savings</p>
                                            <h4 class="mb-3">
                                                <span class="ti ti-pig me-1"></span>
                                                <span class="fw-semibold">$6.9k</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div dir="ltr" class="p-2">
                                    <div id="balance-overview" class="apex-charts" data-colors="#465dff,#6ac75a,#f9c45c"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-xxl-3">
                <div class="row">
                    <div class="col-md-6 col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
                                    <div class="carousel-indicators mb-n2">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="card bg-primary shadow-none rounded-4">
                                                <div class="card-body">
                                                    <span class="float-end text-white-50 display-5 mt-n1"><i class="ti ti-wifi"></i></span>
                                                    <h4 class="text-white">Mr. Dhanoo K</h4>

                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-16 fw-bold">
                                                            <span>1</span>
                                                            <span>0</span>
                                                            <span>0</span>
                                                            <span>1</span>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4 align-items-center">
                                                        <div class="col-4">
                                                            <p class="text-white-50 mb-1">Expiry Date</p>
                                                            <h5 class="text-white my-0">10/32</h5>
                                                        </div>

                                                        <div class="col-4">
                                                            <p class="text-white-50 mb-1">CVV</p>
                                                            <h5 class="text-white my-0">XXX</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="text-end">
                                                                <img src="/images/cards/visa-white.svg" alt="" height="20" class="me-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <h5 class="text-muted">Balance:</h5>
                                                    <h4 class="fs-18">$38562.25 <small class="text-muted">USD</small></h4>
                                                </div>
                                                <a href="javascript:void(0);" class="link-reset text-decoration-underline link-offset-2 fw-semibold pb-2">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card bg-success rounded-4">
                                                <div class="card-body">
                                                    <span class="float-end text-white-50 display-5 mt-n1"><i class="ti ti-wifi"></i></span>
                                                    <h4 class="text-white">Mr. Dhanoo K</h4>

                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-16 fw-bold">
                                                            <span>1</span>
                                                            <span>0</span>
                                                            <span>0</span>
                                                            <span>1</span>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4 align-items-center">
                                                        <div class="col-4">
                                                            <p class="text-white-50 mb-1">Expiry Date</p>
                                                            <h5 class="text-white my-0">10/32</h5>
                                                        </div>

                                                        <div class="col-4">
                                                            <p class="text-white-50 mb-1">CVV</p>
                                                            <h5 class="text-white my-0">000</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="text-end">
                                                                <img src="/images/cards/discover-white.svg" alt="" height="16" class="me-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <h5 class="text-muted">Balance:</h5>
                                                    <h4 class="fs-18">$38562.25 <small class="text-muted">USD</small></h4>
                                                </div>
                                                <a href="javascript:void(0);" class="link-reset text-decoration-underline link-offset-2 fw-semibold pb-2">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card bg-secondary rounded-4">
                                                <div class="card-body">
                                                    <span class="float-end text-white-50 display-5 mt-n1"><i class="ti ti-wifi"></i></span>
                                                    <h4 class="text-white">Mr. Dhanoo K</h4>

                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-10">
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                            <i class="ti ti-circle-filled"></i>
                                                        </div>
                                                        <div class="col-3 text-white fs-16 fw-bold">
                                                            <span>1</span>
                                                            <span>0</span>
                                                            <span>0</span>
                                                            <span>1</span>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4 align-items-center">
                                                        <div class="col-4">
                                                            <p class="text-white-50 mb-1">Expiry Date</p>
                                                            <h5 class="text-white my-0">10/32</h5>
                                                        </div>

                                                        <div class="col-4">
                                                            <p class="text-white-50 mb-1">CVV</p>
                                                            <h5 class="text-white my-0">000</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="text-end">
                                                                <img src="/images/cards/visa-white.svg" alt="" height="20" class="me-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end card-->

                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <h5 class="text-muted">Balance:</h5>
                                                    <h4 class="fs-18">$38562.25 <small class="text-muted">USD</small></h4>
                                                </div>
                                                <a href="javascript:void(0);" class="link-reset text-decoration-underline link-offset-2 fw-semibold pb-2">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header d-flex border-bottom border-dashed align-items-center">
                                <h4 class="header-title me-auto">
                                    Quick Transfer
                                    <i class="ti ti-info-octagon text-muted ms-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="This top tooltip is themed via CSS variables."> </i>
                                </h4>

                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle drop-arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="d-flex gap-1 justify-content-center">
                                    <div class="avatar">
                                        <img src="/images/users/avatar-4.jpg" data-bs-toggle="tooltip" data-bs-title="Alexa Newsome" alt="" class="rounded-circle img-thumbnail avatar-lg">
                                    </div>
                                    <div class="avatar">
                                        <img src="/images/users/avatar-5.jpg" data-bs-toggle="tooltip" data-bs-title="Shelly Dorey" alt="" class="rounded-circle img-thumbnail border-primary avatar-lg">
                                    </div>
                                    <div class="avatar">
                                        <img src="/images/users/avatar-3.jpg" data-bs-toggle="tooltip" data-bs-title="Fredrick Arnett" alt="" class="rounded-circle img-thumbnail avatar-lg">
                                    </div>
                                    <div class="avatar">
                                        <img src="/images/users/avatar-8.jpg" data-bs-toggle="tooltip" data-bs-title="Barbara Frink" alt="" class="rounded-circle img-thumbnail avatar-lg">
                                    </div>
                                    <div class="avatar">
                                        <img src="/images/users/avatar-2.jpg" data-bs-toggle="tooltip" data-bs-title="Adam M" alt="" class="rounded-circle img-thumbnail avatar-lg">
                                    </div>
                                </div>

                                <div class="mt-3 mb-2">
                                    <label for="cardnumber" class="form-label">Card Number</label>
                                    <input type="text" id="cardnumber" class="form-control" value="3658 9857 5820 0039">
                                </div>

                                <div class="mt-3 mb-2">
                                    <label for="enterAmount" class="form-label">Enter Amount</label>
                                    <input type="text" id="enterAmount" class="form-control" value="$963.25">
                                </div>

                                <div class="row g-2 mt-3">
                                    <div class="col">
                                        <a href="#!" class="btn btn-primary w-100">Send Money</a>
                                    </div>
                                    <div class="col">
                                        <a href="#!" class="btn btn-outline-info w-100">Save as Draft</a>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                </div>

            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center gap-2">
                        <h4 class="header-title me-auto">Transactions <span class="text-muted fw-normal fs-14">(95.6k+ Transactions)</span></h4>

                        <div class="search-bar">
                            <input type="text" class="form-control form-control-sm search" placeholder="Search Here...">
                        </div>

                        <div class="w-auto">
                            <select class="form-select form-select-sm">
                                <option selected="">All</option>
                                <option value="0">Paid</option>
                                <option value="1">Cancelled</option>
                                <option value="2">Failed</option>
                                <option value="2">Onhold</option>
                            </select>
                        </div>

                        <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">Export <i class="ti ti-file-export ms-1"></i></a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-hover table-custom table-nowrap align-middle mb-0">
                                <thead class="bg-light bg-opacity-50 thead-sm">
                                    <tr class="text-uppercase fs-12">
                                        <th scope="col" class="text-muted">ID</th>
                                        <th scope="col" class="text-muted">Name / Business</th>
                                        <th scope="col" class="text-muted">Description</th>
                                        <th scope="col" class="text-muted">Amount</th>
                                        <th scope="col" class="text-muted">Timestamp</th>
                                        <th scope="col" class="text-muted">Type</th>
                                        <th scope="col" class="text-muted">Payment Method</th>
                                        <th scope="col" class="text-muted">Status</th>
                                        <th scope="col" class="text-muted">•••</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK801</a>
                                        </td>
                                        <td>
                                            <div class="avatar-xs d-inline-block me-1">
                                                <span class="avatar-title bg-primary-subtle text-primary fw-semibold rounded-circle">
                                                    A
                                                </span>
                                            </div>
                                            <a href="#!" class="text-reset">Adam M</a>
                                        </td>
                                        <td>Licensing Revenue</td>
                                        <td class="text-success">USD $750.00</td>
                                        <td>20 Apr,24 <small class="text-muted">10:31:23 am</small></td>
                                        <td>Credit</td>
                                        <td>
                                            <img src="/images/cards/mastercard.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">*3954</span>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK800</a>
                                        </td>
                                        <td><img src="/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                            <a href="#javascript: void(0);" class="text-reset align-middle">Alexa Newsome</a>
                                        </td>
                                        <td>Invoice #1908</td>
                                        <td class="text-danger">-AUD $90.99</td>
                                        <td>18 Apr,24 <small class="text-muted">06:22:09 pm</small></td>
                                        <td>Debit</td>
                                        <td>
                                            <img src="/images/cards/visa.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">*9003</span>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK799</a>
                                        </td>
                                        <td>
                                            <img src="/images/cards/payoneer.svg" alt="" height="24" class="me-1">
                                            <a href="#!" class="text-reset align-middle">Payoneer</a>
                                        </td>
                                        <td>Client Payment</td>
                                        <td class="text-success">CAD $190.00</td>
                                        <td>17 Apr,24 <small class="text-muted">09:17:05 am</small></td>
                                        <td>Credit</td>
                                        <td>
                                            <img src="/images/cards/mastercard.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">*3954</span>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK798</a>
                                        </td>
                                        <td>
                                            <img src="/images/cards/payoneer.svg" alt="" height="24" class="me-1">
                                            <a href="#!" class="text-reset align-middle">Payoneer</a>
                                        </td>
                                        <td>Client Payment</td>
                                        <td>CAD $190.00</td>
                                        <td>17 Apr,24 <small class="text-muted">09:15:25 am</small></td>
                                        <td>-</td>
                                        <td>
                                            <img src="/images/cards/unionpay.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">*8751</span>
                                        </td>
                                        <td><span class="badge bg-danger-subtle text-danger p-1">Failed</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK797</a>
                                        </td>
                                        <td>
                                            <div class="avatar-xs d-inline-block me-1">
                                                <span class="avatar-title bg-secondary-subtle text-secondary fw-semibold rounded-circle">
                                                    S
                                                </span>
                                            </div>
                                            <a href="#!" class="text-reset">Shelly Dorey</a>
                                        </td>
                                        <td>Custom Software Development</td>
                                        <td class="text-success">USD $500.00</td>
                                        <td>16 Apr,24 <small class="text-muted">05:09:58 pm</small></td>
                                        <td>Credit</td>
                                        <td>
                                            <img src="/images/cards/paypal.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">PayPal</span>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK796</a>
                                        </td>
                                        <td><img src="/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                            <a href="#javascript: void(0);" class="text-reset align-middle">Fredrick Arnett</a>
                                        </td>
                                        <td>Envato Payout - Collaboration</td>
                                        <td>USD $1250.95</td>
                                        <td>16 Apr,24 <small class="text-muted">10:21:25 am</small></td>
                                        <td>-</td>
                                        <td>
                                            <img src="/images/cards/stripe.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">Stripe</span>
                                        </td>
                                        <td><span class="badge bg-warning-subtle text-warning p-1">Onhold</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#!" class="fw-medium text-reset">#DK795</a>
                                        </td>
                                        <td><img src="/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                            <a href="#javascript: void(0);" class="text-reset align-middle">Barbara Frink</a>
                                        </td>
                                        <td>Personal Payment</td>
                                        <td class="text-danger">-AUD $90.99</td>
                                        <td>12 Apr,24 <small class="text-muted">06:22:09 pm</small></td>
                                        <td>Debit</td>
                                        <td>
                                            <img src="/images/cards/visa.svg" alt="" height="24" class="me-1">
                                            <span class="align-middle">*9003</span>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-1">Success</span></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                        </td>
                                    </tr>

                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div> <!-- End Card-body -->
                    <div class="card-footer border-top border-light">
                        <div class="align-items-center justify-content-between row text-center text-sm-start">
                            <div class="col-sm">
                                <div class="text-muted">
                                    Showing <span class="fw-semibold text-body"> 7 </span> of <span class="fw-semibold"> 15 </span> Transactions
                                </div>
                            </div>
                            <div class="col-sm-auto mt-3 mt-sm-0">
                                <ul class="pagination pagination-boxed pagination-sm mb-0 justify-content-center">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link"><i class="ti ti-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link"><i class="ti ti-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

@endsection

@section('scripts')
    @vite(['resources/js/stock-price.js'])
    @vite(['resources/js/github-data.js'])
    @vite(['resources/js/irregular-data-series.js'])
    @vite(['resources/js/pages/dashboard-wallet.js'])


@endsection
