@extends('layouts.vertical', ['title' => 'Doctors'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Doctors'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Doctor List</h4>
                    <div>
                        <a href="{{ route('second', ['hospital', 'add-doctors']) }}" class="btn btn-success bg-gradient"><i
                                class="ti ti-plus me-1"></i> Add Doctor</a>
                        <a href="#" class="btn btn-secondary bg-gradient"><i class="ti ti-file-import me-1"></i>
                            Import</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="ps-3" style="width: 50px;">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                </th>
                                <th>Doctor ID</th>
                                <th>Doctor Name</th>
                                <th>Specialty</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Timing</th>
                                <th>Years of Experience</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead><!-- end thead -->

                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td>DR0001</td>
                                <td>
                                    <img src="/images/users/avatar-3.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. James D. Roger</a>
                                </td>
                                <td>Cardiology</td>
                                <td>
                                    +96 303-975-3491
                                </td>
                                <td>
                                    jamesdroger@armyspy.com
                                </td>
                                <td>
                                    Mon-Fri: 9 AM - 5 PM
                                </td>
                                <td>
                                    14 Years
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
                                <td>DR0002</td>
                                <td>
                                    <img src="/images/users/avatar-2.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Morgan H. Beck</a>

                                </td>
                                <td>Dermatology</td>
                                <td>
                                    +56 408-272-5403
                                </td>
                                <td>
                                    morganhbeck@rhyta.com
                                </td>
                                <td>
                                    Mon-Fri: 10 AM - 6 PM
                                </td>
                                <td>
                                    09 Years
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
                                <td>DR0003</td>
                                <td>
                                    <img src="/images/users/avatar-4.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Terry J. Bowers</a>
                                </td>
                                <td>Pediatrics</td>
                                <td>
                                    +92 845-693-5084
                                </td>
                                <td>
                                    terryjbowers@teleworm.us
                                </td>
                                <td>
                                    Tue-Sat: 8 AM - 4 PM
                                </td>
                                <td>
                                    12 Years
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
                                <td>DR0004</td>
                                <td>
                                    <img src="/images/users/avatar-5.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Carlos McCollum</a>
                                </td>
                                <td>Orthopedics</td>
                                <td>
                                    +68 036961 83 22
                                </td>
                                <td>
                                    carloslmccollum@rhyta.com
                                </td>
                                <td>
                                    Mon-Thu: 9 AM - 5 PM
                                </td>
                                <td>
                                    17 Years
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
                                <td>DR0005</td>
                                <td>
                                    <img src="/images/users/avatar-6.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Jeanetta D. Hovey</a>
                                </td>
                                <td>Neurology</td>
                                <td>
                                    +62 0951 29 41 23
                                </td>
                                <td>
                                    jeanettadhovey@jourrapide.com
                                </td>
                                <td>
                                    Wed-Sat: 1 PM - 9 PM
                                </td>
                                <td>
                                    10 Years
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
                                <td>DR0006</td>
                                <td>
                                    <img src="/images/users/avatar-7.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Erma D. Coffman</a>
                                </td>
                                <td>Gastroenterology</td>
                                <td>
                                    +44 06588 19 07 95
                                </td>
                                <td>
                                    ermadcoffman@jourrapide.com
                                </td>
                                <td>
                                    Mon-Sat: 6 AM - 2 PM
                                </td>
                                <td>
                                    06 Years
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
                                <td>DR0007</td>
                                <td>
                                    <img src="/images/users/avatar-8.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Dorian T. Lackey</a>
                                </td>
                                <td>Oncology</td>
                                <td>
                                    +41 02161 72 22 77
                                </td>
                                <td>
                                    doriantlackey@teleworm.us
                                </td>
                                <td>
                                    Fri-Sun: 9 AM - 5 PM
                                </td>
                                <td>
                                    04 Years
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
                                <td>DR0008</td>
                                <td>
                                    <img src="/images/users/avatar-9.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Kelli H. Bailey</a>
                                </td>
                                <td>Psychiatry</td>
                                <td>
                                    +99 073 38 56 39
                                </td>
                                <td>
                                    kelligbailey@rhyta.com
                                </td>
                                <td>
                                    Mon-Fri: 8 AM - 4 PM
                                </td>
                                <td>
                                    12 Years
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
                                <td>DR0009</td>
                                <td>
                                    <img src="/images/users/avatar-10.jpg" class="avatar-sm rounded-circle me-2"
                                        alt="...">
                                    <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                        class="text-dark fw-medium">Dr. Robert A. Camp </a>
                                </td>
                                <td>Endocrinology</td>
                                <td>
                                    +9 08684 81 00 91
                                </td>
                                <td>
                                    robertacampbell@armyspy.com
                                </td>
                                <td>
                                    Tue-Sat: 9 AM - 5 PM
                                </td>
                                <td>
                                    19 Years
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
                                <td>DR00010</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title bg-warning rounded-circle fw-bold">
                                                J
                                            </span>
                                        </div>
                                        <a href="{{ route('second', ['hospital', 'doctors-details']) }}"
                                            class="text-dark fw-medium">Dr. Jewel B. Odom</a>
                                    </div>
                                </td>
                                <td>Ophthalmology</td>
                                <td>
                                    +41 0451 67 15 47
                                </td>
                                <td>
                                    jewelbodom@armyspy.com
                                </td>
                                <td>
                                    Mon-Thu: 10 AM - 6 PM
                                </td>
                                <td>
                                    03 Years
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
                        <ul class="pagination mb-0">
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
