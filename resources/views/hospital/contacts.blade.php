@extends('layouts.vertical', ['title' => 'Hospital Contacts'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Hospital Contacts'])

    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.5 </span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-2.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">600m</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Morgan Beck</h4>
                    <p class="mb-0 text-muted">Dermatology</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">3544 Rainbow Drive Akron, OH</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">morganhbeck@rhyta.com</a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.4 </span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-3.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">1.4km</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4> Dr. James D. Roger</h4>
                    <p class="mb-0 text-muted">Cardiology</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">1234 Maple Street Springfield , USA</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">jamesdroger@armyspy.com</a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.2 </span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-4.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">1.1km</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Terry J. Bowers</h4>
                    <p class="mb-0 text-muted">Pediatrics</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">1487 Marconi St Pimville 1809</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">terryjbowers@teleworm.us</a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.3 </span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-5.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">900m</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Carlos McCollum</h4>
                    <p class="mb-0 text-muted">Orthopedics</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">2425 Bhoola Road Nahoon 12, USA</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">carloslmccollum@rhyta.com </a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.1 </span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-8.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">10km</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Erma D. Coffman</h4>
                    <p class="mb-0 text-muted">Gastroenterology</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">Casper Fagel straat 331 NT, USA</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">ermadcoffman@jourrapide.com </a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.2 </span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-10.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">6km</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Kelli H. Bailey</h4>
                    <p class="mb-0 text-muted">Psychiatry</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">Sneeuwbes 17 2318 AR Leiden</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">kelligbailey@rhyta.com </a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">3.5</span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-6.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">2.1km</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Robert A. Camp</h4>
                    <p class="mb-0 text-muted">Endocrinology</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">85 Elkview Drive Miami, FL 33128</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">robertacampbell@armyspy.com</a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-4 col-4">
                            <div class="d-flex align-items-center fs-16 gap-1">
                                <span class="fw-medium">4.4</span>
                                <span class="ti ti-star-filled text-warning"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <img src="/images/users/avatar-7.jpg" alt="" class="avatar-xl rounded">
                        </div>
                        <div class="col-lg-4 col-4 text-end">
                            <div class="d-flex align-items-center justify-content-end fs-16 gap-1">
                                <span class="fw-medium">500m</span>
                                <span class="ti ti-map-pin-filled text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <h4>Dr. Jewel B. Odom</h4>
                    <p class="mb-0 text-muted">Ophthalmology</p>
                    <div class="mt-3 d-flex gap-2 justify-content-center">
                        <a href="#!"
                            class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:chat-round-call-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-primary d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:outgoing-call-rounded-bold-duotone" class="fs-22"></iconify-icon></a>
                        <a href="#!"
                            class="btn btn-soft-success d-inline-flex align-items-center justify-content-center rounded avatar-md "><iconify-icon
                                icon="solar:videocamera-bold-duotone" class="fs-22"></iconify-icon></a>
                    </div>
                    <div class="text-start mt-3">
                        <p class="mb-1 fw-medium fs-14  d-flex align-items-center">Location : <span
                                class="fs-13 ms-auto fw-normal">1468 Mahlon Street Dunellen, NJ</span></p>
                        <p class="mb-0 fw-medium fs-14  d-flex align-items-center">Email Address : <a href="#!"
                                class="fs-13 ms-auto fw-normal">jewelbodom@armyspy.com</a></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-outline-primary w-100">Show All Services</a>
                    <a href="#!" class="btn btn-primary w-100">Get Appointment</a>
                </div>
            </div>
        </div>
    </div>
@endsection
