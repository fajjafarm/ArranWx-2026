@extends('layouts.vertical', ['title' => 'Categories'])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css'])
@endsection
@section('content')

@include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Categories'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom border-light">
                <div class="row justify-content-between gy-2 position-relative">
                    <div class="col-lg-3">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-4" placeholder="Search Company">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y ms-2"></i>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4 col-xxl-3">
                        <form>
                            <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                                <div class="flex-grow-1">
                                    <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2"
                                        id="select">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>30</option>
                                        <option>50</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Add
                                    Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover text-nowrap mb-0">
                    <thead class="bg-light-subtle">
                        <tr>
                            <th class="ps-3" style="width: 50px;">
                                <input type="checkbox" class="form-check-input" id="customCheck1">
                            </th>
                            <th>Categories</th>
                            <th>Average Price Range</th>
                            <th>Best Selling Items</th>
                            <th>Customer Rating (1-5)</th>
                            <th>Discounts Available</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-3">
                                <input type="checkbox" class="form-check-input" id="customCheck2">
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-1.png" alt="Product-1" class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Fashion</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Nike , H&M ,
                                                ZARA , Puma</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$200 - $2000</td>
                            <td>T-shirt , Cargo Pent , Dress</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i> 4.5</span>
                            </td>
                            <td>Seasonal Sales</td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-2.png" alt="Product-1" class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Bags</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Nike , Puma
                                                , Safari , Truster</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$20 - $300</td>
                            <td>Collage Bags , Trolly Bags</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i> 4.1</span>
                            </td>
                            <td>Clearance Sales</td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-3.png" alt="Product-1" class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Furniture</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">IKEA,
                                                Hamilton Beach , Premium</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$300 - $1500</td>
                            <td>Sofas, Blenders , Chairs</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.5</span></td>
                            <td>Bundled Discounts</td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-4.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Headphone</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Boat ,
                                                Sony , Jbl , Bose</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$150 - $1000</td>
                            <td>Gaming Headphone , Buds , Nakebands</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.1</span></td>
                            <td>Holiday Discounts</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-5.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Winter Fashion</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Nike , H&M
                                                , ZARA , Puma</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$100 - $900</td>
                            <td>Hoodie</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.3</span></td>
                            <td>Bulk Purchase Deals</td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-6.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Foot Ware</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Nike ,
                                                Bata , Woodland , Puma</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$100 - $1200</td>
                            <td>Sandal , Loafer , Slippers</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.1</span></td>
                            <td>Coupon Codes</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-7.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Furniture</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">IKEA,
                                                Hamilton Beach , Premium</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$300 - $2200</td>
                            <td>Sofas</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.8</span></td>
                            <td>Subscription Discounts</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-13.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Watches</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Rolex ,
                                                Tag , Fossil , Timex</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$400 - $3000</td>
                            <td>Analog Watch , Hand Watch</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.3</span></td>
                            <td>Coupon Codes</td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-14.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Games</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Sony ,
                                                Electronic Arts , IGT logo</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$230 - $2100</td>
                            <td>PS5 , Logo</td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.1</span></td>
                            <td>Seasonal Sales</td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <div class="avatar-md">
                                        <img src="/images/products/p-15.png" alt="Product-1"
                                            class="img-fluid rounded-2">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium text-nowrap">Toy</span>
                                        <span class="text-dark fw-semibold">Brand : <span class="fw-normal">Lego , Hot
                                                Wheels , Fisher-Price</span></span>
                                    </div>
                                </div>
                            </td>
                            <td>$100 - $800</td>
                            <td>Toy Car , Lego </td>
                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i
                                        class="ti ti-star-filled align-text-top fs-14 text-warning me-1"></i>
                                    4.3</span></td>
                            <td>Buy One Get One</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
        </div> <!-- end card-->
    </div><!-- end col -->
</div><!-- end row -->
@endsection
