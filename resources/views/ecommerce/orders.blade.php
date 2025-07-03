@extends('layouts.vertical', ['title' => 'Orders'])
@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css','node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Orders'])


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-light">
                    <div class="row justify-content-between g-3">
                        <div class="col-lg-6">
                            <div class="row g-3">
                                <div class="col-lg-4">
                                    <div class="position-relative">
                                        <input type="text" class="form-control ps-4" placeholder="Search Order">
                                        <i class="ti ti-search position-absolute top-50 translate-middle-y ms-2"></i>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <label for="status-select" class="me-2">Status</label>

                                        <div class="flex-grow-1">
                                            <select class="form-select my-1 my-md-0" data-toggle="select2"
                                                id="status-select">
                                                <option>Select</option>
                                                <option value="Date">All</option>
                                                <option value="Name">Cancelled</option>
                                                <option value="Revenue">Completed</option>
                                                <option value="Employee">Denied</option>
                                                <option value="Employee">Pending</option>
                                                <option value="Employee">Processing</option>
                                                <option value="Employee">Refunded</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-provider="flatpickr"
                                            data-deafult-date="01 May to 31 May" data-date-format="d M"
                                            data-range-date="true">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="ti ti-calendar fs-15"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="text-md-end mt-3 mt-md-0">
                                <button type="button" class="btn btn-success waves-effect waves-light me-1"><i
                                        class="ti ti-settings me-1"></i>More Setting</button>
                                <button type="button" class="btn btn-dark waves-effect waves-light"><i
                                        class="ti ti-filter me-1"></i> Filters</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                </div> <!-- end card-body-->

                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="ps-3" style="width: 50px;">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                </th>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead><!-- end thead -->
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td>
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM9708</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-8.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1"><a href="#!"
                                            class="text-dark">Federico Hand</a></h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> Men White Slim Fit
                                        T-shirt</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> HYPERX Cloud Gaming
                                        Headphone</p>
                                </td>
                                <td>
                                    <p class="mb-1">2 Piece</p>
                                    <p class="mb-0">1 Piece</p>
                                </td>

                                <td>
                                    $176.41
                                </td>
                                <td>
                                    August 05 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-success border border-success-subtle fs-11 p-1">Completed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-info fs-11 p-1"><i
                                                class="ti ti-checks me-1 align-middle"></i>Delivered</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM2484</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-1.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark">Raci Lopez</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> Minetta Rattan Swivel
                                        Premium Chair</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> Sleepify Luno 4
                                        Seater Fabric Sofa</p>
                                </td>
                                <td>
                                    <p class="mb-1">3 Piece</p>
                                    <p class="mb-0">1 Piece</p>
                                </td>

                                <td>
                                    $2312.00
                                </td>
                                <td>
                                    November 05 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge border border-danger-subtle text-danger fs-11 p-1">Failed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-danger fs-11 p-1"><i
                                                class="ti ti-x me-1 align-middle"></i>Cancel</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM2543</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-3.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark">James Cantrell</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> 55 L Laptop Backpack
                                        fits upto 16 In.</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> Men White Slim Fit
                                        T-shirt</p>
                                </td>
                                <td>
                                    <p class="mb-1">4 Piece</p>
                                    <p class="mb-0">2 Piece</p>
                                </td>
                                <td>
                                    $677.09
                                </td>
                                <td>
                                    March 15 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-warning border border-warning-subtle fs-11 p-1">Pending</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-dark fs-11 p-1"><i
                                                class="ti ti-check me-1 align-middle"></i>Ready To
                                            Pick</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM6754</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-4.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark">Reginald Brown</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> Sleepify Luno 4
                                        Seater Fabric Sofa</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> HYPERX Cloud Gaming
                                        Headphone</p>
                                </td>
                                <td>
                                    <p class="mb-1">2 Piece</p>
                                    <p class="mb-0">1 Piece</p>
                                </td>
                                <td>
                                    $532.98
                                </td>
                                <td>
                                    December 23 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge border border-danger-subtle text-danger fs-11 p-1">Failed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-danger fs-11 p-1"><i
                                                class="ti ti-x me-1 align-middle"></i>Cancel</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM0863</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-5.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1"><a href="#!"
                                            class="text-dark">Stacey Smith</a></h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> 55 L Laptop Backpack
                                        fits upto 16 In...</p>
                                </td>
                                <td>
                                    <p class="mb-0">1 Piece</p>
                                </td>
                                <td>
                                    $233.15
                                </td>
                                <td>
                                    August 23 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-success border border-success-subtle fs-11 p-1">Completed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-danger fs-11 p-1"><i
                                                class="ti ti-x me-1 align-middle"></i>Cancel</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM8630</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-6.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark">Alan Green</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> Navy Blue Over Size
                                        T-shirt For Men</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> Men White Slim Fit
                                        T-shirt</p>
                                </td>
                                <td>
                                    <p class="mb-1">5 Piece</p>
                                    <p class="mb-0">6 Piece</p>
                                </td>
                                <td>
                                    $772.44
                                </td>
                                <td>
                                    January 01 2024
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-warning border border-warning-subtle fs-11 p-1">Pending</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-dark fs-11 p-1"><i
                                                class="ti ti-check me-1 align-middle"></i>Ready To
                                            Pick</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM2584</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-7.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark">Linda Nelson</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P1 -</span> Sleepify Luno 4
                                        Seater Fabric Sofa</p>
                                </td>
                                <td>
                                    <p class="mb-1">2 Piece</p>
                                </td>
                                <td>
                                    $425.56
                                </td>
                                <td>
                                    October 19 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-success border border-success-subtle fs-11 p-1">Completed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-info fs-11 p-1"><i
                                                class="ti ti-checks me-1 align-middle"></i>Delivered</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM7466</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-9.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark">Pauline Piaffe </a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> Jordan Jumpman MVP
                                        Men's Shoes Size</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> Men White Slim Fit
                                        T-shirt</p>
                                </td>
                                <td>
                                    <p class="mb-1">1 Piece</p>
                                    <p class="mb-0">2 Piece</p>
                                </td>
                                <td>
                                    $754.32
                                </td>
                                <td>
                                    April 15 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge border border-danger-subtle text-danger fs-11 p-1">Failed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-warning fs-11 p-1"><i
                                                class="ti ti-progress-check me-1 align-middle"></i>Dispatched</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM2565</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-10.jpg"
                                            alt="" class="rounded-circle avatar-xs me-1">
                                        <a href="#!" class="text-dark"> Ethan Wilder</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> 55 L Laptop Backpack
                                        fits upto 16 In</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> HYPERX Cloud Gaming
                                        Headphonet</p>
                                </td>
                                <td>
                                    <p class="mb-1">3 Piece</p>
                                    <p class="mb-0">1 Piece</p>
                                </td>
                                <td>
                                    $533.76
                                </td>
                                <td>
                                    May 21 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-success border border-success-subtle fs-11 p-1">Completed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-info fs-11 p-1"><i
                                                class="ti ti-checks me-1 align-middle"></i>Delivered</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
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
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="text-muted fw-medium">#BM6569</a>
                                </td>
                                <td>
                                    <h5 class="mb-0 text-dark"><img src="/images/users/avatar-2.jpg" alt=""
                                            class="rounded-circle avatar-xs me-1"><a href="#!"
                                            class="text-dark">Steven Mendoza</a>
                                    </h5>
                                </td>
                                <td>
                                    <p class="mb-1"><span class="text-dark fw-semibold">P1 -</span> Jordan Jumpman MVP
                                        Men's Shoes Size</p>
                                    <p class="mb-0"><span class="text-dark fw-semibold">P2 -</span> Navy Blue Over Size
                                        T-shirt For Men</p>
                                </td>
                                <td>
                                    <p class="mb-1">1 Piece</p>
                                    <p class="mb-0">3 Piece</p>
                                </td>
                                <td>
                                    $423.00
                                </td>
                                <td>
                                    Jun 02 2023
                                </td>
                                <td>
                                    <h5 class="mb-0"><span
                                            class="badge text-success border border-success-subtle fs-11 p-1">Completed</span>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="mb-0"><span class="badge badge-soft-warning fs-11 p-1"><i
                                                class="ti ti-progress-check me-1 align-middle"></i>Dispatched</span>
                                    </h5>
                                </td>
                                <td class="pe-3">
                                    <div class="hstack gap-1 justify-content-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>


                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>

                <div class="card-footer d-flex align-items-center justify-content-end">
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
                </div><!-- end card-footer -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

