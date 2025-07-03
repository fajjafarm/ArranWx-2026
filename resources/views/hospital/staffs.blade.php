@extends('layouts.vertical', ['title' => 'Staffs'])


@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Staffs'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Hospital Staffs</h4>

                    <div class="d-flex flex-wrap gap-1">
                        <a href="#" class="btn btn-success bg-gradient"><i class="ti ti-plus me-1"></i> Add Staffs</a>
                        <a href="#" class="btn btn-secondary bg-gradient"><i class="ti ti-file-import me-1"></i>
                            Import</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover text-nowrap mb-0">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="ps-3" style="width: 50px;">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                </th>
                                <th>Staff Name</th>
                                <th>Title/Position</th>
                                <th>Department</th>
                                <th>Contact Information</th>
                                <th>Phone Number</th>
                                <th>Special Notes</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-3.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Dr. James D. Roger</a>
                                </td>
                                <td>Chief of Surgery / CHO</td>
                                <td>Cardiology</td>
                                <td>jamesdroger@armyspy.com</td>
                                <td>+96 303-975-3491</td>
                                <td>Specializes in robotics </td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-2.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Dr. Morgan H. Beck</a>

                                </td>
                                <td>Head of Pediatrics</td>
                                <td>Pediatrics</td>
                                <td>morganhbeck@rhyta.com</td>
                                <td>+56 408-272-5403</td>
                                <td>Fluent in Spanish</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-4.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium"> Charlie Brown</a>
                                </td>
                                <td>Senior Nurse</td>
                                <td>Endocrinology</td>
                                <td>charliebrown@rhyta.com</td>
                                <td>+ 618-324-7774</td>
                                <td>CPR instructor</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck5">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-5.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium"> Donna Green</a>
                                </td>
                                <td>Pediatric Nurse</td>
                                <td>Pediatrics</td>
                                <td>donnagreen@rhyta.com</td>
                                <td>+ 570-868-2654</td>
                                <td>Expert in anxiety disorders</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck6">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-6.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Dr. Dorian T. Lackey</a>
                                </td>
                                <td>Lead Psychiatrist</td>
                                <td>Psychiatry</td>
                                <td>doriantlackey@teleworm.us</td>
                                <td>+41 02161 72 22 77</td>
                                <td>Certified lactation consultant</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck7">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-7.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Fiona Davies</a>
                                </td>
                                <td>Cardiology Nurse</td>
                                <td>Cardiology</td>
                                <td>fiona@teleworm.us</td>
                                <td>+ 330-504-2068</td>
                                <td>Medical instructor</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck8">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-8.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Dr. Jewel B. Odom</a>
                                </td>
                                <td>Orthopedic Surgeon</td>
                                <td>Orthopedics</td>
                                <td>jewelbodom@armyspy.com</td>
                                <td>+41 0451 67 15 47</td>
                                <td>Specializes in Orthopedics</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck9">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-10.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Dr. Kelli H. Bailey</a>
                                </td>
                                <td>Radiologist</td>
                                <td>Radiology</td>
                                <td>kelligbailey@rhyta.com</td>
                                <td>+99 073 38 56 39</td>
                                <td>Major Radiology</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck10">
                                </td>
                                <td>
                                    <img src="/images/users/avatar-9.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="#!" class="text-dark fw-medium">Dr. Robert A. Camp</a>
                                </td>
                                <td>Neurologist</td>
                                <td>Neurology</td>
                                <td>robertacampbell@armyspy.com</td>
                                <td>+9 08684 81 00 91</td>
                                <td>Specializes in IBD</td>
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
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck11">
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title bg-warning rounded-circle fw-bold">
                                                E
                                            </span>
                                        </div>
                                        <a href="#!" class="text-dark fw-medium">Dr. Erma D. Coffman</a>
                                    </div>
                                </td>
                                <td>Oncologist</td>
                                <td>Oncology</td>
                                <td>ermadcoffman@jourrapide.com</td>
                                <td>+44 06588 19 07 95</td>
                                <td>Expert in anxiety disorders</td>
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
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <ul class="pagination mb-0 justify-content-center">
                            <li class="page-item disabled">
                                <a href="#" class="page-link"><i class="ti ti-chevrons-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link"><i class="ti ti-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection
