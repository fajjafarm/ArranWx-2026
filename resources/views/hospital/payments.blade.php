@extends('layouts.vertical', ['title' => 'Payments'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Payments'])

    <div class="row">
        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:users-group-two-rounded-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Number of Patients</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">3421<span class="fs-13 text-muted ms-1">/
                                    Month</span></p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:bill-list-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Total Bill Payments</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">2342</p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:bill-check-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Total Paid Bills</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">1310</p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:bill-cross-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Total Unpaid Bills</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">1203</p>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div><!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Payment List</h4>

                    <div class="d-flex flex-wrap gap-1">
                        <a href="#" class="btn btn-success bg-gradient"><i class="ti ti-plus me-1"></i> Add
                            Payment</a>
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
                                <th>Bill No</th>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Insurance Company</th>
                                <th>Payment</th>
                                <th>Bill Date</th>
                                <th>Charge</th>
                                <th>Tax</th>
                                <th>Discount</th>
                                <th class="text-end pe-3">Total</th>
                            </tr><!--end tr-->
                        </thead>

                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td>1</td>
                                <td>
                                    <a href="#">Keith Jacobson</a>
                                </td>
                                <td>Dr.Justin Williams</td>
                                <td>Tata MediCare Insurance</td>
                                <td>Cashless</td>
                                <td>05/11/2023</td>
                                <td>$1500</td>
                                <td>15%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$1500</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                </td>
                                <td>2</td>
                                <td>
                                    <a href="#">Fred Godina</a>
                                </td>
                                <td>Dr.Thomas Fant</td>
                                <td> Star Health insurance </td>
                                <td>Cashless</td>
                                <td>18/03/2023</td>
                                <td>$1500</td>
                                <td>10%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$3500</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                </td>
                                <td>3</td>
                                <td>
                                    <a href="#">Greg Crosby</a>
                                </td>
                                <td>Dr.Aretha Garland</td>
                                <td>Apollo Health Insurance</td>
                                <td>Cashless</td>
                                <td>29/08/2023</td>
                                <td>$1500</td>
                                <td>11%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$5000</td>
                            </tr><!--end tr-->

                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck5">
                                </td>
                                <td>4</td>
                                <td>
                                    <a href="#">Jennifer Doss</a>
                                </td>
                                <td>Dr.Justin Williams</td>
                                <td>LIC Health Insurance</td>
                                <td>Cashless</td>
                                <td>12/02/2023</td>
                                <td>$1500</td>
                                <td>10%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$1500</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck6">
                                </td>
                                <td>5</td>
                                <td>
                                    <a href="#">Peggy Doe</a>
                                </td>
                                <td>Dr.Thomas Fant</td>
                                <td> National Insurance</td>
                                <td>Cashless</td>
                                <td>07/04/2023</td>
                                <td>$1500</td>
                                <td>18%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$3500</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck7">
                                </td>
                                <td>6</td>
                                <td>
                                    <a href="#">Donald Gardner</a>
                                </td>
                                <td>Dr.Aretha Garland</td>
                                <td>Star Health insurance </td>
                                <td>Cashless</td>
                                <td>15/10/2023</td>
                                <td>$1500</td>
                                <td>18%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$5000</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck8">
                                </td>
                                <td>7</td>
                                <td>
                                    <a href="#">Anna Campbel</a>
                                </td>
                                <td>Dr.Joshua Ampt</td>
                                <td>LIC Health Insurance</td>
                                <td>Cashless</td>
                                <td>23/05/2023</td>
                                <td>$1500</td>
                                <td>10%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$5000</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck9">
                                </td>
                                <td>8</td>
                                <td>
                                    <a href="#">Rachel Fox</a>
                                </td>
                                <td>Dr.Elijah Wylde</td>
                                <td>General Insurance Limited</td>
                                <td>Cashless</td>
                                <td>30/06/2024</td>
                                <td>$1322</td>
                                <td>18%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$2300</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck10">
                                </td>
                                <td>9</td>
                                <td>
                                    <a href="#">Sebastian Barrow</a>
                                </td>
                                <td>Dr.Madeline Panton</td>
                                <td>Insurance Company Limited</td>
                                <td>Cashless</td>
                                <td>09/09/2023</td>
                                <td>$1500</td>
                                <td>10%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$4800</td>
                            </tr><!--end tr-->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck11">
                                </td>
                                <td>10</td>
                                <td>
                                    <a href="#">Hugo Grey-Smith</a>
                                </td>
                                <td>Dr.Angus Rich</td>
                                <td>LIC Health Insurance</td>
                                <td>Cashless</td>
                                <td>14/01/2023</td>
                                <td>$2500</td>
                                <td>18%</td>
                                <td>10%</td>
                                <td class="text-end fw-semibold pe-3">$4000</td>
                            </tr><!--end tr-->
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
    </div>
@endsection
