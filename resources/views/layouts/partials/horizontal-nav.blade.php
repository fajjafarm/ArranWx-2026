<!-- Horizontal Menu Start -->
<header class="topnav">
    <nav class="navbar navbar-expand-lg">
        <nav class="page-container">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-dashboards" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                            <span class="menu-text"> Dashboards </span>
                            <div class="menu-arrow"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                            <a href="{{ route ('second' ,['dashboards','index']) }}" class="dropdown-item">Sales</a>
                            <a href="{{ route ('second' ,['dashboards','clinic']) }}" class="dropdown-item">Clinic</a>
                            <a href="{{ route ('second' ,['dashboards','e-wallet']) }}" class="dropdown-item">eWallet</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i class="ti ti-apps"></i></span>
                            <span class="menu-text">Apps</span>
                            <div class="menu-arrow"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                            <a href="{{ route ('second' ,['pages','chat']) }}" class="dropdown-item">Chat</a>
                            <a href="{{ route ('second' , ['pages','calendar']) }}" class="dropdown-item">Calendar</a>
                            <a href="{{ route ('second' , ['pages','email']) }}" class="dropdown-item">Email</a>
                            <a href="{{ route ('second' , ['pages','file-manager']) }}" class="dropdown-item">File Manager</a>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-hospital" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hospital
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-hospital">
                                    <a href="{{ route ('second' , ['hospital','doctors']) }}" class="dropdown-item">Doctors</a>
                                    <a href="{{ route ('second' , ['hospital','doctors-details']) }}" class="dropdown-item">Doctor Details</a>
                                    <a href="{{ route ('second' , ['hospital','add-doctors']) }}" class="dropdown-item">Add Doctors</a>
                                    <a href="{{ route ('second' , ['hospital','patients']) }}" class="dropdown-item">Patients</a>
                                    <a href="{{ route ('second' , ['hospital','patient-details']) }}" class="dropdown-item">Patient Details</a>
                                    <a href="{{ route ('second' , ['hospital','add-patients']) }}" class="dropdown-item">Add Patients</a>
                                    <a href="{{ route ('second' , ['hospital','appointments']) }}" class="dropdown-item">Appointments</a>
                                    <a href="{{ route ('second' , ['hospital','payments']) }}" class="dropdown-item">Payments</a>
                                    <a href="{{ route ('second' , ['hospital','departments']) }}" class="dropdown-item">Departments</a>
                                    <a href="{{ route ('second' , ['hospital','reviews']) }}" class="dropdown-item">Reviews</a>
                                    <a href="{{ route ('second' , ['hospital','contacts']) }}" class="dropdown-item">Hospital Contacts</a>
                                    <a href="{{ route ('second' , ['hospital','staffs']) }}" class="dropdown-item">Staffs</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ecommerce
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route ('second' , ['ecommerce','products']) }}" class="dropdown-item">Products</a>
                                    <a href="{{ route ('second' , ['ecommerce','products-grid']) }}" class="dropdown-item">Products Grid</a>
                                    <a href="{{ route ('second' , ['ecommerce','product-details']) }}" class="dropdown-item">Product Details</a>
                                    <a href="{{ route ('second' , ['ecommerce','products-add']) }}" class="dropdown-item">Add Products</a>
                                    <a href="{{ route ('second' , ['ecommerce','categories']) }}" class="dropdown-item">Categories</a>
                                    <a href="{{ route ('second' , ['ecommerce','orders']) }}" class="dropdown-item">Orders</a>
                                    <a href="{{ route ('second' , ['ecommerce','order-details']) }}" class="dropdown-item">Order Details</a>
                                    <a href="{{ route ('second' , ['ecommerce','customers']) }}" class="dropdown-item">Customers</a>
                                    <a href="{{ route ('second' , ['ecommerce','sellers']) }}" class="dropdown-item">Sellers</a>
                                </div>
                            </div>                           
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-tasks" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Invoice
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-tasks">
                                    <a href="{{ route ('third' , ['pages','invoice','invoices']) }}" class="dropdown-item">Invoices</a>
                                    <a href="{{ route ('third' , ['pages','invoice','invoice-details']) }}" class="dropdown-item">View Invoice</a>
                                    <a href="{{ route ('third' , ['pages','invoice','invoice-create']) }}" class="dropdown-item">Create Invoice</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i class="ti ti-file-description"></i></span>
                            <span class="menu-text">Pages</span>
                            <div class="menu-arrow"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-auth" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Authentication <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                    <a href="{{ route ('second' , ['auth','login']) }}" class="dropdown-item">Login</a>
                                    <a href="{{ route ('second' , ['auth','register']) }}" class="dropdown-item">Register</a>
                                    <a href="{{ route ('second',  ['auth', 'logout'])}}" class="dropdown-item">Logout</a>
                                    <a href="{{ route ('second' , ['auth','recover-password']) }}" class="dropdown-item">Recover Password</a>
                                    <a href="{{ route ('second' , ['auth','create-password']) }}" class="dropdown-item">Create Password</a>
                                    <a href="{{ route ('second' , ['auth','lock-screen']) }}" class="dropdown-item">Lock Screen</a>
                                    <a href="{{ route ('second' , ['auth','confirm-mail']) }}" class="dropdown-item">Confirm Mail</a>
                                    <a href="{{ route ('second' , ['auth','login-pin']) }}" class="dropdown-item">Login with PIN</a>
                                    <a href="{{ route ('second' , ['auth','2fa']) }}" class="dropdown-item">2FA</a>
                                    <a href="{{ route ('second' , ['auth','account-deactivation']) }}" class="dropdown-item">Account Deactivation</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-error" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Error <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                    <a href="{{ route ('second' , ['error','401']) }}" class="dropdown-item">401 Unauthorized</a>
                                    <a href="{{ route ('second' , ['error','400']) }}" class="dropdown-item">400 Bad Request</a>
                                    <a href="{{ route ('second' , ['error','403']) }}" class="dropdown-item">403 Forbidden</a>
                                    <a href="{{ route ('second' , ['error','404']) }}" class="dropdown-item">404 Not Found</a>
                                    <a href="{{ route ('second' , ['error','408']) }}" class="dropdown-item">408 Request Timeout</a>
                                    <a href="{{ route ('second' , ['error','500']) }}" class="dropdown-item">500 Internal Server</a>
                                    <a href="{{ route ('second' , ['error','501']) }}" class="dropdown-item">501 Not Implemented</a>
                                    <a href="{{ route ('second' , ['error','502']) }}" class="dropdown-item">502 Service Overloaded</a>
                                    <a href="{{ route ('second' , ['error','service-unavailable']) }}" class="dropdown-item">Service Unavailable</a>
                                    <a href="{{ route ('second' , ['error','404-alt']) }}" class="dropdown-item">Error 404 Alt</a>
                                </div>
                            </div>
                            <a href="{{ route ('second' , ['pages','pages-starter']) }}" class="dropdown-item">Starter Page</a>
                            <a href="{{ route ('second' , ['pages','pages-faq']) }}" class="dropdown-item">FAQ</a>
                            <a href="{{ route ('third' , ['pages','pricing','pricing-one']) }}" class="dropdown-item">Pricing One</a>
                            <a href="{{ route ('third' , ['pages','pricing','pricing-two']) }}" class="dropdown-item">Pricing Two</a>
                            <a href="{{ route ('second' , ['pages','pages-maintenance']) }}" class="dropdown-item">Maintenance</a>
                            <a href="{{ route ('second' , ['pages','pages-timeline']) }}" class="dropdown-item">Timeline</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-components" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i class="ti ti-components"></i></span>
                            <span class="menu-text">Components</span>
                            <div class="menu-arrow"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ui-kit" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Base UI 1
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ui-kit">
                                    <a href="{{ route ('second' , ['ui','accordions']) }}" class="dropdown-item">Accordions</a>
                                    <a href="{{ route ('second' , ['ui','alerts']) }}" class="dropdown-item">Alerts</a>
                                    <a href="{{ route ('second' , ['ui','avatars']) }}" class="dropdown-item">Avatars</a>
                                    <a href="{{ route ('second' , ['ui','badges']) }}" class="dropdown-item">Badges</a>
                                    <a href="{{ route ('second' , ['ui','breadcrumb']) }}" class="dropdown-item">Breadcrumb</a>
                                    <a href="{{ route ('second' , ['ui','buttons']) }}" class="dropdown-item">Buttons</a>
                                    <a href="{{ route ('second' , ['ui','cards']) }}" class="dropdown-item">Cards</a>
                                    <a href="{{ route ('second' , ['ui','carousel']) }}" class="dropdown-item">Carousel</a>
                                    <a href="{{ route ('second' , ['ui','dropdowns']) }}" class="dropdown-item">Dropdowns</a>
                                    <a href="{{ route ('second' , ['ui','grid']) }}" class="dropdown-item">Grid</a>
                                    <a href="{{ route ('second' , ['ui','list-group']) }}" class="dropdown-item">List Group</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ui-kit2" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Base UI 2
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ui-kit2">
                                    <a href="{{ route ('second' , ['ui','modals']) }}" class="dropdown-item">Modals</a>
                                    <a href="{{ route ('second' , ['ui','notifications']) }}" class="dropdown-item">Notifications</a>
                                    <a href="{{ route ('second' , ['ui','offcanvas']) }}" class="dropdown-item">Offcanvas</a>
                                    <a href="{{ route ('second' , ['ui','placeholders']) }}" class="dropdown-item">Placeholders</a>
                                    <a href="{{ route ('second' , ['ui','pagination']) }}" class="dropdown-item">Pagination</a>
                                    <a href="{{ route ('second' , ['ui','popovers']) }}" class="dropdown-item">Popovers</a>
                                    <a href="{{ route ('second' , ['ui','progress']) }}" class="dropdown-item">Progress</a>
                                    <a href="{{ route ('second' , ['ui','spinners']) }}" class="dropdown-item">Spinners</a>
                                    <a href="{{ route ('second' , ['ui','tabs']) }}" class="dropdown-item">Tabs</a>
                                    <a href="{{ route ('second' , ['ui','tooltips']) }}" class="dropdown-item">Tooltips</a>
                                    <a href="{{ route ('second' , ['ui','links']) }}" class="dropdown-item">Links</a>
                                    <a href="{{ route ('second' , ['ui','typography']) }}" class="dropdown-item">Typography</a>
                                    <a href="{{ route ('second' , ['ui','utilities']) }}" class="dropdown-item">Utilities</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-extended-ui" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Extended UI
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-extended-ui">
                                    <a href="{{ route ('second' , ['extended-ui','dragula']) }}" class="dropdown-item">Dragula</a>
                                    <a href="{{ route ('second' , ['extended-ui','sweet-alerts']) }}" class="dropdown-item">Sweet Alerts</a>
                                    <a href="{{ route ('second' , ['extended-ui','ratings']) }}" class="dropdown-item">Ratings</a>
                                    <a href="{{ route ('second' , ['extended-ui','scrollbar']) }}" class="dropdown-item">Scrollbar</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-forms" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Forms
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-forms">
                                    <a href="{{ route ('second' , ['forms','elements']) }}" class="dropdown-item">Basic Elements</a>
                                    <a href="{{ route ('second' , ['forms','inputmask']) }}" class="dropdown-item">Inputmask</a>
                                    <a href="{{ route ('second' , ['forms','picker']) }}" class="dropdown-item">Picker</a>
                                    <a href="{{ route ('second' , ['forms','select']) }}" class="dropdown-item">Select</a>
                                    <a href="{{ route ('second' , ['forms','range-slider']) }}" class="dropdown-item">Range Slider</a>
                                    <a href="{{ route ('second' , ['forms','validation']) }}" class="dropdown-item">Validation</a>
                                    <a href="{{ route ('second' , ['forms','wizard']) }}" class="dropdown-item">Wizard</a>
                                    <a href="{{ route ('second' , ['forms','fileupload']) }}" class="dropdown-item">File Uploads</a>
                                    <a href="{{ route ('second' , ['forms','editors']) }}" class="dropdown-item">Editors</a>
                                    <a href="{{ route ('second' , ['forms','layouts']) }}" class="dropdown-item">Layouts</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-charts" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Charts
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                    <a href="{{ route ('second' , ['charts','area']) }}" class="dropdown-item">Area</a>
                                    <a href="{{ route ('second' , ['charts','bar']) }}" class="dropdown-item">Bar</a>
                                    <a href="{{ route ('second' , ['charts','bubble']) }}" class="dropdown-item">Bubble</a>
                                    <a href="{{ route ('second' , ['charts','candlestick']) }}" class="dropdown-item">Candlestick</a>
                                    <a href="{{ route ('second' , ['charts','column']) }}" class="dropdown-item">Column</a>
                                    <a href="{{ route ('second' , ['charts','heatmap']) }}" class="dropdown-item">Heatmap</a>
                                    <a href="{{ route ('second' , ['charts','line']) }}" class="dropdown-item">Line</a>
                                    <a href="{{ route ('second' , ['charts','mixed']) }}" class="dropdown-item">Mixed</a>
                                    <a href="{{ route ('second' , ['charts','timeline']) }}" class="dropdown-item">Timeline</a>
                                    <a href="{{ route ('second' , ['charts','boxplot']) }}" class="dropdown-item">Boxplot</a>
                                    <a href="{{ route ('second' , ['charts','treemap']) }}" class="dropdown-item">Treemap</a>
                                    <a href="{{ route ('second' , ['charts','pie']) }}" class="dropdown-item">Pie</a>
                                    <a href="{{ route ('second' , ['charts','radar']) }}" class="dropdown-item">Radar</a>
                                    <a href="{{ route ('second' , ['charts','radialbar']) }}" class="dropdown-item">RadialBar</a>
                                    <a href="{{ route ('second' , ['charts','scatter']) }}" class="dropdown-item">Scatter</a>
                                    <a href="{{ route ('second' , ['charts','polar-area']) }}" class="dropdown-item">Polar Area</a>
                                    <a href="{{ route ('second' , ['charts','sparklines']) }}" class="dropdown-item">Sparklines</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-tables" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tables
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-tables">
                                    <a href="{{ route ('third' , ['components','tables','basics']) }}" class="dropdown-item">Basic Tables</a>
                                    <a href="{{ route ('third' , ['components','tables','gridjs']) }}" class="dropdown-item">Gridjs Tables</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-icons" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Icons
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                    <a href="{{ route ('third' , ['components','icons','tablar']) }}" class="dropdown-item">Tabler Icons</a>
                                    <a href="{{ route ('third' , ['components','icons','solar']) }}" class="dropdown-item">Solar Design</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-maps" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Maps
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-maps">
                                    <a href="{{ route ('third' , ['components','maps','google']) }}" class="dropdown-item">Google Maps</a>
                                    <a href="{{ route ('third' , ['components','maps','vector']) }}" class="dropdown-item">Vector Maps</a>
                                    <a href="{{ route ('third' , ['components','maps','leaflet']) }}" class="dropdown-item">Leaflet Maps</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-layouts" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i class="ti ti-layout"></i></span>
                            <span class="menu-text">Layouts</span>
                            <div class="menu-arrow"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layouts">
                            <a href="{{ route ('second' ,['dashboards','index']) }}" class="dropdown-item" target="_blank">Vertical</a>
                            <a href="{{ route ('second' , ['layouts-demo','horizontal']) }}" class="dropdown-item" target="_blank">Horizontal</a>
                            <a href="{{ route ('second' , ['layouts-demo','detached']) }}" class="dropdown-item" target="_blank">Detached</a>
                            <a href="{{ route ('second' , ['layouts-demo','full']) }}" class="dropdown-item" target="_blank">Full</a>
                            <a href="{{ route ('second' , ['layouts-demo','fullscreen']) }}" class="dropdown-item" target="_blank">Fullscreen</a>
                            <a href="{{ route ('second' , ['layouts-demo','hover']) }}" class="dropdown-item" target="_blank">Hover Menu</a>
                            <a href="{{ route ('second' , ['layouts-demo','compact']) }}" class="dropdown-item" target="_blank">Compact Menu</a>
                            <a href="{{ route ('second' , ['layouts-demo','icon-view']) }}" class="dropdown-item" target="_blank">Icon View</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
</header>
<!-- Horizontal Menu End -->
