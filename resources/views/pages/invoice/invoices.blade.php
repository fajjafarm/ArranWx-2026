@extends('layouts.vertical', ['title' => 'Invoices'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Invoice', 'title' => 'Invoices'])

    <div class="card">
        <div class="card-body p-0">
            <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0 text-center align-items-center">
                <div class="col border-end border-light border-dashed">
                    <div class="mt-3 mt-md-0 p-3">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">No.of Clients</h5>
                        <div class="d-flex align-items-center justify-content-center gap-2 my-3">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">9,458</h3>
                        </div>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="ti ti-caret-down-filled"></i> 6.15%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div><!-- end col -->
                <div class="col border-end border-light border-dashed">
                    <div class="mt-3 mt-md-0 p-3">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">No. of Invoices</h5>
                        <div class="d-flex align-items-center justify-content-center gap-2 my-3">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-22">
                                    <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">16.75k</h3>
                        </div>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ti ti-caret-up-filled"></i> 26.87%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div><!-- end col -->
                <div class="col border-end border-light border-dashed">
                    <div class="mt-3 mt-md-0 p-3">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Paid by Clients</h5>
                        <div class="d-flex align-items-center justify-content-center gap-2 my-3">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-22">
                                    <iconify-icon icon="solar:wallet-money-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">$98.24k</h3>
                        </div>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ti ti-caret-up-filled"></i> 3.51%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div><!-- end col -->
                <div class="col border-end border-light border-dashed">
                    <div class="mt-3 mt-md-0 p-3">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Pending Invoices</h5>
                        <div class="d-flex align-items-center justify-content-center gap-2 my-3">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-success-subtle text-success rounded-circle fs-22">
                                    <iconify-icon icon="solar:banknote-2-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">87.94%</h3>
                        </div>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="ti ti-caret-down-filled"></i> 1.05%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div><!-- end col -->
                <div class="col border-end border-light border-dashed">
                    <div class="mt-3 mt-md-0 p-3">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Cancelled Invoices</h5>
                        <div class="d-flex align-items-center justify-content-center gap-2 my-3">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-22">
                                    <iconify-icon icon="solar:bill-cross-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                            <h3 class="fw-bold mb-0 ">7.11%</h3>
                        </div>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ti ti-caret-up-filled"></i> 0.05%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end card body -->
    </div><!-- end card -->

    <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-2 mb-3">
        <div class="d-inline-flex align-items-center gap-2 me-auto">
            <h5 class="mb-0 fs-14 text-muted">Last Updated a minute ago</h5>
            <a href="#!"><i class="ti ti-refresh align-middle fs-16"></i></a>
        </div>

        <div class="d-inline-flex flex-wrap align-items-center gap-1">
            <a href="#!"><img src="/images/cards/mastercard.svg" alt="master card img" height="24"></a>
            <a href="#!"><img src="/images/cards/visa.svg" alt="vis card img" height="24"></a>
            <p class="mb-0">Invoice get paid 3x faster with online payments, <a href="#!" class="fw-medium">Turn On
                    Payments</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Invoices</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ti ti-search position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <a href="{{ route('third', ['pages', 'invoice', 'invoice-create']) }}" class="btn btn-primary"><i
                                class="ti ti-plus me-1"></i>Add Invoice</a>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive">
                    <table class="table table-hover text-nowrap mb-0">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="ps-3" style="width: 50px;">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                </th>
                                <th>Invoice ID</th>
                                <th>Category </th>
                                <th>Created On</th>
                                <th>Invoice To</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <!-- end table-head -->

                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1020@20</span></td>
                                <td>Fashion</td>
                                <td><span class="fs-15 text-muted">12 Apr 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-2.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Raul Villa</h6>
                                    </div>
                                </td>
                                <td>$42,430</td>
                                <td><span class="fs-15 text-muted">12 Apr 2023</span></td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Paid</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1240@25</span></td>
                                <td>Electronics</td>
                                <td><span class="fs-15 text-muted">14 Apr 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-3.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Fae Sims</h6>
                                    </div>
                                </td>
                                <td>$416</td>
                                <td><span class="fs-15 text-muted">24 Apr 2023</span></td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning fs-12 p-1">Overdue</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1284@32</span></td>
                                <td>Mobile Accessories</td>
                                <td><span class="fs-15 text-muted">15 Apr 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-4.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">David Roderick</h6>
                                    </div>
                                </td>
                                <td>$187</td>
                                <td><span class="fs-15 text-muted">25 Apr 2023</span></td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Paid</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck5">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1279@69</span></td>
                                <td>Electronics</td>
                                <td><span class="fs-15 text-muted">6 Dec 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-5.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">James Zavel</h6>
                                    </div>
                                </td>
                                <td>$165</td>
                                <td><span class="fs-15 text-muted">14 Dec 2023</span></td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Paid</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck6">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1279@69</span></td>
                                <td>Electronics</td>
                                <td><span class="fs-15 text-muted">1 Jan 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-6.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Denese Martin</h6>
                                    </div>
                                </td>
                                <td>$165</td>
                                <td><span class="fs-15 text-muted">14 Jan 2023</span></td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Cancelled</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck7">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1276@33</span></td>
                                <td>Watches</td>
                                <td><span class="fs-15 text-muted">2 Dec 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-7.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Jack Nunnally</h6>
                                    </div>
                                </td>
                                <td>$192</td>
                                <td><span class="fs-15 text-muted">2 Dec 2023</span></td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning fs-12 p-1">Overdue</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck8">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1278@29</span></td>
                                <td>Bags</td>
                                <td><span class="fs-15 text-muted">12 May 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-8.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Margaret Shaw</h6>
                                    </div>
                                </td>
                                <td>$159</td>
                                <td><span class="fs-15 text-muted">24 May 2023</span></td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Paid</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck9">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1271@96</span></td>
                                <td>Cloth's</td>
                                <td><span class="fs-15 text-muted">21 Jun 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-9.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Anthony Williams</h6>
                                    </div>
                                </td>
                                <td>$259</td>
                                <td><span class="fs-15 text-muted">1 July 2023</span></td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Cancelled</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck10">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1986@65</span></td>
                                <td>Sofa</td>
                                <td><span class="fs-15 text-muted">12 Aug 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-10.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Axie Barnes</h6>
                                    </div>
                                </td>
                                <td>$259</td>
                                <td><span class="fs-15 text-muted">28 Aug 2023</span></td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Paid</span>
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
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck11">
                                </td>
                                <td><span class="text-muted fw-semibold">#PC1984@38</span></td>
                                <td>Shoes</td>
                                <td><span class="fs-15 text-muted">8 Aug 2023</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm">
                                            <img src="/images/users/avatar-1.jpg" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <h6 class="fs-14 mb-0">Glen Morning</h6>
                                    </div>
                                </td>
                                <td>$256</td>
                                <td><span class="fs-15 text-muted">30 Aug 2023</span></td>
                                <td>
                                    <span class="badge bg-warning-subtle text-warning fs-12 p-1">Pending</span>
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
                            </tr><!-- end table-row -->
                        </tbody><!-- end table-body -->
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
                        </ul><!-- end pagination -->
                    </div><!-- end flex -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
