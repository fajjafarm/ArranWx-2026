@extends('layouts.vertical', ['title' => 'Add Patients'])

@section('css')
    @vite(['node_modules/dropzone/dist/dropzone.css','node_modules/select2/dist/css/select2.min.css','node_modules/flatpickr/dist/flatpickr.min.css'])

@endsection

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Add Patients'])

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
                                <label for="patientFirst" class="form-label">Patient First Name</label>
                                <input type="text" class="form-control" id="patientFirst" placeholder="Enter First Name"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="patientLast" class="form-label">Patient Last Name</label>
                                <input type="text" class="form-control" id="patientLast" placeholder="Enter Last Name"
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
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" placeholder="Enter Age"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" class="form-control" id="weight" placeholder="Enter Weight"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="height" class="form-label">Height</label>
                                <input type="number" class="form-control" id="height" placeholder="Enter Hight"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="marital-status" class="form-label">Marital Status</label>
                                <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2" id="marital-status">
                                    <option>Select Status</option>
                                    <option>Married</option>
                                    <option>Unmarried</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="address" class="form-label">Patient Address</label>
                                <textarea class="form-control" id="address" rows="3" placeholder="Full Address"></textarea>
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
                        <form action="/" method="post" class="dropzone" id="myAwesomeDropzone"
                            data-plugin="dropzone" data-previews-container="#file-previews"
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
                    <h4 class="card-title mb-0">Medical Information</h4>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div>
                                <label for="bloodGroup" class="form-label">Patient Blood Group</label>
                                <input type="text" class="form-control" id="bloodGroup"
                                    placeholder="Enter Blood group" required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="bloodPressure" class="form-label">Patient Blood Pressure</label>
                                <input type="text" class="form-control" id="bloodPressure"
                                    placeholder="Enter Blood pressure" required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="sugarLevel" class="form-label">Patient Sugar Level</label>
                                <input type="text" class="form-control" id="sugarLevel"
                                    placeholder="Enter Sugar level" required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="condition" class="form-label">Patient Condition</label>
                                <input type="text" class="form-control" id="condition" placeholder="Condition"
                                    required="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-end mb-3">
                <a href="#!" class="btn btn-primary">Add Patient</a>
                <a href="#!" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/patient-add.js'])
@endsection
