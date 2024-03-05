<?php
    $configData = Helper::appClasses();
?>

<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/front-page-landing.css')); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <style type="text/css">
        span.midd_img {
            height: 100px;
            display: flex;
            align-items: center;
        }

        span.midd_img img {
            margin: 0 auto;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/front-page-landing.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div data-bs-spy="scroll" class="scrollspy-example">
        <div id="app-home">
            <!-- Top Heading -->
            <section class="mt-0 home_sec" id="topH_section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="top_head">Find The Best <span>Software & Services</span><br>For Your Business</h1>
                            <p class="f-22-w-5-c-f">Take your business to new heights with the right solution</p>
                        </div>
                        <div class="col-12 mt-lg-4 text-center">
                            <form class="" method="get" action="<?php echo e(route('search')); ?>" id="searchform">
                                <input type="text" name="query" placeholder="Search Company / Software"
                                    class="live-search-input">
                                <span class="search_btn_outer">
                                    <button type="submit" class="btn btn-white btn-search"><i
                                            class="ti ti-search"></i></button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top Heading -->
            <!-- Steps -->
            <section class="mt-0 py-5" id="setepH_section">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2 class="section_head">Simplify every step Of <span>your research</span> process with us</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mb-sm-3 mb-md-3 mb-lg-0 mb-3">
                            <div class="steps_outer">
                                <div class="step_header text-center">
                                    <p>Explore Choices</p>
                                </div>
                                <div class="step_body text-center">
                                    <img src="<?php echo e(asset('assets/img/front-pages/step-1.png')); ?>">
                                    <p>Browse a wide range of software tools and services</p>
                                </div>
                                <span class="step_digit">1</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-sm-3 mb-md-3 mb-lg-0 mb-3">
                            <div class="steps_outer">
                                <div class="step_header text-center">
                                    <p>Reviews & Rating</p>
                                </div>
                                <div class="step_body text-center">
                                    <img src="<?php echo e(asset('assets/img/front-pages/step-2.png')); ?>">
                                    <p>See what others say about their experiences</p>
                                </div>
                                <span class="step_digit">2</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-sm-3 mb-md-3 mb-lg-0 mb-3">
                            <div class="steps_outer">
                                <div class="step_header text-center">
                                    <p>Comparison</p>
                                </div>
                                <div class="step_body text-center">
                                    <img src="<?php echo e(asset('assets/img/front-pages/step-3.png')); ?>">
                                    <p>Evaluate options based on your needs</p>
                                </div>
                                <span class="step_digit">3</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-sm-3 mb-md-3 mb-lg-0 mb-3">
                            <div class="steps_outer">
                                <div class="step_header text-center">
                                    <p>Select with Confidence</p>
                                </div>
                                <div class="step_body text-center">
                                    <img src="<?php echo e(asset('assets/img/front-pages/step-4.png')); ?>">
                                    <p>Finalize the option that best serves your business needs</p>
                                </div>
                                <span class="step_digit">4</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Steps -->

            <!-- Top Software -->
            <section class="mt-0 py-5" id="softH_section">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2 class="section_head">Discover <span>Top Software</span> By Categories</h2>
                        </div>
                    </div>
                    <div class="cat_tabs">
                        <div class="nav-align-left mb-4">
                            <ul class="nav nav-pills me-3 col-lg-4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_accounting_software" aria-controls="tab_accounting_software"
                                        aria-selected="true">Accounting Software</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_crm_software" aria-controls="tab_crm_software"
                                        aria-selected="false" tabindex="-1">CRM Software</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_erp_software" aria-controls="tab_erp_software"
                                        aria-selected="false" tabindex="-1">ERP Software</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_lms_software" aria-controls="tab_lms_software"
                                        aria-selected="false" tabindex="-1">LMS Software</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_pm_software" aria-controls="tab_pm_software"
                                        aria-selected="false" tabindex="-1">Project Management Software</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_hr_software" aria-controls="tab_hr_software"
                                        aria-selected="false" tabindex="-1">HR Software</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab_accounting_software" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular Accounting Software</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(2)[0])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>

                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(2)[0])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($soft['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/company/' . $soft['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>
                                                    <a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft['name'])])); ?>"><?php echo e($soft['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tab_crm_software" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular CRM Software</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(2)[1])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(2)[1])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($soft['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/company/' . $soft['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>
                                                    <a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft['name'])])); ?>"><?php echo e($soft['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_erp_software" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular ERP Software</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(2)[2])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(2)[2])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($soft['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/company/' . $soft['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>
                                                    <a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft['name'])])); ?>"><?php echo e($soft['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_lms_software" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular LMS Software</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(2)[3])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(2)[3])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($soft['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/company/' . $soft['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>
                                                    <a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft['name'])])); ?>"><?php echo e($soft['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_pm_software" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular Project Management Software</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(2)[4])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(2)[4])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($soft['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/company/' . $soft['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>
                                                    <a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft['name'])])); ?>"><?php echo e($soft['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_hr_software" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular HR Software</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(2)[5])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(2)[5])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($soft['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/company/' . $soft['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>
                                                    <a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft['name'])])); ?>"><?php echo e($soft['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top Software -->

            <!-- Statistics -->
            <section class="mt-0 py-5" id="steticH_section">
                <div class="container">
                    <div class="stetic_outer">
                        <div class="stetic_inner">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h2>5000+</h2>
                                    <p>Software Products</p>
                                </div>
                                <div class="col-lg-3">
                                    <h2>350+</h2>
                                    <p>Software Categories</p>
                                </div>
                                <div class="col-lg-3">
                                    <h2>150+</h2>
                                    <p>Services Categories</p>
                                </div>
                                <div class="col-lg-3">
                                    <h2>2000+</h2>
                                    <p>Service Providers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Statistics -->

            <!-- Top Services -->
            <section class="mt-0 py-5" id="softH_section">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2 class="section_head">Discover <span>Top Services</span> By Categories</h2>
                        </div>
                    </div>
                    <div class="cat_tabs">
                        <div class="nav-align-left mb-4">
                            <ul class="nav nav-pills me-3 col-lg-4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_s_app_development" aria-controls="tab_s_app_development"
                                        aria-selected="true">App Development Companies</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_s_software_development"
                                        aria-controls="tab_s_software_development" aria-selected="false"
                                        tabindex="-1">Software Development Companies</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_s_digital_marketing" aria-controls="tab_s_digital_marketing"
                                        aria-selected="false" tabindex="-1">Digital Marketing Companies</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_s_web_development" aria-controls="tab_s_web_development"
                                        aria-selected="false" tabindex="-1">Web Development Companies</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_s_app_design" aria-controls="tab_s_app_design"
                                        aria-selected="false" tabindex="-1">App Design Companies</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab_s_saas_marketing" aria-controls="tab_s_saas_marketing"
                                        aria-selected="false" tabindex="-1">SAAS Marketing Agencies</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab_s_app_development" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular App Development Companies</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(1)[0])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(1)[0])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($services['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/service/' . $services['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>

                                                    <a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services['name'])])); ?>"><?php echo e($services['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_s_software_development" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular Software Development Companies</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(1)[1])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(1)[1])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($services['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/service/' . $services['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>

                                                    <a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services['name'])])); ?>"><?php echo e($services['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_s_digital_marketing" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular Digital Marketing Companies</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(1)[2])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(1)[2])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($services['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/service/' . $services['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>

                                                    <a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services['name'])])); ?>"><?php echo e($services['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_s_web_development" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular Web Development Companies</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(1)[3])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(1)[3])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($services['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/service/' . $services['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>

                                                    <a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services['name'])])); ?>"><?php echo e($services['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_s_app_design" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular App Design Companies</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(1)[4])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(1)[4])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($services['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/service/' . $services['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>

                                                    <a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services['name'])])); ?>"><?php echo e($services['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_s_saas_marketing" role="tabpanel">
                                    <div class="d-flex justify-content-between">
                                        <p class="list_tit">List of Popular SAAS Marketing Agencies</p>
                                        <a href="<?php echo e(getHomeListing(homePageStaticSoftwareIds(1)[5])['page_url']); ?>"
                                            class="list_tit_link">See All</a>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        <?php $__currentLoopData = array_slice(getHomeListing(homePageStaticSoftwareIds(1)[5])['data'], 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col">
                                                <div class="soft_list_item">
                                                    <?php if($services['logo']): ?>
                                                        <span class="midd_img"><img
                                                                src="<?php echo e(asset('assets/service/' . $services['logo'])); ?>"
                                                                class="listing-logo mb-2"></span>
                                                    <?php else: ?>
                                                        <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services['name'], 0, 1)); ?>"
                                                            height="100px" width="100px" class="img-fluid mb-2">
                                                    <?php endif; ?>

                                                    <a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services['name'])])); ?>"><?php echo e($services['name']); ?></a>
                                                    <div class="soft_list_rating hide_review_only">
                                                        <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top Software -->

            <!-- Statistics -->
            <section class="mt-0 py-5" id="getlistedH_section">
                <div class="container">
                    <div class="stetic_outer">
                        <div class="stetic_inner">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <h2>List Your Software or Service to Connect with <span>New Customers</span></h2>
                                    <p class="text-white text-left">Join SoftwareWorld to unlock new growth avenues.
                                        Present your innovative solutions to an audience that values quality and expertise.
                                    </p>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <a href="javascript:void(0)" class=" btn btn-white">GET LISTED</a>
                                </div>

                            </div>
                            <div class="p-a-arrow">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Statistics -->

            <!-- Latest -->
            <section class="mt-0 py-5" id="latestH_section">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2 class="section_head"><span>Latest</span> software and services listing </h2>
                        </div>
                    </div>
                    <div class="row latest_list">
                        <div class="col-lg-6 mb-3 mb-lg-0 mb-md-3">
                            <h4>Latest Software</h4>
                            <div class="g-3 g-md-4 gx-lg-6 row row-cols-2 row-cols-lg-2 row-cols-md-2">
                                <?php $__currentLoopData = getLatestSoftware(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-lg-5 pe-0">
                                                <?php if($soft->logo): ?>
                                                    <img src="<?php echo e(asset('assets/company/' . $soft->logo)); ?>"
                                                        class="listing-logo">
                                                <?php else: ?>
                                                    <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($soft->name, 0, 1)); ?>"
                                                        height="100px" width="100px" class="img-fluid mb-2">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-7">
                                                <p><a
                                                        href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft->name)])); ?>"><?php echo e($soft->name); ?></a>
                                                </p>
                                                <p><?php echo e($soft->tagline); ?></p>
                                                <p class="hide_review_only"><small><a href="#"><i
                                                                class="ti ti-edit"></i>&nbsp;Write a Review</a></small></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4>Latest Service</h4>
                            <div class="g-3 g-md-4 gx-lg-6 row row-cols-2 row-cols-lg-2 row-cols-md-2">
                                <?php $__currentLoopData = getLatestService(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-lg-5 pe-0">
                                                <?php if($services->logo): ?>
                                                    <img src="<?php echo e(asset('assets/service/' . $services->logo)); ?>"
                                                        class="listing-logo">
                                                <?php else: ?>
                                                    <img src="https://placehold.co/70x70/fdd400/000000/png?text=<?php echo e(substr($services->name, 0, 1)); ?>"
                                                        height="100px" width="100px" class="img-fluid mb-2">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-7">
                                                <p><a
                                                        href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services->name)])); ?>"><?php echo e($services->name); ?></a>
                                                </p>
                                                <p><?php echo e($services->tagline); ?></p>
                                                <p class="hide_review_only"><small><a href="#"><i
                                                                class="ti ti-edit"></i>&nbsp;Write a Review</a></small></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest -->




        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/front/web/home.blade.php ENDPATH**/ ?>