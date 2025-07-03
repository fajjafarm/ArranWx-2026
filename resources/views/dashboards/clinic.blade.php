@extends('layouts.vertical',['title' => 'Clinic'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Welcome back, Dr. Gulati 👋</h4>
            </div>
            <div class="mt-3 mt-sm-0">
                <form action="javascript:void(0);">
                    <div class="row g-2 mb-0 align-items-center">
                        <div class="col-auto">
                            <a href="javascript: void(0);" class="btn btn-success">
                                <i class="ti ti-sort-ascending me-1"></i> Add Appointment
                            </a>
                        </div>
                        <!--end col-->
                        <div class="col-sm-auto">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow" data-provider="flatpickr" data-deafult-date="01 May to 31 May" data-date-format="d M" data-range-date="true">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="ti ti-calendar fs-15"></i>
                                </span>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div><!-- end card header -->
    </div>
    <!--end col-->
</div>

<div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Appointments</h5>
                <div class="d-flex align-items-center gap-2 my-3">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                            <i class="ti ti-calendar-week"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 fw-bold">185 <span class="badge text-bg-success fw-medium ms-2 fs-12">Today</span></h3>
                </div>
                <p class="mb-1">
                    <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                    <span class="text-nowrap text-muted">New Appointments</span>
                    <span class="float-end"><b>125</b></span>
                </p>
                <p class="mb-0">
                    <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                    <span class="text-nowrap text-muted">Total Appointments</span>
                    <span class="float-end"><b>89.5k</b></span>
                </p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col">
        <div class="card">
            <div class="card-body">
                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total Patients</h5>
                <div class="d-flex align-items-center gap-2 my-3">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                            <i class="ti ti-users"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 fw-bold">75.6K</h3>
                </div>
                <p class="mb-1">
                    <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                    <span class="text-nowrap text-muted">New Patients</span>
                    <span class="float-end"><b>61</b></span>
                </p>
                <p class="mb-0">
                    <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                    <span class="text-nowrap text-muted">Old Patients</span>
                    <span class="float-end"><b>75.5K</b></span>
                </p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col">
        <div class="card">
            <div class="card-body">
                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Overall Rooms</h5>
                <div class="d-flex align-items-center gap-2 my-3">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                            <i class="ti ti-hospital-circle"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 fw-bold">195 <span class="badge text-bg-success fw-medium ms-2 fs-12">14 Rooms available</span></h3>
                </div>
                <p class="mb-1">
                    <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                    <span class="text-nowrap text-muted">General Rooms</span>
                    <span class="float-end"><b>136</b></span>
                </p>
                <p class="mb-0">
                    <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                    <span class="text-nowrap text-muted">Private Rooms</span>
                    <span class="float-end"><b>59</b></span>
                </p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col">
        <div class="card">
            <div class="card-body">
                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Doctors on Duty</h5>
                <div class="d-flex align-items-center gap-2 my-3">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                            <i class="ti ti-stethoscope"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 fw-bold">87</h3>
                </div>
                <p class="mb-1">
                    <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                    <span class="text-nowrap text-muted">Available Doctors</span>
                    <span class="float-end"><b>80</b></span>
                </p>
                <p class="mb-0">
                    <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                    <span class="text-nowrap text-muted">On Leave</span>
                    <span class="float-end"><b>07</b></span>
                </p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg col-auto">
        <div class="card">
            <div class="card-body">
                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Treatments</h5>
                <div class="d-flex align-items-center gap-2 my-3">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                            <i class="ti ti-health-recognition"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 fw-bold">99.87K</h3>
                </div>
                <p class="mb-1">
                    <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                    <span class="text-nowrap text-muted">Operations</span>
                    <span class="float-end"><b>20.69k</b></span>
                </p>
                <p class="mb-0">
                    <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                    <span class="text-nowrap text-muted">General</span>
                    <span class="float-end"><b>79.18k</b></span>
                </p>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center border-bottom border-dashed">
                <h4 class="header-title">My Calendar</h4>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle drop-arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <input type="text" class="form-control d-none" data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true">

                <div class="text-center mt-2">
                    <a href="#" class="btn btn-sm btn-primary">Schedule a Metting <i class="ti ti-arrow-right ms-1"></i></a>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-lg-8">
        <div class="card card-h-100">

            <div class="card-header d-flex flex-wrap border-bottom border-dashed align-items-center gap-3">
                <h4 class="header-title me-auto">Patients Statistics <span class="text-muted fw-normal fs-14">(609.5k Patients)</span></h4>

                <div class="d-flex flex-wrap gap-1">
                    <button type="button" class="btn btn-light btn-sm">
                        All
                    </button>
                    <button type="button" class="btn btn-light active btn-sm">
                        1M
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                        6M
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                        1Y
                    </button>
                </div>
            </div>

            <div class="card-body pt-1">
                <div dir="ltr">
                    <div id="sessions-overview-users" class="apex-charts" data-colors="#465dff,#783bff"></div>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

<div class="row">
    <div class="col-xxl-8">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center border-bottom border-dashed">
                <h4 class="header-title">Top Doctors <i class="ti ti-info-octagon text-muted ms-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Based on user reviews and popularity."> </i></h4>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle drop-arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row align-items-center g-3">
                    <div class="col-xxl-4 col-md-6">
                        <div class="bg-light bg-opacity-50 rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/images/users/doctors/dr-one.jpg" alt="user-image" class="me-1 avatar-xl rounded-circle">
                                <div>
                                    <h4>Dr. Master Gulati</h4>
                                    <p class="text-muted">Dental Specialist</p>
                                    <p class="m-0 fs-14"><i class="ti ti-star-filled text-warning"></i> 5.0 &bull; <a href="#!" class="link-reset fw-medium">580+ Reviews <i class="ti ti-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="bg-light bg-opacity-50 rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/images/users/doctors/dr-four.jpg" alt="user-image" class="me-1 avatar-xl rounded-circle">
                                <div>
                                    <h4>Dr. David Wilson</h4>
                                    <p class="text-muted">Ophthalmologist</p>
                                    <p class="m-0 fs-14"><i class="ti ti-star-filled text-warning"></i> 4.3 &bull; <a href="#!" class="link-reset fw-medium">295+ Reviews <i class="ti ti-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="bg-light bg-opacity-50 rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/images/users/doctors/dr-two.jpg" alt="user-image" class="me-1 avatar-xl rounded-circle">
                                <div>
                                    <h4>Dr. Robert Brown</h4>
                                    <p class="text-muted">General Specialist</p>
                                    <p class="m-0 fs-14"><i class="ti ti-star-filled text-warning"></i> 5.0 &bull; <a href="#!" class="link-reset fw-medium">405+ Reviews <i class="ti ti-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="bg-light bg-opacity-50 rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/images/users/doctors/dr-five.jpg" alt="user-image" class="me-1 avatar-xl rounded-circle">
                                <div>
                                    <h4>Dr. Michael Johnson</h4>
                                    <p class="text-muted">Neurologist</p>
                                    <p class="m-0 fs-14"><i class="ti ti-star-filled text-warning"></i> 4.1 &bull; <a href="#!" class="link-reset fw-medium">120+ Reviews <i class="ti ti-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="bg-light bg-opacity-50 rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/images/users/doctors/dr-three.jpg" alt="user-image" class="me-1 avatar-xl rounded-circle">
                                <div>
                                    <h4>Dr. Emily Davis</h4>
                                    <p class="text-muted">Pediatrician</p>
                                    <p class="m-0 fs-14"><i class="ti ti-star-filled text-warning"></i> 5.0 &bull; <a href="#!" class="link-reset fw-medium">385+ Reviews <i class="ti ti-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="bg-light bg-opacity-50 rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/images/users/doctors/dr-six.jpg" alt="user-image" class="me-1 avatar-xl rounded-circle">
                                <div>
                                    <h4>Dr. Alice Smith</h4>
                                    <p class="text-muted">Cardiologist</p>
                                    <p class="m-0 fs-14"><i class="ti ti-star-filled text-warning"></i> 4.0 &bull; <a href="#!" class="link-reset fw-medium">92+ Reviews <i class="ti ti-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="#" class="btn btn-sm btn-secondary">See All Doctors <i class="ti ti-arrow-right ms-1"></i></a>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xxl-4">
        <div class="card">
            <div class="d-flex card-header justify-content-between border-bottom border-dashed align-items-center">
                <h4 class="header-title">Gender</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">Generate Report <i class="ti ti-file-export ms-1"></i></a>
            </div>

            <div class="card-body">
                <div id="gender-chart" class="apex-charts" data-colors="#465dff,#6ac75a,#67baf1"></div>

                <div class="row mt-3">
                    <div class="col-sm-4 text-start">
                        <p class="text-muted mb-1">Male Patient</p>
                        <h4 class="mb-2">
                            <span class="ti ti-man text-primary"></span>
                            <span>159.5k</span>
                        </h4>
                        <span class="badge fs-12 badge-soft-danger"><i class="ti ti-arrow-badge-down"></i> 3.91%</span>
                    </div>
                    <div class="col-sm-4 text-center">
                        <p class="text-muted mb-1">Female Patient</p>
                        <h4 class="mb-2">
                            <span class="ti ti-woman text-success"></span>
                            <span>148.56k</span>
                        </h4>
                        <span class="badge fs-12 badge-soft-success"><i class="ti ti-arrow-badge-up"></i> 8.72%</span>
                    </div>
                    <div class="col-sm-4 text-end">
                        <p class="text-muted mb-1">Child Patient</p>
                        <h4 class="mb-2">
                            <span class="ti ti-baby-carriage text-info"></span>
                            <span>45.2k</span>
                        </h4>
                        <span class="badge fs-12 badge-soft-success"><i class="ti ti-arrow-badge-up"></i> 1.05%</span>
                    </div>
                </div>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">All Appointments</h4>
                <a href="#" class="btn btn-sm btn-secondary">Add New <i class="ti ti-plus ms-1"></i></a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap table-custom table-centered m-0">
                        <thead class="bg-light bg-opacity-50 thead-sm">
                            <tr class="text-uppercase fs-12">
                                <th class="text-muted">Queue #</th>
                                <th class="text-muted">Name</th>
                                <th class="text-muted">Gender</th>
                                <th class="text-muted">Age</th>
                                <th class="text-muted">Appointment</th>
                                <th class="text-muted">Date / Time</th>
                                <th class="text-muted">Assign Dr.</th>
                                <th class="text-muted">Status</th>
                                <th class="text-muted">•••</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#29</td>
                                <td><a href="#" class="link-reset fw-medium">John Anderson</a></td>
                                <td>Male</td>
                                <td>38</td>
                                <td>
                                    General Checkup
                                </td>
                                <td>29 Jun, 2024 <small class="text-muted">11:15 AM</small></td>
                                <td><img src="/images/users/doctors/dr-three.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Emily Davis</a>
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Completed</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>#30</td>
                                <td><a href="#" class="link-reset fw-medium">Jane Smith</a></td>
                                <td>Female</td>
                                <td>45</td>
                                <td>
                                    Annual Physical
                                </td>
                                <td>10 Aug, 2024 <small class="text-muted">09:30 AM</small></td>
                                <td><img src="/images/users/doctors/dr-one.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Alex Johnson</a>
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Completed</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>#31</td>
                                <td><a href="#" class="link-reset fw-medium">Mark Brown</a></td>
                                <td>Male</td>
                                <td>52</td>
                                <td>
                                    Follow-up
                                </td>
                                <td>11 Aug, 2024 <small class="text-muted">10:00 AM</small></td>
                                <td><img src="/images/users/doctors/dr-two.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Laura Thompson</a>
                                </td>
                                <td><span class="badge bg-danger-subtle text-danger p-1">Canceled</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>#32</td>
                                <td><a href="#" class="link-reset fw-medium">Lisa White</a></td>
                                <td>Female</td>
                                <td>34</td>
                                <td>
                                    Consultation
                                </td>
                                <td>12 Aug, 2024 <small class="text-muted">11:45 AM</small></td>
                                <td><img src="/images/users/doctors/dr-three.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Emily Davis</a>
                                </td>
                                <td><span class="badge bg-warning-subtle text-warning p-1">Scheduled</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>#33</td>
                                <td><a href="#" class="link-reset fw-medium">Tom Clark</a></td>
                                <td>Male</td>
                                <td>29</td>
                                <td>
                                    Dental Checkup
                                </td>
                                <td>13 Aug, 2024 <small class="text-muted">08:00 AM</small></td>
                                <td><img src="/images/users/doctors/dr-four.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Michael Brown</a>
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Completed</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>#34</td>
                                <td><a href="#" class="link-reset fw-medium">Susan Green</a></td>
                                <td>Female</td>
                                <td>40</td>
                                <td>
                                    Wellness Visit
                                </td>
                                <td>14 Aug, 2024 <small class="text-muted">10:30 AM</small></td>
                                <td><img src="/images/users/doctors/dr-five.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Sarah Lee</a>
                                </td>
                                <td><span class="badge bg-danger-subtle text-danger p-1">Canceled</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>#35</td>
                                <td><a href="#" class="link-reset fw-medium">Robert Walker</a></td>
                                <td>Male</td>
                                <td>55</td>
                                <td>
                                    Eye Exam
                                </td>
                                <td>15 Aug, 2024 <small class="text-muted">09:00 AM</small></td>
                                <td><img src="/images/users/doctors/dr-six.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                    <a href="#javascript: void(0);" class="link-reset fw-medium">Dr. Anna Martinez</a>
                                </td>
                                <td><span class="badge bg-success-subtle text-success p-1">Completed</span></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-muted fs-20"> <i class="ti ti-edit"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="align-items-center justify-content-between row text-center text-sm-start">
                        <div class="col-sm">
                            <div class="text-muted">
                                Showing <span class="fw-semibold">7</span> of <span class="fw-semibold">1,243</span> Results
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
                    </div> <!-- -->
                </div>
            </div>
        </div>
    </div>
</div>








@endsection

@section('scripts')
    @vite(['resources/js/pages/dashboard-clinic.js'])
@endsection







