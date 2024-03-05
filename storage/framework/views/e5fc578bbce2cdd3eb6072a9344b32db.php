<?php
$currentRouteName = Route::currentRouteName();
$activeRoutes = ['front-pages-pricing', 'front-pages-payment', 'front-pages-checkout', 'front-pages-help-center'];
$activeClass = in_array($currentRouteName, $activeRoutes) ? 'active' : '';
?>
<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
    <div class="container">
        <div class="navbar navbar-expand-custom landing-navbar">
            <!-- Menu logo wrapper: Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
                <!-- Mobile menu toggle: Start-->
                <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti ti-menu-2 ti-sm align-middle"></i>
                </button>
                <!-- Mobile menu toggle: End-->
                <a href="<?php echo e(url('/')); ?>" class="app-brand-link">
                    <img src="<?php echo e(asset('assets/img/branding/nav_logo.svg')); ?>">
                </a>
                <a href="<?php echo e(url('login')); ?>" class="user-mobile"><i class="ti ti-user"></i></a>
            </div>
            <!-- Menu logo wrapper: End -->
            <!-- Menu wrapper: Start -->
            <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti ti-x ti-sm"></i>
                </button>
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item">
                        <form method="get" action="<?php echo e(url('search')); ?>" onsubmit="return false;">
                            <input type="search" name="q" value="" placeholder="Search" class="live-search-input" autocomplete="off" autocorrect="off" autocapitalize="off">
                            <i class="ti ti-search"></i>
                        </form>
                    </li>
                    <li class="nav-item dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                            Software
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                          <?php $__currentLoopData = listing_pages(2) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                              <a class="dropdown-item" href="<?php echo e(route('front_software_listing', $page->slug)); ?>">
                                <span class="align-middle"><?php echo e($page->title); ?></span>
                              </a>
                            </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="b_all">
                                <a class="dropdown-item" href="<?php echo e(route('directories','software')); ?>">
                                <span class="align-middle">Browse All Software</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown me-2 me-xl-0">
                        
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                          Services
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                          <?php $__currentLoopData = listing_pages(1) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                              <a class="dropdown-item" href="<?php echo e(route('front_service_listing', $page->slug)); ?>">
                                <span class="align-middle"><?php echo e($page->title); ?></span>
                              </a>
                            </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <li class="b_all">
                            <a class="dropdown-item" href="<?php echo e(route('directories','services')); ?>">
                              <span class="align-middle">Browse All Services</span>
                            </a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-item hide_review_only">
                        <a class="nav-link fw-medium" aria-current="page" href="<?php echo e(url('/')); ?>">Write a Review</a>
                    </li>
                    <?php if(!auth()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page" href="<?php echo e(route('auth-register-basic')); ?>">Get Listed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary fw-medium" aria-current="page" href="<?php echo e(route('login')); ?>">Sign in</a>
                    </li>
                    <?php endif; ?>
                    <!-- User -->
                    
                    <?php if(auth()->check() && auth()->user()->hasRole('vendor')): ?>
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-online">
                                <img src="<?php echo e(auth()->user()->profile_url); ?>" alt="" class="h-auto rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="<?php echo e(auth()->user()->profile_url); ?>" alt="" class="h-auto rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-medium d-block"><?php echo e(auth()->user()->name); ?></span>
                                            <small class="text-muted"><?php echo e(ucfirst((auth()->user()->roles)[0]->name)); ?></small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>">
                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                <span class="align-middle">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('settings')); ?>">
                                <i class="ti ti-settings me-2 ti-sm"></i>
                                <span class="align-middle">Settings</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('clogout')); ?>">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!--/ User -->
                </ul>
            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <!-- <ul class="navbar-nav flex-row align-items-center ms-auto">
                <?php if(auth()->guard()->check()): ?>
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    Dashboard
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                        <li>
                            <a class="dropdown-item" aria-current="page" href="<?php echo e(route('userDashboard')); ?>">Dashboard</a>
                        </li>
                        <li>
                            <a class="dropdown-item" aria-current="page" href="<?php echo e(route('userDashboard')); ?>">Update Listing</a>
                        </li>
                    </ul>
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo e(url('/login-signup')); ?>" class="btn btn-primary"><span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span><span class="d-none d-md-block">Login/Register</span></a>
                </li>
                <?php endif; ?>

            </ul> -->

        </div>
    </div>
</nav>
<!-- Navbar: End -->
<?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/layouts/sections/navbar/navbar-front.blade.php ENDPATH**/ ?>