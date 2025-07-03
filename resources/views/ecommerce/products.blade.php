@extends('layouts.vertical', ['title' => 'Products'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Products'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-light">
                    <div class="d-flex flex-wrap justify-content-between gap-2">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-4" placeholder="Search Company">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y ms-2"></i>
                        </div>

                        <div>
                            <a href="{{ route ('second' , ['ecommerce','products-add']) }}" class="btn btn-primary"><i
                                    class="ti ti-plus me-1"></i>Add Products</a>
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
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Description </th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                </td>
                                <td>PRD001</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-1.png" alt="Product-1" class="img-fluid rounded-2">
                                        </div>
                                        Men White Slim Fit T-shirt
                                    </div>
                                </td>
                                <td>100% cotton t-shirt in white</td>
                                <td>$70.90</td>
                                <td>890</td>
                                <td>Fashion</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <td>PRD002</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-2.png" alt="Product-1" class="img-fluid rounded-2">
                                        </div>
                                        55 L Laptop Backpack fits upto 16 In..
                                    </div>
                                </td>
                                <td>Durable hiking backpack</td>
                                <td>$100.90 </td>
                                <td>923</td>
                                <td>Bags</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <td>PRD003</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-3.png" alt="Product-1" class="img-fluid rounded-2">
                                        </div>
                                        Minetta Rattan Swivel Premium Chair
                                    </div>
                                </td>
                                <td>Ergonomic Villa chair</td>
                                <td>$300.00</td>
                                <td>231</td>
                                <td>Furniture</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <td>PRD004</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-4.png" alt="Product-1" class="img-fluid rounded-2">
                                        </div>
                                        HYPERX Cloud Gaming Headphone
                                    </div>
                                </td>
                                <td>Noise-canceling wireless headphones</td>
                                <td>$230.90</td>
                                <td>413</td>
                                <td>Headphone</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                <td>PRD005</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-5.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        Men Winter Knitted Sweater
                                    </div>
                                </td>
                                <td>Waterproof windbreaker jacket </td>
                                <td>$90.00</td>
                                <td>120</td>
                                <td>Winter Fashion</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <td>PRD006</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-6.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        Jordan Jumpman MVP Men's Shoes Size
                                    </div>
                                </td>
                                <td>Comfortable running shoes</td>
                                <td>$400.00</td>
                                <td>264</td>
                                <td>Foot Ware</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                <td>PRD007</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-7.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        Sleepify Luno 4 Seater Fabric Sofa
                                    </div>
                                </td>
                                <td>Modern three-piece sofa set </td>
                                <td>$340.00</td>
                                <td>372</td>
                                <td>Furniture</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                <td>PRD008</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-8.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        Navy Blue Over Size T-shirt For Men
                                    </div>
                                </td>
                                <td>100% cotton t-shirt in blue</td>
                                <td>$80.00</td>
                                <td>470</td>
                                <td>Fashion</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <td>PRD009</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-13.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        Man's Round Dial Wrist Watch
                                    </div>
                                </td>
                                <td>Fitness tracking smartwatch</td>
                                <td>$140.00</td>
                                <td>1092</td>
                                <td>Watches</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Active</span>
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
                                <td>PRD010</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-14.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        PS 5 Control
                                    </div>
                                </td>
                                <td>Ergonomic gaming ps and multi control </td>
                                <td>$230.00</td>
                                <td> 523</td>
                                <td>Games</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                                    <input type="checkbox" class="form-check-input" id="customCheck12">
                                </td>
                                <td>PRD011</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-3">
                                        <div class="avatar-md">
                                            <img src="/images/products/p-15.png" alt="Product-1"
                                                class="img-fluid rounded-2">
                                        </div>
                                        Plastic Duckie barry b benson
                                    </div>
                                </td>
                                <td>Bath Duck Toy Mead With Plastic</td>
                                <td>$70.00</td>
                                <td>2102</td>
                                <td>Toy</td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger fs-12 p-1">Inactive</span>
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
                        </tbody>
                    </table>
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
            </div> <!-- end card-->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
