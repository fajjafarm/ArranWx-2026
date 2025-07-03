@extends('layouts.vertical', ['title' => 'Departments'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Departments'])

    <div class="row">
        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-1.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Cardiology Department</h4>
                    <p class="mb-0 mt-2">Cardiologists diagnose and treat conditions such as congenital heart defects,
                        coronary artery disease, heart failure, and valvular heart disease. <a href="#!"
                            class="link-primary fw-medium">Show More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">4.5k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-dark rounded-circle fw-bold">
                                    T
                                </span>
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-info"
                                data-bs-placement="top" aria-label="Chris" data-bs-original-title="Chris">
                                <img src="/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    9+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-2.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Pediatrics Department</h4>
                    <p class="mb-0 mt-2">Pediatricians are trained to diagnose and treat a wide range of childhood
                        illnesses, from minor health problems to serious diseases. <a href="#!"
                            class="link-primary fw-medium">Show More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">3.1k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-info"
                                data-bs-placement="top" aria-label="Chris" data-bs-original-title="Chris">
                                <img src="/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    3+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-3.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Orthopedic Department</h4>
                    <p class="mb-0 mt-2">Orthopedic surgeons specialize in surgeries involving bones, joints, ligaments,
                        tendons, and muscles. <a href="#!" class="link-primary fw-medium">Show More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ms-1 fs-14">1.4k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-success rounded-circle fw-bold">
                                    S
                                </span>
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    7+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-4.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Oncology Department</h4>
                    <p class="mb-0 mt-2">Oncologists are medical professionals who manage the care of patients with
                        cancer,radiation therapy, and surgical interventions. <a href="#!"
                            class="link-primary fw-medium">Show More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">2.5k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-primary rounded-circle fw-bold">
                                    A
                                </span>
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    2+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-5.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Ophthalmologist Department</h4>
                    <p class="mb-0 mt-2">Ophthalmologists are medical doctors specializing in eye and vision care,
                        including medical and surgical treatments. <a href="#!" class="link-primary fw-medium">Show
                            More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">3.1k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-info rounded-circle fw-bold">
                                    P
                                </span>
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-warning rounded-circle fw-bold">
                                    D
                                </span>
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-primary rounded-circle fw-bold">
                                    A
                                </span>
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    2+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-6.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Imaging Department</h4>
                    <p class="mb-0 mt-2">Common types of medical imaging include X-rays, computed tomography (CT) scans,
                        magnetic resonance imaging (MRI), and ultrasound. <a href="#!"
                            class="link-primary fw-medium">Show More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">2.7k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-primary rounded-circle fw-bold">
                                    M
                                </span>
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    5+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-7.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Gastroenterology Department</h4>
                    <p class="mb-0 mt-2">Gastroenterologists diagnose and treat conditions affecting the gastrointestinal
                        tract, including the esophagus, stomach , liver, pancreas. <a href="#!"
                            class="link-primary fw-medium">Show More</a></p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">1.9k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    2+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="card">
                <img src="/images/department/d-8.png" alt="" class="mx-auto img-fluid" width="300">
                <div class="card-body border-top border-dashed">
                    <h4 class="fw-medium text-dark">Neurology Department</h4>
                    <p class="mb-0 mt-2">Neurologists diagnose and treat conditions such as epilepsy, multiple sclerosis,
                        Parkinson's disease, and stroke. <a href="#!" class="link-primary fw-medium">Show More</a>
                    </p>
                    <div class="flex-grow-1 d-inline-flex align-items-center fs-18 mt-2">
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-filled text-warning"></span>
                        <span class="ti ti-star-half-filled text-warning"></span>
                        <span class="ms-1 fs-14">2.1k Reviews </span>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                        <p class="mb-0 fw-medium fs-14">Best Experience Doctor :</p>

                        <div class="avatar-group">
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Thomas">
                                <span class="avatar-title bg-dark rounded-circle fw-bold">
                                    A
                                </span>
                            </div>
                            <div class="avatar" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary"
                                data-bs-placement="top" aria-label="Vicki" data-bs-original-title="Vicki">
                                <img src="/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="avatar avatar-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger"
                                data-bs-placement="top" data-bs-original-title="15 more Users">
                                <span class="avatar-title bg-danger rounded-circle fw-bold">
                                    6+
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">View More Report</a>
                    <a href="#!"
                        class="btn btn-dark d-inline-flex align-items-center justify-content-center rounded avatar-md"><i
                            class="ti ti-edit fs-20"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
