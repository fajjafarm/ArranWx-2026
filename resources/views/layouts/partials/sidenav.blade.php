<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('second', ['dashboards', 'index']) }}" class="logo">
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
            <li class="side-nav-title">Locations</li>

            <!-- Villages Dropdown (Alphabetical) -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarVillages" aria-expanded="false" aria-controls="sidebarVillages" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-home"></i></span>
                    <span class="menu-text">Villages</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarVillages">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5020&lon=-5.3320') }}" class="side-nav-link">
                                <span class="menu-text">Blackwaterfoot</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5765&lon=-5.1497') }}" class="side-nav-link">
                                <span class="menu-text">Brodick</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6940&lon=-5.3260') }}" class="side-nav-link">
                                <span class="menu-text">Catacol</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6435&lon=-5.1415') }}" class="side-nav-link">
                                <span class="menu-text">Corrie</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6800&lon=-5.3600') }}" class="side-nav-link">
                                <span class="menu-text">Dougarie</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5100&lon=-5.1000') }}" class="side-nav-link">
                                <span class="menu-text">Kildonnan</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.4470&lon=-5.2280') }}" class="side-nav-link">
                                <span class="menu-text">Kilmory</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.4600&lon=-5.2600') }}" class="side-nav-link">
                                <span class="menu-text">Lagg</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5386&lon=-5.1287') }}" class="side-nav-link">
                                <span class="menu-text">Lamlash</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.7051&lon=-5.2912') }}" class="side-nav-link">
                                <span class="menu-text">Lochranza</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6580&lon=-5.3400') }}" class="side-nav-link">
                                <span class="menu-text">Machrie</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.7275&lon=-5.3820') }}" class="side-nav-link">
                                <span class="menu-text">Pirnmill</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6625&lon=-5.1560') }}" class="side-nav-link">
                                <span class="menu-text">Sannox</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5150&lon=-5.3150') }}" class="side-nav-link">
                                <span class="menu-text">Shiskine</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.4630&lon=-5.2830') }}" class="side-nav-link">
                                <span class="menu-text">Sliddery</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.4920&lon=-5.0950') }}" class="side-nav-link">
                                <span class="menu-text">Whiting Bay</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Hills Dropdown (Descending Altitude) -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarHills" aria-expanded="false" aria-controls="sidebarHills" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-mountain"></i></span>
                    <span class="menu-text">Hills</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarHills">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6257&lon=-5.1917') }}" class="side-nav-link">
                                <span class="menu-text">Goat Fell (874m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6356&lon=-5.2228') }}" class="side-nav-link">
                                <span class="menu-text">Caisteal Abhail (859m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6110&lon=-5.2340') }}" class="side-nav-link">
                                <span class="menu-text">Beinn Tarsuinn (826m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6167&lon=-5.2421') }}" class="side-nav-link">
                                <span class="menu-text">Beinn Nuis (792m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6180&lon=-5.2100') }}" class="side-nav-link">
                                <span class="menu-text">Cir Mhor (799m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6833&lon=-5.3264') }}" class="side-nav-link">
                                <span class="menu-text">Beinn Bharrain (721m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6160&lon=-5.2160') }}" class="side-nav-link">
                                <span class="menu-text">Cioch na h-Oighe (660m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6160&lon=-5.2660') }}" class="side-nav-link">
                                <span class="menu-text">Meall nan Damh (570m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6500&lon=-5.2667') }}" class="side-nav-link">
                                <span class="menu-text">Beinn Bhreac (575m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6000&lon=-5.2500') }}" class="side-nav-link">
                                <span class="menu-text">Ard Bheinn (512m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6720&lon=-5.2500') }}" class="side-nav-link">
                                <span class="menu-text">Sail Chalmadale (480m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5640&lon=-5.1840') }}" class="side-nav-link">
                                <span class="menu-text">Tighvein (458m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5240&lon=-5.0720') }}" class="side-nav-link">
                                <span class="menu-text">Mullach Mor (Holy Island) (314m)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5280&lon=-5.0800') }}" class="side-nav-link">
                                <span class="menu-text">Laggan (100m)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Marine Locations Dropdown (Alphabetical, including Beaches, Bays, Piers, Slips, Harbours) -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMarine" aria-expanded="false" aria-controls="sidebarMarine" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-anchor"></i></span>
                    <span class="menu-text">Marine Locations</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMarine">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6400&lon=-4.8210') }}" class="side-nav-link">
                                <span class="menu-text">Ardrossan Harbour</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5020&lon=-5.3330') }}" class="side-nav-link">
                                <span class="menu-text">Blackwaterfoot Beach</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5800&lon=-5.1400') }}" class="side-nav-link">
                                <span class="menu-text">Brodick Bay</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5780&lon=-5.1440') }}" class="side-nav-link">
                                <span class="menu-text">Brodick Pier</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.8740&lon=-5.2450') }}" class="side-nav-link">
                                <span class="menu-text">Clonaig Slip</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5100&lon=-5.1000') }}" class="side-nav-link">
                                <span class="menu-text">Kildonnan Beach</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5300&lon=-5.1200') }}" class="side-nav-link">
                                <span class="menu-text">Lamlash Bay</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.7070&lon=-5.2940') }}" class="side-nav-link">
                                <span class="menu-text">Lochranza Pier</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.6650&lon=-5.1500') }}" class="side-nav-link">
                                <span class="menu-text">Sannox Beach</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/?lat=55.5430&lon=-4.6800') }}" class="side-nav-link">
                                <span class="menu-text">Troon Harbour</span>
                            </a>
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
