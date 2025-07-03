@extends('layouts.vertical', ['title' => 'Profile'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Doctor Details'])

    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dr-profile-bg rounded-top position-relative mx-n3 mt-n3 position-relative">
                        <img src="/images/users/avatar-3.jpg" alt=""
                            class="border border-light border-3 rounded-circle position-absolute top-100 start-50 translate-middle"
                            height="100" width="100">
                    </div>
                    <div class="mt-4 mb-2 pt-3  text-center">
                        <p class="mb-1 fs-18 fw-semibold text-dark">Dr. James Roger</p>
                        <p class="mb-0 fw-medium text-muted">(MD , Cardiology)</p>
                    </div>
                    <h5 class="card-title fw-semibold">About Doctor :</h5>
                    <p class="mt-2">Dr. James Roger has vast experience in treating cardiovascular diseases. He has
                        presented papers at national and international levels. Currently, he is a Professor and Head at a
                        Medical College specializing in Cardiology.</p>
                    <div class="mt-3">
                        <div class="row">
                            <!-- Operations -->
                            <div class="col-lg-3 col-3">
                                <h5>Operations</h5>
                                <p class="fs-15 text-dark fw-semibold mb-0">1302</p>
                            </div>

                            <!-- Hospital -->
                            <div class="col-lg-3 col-3">
                                <h5>Hospital</h5>
                                <p class="fs-15 text-dark fw-semibold mb-0">40</p>
                            </div>

                            <!-- Patient -->
                            <div class="col-lg-3 col-3">
                                <h5>Patient</h5>
                                <p class="fs-15 text-dark fw-semibold mb-0">3412</p>
                            </div>

                            <!-- Experience -->
                            <div class="col-lg-3 col-3">
                                <h5>Experience</h5>
                                <p class="fs-15 text-dark fw-semibold mb-0">14 Year</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title fw-semibold mt-4 mb-2">Doctor Level :</h5>
                    <span class="badge bg-light text-dark my-1 px-2 py-1 rounded-pill fw-medium fs-12">General
                        Cardiology</span>
                    <span class="badge bg-light text-dark my-1 px-2 py-1 rounded-pill fw-medium fs-12">Echocardiology</span>
                    <span class="badge bg-light text-dark my-1 px-2 py-1 rounded-pill fw-medium fs-12">Senior Doctor</span>
                    <span class="badge bg-light text-dark my-1 px-2 py-1 rounded-pill fw-medium fs-12">CHO</span>
                    <span class="badge bg-light text-dark mt-1 px-2 py-1 rounded-pill fw-medium fs-12">Adult Congenital
                        Cardiology</span>
                    <h5 class="card-title fw-semibold mt-4">Doctor Rating :</h5>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-20 mt-1">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half text-warning"></span>
                        <span class="ms-1 fs-14">4.6k Reviews </span>
                    </div>

                </div>
                <div class="card-footer border-top gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Send Message</a>
                    <a href="#!" class="btn btn-light w-100">Follow</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Appointment :</h4>
                    <div class="border border-dashed bg-light bg-opacity-10 p-3 rounded">
                        <form>
                            <div class="mb-2">
                                <label class="form-label">Date</label>
                                <input type="text" class="form-control" data-provider="flatpickr"
                                    data-date-format="d M, Y" placeholder="Select date">
                            </div>
                            <div class="mb-2">
                                <label for="schedule-time" class="form-label">Time</label>
                                <input type="text" class="form-control flatpickr-input active py-2"
                                    data-provider="timepickr" data-time-basic="true" id="timepicker-example"
                                    readonly="readonly" placeholder="12:00 PM">
                            </div>
                            <div class="mb-2">
                                <label for="schedule-name" class="form-label">Name</label>
                                <input type="text" id="schedule-name" name="schedule-name" class="form-control"
                                    placeholder="Your Full Name">
                            </div>
                            <div class="mb-2">
                                <label for="schedule-email" class="form-label">Email</label>
                                <input type="email" id="schedule-email" name="schedule-email" class="form-control"
                                    placeholder="Email">
                            </div>
                            <div class="mb-2">
                                <label for="schedule-number" class="form-label">Phone number</label>
                                <input type="number" id="schedule-number" name="schedule-number" class="form-control"
                                    placeholder="Number">
                            </div>
                            <div>
                                <label for="schedule-textarea" class="form-label">Write Problems</label>
                                <textarea class="form-control" id="schedule-textarea" rows="3" placeholder="Message"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer border-top">
                    <a href="#!" class="btn btn-primary w-100">Book Appointment</a>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                            <div>
                                <h4 class="card-title">Personal Information :</h4>
                                <div class="table-responsive mt-3 border border-dashed rounded px-2 py-1">
                                    <table class="table table-borderless m-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="mb-0"> Doctor Name : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">James D. Roger</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0"> Position : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">General Cardiology , CHO</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0"> Mobile Number : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">+96 303-975-3491</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">Email Address : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">jamesdroger@armyspy.com</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">Location : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">1971 Carter Street Stoups, IL
                                                    63101, USA</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="d-flex mb-0 align-items-center gap-1">Web Site : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14"><a
                                                        href="#!">www.coderthemes.com </a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div>
                                <h4 class="card-title">Abilities :</h4>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                    <p class="mb-0 fs-15 fw-medium text-dark">Operations</p>
                                    <div>
                                        <p class="mb-0 fs-15 fw-medium text-dark">40%</p>
                                    </div>
                                </div>
                                <div class="progress progress-soft progress-md">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"
                                        aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                    <p class="mb-0 fs-15 fw-medium text-dark">Colestrol</p>
                                    <div>
                                        <p class="mb-0 fs-15 fw-medium text-dark">50%</p>
                                    </div>
                                </div>
                                <div class="progress progress-soft progress-md">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                        aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                    <p class="mb-0 fs-15 fw-medium text-dark">Therapy</p>
                                    <div>
                                        <p class="mb-0 fs-15 fw-medium text-dark">34%</p>
                                    </div>
                                </div>
                                <div class="progress progress-soft progress-md">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 34%"
                                        aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                    <p class="mb-0 fs-15 fw-medium text-dark">Mediation</p>
                                    <div>
                                        <p class="mb-0 fs-15 fw-medium text-dark">60%</p>
                                    </div>
                                </div>
                                <div class="progress progress-soft progress-md">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                        aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mt-3 pt-2">Experience :</h4>
                    <div class="row g-3 mt-1">
                        <div class="col-xl-6 col-lg-12">
                            <div class="d-flex flex-wrap p-2 align-items-center rounded gap-3 border">
                                <img src="/images/dr-profile/h-1.svg" alt="" class="avatar-xl">
                                <div>
                                    <p class="text-dark fw-semibold mb-1 fs-16">Brentwood's Health Company Senior CHO</p>
                                    <p class="text-dark fw-medium mb-1 fs-14">ETN Doctor - Head - Online Consultation -
                                        Fulltime</p>
                                    <p class="mb-1">Dec 2020 - Present , 4 yer 1 mos</p>
                                    <p class="mb-1">Sharon Lane Michigan City, IN 46360</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="d-flex flex-wrap p-2 align-items-center rounded gap-3 border">
                                <img src="/images/dr-profile/h-2.svg" alt="" class="avatar-xl">
                                <div>
                                    <p class="text-dark fw-semibold mb-1 fs-16">Hospital Dynamics Head Doctor</p>
                                    <p class="text-dark fw-medium mb-1 fs-14">ETN Doctor - General Cardiology - Fulltime
                                    </p>
                                    <p class="mb-1">Dec 2016 - Nov 2020 , 5 yer 4 mos</p>
                                    <p class="mb-1">Friendship Lane Santa Clara, CA 95050</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="d-flex flex-wrap p-2 align-items-center rounded gap-3 border">
                                <img src="/images/dr-profile/h-3.svg" alt="" class="avatar-xl">
                                <div>
                                    <p class="text-dark fw-semibold mb-1 fs-16">Florida Multi Specialist Hospital</p>
                                    <p class="text-dark fw-medium mb-1 fs-14">ETN Doctor - Echocardiology - Fulltime</p>
                                    <p class="mb-1">Dec 2014 - Nov 2016 , 3 yer 2 mos</p>
                                    <p class="mb-1">Simpson Street Bloomington, IL 61701</p>
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
                            <h4 class="card-title mb-0">Skills</h4>
                        </div>
                        <div class="card-body">
                            <div id="multiple-radialbar" class="apex-charts"
                                data-colors="#313a46,#f9c45c,#465dff,#6ac75a"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed">
                            <h4 class="card-title mb-0">Specialty</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-lg bg-light d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:user-check-rounded-bold-duotone"
                                        class="fs-28 text-primary"></iconify-icon>
                                </div>

                                <div>
                                    <p class="fs-15 mb-0">General adult cardiologists</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-3">
                                <div class="avatar-lg bg-light d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:hand-heart-bold-duotone"
                                        class="fs-28 text-primary"></iconify-icon>
                                </div>

                                <div>
                                    <p class="fs-15 mb-0">Cardiac imaging specialists</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-3">
                                <div class="avatar-lg bg-light d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:clipboard-heart-bold-duotone"
                                        class="fs-28 text-primary"></iconify-icon>
                                </div>

                                <div>
                                    <p class="fs-15 mb-0">Electrophysiologists</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-3">
                                <div class="avatar-lg bg-light d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:heart-pulse-bold-duotone"
                                        class="fs-28 text-primary"></iconify-icon>
                                </div>

                                <div>
                                    <p class="fs-15 mb-0">Adult congenital heart specialists</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-3">
                                <div class="avatar-lg bg-light d-flex align-items-center justify-content-center rounded">
                                    <iconify-icon icon="solar:heart-bold-duotone"
                                        class="fs-28 text-primary"></iconify-icon>
                                </div>

                                <div>
                                    <p class="fs-15 mb-0">Heart surgeons</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed">
                            <h4 class="card-title mb-0">Today Appointment List</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <thead class="bg-light bg-opacity-25">
                                        <tr>
                                            <th class="ps-3" style="width: 50px;">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                            </th>
                                            <th>Patient Name</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Phone Number</th>
                                            <th>Reason for Visit</th>
                                            <th class="text-center" style="width: 125px;">Action</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <td class="ps-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                            </td>
                                            <td>
                                                <h5 class="mb-0 text-dark">
                                                    <a href="#!" class="text-dark">John Doe</a>
                                                </h5>
                                            </td>
                                            <td>July 1, 2024</td>
                                            <td>
                                                9:00 AM
                                            </td>
                                            <td>
                                                +(567) 890-1234
                                            </td>
                                            <td>
                                                Annual Check-up
                                            </td>
                                            <td class="pe-3">
                                                <div class="d-flex gap-2">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-eye"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-edit"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ps-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                            </td>
                                            <td>
                                                <h5 class="mb-0 text-dark"> <a href="#!" class="text-dark">Jane
                                                        Smith </a>
                                                </h5>
                                            </td>
                                            <td>July 1, 2024</td>
                                            <td>
                                                9:30 AM
                                            </td>
                                            <td>
                                                +(456) 789-0123
                                            </td>
                                            <td>
                                                Consultation
                                            </td>
                                            <td class="pe-3">
                                                <div class="d-flex gap-2">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-eye"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-edit"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ps-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck4">
                                            </td>
                                            <td>
                                                <h5 class="mb-0 text-dark"><a href="#!" class="text-dark">Mike
                                                        Johnson</a>
                                                </h5>
                                            </td>
                                            <td>July 1, 2024</td>
                                            <td>
                                                10:00 AM
                                            </td>
                                            <td>
                                                +(345) 678-9012
                                            </td>
                                            <td>
                                                Lab Results Review
                                            </td>
                                            <td class="pe-3">
                                                <div class="d-flex gap-2">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-eye"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-edit"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ps-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck5">
                                            </td>
                                            <td>
                                                <h5 class="mb-0 text-dark"> <a href="#!" class="text-dark">Emily
                                                        Davis</a>
                                                </h5>
                                            </td>
                                            <td>July 1, 2024</td>
                                            <td>
                                                10:30 AM
                                            </td>
                                            <td>
                                                +(234) 567-8901
                                            </td>
                                            <td>
                                                Cardiology Follow-up
                                            </td>
                                            <td class="pe-3">
                                                <div class="d-flex gap-2">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-eye"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-edit"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ps-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck6">
                                            </td>
                                            <td>
                                                <h5 class="mb-0 text-dark"> <a href="#!" class="text-dark">Sarah
                                                        Wilson</a>
                                                </h5>
                                            </td>
                                            <td>July 1, 2024</td>
                                            <td>
                                                11:00 AM
                                            </td>
                                            <td>
                                                +(123) 456-7890
                                            </td>
                                            <td>
                                                Blood Pressure Check
                                            </td>
                                            <td class="pe-3">
                                                <div class="d-flex gap-2">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-eye"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                            class="ti ti-edit"></i></a>
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
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/form-fileupload.js'])
    @vite(['resources/js/pages/page-profile.js'])
@endsection
