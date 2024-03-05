<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-site-theme d-flex" id="layout-navbar">
    <div class="container">
        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
                <img src="{{asset('assets/img/branding/nav_logo.svg')}}">
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="ti ti-x ti-sm align-middle"></i>
            </a>
        </div>
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-xl-0  d-xl-none  ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>
        <div class="navbar-brand app-brand demo d-xl-none py-0 m-0">
            <a href="index.html" class="app-brand-link gap-2">
                <img src="{{asset('assets/img/branding/nav_logo.svg')}}">
            </a>
        </div>
        <div class="nav_same_target layout-right-toggle navbar-nav align-items-xl-center me-xl-0  d-xl-none  ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>
        <div class="nav_same_target navbar-nav-right d-xl-flex align-items-center d-none" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto gap-4">
                <!-- Search -->
                <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
                    <div class="search-group">
                        <form method="get" action="{{url('search')}}" onsubmit="return false;">
                            <input type="text"  class="live-search-input" name="q" value="" placeholder="Search" id="header_search">
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                </li>
                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link" href="javascript:void(0);">Software</a>
                </li>
                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link" href="javascript:void(0);">Services</a>
                </li>

                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link d-none" href="javascript:void(0);">Write a Review</a>
                </li>

                <!-- /Search -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-online">
                            <img src="{{ auth()->user()->profile_url }}" alt="" class="h-auto rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ auth()->user()->profile_url }}" alt="" class="h-auto rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                        <small class="text-muted">{{ ucfirst((auth()->user()->roles)[0]->name) }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('profile.index')}}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('settings')}}">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('clogout')}}">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
            <span class="twitter-typeahead container-xxl" style="position: relative; display: inline-block;">
                <input type="text" class="form-control search-input border-0 container-xxl tt-input" placeholder="Search..." aria-label="Search..." autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
                <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
                <div class="tt-menu navbar-search-suggestion ps" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
                    <div class="tt-dataset tt-dataset-pages"></div>
                    <div class="tt-dataset tt-dataset-files"></div>
                    <div class="tt-dataset tt-dataset-members"></div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
            </span>
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
        </div>
    </div>
</nav>
