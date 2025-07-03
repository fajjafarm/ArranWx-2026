@extends('layouts.vertical', ['title' => 'Patients'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Patients'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Manage Patients</h4>
                    <div>
                        <a href="{{ route('second', ['hospital', 'add-patients']) }}" class="btn btn-success bg-gradient"><i
                                class="ti ti-plus me-1"></i> Add Patient</a>
                        <a href="#" class="btn btn-secondary bg-gradient"><i class="ti ti-file-import me-1"></i>
                            Import</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="ps-3" style="width: 60px;">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Primary Care Physician</th>
                                <th class="text-center" style="width: 125px;">Action</th>
                            </tr>
                        </thead><!-- end thead -->
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td>PS49201</td>
                                <td><img src="/images/users/avatar-2.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Ernest J. Johnson</a></td>
                                <td>1 January 1980</td>
                                <td><span class="badge bg-secondary p-1 fs-11">Male</span></td>
                                <td>
                                    A+
                                </td>
                                <td>
                                    + (901) 234.5678
                                </td>
                                <td>
                                    123 Main St, City, ST
                                </td>
                                <td>
                                    Dr. James D. Roger
                                </td>
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
                                <td>PS49202</td>
                                <td><img src="/images/users/avatar-3.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Joseph A. Hill</a></td>
                                <td>2 February 1975</td>
                                <td><span class="badge bg-secondary p-1 fs-11">Male</span></td>
                                <td>
                                    O+
                                </td>
                                <td>
                                    + 890 123 4567
                                </td>
                                <td>
                                    456 Elm St, City, ST
                                </td>
                                <td>
                                    Dr. Morgan H. Beck
                                </td>
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
                                <td>PS38671</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title bg-warning rounded-circle fw-bold">
                                                D
                                            </span>
                                        </div>
                                        <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                            class="text-reset fw-medium">Debra G. Justice</a>
                                    </div>
                                </td>
                                <td> 1 May 1989</td>
                                <td><span class="badge bg-warning p-1 fs-11">Female</span></td>
                                <td>
                                    A-
                                </td>
                                <td>
                                    + 789-012-3456
                                </td>
                                <td>
                                    789 Pine St, City, ST
                                </td>
                                <td>
                                    Dr. Terry J. Bowers
                                </td>
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
                                <td>PS48293</td>
                                <td><img src="/images/users/avatar-5.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Steve A. Howell</a></td>
                                <td>4 April 1985</td>
                                <td><span class="badge bg-secondary p-1 fs-11">Male</span></td>
                                <td>
                                    B+
                                </td>
                                <td>
                                    +44 7890 123456
                                </td>
                                <td>
                                    101 Maple St, City, ST
                                </td>
                                <td>
                                    Dr. James D. Roger
                                </td>
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
                                <td>PS89722</td>
                                <td><img src="/images/users/avatar-6.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">John K. Ewing</a></td>
                                <td>5 May 1982</td>
                                <td><span class="badge bg-secondary p-1 fs-11">Male</span></td>
                                <td>
                                    AB-
                                </td>
                                <td>
                                    + 678/901-2345
                                </td>
                                <td>
                                    202 Oak St, City, ST
                                </td>
                                <td>
                                    Dr. Kelli H. Bailey
                                </td>
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
                                <td>PS89512</td>
                                <td><img src="/images/users/avatar-7.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Kathleen R. Stewart</a></td>
                                <td>6 June 1978</td>
                                <td><span class="badge bg-secondary p-1 fs-11">Male</span></td>
                                <td>
                                    O-
                                </td>
                                <td>
                                    +1-567-890-1234
                                </td>
                                <td>
                                    303 Cedar St, City, ST
                                </td>
                                <td>
                                    Dr. Terry J. Bowers
                                </td>
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
                                <td>PS00892</td>
                                <td><img src="/images/users/avatar-8.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Debra R. Morgan</a></td>
                                <td>7 July 1987</td>
                                <td><span class="badge bg-warning p-1 fs-11">Female</span></td>
                                <td>
                                    A+
                                </td>
                                <td>
                                    + (456) 789 0123
                                </td>
                                <td>
                                    404 Birch St, City, ST
                                </td>
                                <td>
                                    Dr. Kelli H. Bailey
                                </td>
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
                                <td>PS54311</td>
                                <td><img src="/images/users/avatar-9.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."> <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Mark J. Scott</a></td>
                                <td> 8 August 1981</td>
                                <td><span class="badge bg-secondary p-1 fs-11">Male</span></td>
                                <td>
                                    B-
                                </td>
                                <td>
                                    + 345 678 9012
                                </td>
                                <td>
                                    505 Walnut St, City, ST
                                </td>
                                <td>
                                    Dr. Carlos McCollum
                                </td>
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
                                <td>PS71434</td>
                                <td><img src="/images/users/avatar-10.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="..."><a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                        class="text-reset fw-medium">Connie R. Kilmer</a></td>
                                <td> 9 September 1979</td>
                                <td><span class="badge bg-warning p-1 fs-11">Female</span></td>
                                <td>
                                    AB+
                                </td>
                                <td>
                                    + 234.567.8901
                                </td>
                                <td>
                                    606 Spruce St, City, ST
                                </td>
                                <td>
                                    Dr. Morgan H. Beck
                                </td>
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
                                <td>PS63551</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title bg-info rounded-circle fw-bold">
                                                P
                                            </span>
                                        </div>
                                        <a href="{{ route('second', ['hospital', 'patient-details']) }}"
                                            class="text-reset fw-medium">Paul K. Coyle</a>
                                    </div>
                                </td>
                                <td> 10 October 1983</td>
                                <td><span class="badge bg-warning p-1 fs-11">Female</span></td>
                                <td>
                                    O+
                                </td>
                                <td>
                                    + 123-456-7890
                                </td>
                                <td>
                                    707 Redwood St, City, ST
                                </td>
                                <td>
                                    Dr. Kelli H. Bailey
                                </td>
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
            </div>
        </div>
    </div>
@endsection
