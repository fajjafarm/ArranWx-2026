@extends('layouts.vertical', ['title' => 'Add Doctors'])

@section('css')
    @vite(['node_modules/dropzone/dist/dropzone.css', 'node_modules/flatpickr/dist/flatpickr.min.css', 'node_modules/select2/dist/css/select2.min.css'])
@endsection

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Add Doctors'])

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Basic information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="doctorFirst" class="form-label">Doctor First Name</label>
                                <input type="text" class="form-control" id="doctorFirst" placeholder="Enter First Name"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="doctorLast" class="form-label">Doctor Last Name</label>
                                <input type="text" class="form-control" id="doctorLast" placeholder="Enter Last Name"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phoneNumber" placeholder="Enter Number"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Birth Date</label>
                                <input type="text" class="form-control flatpickr-input" data-provider="flatpickr"
                                    data-date-format="d M, Y" placeholder="dd-mm-yyyy" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2" id="gender">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="education" class="form-label">Education</label>
                                <input type="text" class="form-control" id="education" placeholder="Enter Education"
                                    required="">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2" id="department">
                                    <option>Select Department</option>
                                    <option>Cardiology</option>
                                    <option>Dermatology</option>
                                    <option>Pediatrics</option>
                                    <option>Gastroenterology</option>
                                    <option>Orthopedics</option>
                                    <option>Neurology</option>
                                    <option>Psychiatry</option>
                                    <option>Oncology</option>
                                    <option>Endocrinology</option>
                                    <option>Ophthalmology</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">Doctor Address</label>
                                <textarea class="form-control" id="address" rows="3" placeholder="Full Address"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="about" class="form-label">About Doctor</label>
                                <textarea class="form-control" id="about" rows="5" placeholder="Write short line about doctor"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Upload Profile Photo</h4>
                </div>
                <div class="card-body">
                    <div class="col-12">

                        <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                            data-previews-container="#file-previews"
                            data-upload-preview-template="#uploadPreviewTemplate">
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h1 ti ti-cloud-upload mb-4"></i>
                                <h4>Drop files here or click to upload.</h4>
                                <span class="text-muted fs-13">(This is just a demo dropzone. Selected files are
                                    <strong>not</strong> actually uploaded.)</span>
                            </div>
                        </form>

                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>

                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                                alt="">
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="ti ti-x"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end file preview template -->

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Doctor Availability</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label d-block mb-2 fw-semibold">Available Days:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0"
                                    name="sun">
                                <label class="form-check-label" for="inlineCheckbox1">Sun</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="0"
                                    name="mon">
                                <label class="form-check-label" for="inlineCheckbox2">Mon</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="0"
                                    name="tue">
                                <label class="form-check-label" for="inlineCheckbox3">Tue</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="0"
                                    name="wen">
                                <label class="form-check-label" for="inlineCheckbox4">Wen</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="0"
                                    name="thu">
                                <label class="form-check-label" for="inlineCheckbox5">Thu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="0"
                                    name="fri">
                                <label class="form-check-label" for="inlineCheckbox6">Fri</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="0"
                                    name="sat">
                                <label class="form-check-label" for="inlineCheckbox7">Sat</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div>
                                <label for="from-time" class="form-label fw-semibold">From Time:</label>
                                <input type="text" class="form-control flatpickr-input active"
                                    data-provider="timepickr" data-time-basic="true" id="from-time" readonly="readonly"
                                    placeholder="12:00 PM">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="to-time" class="form-label fw-semibold">To Time:</label>
                                <input type="text" class="form-control flatpickr-input active"
                                    data-provider="timepickr" data-time-basic="true" id="to-time" readonly="readonly"
                                    placeholder="12:00 PM">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="dateSelect" class="form-label fw-semibold">Available Date:</label>
                                <input type="text" id="dateSelect" class="form-control flatpickr-input active"
                                    data-provider="flatpickr" data-date-format="d M, Y"
                                    placeholder="dd-mm-yyyy to dd-mm-yyyy"" data-range-date=" true" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end mb-3">
                <a href="#!" class="btn btn-primary">Add Doctor</a>
                <a href="#!" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/doctor-add.js'])
@endsection
