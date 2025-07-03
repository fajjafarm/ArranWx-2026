@extends('layouts.vertical',['title' => 'Sellers'])


@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Sellers'])

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                        <img src="/images/sellers/s-1.svg" alt="" class="avatar-lg flex-shrink-0">
                    </div>
                    <div>
                        <h4 class="text-dark fw-semibold">Lacoste</h4>
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ms-1 fs-14 fw-medium">5.3k</span>
                        </div>
                    </div>
                    <div class="ms-lg-auto">
                        <a href="#!" class="btn btn-primary btn-sm">Message</a>
                    </div>
                </div>
                <p class="my-3 fw-medium">" Lacoste, a global icon in the world of fashion, was founded in 1933 by the legendary French tennis player René Lacoste. " </p>
                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">966 Hiddenview Drive Philadelphia,</span></p>
                <p class="mb-3 text-dark fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:letter-bold" class="fs-20 text-danger"></iconify-icon> : <a href="#!" class="link-primary fw-medium">lacostefashion@rhyta.com</a></p>
                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">941</h4>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">+6.7k</h4>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h4 class="mb-1">Fashion</h4>
                            <p class="text-muted mb-0">Brand</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between my-4 text-center">
                    <div class="col-lg-8 border-end">
                        <div id="sales1" data-colors="#ff6c2f" class="apex-charts pe-lg-3"></div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-1 fw-semibold">$62,100</h3>
                        <p class="text-muted mb-0 fs-14">Revenue</p>
                    </div>
                </div>
                <div class="gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Show Profile</a>
                    <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                        <img src="/images/sellers/s-4.svg" alt="" class="avatar-lg flex-shrink-0">
                    </div>
                    <div>
                        <h4 class="text-dark fw-semibold">Asics Foot Ware</h4>
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ms-1 fs-14 fw-medium">2.5k</span>
                        </div>
                    </div>
                    <div class="ms-lg-auto">
                        <a href="#!" class="btn btn-primary btn-sm">Message</a>
                    </div>
                </div>
                <p class="my-3 fw-medium">" Asics footwear is renowned for its advanced technology and superior craftsmanship, making it a favorite among athletes and fitness worldwide. " </p>
                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">2267 Raver Croft Drive Chattanooga,</span></p>
                <p class="mb-3 text-dark fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:letter-bold" class="fs-20 text-danger"></iconify-icon> : <a href="#!" class="link-primary fw-medium">asionwares@rhyta.com</a></p>
                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">764</h4>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">+2.9k</h4>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h4 class="mb-1">Footware</h4>
                            <p class="text-muted mb-0">Brand</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between my-4 text-center">
                    <div class="col-lg-8 border-end">
                        <div id="sales2" data-colors="#ff6c2f" class="apex-charts pe-lg-3"></div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-1 fw-semibold">$40,400</h3>
                        <p class="text-muted mb-0 fs-14">Revenue</p>
                    </div>
                </div>
                <div class="gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Show Profile</a>
                    <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                        <img src="/images/sellers/s-6.svg" alt="" class="avatar-lg flex-shrink-0">
                    </div>
                    <div>
                        <h4 class="text-dark fw-semibold">American Tourister</h4>
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ms-1 fs-14 fw-medium">4.9k</span>
                        </div>
                    </div>
                    <div class="ms-lg-auto">
                        <a href="#!" class="btn btn-primary btn-sm">Message</a>
                    </div>
                </div>
                <p class="my-3 fw-medium">" American Tourister, a trusted name in the luggage industry, has been synonymous with quality, durability, and style since its founding in 1933. " </p>
                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">3383 Briarhill Lane Youngstown,</span></p>
                <p class="mb-3 text-dark fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:letter-bold" class="fs-20 text-danger"></iconify-icon> : <a href="#!" class="link-primary fw-medium">americanbag@rhyta.com</a></p>
                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">1.6k</h4>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">+5.1k</h4>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h4 class="mb-1">Luggage </h4>
                            <p class="text-muted mb-0">Brand</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between my-4 text-center">
                    <div class="col-lg-8 border-end">
                        <div id="sales3" data-colors="#ff6c2f" class="apex-charts pe-lg-3"></div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-1 fw-semibold">$75,450</h3>
                        <p class="text-muted mb-0 fs-14">Revenue</p>
                    </div>
                </div>
                <div class="gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Show Profile</a>
                    <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                        <img src="/images/sellers/s-7.svg" alt="" class="avatar-lg flex-shrink-0">
                    </div>
                    <div>
                        <h4 class="text-dark fw-semibold">Hitachi</h4>
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ms-1 fs-14 fw-medium">8.0k</span>
                        </div>
                    </div>
                    <div class="ms-lg-auto">
                        <a href="#!" class="btn btn-primary btn-sm">Message</a>
                    </div>
                </div>
                <p class="my-3 fw-medium">" Hitachi, Ltd., founded in 1910, is a global leader in technology and innovation, renowned for its diverse range of products and services. " </p>
                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">2496 Gladwell Street Cleburne,</span></p>
                <p class="mb-3 text-dark fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:letter-bold" class="fs-20 text-danger"></iconify-icon> : <a href="#!" class="link-primary fw-medium">hitachielectronics@rhyta.com</a></p>

                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">3.1k</h4>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">+15.9k</h4>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h4 class="mb-1">Electronics </h4>
                            <p class="text-muted mb-0">Brand</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between my-4 text-center">
                    <div class="col-lg-8 border-end">
                        <div id="sales4" data-colors="#ff6c2f" class="apex-charts pe-lg-3"></div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-1 fw-semibold">$98,900</h3>
                        <p class="text-muted mb-0 fs-14">Revenue</p>
                    </div>
                </div>
                <div class="gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Show Profile</a>
                    <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                        <img src="/images/sellers/s-8.svg" alt="" class="flex-shrink-0" height="20" width="60">
                    </div>
                    <div>
                        <h4 class="text-dark fw-semibold">Pepperfry</h4>
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ms-1 fs-14 fw-medium">6.9k</span>
                        </div>
                    </div>
                    <div class="ms-lg-auto">
                        <a href="#!" class="btn btn-primary btn-sm">Message</a>
                    </div>
                </div>
                <p class="my-3 fw-medium">" Pepperfry, launched in 2012, has rapidly grown to become India's leading online marketplace for furniture and home decor. " </p>
                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">3840 Sunset Drive Brinkley, </span></p>
                <p class="mb-3 text-dark fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:letter-bold" class="fs-20 text-danger"></iconify-icon> : <a href="#!" class="link-primary fw-medium">pepperfryfurniture@rhyta.com</a></p>

                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">2.9k</h4>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">+7.5k</h4>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h4 class="mb-1">Furniture </h4>
                            <p class="text-muted mb-0">Brand</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between my-4 text-center">
                    <div class="col-lg-8 border-end">
                        <div id="sales5" data-colors="#ff6c2f" class="apex-charts pe-lg-3"></div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-1 fw-semibold">$54,810</h3>
                        <p class="text-muted mb-0 fs-14">Revenue</p>
                    </div>
                </div>
                <div class="gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Show Profile</a>
                    <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <div class="avatar-xl bg-light d-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                        <img src="/images/sellers/s-2.svg" alt="" class="flex-shrink-0" height="30" width="70">
                    </div>
                    <div>
                        <h4 class="text-dark fw-semibold">Skulcandy</h4>
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-18">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ms-1 fs-14 fw-medium">7.5k</span>
                        </div>
                    </div>
                    <div class="ms-lg-auto">
                        <a href="#!" class="btn btn-primary btn-sm">Message</a>
                    </div>
                </div>
                <p class="my-3 fw-medium">" Skullcandy, founded in 2003 by Rick Alden, is a leading audio brand known for its innovative and stylish audio accessories. " </p>
                <p class="mb-1 fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:map-point-search-bold" class="fs-20 text-danger"></iconify-icon> : <span class="fw-medium">1024 Veltri Drive Takotna, </span></p>
                <p class="mb-3 text-dark fw-medium  d-flex align-items-center gap-2"><iconify-icon icon="solar:letter-bold" class="fs-20 text-danger"></iconify-icon> : <a href="#!" class="link-primary fw-medium">skulcandyaudio@rhyta.com</a></p>

                <div class="border border-end-0 border-start-0 border-dashed p-2 mx-n3">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">4.8k</h4>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h4 class="mb-1">+10.3k</h4>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h4 class="mb-1">Audio </h4>
                            <p class="text-muted mb-0">Brand</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between my-4 text-center">
                    <div class="col-lg-8 border-end">
                        <div id="sales6" data-colors="#ff6c2f" class="apex-charts pe-lg-3"></div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-1 fw-semibold">$63,219</h3>
                        <p class="text-muted mb-0 fs-14">Revenue</p>
                    </div>
                </div>
                <div class="gap-1 hstack">
                    <a href="#!" class="btn btn-primary w-100">Show Profile</a>
                    <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="d-flex justify-content-end">
    <ul class="pagination justify-content-center">
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


@endsection

@section('scripts')
    @vite(['resources/js/pages/sellers.js'])
@endsection
