@extends('layouts.vertical', ['title' => 'Products Grid'])

@section('css')
    @vite(['node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Products Grid'])

    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Popular Brands</h4>
                </div>
                <div class="card-body">
                    <div class="categories-list d-flex flex-column gap-2 mb-2">
                        <div class="form-check">
                            <input type="checkbox" id="samsung" class="form-check-input">
                            <label for="samsung" class="form-check-label">Samsung</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="sony" class="form-check-input">
                            <label for="sony" class="form-check-label">Sony</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="apple" class="form-check-input">
                            <label for="apple" class="form-check-label">Apple</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="h&m" class="form-check-input">
                            <label for="h&m" class="form-check-label">H & M</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="blackBerry" class="form-check-input">
                            <label for="blackBerry" class="form-check-label">Black Berry</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="skullcandy" class="form-check-input">
                            <label for="skullcandy" class="form-check-label">Skullcandy</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="zara" class="form-check-input">
                            <label for="zara" class="form-check-label">Zara</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="noise" class="form-check-input">
                            <label for="noise" class="form-check-label">Noise</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="nike" class="form-check-input">
                            <label for="nike" class="form-check-label">Nike</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="adidas" class="form-check-input">
                            <label for="adidas" class="form-check-label">Adidas</label>
                        </div>
                    </div>
                    <a href="#!" class="text-primary fw-medium">More <i class="ti ti-arrow-right align-middle"></i></a>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Popular Categories</h4>
                </div>
                <div class="card-body">
                    <div class="categories-list d-flex flex-column gap-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="all-categories" checked>
                                <label class="form-check-label" for="all-categories">All Categories</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">5352</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="furniture-categories">
                                <label class="form-check-label" for="furniture-categories">Furniture</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">624</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="headphones-categories">
                                <label class="form-check-label" for="headphones-categories">Headphones</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">351</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sunglass-categories">
                                <label class="form-check-label" for="sunglass-categories">Eye Ware & Sunglass</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">98</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="shoes-categories">
                                <label class="form-check-label" for="shoes-categories">Foot Ware</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">452</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="fashion-categories">
                                <label class="form-check-label" for="fashion-categories">Fashion Men , Women &
                                    Kid's</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">2120</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="electronics-categories">
                                <label class="form-check-label" for="electronics-categories">Electronics Items</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">667</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="watches-categories">
                                <label class="form-check-label" for="watches-categories">Watches</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">80</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="beauty-categories">
                                <label class="form-check-label" for="beauty-categories">Beauty & Health</label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">960</span>
                            </div>
                        </div>
                    </div>
                    <a href="#!" class="text-primary fw-medium">More <i
                            class="ti ti-arrow-right align-middle"></i></a>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Custom Price</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column gap-2 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="all-price">
                            <label class="form-check-label" for="all-price">All Price</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="price-1">
                            <label class="form-check-label" for="price-1">Below $200 (221)</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="price-2">
                            <label class="form-check-label" for="price-2">$200 - $500 (172)</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="price-3">
                            <label class="form-check-label" for="price-3">$500 - $800 (331)</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="price-4">
                            <label class="form-check-label" for="price-4">$800 - $1000 (455)</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="price-5">
                            <label class="form-check-label" for="price-5">$1000 - $1200 (1290)</label>
                        </div>
                    </div>
                    <div id="product-price-range" [data-slider-size="md" ]></div>
                    <div class="formCost d-flex gap-2 align-items-center mt-3">
                        <input class="form-control form-control-sm text-center" type="text" id="minCost"
                            value="0">
                        <span class="fw-semibold text-muted">to</span>
                        <input class="form-control form-control-sm text-center" type="text" id="maxCost"
                            value="1000">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom border-dashed">
                    <h4 class="card-title mb-0">Rating</h4>
                </div>
                <div class="card-body">
                    <div class="categories-list d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="five-star">
                                <label class="form-check-label" for="five-star"><span
                                        class="flex-grow-1 d-inline-flex align-items-center">
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ms-1">5 Star Rating </span>
                                    </span></label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">452</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="four-star">
                                <label class="form-check-label" for="four-star"><span
                                        class="flex-grow-1 d-inline-flex align-items-center">
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ms-1">4 Star Rating</span>
                                    </span>
                                </label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">622</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="three-star">
                                <label class="form-check-label" for="three-star"><span
                                        class="flex-grow-1 d-inline-flex align-items-center">
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ms-1">3 Star Rating</span>
                                    </span>
                                </label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">389</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="two-star">
                                <label class="form-check-label" for="two-star"><span
                                        class="flex-grow-1 d-inline-flex align-items-center">
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ms-1">2 Star Rating</span>
                                    </span>
                                </label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">215</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="one-star">
                                <label class="form-check-label" for="one-star"><span
                                        class="flex-grow-1 d-inline-flex align-items-center">
                                        <span class="ti ti-star-filled text-warning"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ti ti-star text-muted"></span>
                                        <span class="ms-1">1 Star Rating</span>
                                    </span>
                                </label>
                            </div>
                            <div>
                                <span class="badge bg-primary-subtle text-primary">546</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-footer">
                    <a href="#!" class="btn btn-primary w-100">Apply Filter</a>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-xxl-9">


            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div
                                class="avatar-lg bg-light rounded d-flex align-items-center justify-content-center mx-auto mb-2">
                                <iconify-icon icon="solar:t-shirt-bold-duotone" class="fs-32 text-warning"></iconify-icon>
                            </div>
                            <a href="#!" class="text-dark fs-16 fw-medium">Fashion Men & Women</a>
                            <p class="mt-1 mb-0">2120 Items Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div
                                class="avatar-lg bg-light rounded d-flex align-items-center justify-content-center mx-auto mb-2">
                                <iconify-icon icon="solar:sofa-2-bold-duotone" class="fs-32 text-warning"></iconify-icon>
                            </div>
                            <a href="#!" class="text-dark fs-16 fw-medium">Furniture Sofa & Chair</a>
                            <p class="mt-1 mb-0">624 Items Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div
                                class="avatar-lg bg-light rounded d-flex align-items-center justify-content-center mx-auto mb-2">
                                <iconify-icon icon="solar:headphones-round-sound-bold-duotone"
                                    class="fs-32 text-warning"></iconify-icon>
                            </div>
                            <a href="#!" class="text-dark fs-16 fw-medium">Electronics Items</a>
                            <p class="mt-1 mb-0">667 Items Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div
                                class="avatar-lg bg-light rounded d-flex align-items-center justify-content-center mx-auto mb-2">
                                <iconify-icon icon="solar:glasses-bold-duotone" class="fs-32 text-warning"></iconify-icon>
                            </div>
                            <a href="#!" class="text-dark fs-16 fw-medium">Eye Ware & Sunglass</a>
                            <p class="mt-1 mb-0">98 Items Available</p>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-1.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">Zara Fashion</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">Men White Slim Fit T-shirt</a>
                            </div>
                            <h5 class="my-1">Size : XS , S , M</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-half text-warning"></span>
                                <span class="ms-1 fs-14">123k Reviews </span>
                            </div>
                        </div>

                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$90.99</span> $70.90
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>

                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="on">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>

                        <span class="position-absolute top-0 start-0 p-2">
                            <span class="badge bg-danger fs-11">On Deal</span>
                        </span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-2.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">Wrogn Bags</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">55 L Laptop Backpack fits upto 16
                                    In...</a>
                            </div>
                            <h5 class="my-1">Size : 30L , 40L , 55L</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-half text-warning"></span>
                                <span class="ms-1 fs-14">43k Reviews </span>
                            </div>
                        </div>

                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$120.99</span> $100.90
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>

                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="off">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-3.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">Premium Furniture</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">Minetta Rattan Swivel Premium
                                    Chair</a>
                            </div>
                            <h5 class="my-1">Size : 56L X 63D X 102H CM</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ms-1 fs-14">23k Reviews </span>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$349.99</span> $300.00
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>
                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="off">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                        <span class="position-absolute top-0 start-0 p-2">
                            <span class="badge bg-danger fs-11">On Deal</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-4.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">Bose Headphones</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">HYPERX Cloud Gaming Headphone</a>
                            </div>
                            <h5 class="my-1">Size : S , M</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star text-muted"></span>
                                <span class="ms-1 fs-14">311k Reviews </span>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$259.99</span> $230.90
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>
                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="on">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-5.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">Winter Fashion</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">Men Winter Knitted Sweater</a>
                            </div>
                            <h5 class="my-1">Size : S , M , XL ,XXL</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star text-muted"></span>
                                <span class="ms-1 fs-14">12k Reviews </span>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$100.99</span> $90.00
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>
                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="on">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                        <span class="position-absolute top-0 start-0 p-2">
                            <span class="badge bg-danger fs-11">On Seal</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-6.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">Nike Foot Ware</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">Jordan Jumpman MVP Men's Shoes
                                    Size</a>
                            </div>
                            <h5 class="my-1">Size US : 7 , 8 , 8.5 , 9 , 10</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ms-1 fs-14">200k Reviews </span>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$480.99</span> $400.00
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>
                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="on">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                        <span class="position-absolute top-0 start-0 p-2">
                            <span class="badge bg-danger fs-11">On Seal</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-7.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">CRAFT Furniture</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">Sleepify Luno 4 Seater Fabric
                                    Sofa</a>
                            </div>
                            <h5 class="my-1">Size : 117W x 38D x 34H CM</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ms-1 fs-14">120k Reviews </span>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$400.99</span> $340.00
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>
                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="off">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/images/products/p-8.png" alt="product images" class="img-fluid">

                        <div class="card-body border-top border-dashed">
                            <h5 class="text-primary fw-medium">H&M Fashion</h5>
                            <div>
                                <a href="#!" class="fw-semibold fs-16 text-dark">Navy Blue Over Size T-shirt For
                                    Men</a>
                            </div>
                            <h5 class="my-1">Size : M , XL , XXL , XXXL</h5>
                            <div class="flex-grow-1 d-inline-flex align-items-center fs-16 mt-1">
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star-filled text-warning"></span>
                                <span class="ti ti-star text-muted"></span>
                                <span class="ms-1 fs-14">176k Reviews </span>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex flex-wrap align-items-center justify-content-between border-top border-dashed">
                            <h4 class="fw-semibold text-danger d-flex align-items-center gap-2 mb-0">
                                <span class="text-muted text-decoration-line-through">$90.99</span> $80.00
                            </h4>

                            <a href="#!" class="btn btn-soft-primary px-2 fs-20">
                                <iconify-icon icon="solar:cart-3-bold-duotone"></iconify-icon>
                            </a>
                        </div>
                        <span class="position-absolute top-0 end-0 p-2">
                            <div data-toggler="on">
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-on>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone"
                                        class="fs-22 text-danger"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-icon btn-light rounded-circle" data-toggler-off>
                                    <iconify-icon icon="solar:heart-angle-bold-duotone" class="fs-22"></iconify-icon>
                                </button>
                            </div>
                        </span>
                        <span class="position-absolute top-0 start-0 p-2">
                            <span class="badge bg-danger fs-11">On Seal</span>
                        </span>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row mb-4 align-items-center">
                <div class="col-sm">
                    <div class="text-muted">
                        Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">35</span> Results
                    </div>
                </div>

                <div class="col-sm-auto mt-3 mt-sm-0">
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- end pagination -->
        </div><!--end col-->
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/ecommerce-product-grid-list.init.js'])
@endsection
