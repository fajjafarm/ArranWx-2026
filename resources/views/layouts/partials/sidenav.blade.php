<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route ('second' ,['dashboards','index']) }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="/images/logo.png" alt="logo"></span>
            <span class="logo-sm"><img src="/images/logo-sm.png" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="/images/logo-dark.png" alt="dark logo"></span>
            <span class="logo-sm"><img src="/images/logo-sm.png" alt="small logo"></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Dash</li>

            <li class="side-nav-item">
                <a href="{{ route ('second' ,['dashboards','index']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Sales </span>
                    <span class="badge bg-success rounded-pill">5</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route ('second' ,['dashboards','clinic']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-building-hospital"></i></span>
                    <span class="menu-text"> Clinic </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route ('second' ,['dashboards','e-wallet']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-wallet"></i></span>
                    <span class="menu-text"> eWallet </span>
                    <span class="badge p-0 menu-alert fs-16 text-danger">
                        <i class="ti ti-info-triangle" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-warning" data-bs-title="Your wallet balance is <b>low!</b>"></i>
                    </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Apps & Pages</li>

            <li class="side-nav-item">
                <a href="{{ route ('second' ,['pages','chat']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-message"></i></span>
                    <span class="menu-text"> Chat </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route ('second' , ['pages','calendar']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-calendar"></i></span>
                    <span class="menu-text"> Calendar </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route ('second' , ['pages','email']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-inbox"></i></span>
                    <span class="menu-text"> Email </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route ('second' , ['pages','file-manager']) }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-folder"></i></span>
                    <span class="menu-text"> File Manager </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarHospital" aria-expanded="false" aria-controls="sidebarHospital" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-medical-cross"></i></span>
                    <span class="menu-text"> Hospital</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarHospital">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','doctors']) }}" class="side-nav-link">
                                <span class="menu-text">Doctors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','doctors-details']) }}" class="side-nav-link">
                                <span class="menu-text">Doctor Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','add-doctors']) }}" class="side-nav-link">
                                <span class="menu-text">Add Doctors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','patients']) }}" class="side-nav-link">
                                <span class="menu-text">Patients</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','patient-details']) }}" class="side-nav-link">
                                <span class="menu-text">Patient Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','add-patients']) }}" class="side-nav-link">
                                <span class="menu-text">Add Patients</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','appointments']) }}" class="side-nav-link">
                                <span class="menu-text">Appointments</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','payments']) }}" class="side-nav-link">
                                <span class="menu-text">Payments</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','departments']) }}" class="side-nav-link">
                                <span class="menu-text">Departments</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','reviews']) }}" class="side-nav-link">
                                <span class="menu-text">Reviews</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','contacts']) }}" class="side-nav-link">
                                <span class="menu-text">Hospital Contacts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['hospital','staffs']) }}" class="side-nav-link">
                                <span class="menu-text">Staffs</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-basket"></i></span>
                    <span class="menu-text"> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','products']) }}" class="side-nav-link">
                                <span class="menu-text">Products</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','products-grid']) }}" class="side-nav-link">
                                <span class="menu-text">Products Grid</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','product-details']) }}" class="side-nav-link">
                                <span class="menu-text">Product Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','products-add']) }}" class="side-nav-link">
                                <span class="menu-text">Add Products</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','categories']) }}" class="side-nav-link">
                                <span class="menu-text">Categories</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','orders']) }}" class="side-nav-link">
                                <span class="menu-text">Orders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="side-nav-link">
                                <span class="menu-text">Order Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','customers']) }}" class="side-nav-link">
                                <span class="menu-text">Customers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ecommerce','sellers']) }}" class="side-nav-link">
                                <span class="menu-text">Sellers</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarInvoice" aria-expanded="false" aria-controls="sidebarInvoice" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-file-invoice"></i></span>
                    <span class="menu-text"> Invoice</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarInvoice">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','invoice','invoices']) }}" class="side-nav-link">
                                <span class="menu-text">Invoices</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','invoice','invoice-details']) }}" class="side-nav-link">
                                <span class="menu-text">View Invoice</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','invoice','invoice-create']) }}" class="side-nav-link">
                                <span class="menu-text">Create Invoice</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-files"></i></span>
                    <span class="menu-text"> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['pages','pages-starter']) }}" class="side-nav-link">
                                <span class="menu-text">Starter Page</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['pages','pages-faq']) }}" class="side-nav-link">
                                <span class="menu-text">FAQ</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['pages','pages-maintenance']) }}" class="side-nav-link">
                                <span class="menu-text">Maintenance</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['pages','pages-timeline']) }}" class="side-nav-link">
                                <span class="menu-text">Timeline</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['pages','pages-coming-soon']) }}" class="side-nav-link">
                                <span class="menu-text">Coming Soon</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['pages','pages-terms-conditions']) }}" class="side-nav-link">
                                <span class="menu-text">Terms & Conditions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPricing" aria-expanded="false" aria-controls="sidebarPricing" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-receipt-2"></i></span>
                    <span class="menu-text"> Pricing</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPricing">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','pricing','pricing-one']) }}" class="side-nav-link">
                                <span class="menu-text">Pricing One</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','pricing','pricing-two']) }}" class="side-nav-link">
                                <span class="menu-text">Pricing Two</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-lock"></i></span>
                    <span class="menu-text"> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','login']) }}" class="side-nav-link">
                                <span class="menu-text">Login</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','register']) }}" class="side-nav-link">
                                <span class="menu-text">Register</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('second', ['auth', 'logout'])}}" class="side-nav-link">
                                <span class="menu-text">Logout</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','recover-password']) }}" class="side-nav-link">
                                <span class="menu-text">Recover Password</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','create-password']) }}" class="side-nav-link">
                                <span class="menu-text">Create Password</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','lock-screen']) }}" class="side-nav-link">
                                <span class="menu-text">Lock Screen</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','confirm-mail']) }}" class="side-nav-link">
                                <span class="menu-text">Confirm Mail</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','login-pin']) }}" class="side-nav-link">
                                <span class="menu-text">Login with PIN</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','2fa']) }}" class="side-nav-link">
                                <span class="menu-text">2FA</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['auth','account-deactivation']) }}" class="side-nav-link">
                                <span class="menu-text">Account Deactivation</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-server-2"></i></span>
                    <span class="menu-text"> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesError">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','401']) }}" class="side-nav-link">
                                <span class="menu-text">401 Unauthorized</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','400']) }}" class="side-nav-link">
                                <span class="menu-text">400 Bad Request</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','403']) }}" class="side-nav-link">
                                <span class="menu-text">403 Forbidden</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','404']) }}" class="side-nav-link">
                                <span class="menu-text">404 Not Found</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','408']) }}" class="side-nav-link">
                                <span class="menu-text">408 Request Timeout</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','500']) }}" class="side-nav-link">
                                <span class="menu-text">500 Internal Server</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','501']) }}" class="side-nav-link">
                                <span class="menu-text">501 Not Implemented</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','502']) }}" class="side-nav-link">
                                <span class="menu-text">502 Service Overloaded</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','service-unavailable']) }}" class="side-nav-link">
                                <span class="menu-text">Service Unavailable</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['error','404-alt']) }}" class="side-nav-link">
                                <span class="menu-text">Error 404 Alt</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmailTemplates" aria-expanded="false" aria-controls="sidebarEmailTemplates" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-news"></i></span>
                    <span class="menu-text"> Email Templates </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmailTemplates">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','email','basic']) }}" class="side-nav-link">
                                <span class="menu-text">Basic Email</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','email','templates-invoice']) }}" class="side-nav-link">
                                <span class="menu-text">Purchase Invoice</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('third' , ['pages','email','activation']) }}" class="side-nav-link">
                                <span class="menu-text">Account Activation</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Components</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-brightness"></i></span>
                    <span class="menu-text"> Base UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','accordions']) }}" class="side-nav-link">
                                <span class="menu-text">Accordions</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','alerts']) }}" class="side-nav-link">
                                <span class="menu-text">Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','avatars']) }}" class="side-nav-link">
                                <span class="menu-text">Avatars</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','badges']) }}" class="side-nav-link">
                                <span class="menu-text">Badges</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','breadcrumb']) }}" class="side-nav-link">
                                <span class="menu-text">Breadcrumb</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','buttons']) }}" class="side-nav-link">
                                <span class="menu-text">Buttons</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','cards']) }}" class="side-nav-link">
                                <span class="menu-text">Cards</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','carousel']) }}" class="side-nav-link">
                                <span class="menu-text">Carousel</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','collapse']) }}" class="side-nav-link">
                                <span class="menu-text">Collapse</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','dropdowns']) }}" class="side-nav-link">
                                <span class="menu-text">Dropdowns</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','ratios']) }}" class="side-nav-link">
                                <span class="menu-text">Ratios</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','grid']) }}" class="side-nav-link">
                                <span class="menu-text">Grid</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','links']) }}" class="side-nav-link">
                                <span class="menu-text">Links</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','list-group']) }}" class="side-nav-link">
                                <span class="menu-text">List Group</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','modals']) }}" class="side-nav-link">
                                <span class="menu-text">Modals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','notifications']) }}" class="side-nav-link">
                                <span class="menu-text">Notifications</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','offcanvas']) }}" class="side-nav-link">
                                <span class="menu-text">Offcanvas</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','placeholders']) }}" class="side-nav-link">
                                <span class="menu-text">Placeholders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','pagination']) }}" class="side-nav-link">
                                <span class="menu-text">Pagination</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','popovers']) }}" class="side-nav-link">
                                <span class="menu-text">Popovers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','progress']) }}" class="side-nav-link">
                                <span class="menu-text">Progress</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','scrollspy']) }}" class="side-nav-link">
                                <span class="menu-text">Scrollspy</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','spinners']) }}" class="side-nav-link">
                                <span class="menu-text">Spinners</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','tabs']) }}" class="side-nav-link">
                                <span class="menu-text">Tabs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','tooltips']) }}" class="side-nav-link">
                                <span class="menu-text">Tooltips</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','typography']) }}" class="side-nav-link">
                                <span class="menu-text">Typography</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['ui','utilities']) }}" class="side-nav-link">
                                <span class="menu-text">Utilities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-alien"></i></span>
                    <span class="menu-text"> Extended UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['extended-ui','dragula']) }}" class="side-nav-link">
                                <span class="menu-text">Dragula</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['extended-ui','sweet-alerts']) }}" class="side-nav-link">
                                <span class="menu-text">Sweet Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['extended-ui','ratings']) }}" class="side-nav-link">
                                <span class="menu-text">Ratings</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['extended-ui','scrollbar']) }}" class="side-nav-link">
                                <span class="menu-text">Scrollbar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-leaf"></i></span>
                    <span class="menu-text"> Icons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['icons','tablar']) }}" class="side-nav-link">
                                <span class="menu-text">Tabler</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['icons','solar']) }}" class="side-nav-link">
                                <span class="menu-text">Solar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-chart-arcs"></i></span>
                    <span class="menu-text"> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','area']) }}" class="side-nav-link">
                                <span class="menu-text">Area</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','bar']) }}" class="side-nav-link">
                                <span class="menu-text">Bar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','bubble']) }}" class="side-nav-link">
                                <span class="menu-text">Bubble</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','candlestick']) }}" class="side-nav-link">
                                <span class="menu-text">Candlestick</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','column']) }}" class="side-nav-link">
                                <span class="menu-text">Column</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','heatmap']) }}" class="side-nav-link">
                                <span class="menu-text">Heatmap</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','line']) }}" class="side-nav-link">
                                <span class="menu-text">Line</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','mixed']) }}" class="side-nav-link">
                                <span class="menu-text">Mixed</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','timeline']) }}" class="side-nav-link">
                                <span class="menu-text">Timeline</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','boxplot']) }}" class="side-nav-link">
                                <span class="menu-text">Boxplot</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','treemap']) }}" class="side-nav-link">
                                <span class="menu-text">Treemap</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','pie']) }}" class="side-nav-link">
                                <span class="menu-text">Pie</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','radar']) }}" class="side-nav-link">
                                <span class="menu-text">Radar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','radialbar']) }}" class="side-nav-link">
                                <span class="menu-text">RadialBar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','scatter']) }}" class="side-nav-link">
                                <span class="menu-text">Scatter</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','polar-area']) }}" class="side-nav-link">
                                <span class="menu-text">Polar Area</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['charts','sparklines']) }}" class="side-nav-link">
                                <span class="menu-text">Sparklines</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-forms"></i></span>
                    <span class="menu-text"> Forms </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','elements']) }}" class="side-nav-link">
                                <span class="menu-text">Basic Elements</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','inputmask']) }}" class="side-nav-link">
                                <span class="menu-text">Inputmask</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','picker']) }}" class="side-nav-link">
                                <span class="menu-text">Picker</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','select']) }}" class="side-nav-link">
                                <span class="menu-text">Select</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','range-slider']) }}" class="side-nav-link">
                                <span class="menu-text">Range Slider</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','validation']) }}" class="side-nav-link">
                                <span class="menu-text">Validation</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','wizard']) }}" class="side-nav-link">
                                <span class="menu-text">Wizard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','fileupload']) }}" class="side-nav-link">
                                <span class="menu-text">File Uploads</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','editors']) }}" class="side-nav-link">
                                <span class="menu-text">Editors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['forms','layouts']) }}" class="side-nav-link">
                                <span class="menu-text">Layouts</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-table"></i></span>
                    <span class="menu-text"> Tables </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['tables','basics']) }}" class="side-nav-link">
                                <span class="menu-text">Basic Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['tables','gridjs']) }}" class="side-nav-link">
                                <span class="menu-text">Gridjs Tables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-map-pin"></i></span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['maps','google']) }}" class="side-nav-link">
                                <span class="menu-text">Google Maps</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['maps','vector']) }}" class="side-nav-link">
                                <span class="menu-text">Vector Maps</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['maps','leaflet']) }}" class="side-nav-link">
                                <span class="menu-text">Leaflet Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">
                More
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-layout"></i></span>
                    <span class="menu-text"> Layouts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','horizontal']) }}" target="_blank" class="side-nav-link">Horizontal</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','detached']) }}" target="_blank" class="side-nav-link">Detached</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','full']) }}" target="_blank" class="side-nav-link">Full View</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','fullscreen']) }}" target="_blank" class="side-nav-link">Fullscreen View</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','hover']) }}" target="_blank" class="side-nav-link">Hover Menu</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','compact']) }}" target="_blank" class="side-nav-link">Compact</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route ('second' , ['layouts-demo','icon-view']) }}" target="_blank" class="side-nav-link">Icon View</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-box-multiple-3"></i></span>
                    <span class="menu-text"> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel" class="side-nav-link">
                                <span class="menu-text"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel" class="side-nav-link">
                                <span class="menu-text"> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel" class="side-nav-link">
                                            <span class="menu-text"> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="sub-menu">
                                                <li class="side-nav-item">
                                                    <a href="javascript: void(0);" class="side-nav-link">
                                                        <span class="menu-text">Item 2.1</span>
                                                    </a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a href="javascript: void(0);" class="side-nav-link">
                                                        <span class="menu-text">Item 2.2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- Help Box -->
        <div class="help-box text-center">
            <img src="/images/coffee-cup.svg" height="90" alt="Helper Icon Image" />
            <h5 class="mt-3 fw-semibold fs-16">Unlimited Access</h5>
            <p class="mb-3 text-muted">Upgrade to plan to get access to unlimited reports</p>
            <a href="javascript: void(0);" class="btn btn-danger btn-sm">Upgrade</a>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Sidenav Menu End -->
