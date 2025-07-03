@extends('layouts.vertical',['title' => 'Customers'])

@section('content')

@include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Customers'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                <h4 class="header-title">Manage Customers</h4>

                <a href="#" class="btn btn-secondary"><i class="ti ti-file-import me-1"></i> Import</a>
            </div>

            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <thead class="bg-light-subtle">
                        <tr>
                            <th class="ps-3" style="width: 50px;">
                                <input type="checkbox" class="form-check-input" id="customCheck1">
                            </th>
                            <th>Customer</th>
                            <th>Invoice</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                            <th>Amount Due</th>
                            <th>Shop Rate</th>
                            <th>Due Date</th>
                            <th class="text-center pe-3" style="width: 120px;">Action</th>
                        </tr>
                    </thead><!-- end thead -->

                    <tbody>
                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck2">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Emily Davis</a>
                                </h5>
                            </td>
                            <td>
                                INV-103452
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-success py-1 px-2">Active</span>
                                </h5>
                            </td>
                            <td>
                                $532.75
                            </td>
                            <td>
                                $123.45
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 30%"></div>
                                </div>
                            </td>
                            <td>
                                19 January 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck3">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Michael Johnson</a>
                                </h5>
                            </td>
                            <td>
                                INV-984321
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-danger py-1 px-2">Block</span>
                                </h5>
                            </td>
                            <td>
                                $689.50
                            </td>
                            <td>
                                $234.56
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 70%"></div>
                                </div>
                            </td>
                            <td>
                                10 February 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck4">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-sm me-1"><a href="#!" class="text-dark">Robert Smith</a>
                                </h5>
                            </td>
                            <td>
                                INV-567890
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-success py-1 px-2">Active</span>
                                </h5>
                            </td>
                            <td>
                                $745.60
                            </td>
                            <td>
                                $498.76
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 40%"></div>
                                </div>
                            </td>
                            <td>
                                04 Jun 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck5">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">David Williams</a>
                                </h5>
                            </td>
                            <td>
                                INV-876543
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-success py-1 px-2">Active</span>
                                </h5>
                            </td>
                            <td>
                                $812.40
                            </td>
                            <td>
                                $345.67
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 60%"></div>
                                </div>
                            </td>
                            <td>
                                01 April 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck6">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">James Miller</a>
                                </h5>
                            </td>
                            <td>
                                INV-192837
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-danger py-1 px-2">Block</span>
                                </h5>
                            </td>
                            <td>
                                $970.25
                            </td>
                            <td>
                                $210.98
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 50%"></div>
                                </div>
                            </td>
                            <td>
                                01 May 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck7">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Richard Taylor</a>
                                </h5>
                            </td>
                            <td>
                                INV-283746
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-danger py-1 px-2">Block</span>
                                </h5>
                            </td>
                            <td>
                                $524.80
                            </td>
                            <td>
                                $432.10
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 80%"></div>
                                </div>
                            </td>
                            <td>
                                17 January 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck8">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Thomas Anderson</a>
                                </h5>
                            </td>
                            <td>
                                INV-465728
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-success py-1 px-2">Active</span>
                                </h5>
                            </td>
                            <td>
                                $789.90
                            </td>
                            <td>
                                $187.65
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 60%"></div>
                                </div>
                            </td>
                            <td>
                                09 July 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck9">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Charles Thomas</a>
                                </h5>
                            </td>
                            <td>
                                INV-372819
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-success py-1 px-2">Active</span>
                                </h5>
                            </td>
                            <td>
                                $632.55
                            </td>
                            <td>
                                $321.09
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 80%"></div>
                                </div>
                            </td>
                            <td>
                                14 Nov 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck10">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Daniel Harris </a>
                                </h5>
                            </td>
                            <td>
                                INV-948576
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-danger py-1 px-2">Block</span>
                                </h5>
                            </td>
                            <td>
                                $915.30
                            </td>
                            <td>
                                $543.21
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 30%"></div>
                                </div>
                            </td>
                            <td>
                                23 August 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck12">
                            </td>
                            <td>
                                <h5 class="mb-0 text-dark"><img src="/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-sm me-1">
                                    <a href="#!" class="text-dark">Sarah Brown</a>
                                </h5>
                            </td>
                            <td>
                                INV-562738
                            </td>
                            <td>
                                <h5 class="mb-0"><span class="badge badge-soft-success py-1 px-2">Active</span>
                                </h5>
                            </td>
                            <td>
                                $750.75
                            </td>
                            <td>
                                $321.09
                            </td>
                            <td>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar bg-warning rounded progress-bar-striped progress-bar-animated" style="width: 70%"></div>
                                </div>
                            </td>
                            <td>
                                15 July 2024
                            </td>
                            <td class="hstack gap-1 justify-content-end pe-3">
                                <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i class="ti ti-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i class="ti ti-trash"></i></a>
                            </td>
                        </tr>

                    </tbody><!-- end tbody -->
                </table><!-- end table -->
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <ul class="pagination justify-content-center mb-0">
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
