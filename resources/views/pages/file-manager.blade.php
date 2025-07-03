@extends('layouts.vertical',['title' => 'File Manager'])



@section('content')

@include("layouts.partials.page-title", ["subtitle" => "Apps" , "title" => "File Manager"])



<div class="card">
    <div class="d-flex">
        <div class="offcanvas-xl offcanvas-start file-manager" tabindex="-1" id="fileManagerSidebar" aria-labelledby="fileManagerSidebarLabel">
            <!-- users -->
            <div class="d-flex flex-column">
                <div class="py-2 px-3 flex-shrink-0 d-flex align-items-center gap-2 border-bottom border-dashed">
                    <!-- user -->
                    <div class="avatar-md">
                        <img src="/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle">
                    </div>
                    <div>
                        <h5 class="mb-1 fs-16 fw-semibold">Chris K <i class="ti ti-rosette-discount-check-filled text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pro User"></i></h5>
                        <p class="fs-12 mb-0">Welcome!</p>
                    </div>
                    <button type="button" class="btn btn-sm btn-icon btn-soft-danger ms-auto d-xl-none" data-bs-dismiss="offcanvas" data-bs-target="#fileManagerSidebar" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="p-3">
                    <div class="d-flex flex-column">
                        <button type="button" class="btn fw-medium btn-success drop-arrow-none dropdown-toggle w-100 mb-3">
                            Create New <i class="ti ti-plus ms-1"></i>
                        </button>
                        <div class="file-menu">
                            <a href="#" class="list-group-item active"><i class="ti ti-folder fs-18 align-middle me-2"></i>My Files</a>
                            <a href="#" class="list-group-item"><i class="ti ti-brand-google-drive fs-18 align-middle me-2"></i>Google Drive</a>
                            <a href="#" class="list-group-item"><i class="ti ti-share-3 fs-18 align-middle me-2"></i>Share with me</a>
                            <a href="#" class="list-group-item"><i class="ti ti-clock fs-18 align-middle me-2"></i>Recent</a>
                            <a href="#" class="list-group-item"><i class="ti ti-star fs-18 align-middle me-2"></i>Starred</a>
                            <a href="#" class="list-group-item"><i class="ti ti-trash fs-18 align-middle me-2"></i>Deleted Files</a>
                        </div>

                        <div class="mt-5 pt-5">
                            <div class="alert alert-secondary p-3 pt-0 text-center mb-0" role="alert">
                                <img src="/images/panda.svg" alt="" class="img-fluid mt-n5" style="max-width: 135px;">
                                <div>
                                    <h5 class="alert-heading fw-semibold fs-18 mt-2">Get more space for files</h5>
                                    <p>We offer you unlimited storage space for all you needs</p>

                                    <a href="#!" class="btn btn-secondary">Upgrade to Pro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 border-start">
            <div class="p-3">
                <div class="d-flex align-items-center gap-1 mb-3">
                    <div class="flex-shrink-0 d-xl-none d-inline-flex">
                        <button class="btn btn-sm btn-icon btn-soft-primary align-items-center p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#fileManagerSidebar" aria-controls="fileManagerSidebar">
                            <i class="ti ti-menu-2 fs-20"></i>
                        </button>
                    </div>
                    <h4 class="header-title">Quick Access</h4>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xxl-3" id="googleMedia">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-primary-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <iconify-icon icon="logos:google-meet" class="fs-18"></iconify-icon>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span data-toggler="on">
                                            <a href="#" data-toggler-on>
                                                <i class="ti ti-star-filled text-warning fs-16"></i>
                                            </a>
                                            <a href="#" data-toggler-off>
                                                <i class="ti ti-star-filled text-muted fs-16"></i>
                                            </a>
                                        </span>
                                        <div class="dropdown flex-shrink-0 text-muted">
                                            <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                                <a href="/images/users/avatar-1.jpg" download class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item" data-dismissible="#googleMedia"><i class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-grow-1 mt-3">
                                    <h5 class="mb-1"><a href="#!" class="link-reset">Google Media</a></h5>
                                    <p class="text-muted mb-0">38 Files</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                    <p class="fs-14 mb-0">44.6GB</p>
                                    <p class="fs-14 mb-0">50GB</p>
                                </div>
                                <div class="progress progress-sm bg-primary-subtle" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 94%"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 col-xxl-3" id="googleDrive">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-success-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <iconify-icon icon="logos:google-drive" class="fs-18"></iconify-icon>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span data-toggler="off">
                                            <a href="#" data-toggler-on>
                                                <i class="ti ti-star-filled text-warning fs-16"></i>
                                            </a>
                                            <a href="#" data-toggler-off>
                                                <i class="ti ti-star-filled text-muted fs-16"></i>
                                            </a>
                                        </span>
                                        <div class="dropdown flex-shrink-0 text-muted">
                                            <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                                <a href="/images/users/avatar-1.jpg" download class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item" data-dismissible="#googleDrive"><i class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-grow-1 mt-3">
                                    <h5 class="mb-1"><a href="#!" class="link-reset">Google Drive</a></h5>
                                    <p class="text-muted mb-0">42 Files</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                    <p class="fs-14 mb-0">34.80GB</p>
                                    <p class="fs-14 mb-0">50GB</p>
                                </div>
                                <div class="progress progress-sm bg-success-subtle" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 78%"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 col-xxl-3" id="dropbox">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-info-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <iconify-icon icon="logos:dropbox" class="fs-18"></iconify-icon>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span data-toggler="off">
                                            <a href="#" data-toggler-on>
                                                <i class="ti ti-star-filled text-warning fs-16"></i>
                                            </a>
                                            <a href="#" data-toggler-off>
                                                <i class="ti ti-star-filled text-muted fs-16"></i>
                                            </a>
                                        </span>
                                        <div class="dropdown flex-shrink-0 text-muted">
                                            <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                                <a href="/images/users/avatar-1.jpg" download class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item" data-dismissible="#dropbox"><i class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-grow-1 mt-3">
                                    <h5 class="mb-1"><a href="#!" class="link-reset">Dropbox</a></h5>
                                    <p class="text-muted mb-0">98 Files</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                    <p class="fs-14 mb-0">44.86GB</p>
                                    <p class="fs-14 mb-0">50GB</p>
                                </div>
                                <div class="progress progress-sm bg-info-subtle" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: 92%"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 col-xxl-3" id="cloudStorage">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-secondary-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <iconify-icon icon="logos:cloudlinux" class="fs-18"></iconify-icon>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span data-toggler="on">
                                            <a href="#" data-toggler-on>
                                                <i class="ti ti-star-filled text-warning fs-16"></i>
                                            </a>
                                            <a href="#" data-toggler-off>
                                                <i class="ti ti-star-filled text-muted fs-16"></i>
                                            </a>
                                        </span>
                                        <div class="dropdown flex-shrink-0 text-muted">
                                            <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                                <a href="/images/users/avatar-1.jpg" download class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item" data-dismissible="#cloudStorage"><i class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-grow-1 mt-3">
                                    <h5 class="mb-1"><a href="#!" class="link-reset">Cloud Storage</a></h5>
                                    <p class="text-muted mb-0">56 Files</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                    <p class="fs-14 mb-0">20.63GB</p>
                                    <p class="fs-14 mb-0">50GB</p>
                                </div>
                                <div class="progress progress-sm bg-secondary-subtle" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row-->
            </div>

            <div class="px-3 d-flex align-items-center justify-content-between mb-3">
                <h4 class="header-title">Recent</h4>
                <a href="#" class="link-reset fw-semibold text-decoration-underline link-offset-2">View All <i class="ti ti-arrow-right"></i></a>
            </div>

            <div class="table-responsive">
                <table class="table table-centered table-nowrap border-top mb-0">
                    <thead class="bg-light bg-opacity-25">
                        <tr>
                            <th class="ps-3">Name</th>
                            <th>Uploaded By</th>
                            <th>Size</th>
                            <th>Last Update</th>
                            <th>Members</th>
                            <th style="width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-info-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <i class="ti ti-file-type-docx fs-22 text-info"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold"><a href="javascript: void(0);" class="text-reset">Dashboard-requirements.docx</a></span>
                                        <p class="mb-0 fs-12">12 Docx</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <a href="javascript: void(0);">
                                            <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-md" alt="friend">
                                        </a>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-dark fw-medium">Harriett E. Penix</p>
                                        <span class="fs-12">harriettepenix@rhyta.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>128 MB</td>
                            <td>
                                April 25, 2023
                            </td>
                            <td id="tooltips-container">
                                <div class="avatar-group flex-nowrap">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-success rounded-circle fw-bold">
                                            D
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-primary rounded-circle fw-bold">
                                            K
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-secondary rounded-circle fw-bold">
                                            H
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-warning rounded-circle fw-bold">
                                            L
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-info rounded-circle fw-bold">
                                            G
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown flex-shrink-0 text-muted">
                                    <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                        <a href="/images/users/avatar-1.jpg" download="" class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-danger-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <i class="ti ti-file-type-pdf fs-22 text-danger"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold"><a href="javascript: void(0);" class="text-reset">ocen-dashboard.pdf</a></span>
                                        <p class="mb-0 fs-12">18 Pdf</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <a href="javascript: void(0);">
                                            <img src="/images/users/avatar-2.jpg" class="rounded-circle avatar-md" alt="friend">
                                        </a>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-dark fw-medium">Carol L. Simon</p>
                                        <span class="fs-12">carollcimon@jourrapide.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>521 MB</td>
                            <td>
                                April 28, 2023
                            </td>
                            <td id="tooltips-container1">
                                <div class="avatar-group flex-nowrap">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-danger rounded-circle fw-bold">
                                            Y
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-success rounded-circle fw-bold">
                                            L
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-dark rounded-circle fw-bold">
                                            O
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-warning rounded-circle fw-bold">
                                            J
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-primary rounded-circle fw-bold">
                                            G
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown flex-shrink-0 text-muted">
                                    <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                        <a href="/images/users/avatar-1.jpg" download="" class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-warning-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <i class="ti ti-files fs-22 text-warning"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold"><a href="javascript: void(0);" class="text-reset">Dashboard tech requirements</a></span>
                                        <p class="mb-0 fs-12">12 File</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <a href="javascript: void(0);">
                                            <img src="/images/users/avatar-3.jpg" class="rounded-circle avatar-md" alt="friend">
                                        </a>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-dark fw-medium">Rosa L. Winters</p>
                                        <span class="fs-12">rosalwinters@teleworm.us</span>
                                    </div>
                                </div>
                            </td>
                            <td>7.2 MB</td>
                            <td>
                                May 1, 2023
                            </td>
                            <td>
                                <div class="avatar-group flex-nowrap">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-primary rounded-circle fw-bold">
                                            A
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-warning rounded-circle fw-bold">
                                            B
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-danger rounded-circle fw-bold">
                                            R
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-secondary rounded-circle fw-bold">
                                            C
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-dark rounded-circle fw-bold">
                                            U
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown flex-shrink-0 text-muted">
                                    <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                        <a href="/images/users/avatar-1.jpg" download="" class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-primary-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <i class="ti ti-file-type-jpg fs-22 text-primary"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold"><a href="javascript: void(0);" class="text-reset">dashboard.jpg</a></span>
                                        <p class="mb-0 fs-12">172 Jpg Photo</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <a href="javascript: void(0);">
                                            <img src="/images/users/avatar-4.jpg" class="rounded-circle avatar-md" alt="friend">
                                        </a>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-dark fw-medium">Jeremy C. Willi</p>
                                        <span class="fs-12">jeremycwilliams@dayrep.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>54.2 MB</td>
                            <td>
                                May 2, 2023
                            </td>
                            <td>
                                <div class="avatar-group flex-nowrap">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-warning rounded-circle fw-bold">
                                            L
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-secondary rounded-circle fw-bold">
                                            Y
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-dark rounded-circle fw-bold">
                                            A
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-primary rounded-circle fw-bold">
                                            R
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-info rounded-circle fw-bold">
                                            V
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown flex-shrink-0 text-muted">
                                    <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                        <a href="/images/users/avatar-1.jpg" download="" class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0 avatar-md bg-success-subtle d-inline-flex align-items-center justify-content-center rounded-2">
                                        <i class="ti ti-file-type-zip fs-22 text-success"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold"><a href="javascript: void(0);" class="text-reset">admin-hospital.zip</a></span>
                                        <p class="mb-0 fs-12">admin-hospital.zip</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <a href="javascript: void(0);">
                                            <img src="/images/users/avatar-5.jpg" class="rounded-circle avatar-md" alt="friend">
                                        </a>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-dark fw-medium">James R. Alvares</p>
                                        <span class="fs-12">jamesralvares@jourrapide.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>8.3 MB</td>
                            <td>
                                May 6, 2023
                            </td>
                            <td>
                                <div class="avatar-group flex-nowrap">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-dark rounded-circle fw-bold">
                                            G
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-light text-dark rounded-circle fw-bold">
                                            O
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-secondary rounded-circle fw-bold">
                                            W
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-primary rounded-circle fw-bold">
                                            A
                                        </span>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title bg-warning rounded-circle fw-bold">
                                            K
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown flex-shrink-0 text-muted">
                                    <a href="#" class="dropdown-toggle drop-arrow-none fs-20 link-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-share me-1"></i> Share</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-link me-1"></i> Get Sharable Link</a>
                                        <a href="/images/users/avatar-1.jpg" download="" class="dropdown-item"><i class="ti ti-download me-1"></i> Download</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-pin me-1"></i> Pin</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-edit me-1"></i> Edit</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection








