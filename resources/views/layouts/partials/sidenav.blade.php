@php
    use Illuminate\Support\Str;
    $villages = App\Models\Location::where('type', 'Village')->orderBy('name')->get();
    $hills = App\Models\Location::where('type', 'Hill')->orderBy('altitude', 'desc')->get();
    $marine = App\Models\Location::where('type', 'Marine')->orderBy('name')->get();
@endphp

<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('dashboards.index') }}" class="logo">
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
                        @foreach ($villages as $village)
                            <li class="side-nav-item">
                                <a href="{{ route('forecast', Str::slug($village->name)) }}" class="side-nav-link">
                                    <span class="menu-text">{{ $village->name }}</span>
                                </a>
                            </li>
                        @endforeach
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
                        @foreach ($hills as $hill)
                            <li class="side-nav-item">
                                <a href="{{ route('forecast', Str::slug($hill->name)) }}" class="side-nav-link">
                                    <span class="menu-text">{{ $hill->name }} ({{ $hill->altitude }}m)</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <!-- Marine Locations Dropdown (Alphabetical) -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMarine" aria-expanded="false" aria-controls="sidebarMarine" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-anchor"></i></span>
                    <span class="menu-text">Marine Locations</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMarine">
                    <ul class="sub-menu">
                        @foreach ($marine as $marineLocation)
                            <li class="side-nav-item">
                                <a href="{{ route('forecast', Str::slug($marineLocation->name)) }}" class="side-nav-link">
                                    <span class="menu-text">{{ $marineLocation->name }}</span>
                                </a>
                            </li>
                        @endforeach
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
