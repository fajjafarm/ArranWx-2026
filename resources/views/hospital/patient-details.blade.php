@extends('layouts.vertical', ['title' => 'Patient Details'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Patient Details'])

    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-2">
                        <img src="/images/users/avatar-5.jpg" alt=""
                            class="avatar-xl rounded-circle border border-light border-2">
                        <div>
                            <h4 class="text-dark fw-medium">Ernest J. Johnson</h4>
                            <p class="mb-0 text-muted">ID: PS49201</p>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-success px-2 py-1 fs-12">Active</span>
                        </div>

                    </div>
                    <div class="mt-3">
                        <h4 class="fs-15">Contact Details :</h4>
                        <div class="mt-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:point-on-map-bold-duotone"
                                        class="fs-20 text-primary"></iconify-icon>
                                </div>
                                <p class="mb-0 text-dark">2713 Frum Street Nashville, TN 37207</p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:smartphone-2-bold-duotone"
                                        class="fs-20 text-primary"></iconify-icon>
                                </div>
                                <p class="mb-0 text-dark">+ (901) 234.5678</p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:letter-bold-duotone"
                                        class="fs-20 text-primary"></iconify-icon>
                                </div>
                                <p class="mb-0 text-dark">2713 Frum Street Nashville, TN 37207</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h4 class="fs-15">Diagnosis Details :</h4>
                        <p class="mb-0 text-muted fs-14 mt-2">Hypertonic disease. Persistent atrial fibrillation. Chronic
                            heart failure</p>
                    </div>
                    <div class="mt-3">
                        <h4 class="fs-15">Treatment :</h4>
                        <div class="row mt-1 g-2">
                            <div class="col-lg-4 col-6">
                                <h4 class="fw-medium mb-0">10 G</h4>
                                <p class="mb-0 text-muted lh-lg">Dopamine</p>
                            </div>
                            <div class="col-lg-4 col-6">
                                <h4 class="fw-medium mb-0">5-8 G</h4>
                                <p class="mb-0 text-muted lh-lg">Salt Restriction/day</p>
                            </div>
                            <div class="col-lg-4 col-6">
                                <h4 class="fw-medium mb-0">1.5-2 L</h4>
                                <p class="mb-0 text-muted lh-lg">Fluid Restriction/day</p>
                            </div>
                            <div class="col-lg-4 col-6">
                                <h4 class="fw-medium mb-0">90MM</h4>
                                <p class="mb-0 text-muted lh-lg">Nitroglycerin for BP</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Open Chat</a>
                    <a href="#!" class="btn btn-light w-100">Call Patient</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-block">
                            <h4 class="card-title mb-0">Check Up File</h4>
                        </div>
                        <div class="ms-auto">
                            <a href="#!" class="btn btn-soft-primary btn-sm">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed">
                        <div class="avatar avatar-lg  d-flex align-items-center justify-content-center rounded-circle">
                            <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                        </div>
                        <div class="d-block">
                            <a href="#!" class="text-dark fw-medium">Agreement Meditation.zip</a>
                            <p class="text-muted mb-0 fs-13">23.2 MB</p>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle drop-arrow-none card-drop p-0"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed mt-2">
                        <div class="avatar avatar-lg  d-flex align-items-center justify-content-center rounded-circle">
                            <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                        </div>
                        <div class="d-block">
                            <a href="#!" class="text-dark fw-medium">Lab Results Document</a>
                            <p class="text-muted mb-0 fs-13">2.7 MB</p>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle drop-arrow-none card-drop p-0"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed mt-2">
                        <div class="avatar avatar-lg  d-flex align-items-center justify-content-center rounded-circle">
                            <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                        </div>
                        <div class="d-block">
                            <a href="#!" class="text-dark fw-medium">ECG Report (2 Page)</a>
                            <p class="text-muted mb-0 fs-13">6.7 MB</p>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle drop-arrow-none card-drop p-0"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed mt-2">
                        <div class="avatar avatar-lg  d-flex align-items-center justify-content-center rounded-circle">
                            <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                        </div>
                        <div class="d-block">
                            <a href="#!" class="text-dark fw-medium">Cardio-report.pdf</a>
                            <p class="text-muted mb-0 fs-13">4.7 MB</p>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle drop-arrow-none card-drop p-0"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed mt-2">
                        <div class="avatar avatar-lg  d-flex align-items-center justify-content-center rounded-circle">
                            <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                        </div>
                        <div class="d-block">
                            <a href="#!" class="text-dark fw-medium">Cardiology-invoice</a>
                            <p class="text-muted mb-0 fs-13">1.2 MB</p>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle drop-arrow-none card-drop p-0"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-dashed">
                    <h4 class="card-title mb-0">Water</h4>
                    <div>
                        <p class="mb-0 fs-15 text-dark fw-medium">Goal: 15/56</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-progress rounded">
                        <div class="progress-info d-flex justify-content-between align-items-center">
                            <div>
                                <span class="align-middle fw-medium fs-16">Cups Tracked</span>
                            </div>
                            <span class="fw-medium text-muted float-end">56</span>
                        </div>
                        <div class="progress-data rounded bg-primary" style="width: 15%;"></div>
                    </div>
                    <div id="booked-revenue-chart" data-colors="#465dff" class="mt-5"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Patient Information</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col-6 border-end border-dashed">
                            <p class="text-muted mb-1">Gender</p>
                            <p class="fs-15 fw-medium mb-3">Male</p>
                            <p class="text-muted mb-1">Date Of Birth</p>
                            <p class="fs-15 fw-medium mb-0">1 January 1980</p>
                        </div>
                        <div class="col-lg-3 col-6 border-end border-dashed">
                            <p class="text-muted mb-1">Phone</p>
                            <p class="fs-15 fw-medium mb-3">+ (901) 234.5678</p>
                            <p class="text-muted mb-1">City</p>
                            <p class="fs-15 fw-medium mb-0">New York</p>
                        </div>
                        <div class="col-lg-3 col-6">
                            <p class="text-muted mb-1">Address</p>
                            <p class="fs-15 fw-medium mb-3">2713 Frum Street Nashville, TN</p>
                            <p class="text-muted mb-1">Register Date</p>
                            <p class="fs-15 fw-medium mb-0">18 May 2022</p>
                        </div>
                    </div>
                    <hr class="my-3">
                    <h4 class="mb-0 fs-15 fw-semibold">Body Status :</h4>
                    <div class="row mt-2 g-2">
                        <div class="col-lg-2 col-6">
                            <h3 class="fw-medium">22.3</h3>
                            <p class="mb-0 text-muted">BIM <span class="text-success fw-medium"><i
                                        class="ti ti-arrow-down"></i>10</span></p>
                        </div>
                        <div class="col-lg-2 col-6">
                            <h3 class="fw-medium">70 <span class="text-muted fs-15">kg</span></h3>
                            <p class="mb-0 text-muted">Weight <span class="text-success fw-medium"><i
                                        class="ti ti-arrow-down"></i>13 kg</span></p>
                        </div>
                        <div class="col-lg-2 col-6">
                            <h3 class="fw-medium">175 <span class="text-muted fs-15">cm</span></h3>
                            <p class="mb-0 text-muted">Height</p>
                        </div>
                        <div class="col-lg-2 col-6">
                            <h3 class="fw-medium">124/80</h3>
                            <p class="mb-0 text-muted">Blood Pressure <span class="text-danger fw-medium"><i
                                        class="ti ti-arrow-up"></i>12</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-block">
                            <h4 class="card-title mb-0">Medical History</h4>
                        </div>
                        <div class="ms-auto">
                            <a href="#!" class="btn btn-soft-primary btn-sm">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                <div
                                    class="avatar avatar-lg bg-danger-subtle  d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:heart-pulse-bold" class="text-danger fs-32"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-muted fw-medium mb-1 fs-15">Chronic Disease</p>
                                    <p class="text-dark fw-medium mb-0 fs-15">IHD, Obesity, Chronic thyroid disorder</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                <div
                                    class="avatar avatar-lg bg-primary-subtle  d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:waterdrop-bold" class="text-primary fs-32"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-muted fw-medium mb-1 fs-15">Diabetes Emergencies</p>
                                    <p class="text-dark fw-medium mb-0 fs-15">Diabetic Ketoacidosis</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                <div
                                    class="avatar avatar-lg bg-warning-subtle  d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:medical-kit-bold" class="text-warning fs-32"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-muted fw-medium mb-1 fs-15">Sugary</p>
                                    <p class="text-dark fw-medium mb-0 fs-15">Liposuction</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                <div
                                    class="avatar avatar-lg bg-info-subtle  d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:users-group-two-rounded-bold"
                                        class="text-info fs-32"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-muted fw-medium mb-1 fs-15">Family Disease</p>
                                    <p class="text-dark fw-medium mb-0 fs-15">Obesity (Father)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                <div
                                    class="avatar avatar-lg bg-success-subtle  d-flex align-items-center justify-content-center rounded flex-shrink-0">
                                    <iconify-icon icon="solar:dropper-3-bold" class="text-success fs-32"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-muted fw-medium mb-1 fs-15">Diabetes Related Complication</p>
                                    <p class="text-dark fw-medium mb-0 fs-15">Nephropathy, Neuropathy, Retinopathy,
                                        Diabetic foot</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed">
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-block">
                                    <h4 class="card-title mb-0">Patient Statistic</h4>
                                </div>

                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a href="#"
                                            class="dropdown-toggle btn btn-sm btn-soft-primary drop-arrow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            This Month
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Import</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="simple-donut" class="apex-charts" data-colors="#39afd1,#ffbc00"></div>
                            <div class="mt-4">
                                <p class="text-primary mb-0 fw-medium fs-16">Total Visit 11</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed">
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-block">
                                    <h4 class="card-title mb-0">Diet</h4>
                                </div>
                                <div class="ms-auto">
                                    <a href="#!" class="btn btn-soft-primary btn-sm">Add Note</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                        <div class="avata d-flex align-items-center justify-content-center rounded-circle">
                                            <iconify-icon icon="solar:wineglass-bold-duotone"
                                                class="text-primary fs-3"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-0 fs-14"><span class="fw-medium text-dark">8
                                                    Glass Water -</span>Per day</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                        <div class="avata d-flex align-items-center justify-content-center rounded-circle">
                                            <iconify-icon icon="solar:cup-hot-bold-duotone"
                                                class="text-primary fs-3"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-0 fs-14"><span class="fw-medium text-dark">3
                                                    Black Tea -</span>Per day</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex p-2 rounded align-items-center gap-2 border mt-2">
                                <div class="avata d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:chef-hat-heart-bold-duotone"
                                        class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-dark fw-medium mb-0 fs-14">Intermittent fasting, Intermittent fasting,
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex p-2 rounded align-items-center gap-2 border mt-2">
                                <div class="avata d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:chart-2-bold-duotone"
                                        class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-dark fw-medium mb-0 fs-14">Table Sugar , Daily Avg 3/6</p>
                                </div>
                            </div>
                            <div class="d-flex p-2 rounded align-items-center gap-2 border mt-2">
                                <div class="avata d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:virus-bold-duotone"
                                        class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-dark fw-medium mb-0 fs-14">Lactose , Beans</p>
                                </div>
                            </div>
                            <div class="d-flex p-2 rounded align-items-center gap-2 border mt-2">
                                <div class="avata d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:sleeping-circle-bold-duotone"
                                        class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-dark fw-medium mb-0 fs-14">8 H (Continues) Sleeping</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Treatment History </h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-nowrap mb-0">
                        <thead class="bg-light bg-opacity-25">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Type Treatment</th>
                                <th>Date</th>
                                <th>Result Treatment</th>
                                <th>Payment Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead><!-- end thead -->
                        <tbody>
                            <tr>
                                <td class="ps-3">ID3524</td>
                                <td>Surgery</td>
                                <td>
                                    March 3, 2024
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-1 fs-11"><i
                                            class="ti ti-check text-success"></i> Wll Done</span>
                                </td>
                                <td><span class="badge bg-warning p-1 fs-11">Pending</span></td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-edit fs-16"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="ps-3">ID5723</td>
                                <td>Physical Therapy</td>
                                <td>
                                    January 28, 2024
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-1 fs-11"><i
                                            class="ti ti-check text-success"></i> Wll Done</span>
                                </td>
                                <td><span class="badge bg-success p-1 fs-11">Paid</span></td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-edit fs-16"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="ps-3">ID8563</td>
                                <td>Chemotherapy</td>
                                <td>
                                    December 1, 2023
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-1 fs-11"><i
                                            class="ti ti-check text-success"></i> Wll Done</span>
                                </td>
                                <td><span class="badge bg-success p-1 fs-11">Paid</span></td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-edit fs-16"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>



                            <tr>
                                <td class="ps-3">ID5233</td>
                                <td>Radiation Therapy</td>
                                <td>
                                    October 27, 2023
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-1 fs-11"><i
                                            class="ti ti-check text-success"></i> Wll Done</span>
                                </td>
                                <td><span class="badge bg-success p-1 fs-11">Paid</span></td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-edit fs-16"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="ps-3">ID4624</td>
                                <td>Immunotherapy</td>
                                <td>
                                    March 23, 2023
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-1 fs-11"><i
                                            class="ti ti-check text-success"></i> Wll Done</span>
                                </td>
                                <td><span class="badge bg-success p-1 fs-11">Paid</span></td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-edit fs-16"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>


                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/patient-chat.js'])
    @vite(['resources/js/patient-chat2.js'])
    @vite(['resources/js/pages/patient-details.js'])
@endsection
