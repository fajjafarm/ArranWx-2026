@extends('layouts.vertical', ['title' => 'Settings'])
@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css'])
@endsection


@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'eCommerce', 'title' => 'Settings'])


    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-header border-bottom border-dashed">
                    <div class="nav flex-wrap flex-lg-nowrap nav-pills" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link flex-grow-1 w-100 text-lg-center active show" id="v-pills-general-tab"
                            data-bs-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general"
                            aria-selected="true">
                            <i class="ti ti-home-2 fs-18 align-text-top d-inline-block me-1"></i>
                            <span>General</span>
                        </a><!-- end nav-link -->
                        <a class="nav-link flex-grow-1 w-100 text-lg-center" id="v-pills-store-details-tab"
                            data-bs-toggle="pill" href="#v-pills-store-details" role="tab"
                            aria-controls="v-pills-store-details" aria-selected="true">
                            <i class="ti ti-building-warehouse fs-18 align-text-top d-inline-block me-1"></i>
                            <span>Store details</span>
                        </a><!-- end nav-link -->
                        <a class="nav-link flex-grow-1 w-100 text-lg-center" id="v-pills-localization-tab"
                            data-bs-toggle="pill" href="#v-pills-localization" role="tab"
                            aria-controls="v-pills-localization" aria-selected="false" tabindex="-1">
                            <i class="ti ti-map-pin fs-18 align-text-top d-inline-block me-1"></i>
                            <span>Localization</span>
                        </a>
                        <a class="nav-link flex-grow-1 w-100 text-lg-center" id="v-pills-products-tab" data-bs-toggle="pill"
                            href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false"
                            tabindex="-1">
                            <i class="ti ti-assembly fs-18 align-text-top d-inline-block me-1"></i>
                            <span>Products</span>
                        </a><!-- end nav-link -->
                        <a class="nav-link flex-grow-1 w-100 text-lg-center" id="v-pills-customers-tab"
                            data-bs-toggle="pill" href="#v-pills-customers" role="tab" aria-controls="v-pills-customers"
                            aria-selected="false" tabindex="-1">
                            <i class="ti ti-users fs-18 align-text-top d-inline-block me-1"></i>
                            <span>Customers</span>
                        </a><!-- end nav-link -->
                    </div><!-- end nav-pills -->
                </div><!-- end card-header -->

                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-general" role="tabpanel"
                            aria-labelledby="v-pills-general-tab">
                            <div class="bg-body px-3 py-2 rounded-2 mb-3">
                                <h4 class="fw-semibold mb-0"><i class="ti ti-user-hexagon align-baseline me-1"></i> General
                                    Settings</h4>
                            </div>
                            <form class="mb-4">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <label for="metaTitle" class="form-label">Meta Title</label>
                                        <input type="text" id="metaTitle" class="form-control"
                                            placeholder="Enter Meta Title">
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="metaTagDescription" class="form-label">Meta Tag Description</label>
                                        <input type="text" id="metaTagDescription" class="form-control"
                                            placeholder="Add Meta Tag Description">
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="metaKeywords" class="form-label">Meta Keywords</label>
                                        <input type="text" id="metaKeywords" class="form-control"
                                            placeholder="Enter Meta Keywords">
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-soft-danger">Cancel</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div><!-- end tab-pan -->
                        <div class="tab-pane fade" id="v-pills-store-details" role="tabpanel"
                            aria-labelledby="v-pills-store-details-tab">
                            <div class="bg-body px-3 py-2 rounded-2 mb-3">
                                <h4 class="fw-semibold mb-0"><i class="ti ti-user-hexagon align-baseline me-1"></i> Profile
                                </h4>
                            </div>
                            <form class="mb-4">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <label for="storeName" class="form-label">Store Name</label>
                                        <input type="text" id="storeName" class="form-control"
                                            placeholder="Virginia Mori">
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="storeContactMail" class="form-label">Store Contact Email</label>
                                        <input type="email" id="storeContactMail" class="form-control"
                                            placeholder="paces@codertemes.com">
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="senderMail" class="form-label">Sender Mail</label>
                                        <input type="email" id="senderMail" class="form-control"
                                            placeholder="virginiamori12@gmail.com">
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="senderMail" class="form-label">Phone No</label>
                                        <input type="number" id="senderMail" class="form-control"
                                            placeholder="+(491) 65952-58963">
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form><!-- end form -->
                            <div class="bg-body px-3 py-2 rounded-2 mb-3">
                                <h4 class="fw-semibold mb-0"><i class="ti ti-file-invoice align-baseline me-1"></i>
                                    Billing Info</h4>
                            </div>
                            <form class="mb-4">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <label for="businessName" class="form-label">Business Name</label>
                                        <input type="text" id="businessName" class="form-control"
                                            placeholder="Virginia Mori">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="countryRegion" class="form-label">Country/region</label>
                                        <select type="email" id="countryRegion" class="form-control"
                                            data-toggle="select2">
                                            <option value="Australia">Australia</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Bharat">Bharat</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="United States" selected>United States</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea type="text" id="address" class="form-control" rows="4" placeholder="Enter Address"></textarea>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" id="city" class="form-control"
                                            placeholder="Enter City">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" id="state" class="form-control"
                                            placeholder="Enter State">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pinCode" class="form-label">PIN Code</label>
                                        <input type="text" id="pinCode" class="form-control"
                                            placeholder="Enter PIN Code">
                                    </div>
                                </div>
                            </form><!-- end form -->

                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-soft-danger">Cancel</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div><!-- end tab-pan -->
                        <div class="tab-pane fade" id="v-pills-localization" role="tabpanel"
                            aria-labelledby="v-pills-localization-tab">
                            <div class="bg-body px-3 py-2 rounded-2 mb-3">
                                <h4 class="fw-semibold mb-0"><i class="ti ti-map-pin-2 align-baseline me-1"></i> Location
                                    Settings</h4>
                            </div>
                            <form class="mb-4">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <label for="countryRegion2" class="form-label">Country/region</label>
                                        <select type="email" id="countryRegion2" class="form-control"
                                            data-toggle="select2">
                                            <option value="Australia">Australia</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Bharat">Bharat</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="United States" selected>United States</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="language" class="form-label">Language</label>
                                        <select type="email" id="language" class="form-control"
                                            data-toggle="select2">
                                            <option value="id">Bahasa Indonesia - Indonesian</option>
                                            <option value="msa">Bahasa Melayu - Malay</option>
                                            <option value="ca">Català - Catalan</option>
                                            <option value="cs">Čeština - Czech</option>
                                            <option value="da">Dansk - Danish</option>
                                            <option value="de">Deutsch - German</option>
                                            <option value="en">English</option>
                                            <option value="en-gb">English UK - British English</option>
                                            <option value="es">Español - Spanish</option>
                                            <option value="fil">Filipino</option>
                                            <option value="fr">Français - French</option>
                                            <option value="ga">Gaeilge - Irish (beta)</option>
                                            <option value="gl">Galego - Galician (beta)</option>
                                            <option value="hr">Hrvatski - Croatian</option>
                                            <option value="it">Italiano - Italian</option>
                                            <option value="hu">Magyar - Hungarian</option>
                                            <option value="nl">Nederlands - Dutch</option>
                                            <option value="no">Norsk - Norwegian</option>
                                            <option value="pl">Polski - Polish</option>
                                            <option value="pt">Português - Portuguese</option>
                                            <option value="ro">Română - Romanian</option>
                                            <option value="sk">Slovenčina - Slovak</option>
                                            <option value="fi">Suomi - Finnish</option>
                                            <option value="sv">Svenska - Swedish</option>
                                            <option value="vi">Tiếng Việt - Vietnamese</option>
                                            <option value="tr">Türkçe - Turkish</option>
                                            <option value="el">Ελληνικά - Greek</option>
                                            <option value="bg">Български език - Bulgarian</option>
                                            <option value="ru">Русский - Russian</option>
                                            <option value="sr">Српски - Serbian</option>
                                            <option value="uk">Українська мова - Ukrainian</option>
                                            <option value="he">עִבְרִית - Hebrew</option>
                                            <option value="ur">اردو - Urdu (beta)</option>
                                            <option value="ar">العربية - Arabic</option>
                                            <option value="fa">فارسی - Persian</option>
                                            <option value="mr">मराठी - Marathi</option>
                                            <option value="hi">हिन्दी - Hindi</option>
                                            <option value="bn">বাংলা - Bangla</option>
                                            <option value="gu">ગુજરાતી - Gujarati</option>
                                            <option value="ta">தமிழ் - Tamil</option>
                                            <option value="kn">ಕನ್ನಡ - Kannada</option>
                                            <option value="th">ภาษาไทย - Thai</option>
                                            <option value="ko">한국어 - Korean</option>
                                            <option value="ja">日本語 - Japanese</option>
                                            <option value="zh-cn">简体中文 - Simplified Chinese</option>
                                            <option value="zh-tw">繁體中文 - Traditional Chinese</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select type="email" id="currency" class="form-control"
                                            data-toggle="select2">
                                            <option value="USD">US Dollar</option>
                                            <option value="Aud">Aud</option>
                                            <option value="Dinar">Dinar</option>
                                            <option value="Peso">Peso</option>
                                            <option value="A K">Angolan Kwanza</option>
                                            <option value="B D">Bahamian Dollar</option>
                                            <option value="INR">Indian Rupee</option>
                                        </select>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-soft-danger">Cancel</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div><!-- end tab-pan -->
                        <div class="tab-pane fade" id="v-pills-products" role="tabpanel"
                            aria-labelledby="v-pills-products-tab">
                            <div class="bg-body px-3 py-2 rounded-2 mb-3">
                                <h4 class="fw-semibold mb-0"><i class="ti ti-user-hexagon align-baseline me-1"></i>
                                    Products Settings</h4>
                            </div>
                            <form class="mb-4">
                                <div class="row justify-content-between gy-4">
                                    <div class="col-md-3">
                                        <h5 class="fw-semibold">Category Product Count</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="product" id="productCountTrue" checked="">
                                                <label class="form-check-label" for="productCountTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="product" id="productCountFalse">
                                                <label class="form-check-label" for="productCountFalse">
                                                    No
                                                </label>
                                            </div>

                                            <div class="mt-4">
                                                <label for="default-items" class="form-label">Default Items on single
                                                    page</label>
                                                <input type="text" id="default-items" class="form-control"
                                                    value="10">
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                    <div class="col-md-3">
                                        <div class="mb-4">
                                            <h5 class="fw-semibold">Allow Reviews</h5>
                                            <div class="mt-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" value=""
                                                        name="allowReviews" id="allowReviewsTrue" checked="">
                                                    <label class="form-check-label" for="allowReviewsTrue">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value=""
                                                        name="allowReviews" id="allowReviewsFalse">
                                                    <label class="form-check-label" for="allowReviewsFalse">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold">Allow Guest Reviews</h5>
                                            <div class="mt-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" value=""
                                                        name="allowGuestReviews" id="allowGuestReviewsTrue"
                                                        checked="">
                                                    <label class="form-check-label" for="allowGuestReviewsTrue">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value=""
                                                        name="allowGuestReviews" id="allowGuestReviewsFalse">
                                                    <label class="form-check-label" for="allowGuestReviewsFalse">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-3">
                                        <h5 class="fw-semibold">Tax Settings</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="tax" id="taxTrue" checked="">
                                                <label class="form-check-label" for="taxTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="tax" id="taxFalse">
                                                <label class="form-check-label" for="taxFalse">
                                                    No
                                                </label>
                                            </div>

                                            <div class="mt-4">
                                                <label for="default-items" class="form-label">Default Tax Rate</label>
                                                <input type="text" id="default-items" class="form-control"
                                                    value="15%">
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form><!-- end form -->
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-soft-danger">Cancel</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div><!-- end tab-pan -->
                        <div class="tab-pane fade" id="v-pills-customers" role="tabpanel"
                            aria-labelledby="v-pills-customers-tab">
                            <div class="bg-body px-3 py-2 rounded-2 mb-3">
                                <h4 class="fw-semibold mb-0"><i
                                        class="ti ti-user-hexagon align-baseline me-1"></i>Customers Setting</h4>
                            </div>
                            <form class="mb-4">
                                <div class="row justify-content-between gy-4">
                                    <div class="col-sm-6 col-lg-3 col-xl-2">
                                        <h5 class="fw-semibold">Customers Online</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="customersOnline" id="customersOnlineTrue" checked="">
                                                <label class="form-check-label" for="customersOnlineTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="customersOnline" id="customersOnlineFalse">
                                                <label class="form-check-label" for="customersOnlineFalse">
                                                    No
                                                </label>
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                    <div class="col-sm-6 col-lg-3 col-xl-2">
                                        <h5 class="fw-semibold">Customers Activity</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="customersActivity" id="customersActivityTrue" checked="">
                                                <label class="form-check-label" for="customersActivityTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="customersActivity" id="customersActivityFalse">
                                                <label class="form-check-label" for="customersActivityFalse">
                                                    No
                                                </label>
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                    <div class="col-sm-6 col-lg-3 col-xl-2">
                                        <h5 class="fw-semibold">Customer Searches</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="customerSearches" id="customerSearchesTrue" checked="">
                                                <label class="form-check-label" for="customerSearchesTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="customerSearches" id="customerSearchesFalse">
                                                <label class="form-check-label" for="customerSearchesFalse">
                                                    No
                                                </label>
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                    <div class="col-sm-6 col-lg-3 col-xl-2">
                                        <h5 class="fw-semibold">Allow Guest Checkout</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="allowGuestCheckout" id="allowGuestCheckoutTrue">
                                                <label class="form-check-label" for="allowGuestCheckoutTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="allowGuestCheckout" id="allowGuestCheckoutFalse"
                                                    checked="">
                                                <label class="form-check-label" for="allowGuestCheckoutFalse">
                                                    No
                                                </label>
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                    <div class="col-sm-6 col-lg-3 col-xl-2">
                                        <h5 class="fw-semibold">Login Display Prices</h5>
                                        <div class="mt-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="loginDisplayPrices" id="loginDisplayPricesTrue">
                                                <label class="form-check-label" for="loginDisplayPricesTrue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="loginDisplayPrices" id="loginDisplayPricesFalse"
                                                    checked="">
                                                <label class="form-check-label" for="loginDisplayPricesFalse">
                                                    No
                                                </label>
                                            </div>
                                        </div><!-- end form-check -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form><!-- end form -->
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-soft-danger">Cancel</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div><!-- end tab-pan -->
                    </div><!-- end tab-content -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- row -->
@endsection
