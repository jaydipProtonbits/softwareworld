<?php
    $configData = Helper::appClasses();
?>



<?php $__env->startSection('title', $listing->name ?? 'Single Software Page'); ?>

<?php $__env->startSection('meta_title', $listing->name ?? ''); ?>
<?php $__env->startSection('meta_description', $listing->getMeta('short_description') ?? ''); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/front-page-landing.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/ui-carousel.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/front-page-landing.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ui-carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/chartjs/chartjs.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            /*review Open Close*/
            $('button.expand-btn').click(function() {
                $(this).parent().parent().find('.hiiden_item').toggle();
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).html('Hide Full Review <i class="ti ti-chevron-up"></i>');
                } else {
                    $(this).html('Read Full Review <i class="ti ti-chevron-down"></i>');
                }
            });


            // single page tab changes
            jQuery('#inner_menu .menu_items li a').click(function(event) {
                jQuery('#inner_menu .menu_items li a').removeClass('active');
                jQuery(this).addClass('active');
            });

            $(document).ready(function() {
                var fixedSection = $("#inner_menu");
                var offset = fixedSection.offset().top;
                $(window).scroll(function() {
                    if ($(window).scrollTop() > offset) {
                        fixedSection.addClass("fixed");
                    } else {
                        fixedSection.removeClass("fixed");
                    }
                });
            });
        });

        function readMore() {
            var moreText = document.getElementById("more");
            var readMoreButton = document.getElementById("read_more");

            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                readMoreButton.style.display = "none";
            } else {
                moreText.style.display = "none";
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div data-bs-spy="scroll" class="scrollspy-example service_single">

        <!-- Heading Title -->
        <section id="page_heading" class="mt-3 single_heading">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-3 pb-3">
                                <ul class="list-inline m-0 p-0 m-0">
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="b_link">Home /</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="b_link active">
                                            <?php echo e($listing->name); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body mt-3 pb-0 ">
                                <div class="row branding">
                                    <div class="col-lg-8">
                                        <div class="row mb-1">
                                            <div class="col-lg-2">
                                                <?php if($listing->logo): ?>
                                                    <img src="<?php echo e(asset('assets/company/' . $listing->logo)); ?>" width="auto"
                                                        height="100px" alt="<?php echo e($listing->name); ?>">
                                                <?php else: ?>
                                                    <div class="pre_img text-center">
                                                        <?php echo e(substr($listing->name, 0, 1)); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-10">
                                                <h1><?php echo e($listing->name); ?></h1>
                                                <p><?php echo e($listing->tagline); ?></p>
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul class="list-group list-group-horizontal list-inline gap-1">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0 <a href="javascript:void(0);">4 Reviews</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-end">
                                        <a href="<?php echo e($listing->website); ?>" class="btn btn-primary" id="visit_website"
                                            target="_blank">VISIT WEBSITE &nbsp;<i class="ti ti-external-link"></i></a>
                                        <p class="verified_btn">
                                            <?php if($listing->claimed_by): ?>
                                                <i class="ti ti-circle-check"></i> Verified Profile
                                            <?php else: ?>
                                                <i class="ti ti-info-circle text-gray"></i> Unclaimed Profile
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Heading Title -->

        <!-- Menu -->
        <section id="inner_menu" class="mt-0 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="align-items-baseline d-flex justify-content-between menu_inner">
                            <div class="menu_items">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item logo-item">
                                        <?php if($listing->logo): ?>
                                            <img src="<?php echo e(asset('assets/company/' . $listing->logo)); ?>" height="48px"
                                                width="48px" class="img-fluid" alt="<?php echo e($listing->name); ?>">
                                        <?php else: ?>
                                            <img src="https://placehold.co/48x48/fdd400/000000/png?text=<?php echo e(substr($listing->name, 0, 1)); ?>"
                                                height="48px" width="48px" class="img-fluid">
                                        <?php endif; ?>
                                        <span><?php echo e($listing->name); ?></span>
                                    </li>

                                    <li class="list-inline-item"><a href="#overview" class="active">Overview</a></li>
                                    <li class="list-inline-item"><a href="#features">Features</a></li>
                                    <li class="list-inline-item"><a href="#pricing">Pricing</a></li>
                                    <li class="list-inline-item hide_review_only"><a href="#reviews">Reviews</a></li>
                                </ul>
                            </div>
                            <div class="menu_btns">
                                <a href="<?php echo e(route('front_write_review', ['software', $listing->name])); ?>"
                                    class="review_link"><i class="ti ti-edit"></i> &nbsp; Write a Review</a>
                                <a href="<?php echo e($listing->website); ?>" target="_blank" class="website_link">VISIT WEBSITE &nbsp;
                                    <i class="ti ti-external-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Menu -->

        <!-- Overview -->
        <section id="overview" class="section_service mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2>About <?php echo e($listing->name); ?></h2>
                            <div class="row single_meta mb-md-5">

                                <div
                                    class="col-lg-<?php echo e($listing->getMeta('screenshots') ?? false && !empty($listing->getMeta('screenshots')) ? '6' : '12'); ?>">
                                    <div class="text-justify">
                                        <?php echo nl2br($listing->getMeta('long_description')) ?? ''; ?>

                                        
                                    </div>
                                </div>

                                <?php if($listing->getMeta('screenshots') ?? false && !empty($listing->getMeta('screenshots'))): ?>
                                    <div class="col-lg-6 soft_slider">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="swiper-gallery">
                                                    <div class="swiper gallery-top">
                                                        <div class="swiper-wrapper">
                                                            <?php $__currentLoopData = $listing->getMeta('screenshots') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="swiper-slide"
                                                                    style="background-image:url(<?php echo e(asset('assets/software/media/' . $media)); ?>)">
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="swiper gallery-thumbs">
                                                        <div class="swiper-wrapper">
                                                            <?php $__currentLoopData = $listing->getMeta('screenshots') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="swiper-slide"
                                                                    style="background-image:url(<?php echo e(asset('assets/software/media/' . $media)); ?>)">
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <!-- Add Arrows -->
                                                    </div>
                                                    <div class="swiper-button-next swiper-button-black"></div>
                                                    <div class="swiper-button-prev swiper-button-black"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="soft_details row mt-4 pt-4 border-top">
                                <div class="col-lg-3 mb-4">
                                    <h4>Contact Details</h4>
                                    <ul class="list-group list-inline gap-3">
                                        <li class="s-fonts">
                                            <img src="<?php echo e(asset('assets/img/icons/misc/user-blue-pri.svg')); ?>">
                                            <?php echo e($listing->name); ?>

                                        </li>
                                        <li class="s-fonts">
                                            <img src="<?php echo e(asset('assets/img/icons/misc/calendar-plain-pri.svg')); ?>">
                                            <?php echo e($listing->getMeta('year_founded')); ?>

                                        </li>
                                        <li class="s-fonts">
                                            <img src="<?php echo e(asset('assets/img/icons/misc/location-pri.svg')); ?>">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($data->id == $listing->getMeta('country') ? $data->name : ''); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                        <li class="s-fonts">
                                            <img src="<?php echo e(asset('assets/img/icons/misc/users.svg')); ?>">
                                            <?php $__currentLoopData = companySize(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($data)): ?>
                                                    <?php echo e($data == $listing->getMeta('target_company_size') ? $data : ''); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                        <li>
                                            <ul class="list-group list-group-horizontal list-inline gap-3">
                                                <?php $__currentLoopData = socialMedia(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($listing->getMeta('social_profile')[$value] ?? false): ?>
                                                        <li>
                                                            <a href="<?php echo e($listing->getMeta('social_profile')[$value]); ?>">
                                                                <?php if(strtolower($value) == 'linkedin'): ?>
                                                                    <img src="<?php echo e(asset('assets/img/icons/' . strtolower($value) . '-web.svg')); ?>"
                                                                        width="24px" height="24px" class="img-fluid">
                                                                <?php elseif($value != 'Twitter'): ?>
                                                                    <img src="<?php echo e(asset('assets/img/icons/' . lcfirst($value) . '-web.svg')); ?>"
                                                                        width="24px" height="24px" class="img-fluid">
                                                                <?php else: ?>
                                                                    <img src="<?php echo e(asset('assets/img/icons/x-web.svg')); ?>"
                                                                        width="24px" height="24px" class="img-fluid">
                                                                <?php endif; ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <h4>Support</h4>
                                    <ul class="list-group list-inline gap-3">
                                        <?php if($listing->getMeta('customer_support') ?? false): ?>
                                            <?php $__currentLoopData = $listing->getMeta('customer_support') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="s-fonts">
                                                    <img src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                    <?php echo e($support); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <h4>Training </h4>
                                    <ul class="list-group list-inline gap-3">
                                        <?php if($listing->getMeta('provide_training') ?? false): ?>
                                            <?php $__currentLoopData = $listing->getMeta('provide_training') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="s-fonts">
                                                    <img src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                    <?php echo e($training); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <h4>Licensing & Deployment</h4>
                                    <ul class="list-group list-inline gap-3">
                                        <?php if($listing->getMeta('licensing_model') ?? false): ?>
                                            <li class="s-fonts">
                                                <img src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                <?php echo e($listing->getMeta('licensing_model')); ?>

                                            </li>
                                        <?php endif; ?>
                                        <?php if($listing->getMeta('software_development_type') ?? false): ?>
                                            <?php $__currentLoopData = $listing->getMeta('software_development_type') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $development_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="s-fonts">
                                                    <img src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                    <?php echo e($development_type); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = deviceSupported(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($value, $listing->getMeta('device_supported') ?? [])): ?>
                                                <li class="s-fonts">
                                                    <?php if(!in_array($value, ['Windows', 'Mac', 'Linux'])): ?>
                                                        <img src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                        <?php echo e($value); ?>

                                                        <?php if($listing->getMeta('device_supported_url')[$value] ?? false): ?>
                                                            <a href="<?php echo e($listing->getMeta('device_supported_url')[$value] ?? ''); ?>"
                                                                target="_blank"><i class="ti ti-external-link"></i></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                        <?php echo e($value); ?>

                                                    <?php endif; ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="soft_details row mt-4 pt-4 border-top">
                                <div class="col-lg-3 mb-4">
                                    <h4>Typical Customers</h4>
                                    <ul class="list-group list-inline gap-3">
                                        <?php $__currentLoopData = targetCompanySize(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($value, $listing->getMeta('company_size') ?? [])): ?>
                                                <li class="s-fonts"><img
                                                        src="<?php echo e(asset('assets/img/icons/misc/checkbox.svg')); ?>">
                                                    <?php echo e($value); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <h4>Language Supported</h4>
                                    <p class="s-fonts">
                                        <?php $__currentLoopData = languagesSupported(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($key, $listing->getMeta('languages_supported', []))): ?>
                                                <?php echo e($value); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                </div>
                                <div class="col-lg-5 mb-4">
                                    <h4>Industries</h4>
                                    <p class="s-fonts">
                                        <?php if(!empty(($getIndustry = getIndustry($listing->getMeta('target_industry', []))))): ?>
                                            <?php echo e(implode(', ', $getIndustry->toArray())); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Overview -->

        <!-- Features -->
        <section id="features" class="section_service mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2 class="border-0">Features</h2>
                            <div class="accordion accordion-bordered pointer-event" id="accordionStyle1">
                                <?php if(!empty(($allCat = getCategory($listing->categories)))): ?>
                                    <?php $__currentLoopData = $allCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $feature = $value->feature;
                                            $CatUrl = !empty($listing->getMeta('features_cat_page_url')[$value->id])
                                                ? $listing->getMeta('features_cat_page_url')[$value->id]
                                                : '';
                                        ?>
                                        <?php if(!empty($listing->getMeta('features')[$value->id])): ?>
                                            <div class="accordion-item card mb-2">
                                                <h2 class="accordion-header p-0 m-0 accordion-button cursor-pointer"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#accordionStyle1-<?php echo e($key); ?>"
                                                    aria-expanded="false">
                                                    <?php echo e($value->name); ?>

                                                    <?php if(!empty($CatUrl)): ?>
                                                        &nbsp;<a class="c-b" href="<?php echo e(getPageUrl($CatUrl)); ?>"
                                                            target="_blank"><i class="ti ti-external-link"></i></a>
                                                    <?php endif; ?>
                                                </h2>
                                                <div id="accordionStyle1-<?php echo e($key); ?>"
                                                    class="accordion-collapse collapse <?php echo e($key == 0 ? 'show' : ''); ?>"
                                                    data-bs-parent="#accordionStyle1">
                                                    <div class="accordion-body">
                                                        <div class="soft_details row mb-5">
                                                            <ul class="g-3 row list-inline">
                                                                <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(!empty($listing->getMeta('features')[$value->id]) && in_array($feat->id, $listing->getMeta('features')[$value->id])): ?>
                                                                        <li
                                                                            class="s-fonts col-md-4 col-sm-6 col-12 col-lg-3">
                                                                            <img
                                                                                src="<?php echo e(asset('assets/img/icons/misc/check-round.svg')); ?>">
                                                                            <?php echo e($feat->name); ?>

                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features -->

        <!-- Pricing -->
        <section id="pricing" class="section_service mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2>Pricing</h2>
                            <div class="soft_details row mb-5">
                                <?php if(!empty($listing->getMeta('pricing_type'))): ?>
                                    <div class="col-lg-3">
                                        <h4>Pricing Type</h4>
                                        <ul class="list-group list-inline gap-3">
                                            <li class="s-fonts">
                                                <img src="<?php echo e(asset('assets/img/icons/misc/check-round.svg')); ?>">
                                                <?php $__currentLoopData = pricingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($key == $listing->getMeta('pricing_type')): ?>
                                                        <?php echo e($value); ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($listing->getMeta('pricing_currency'))): ?>
                                    <div class="col-lg-3">
                                        <h4>Preferred Currency</h4>
                                        <ul class="list-group list-inline gap-3">
                                            <li class="s-fonts"><img
                                                    src="<?php echo e(asset('assets/img/icons/misc/check-round.svg')); ?>">
                                                <?php $__currentLoopData = pricingCurrency(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($key == $listing->getMeta('pricing_currency')): ?>
                                                        <?php echo e($value); ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($listing->getMeta('trail_duration'))): ?>
                                    <div class="col-lg-3">
                                        <h4>Free Trial</h4>
                                        <ul class="list-group list-inline gap-3">
                                            <li class="s-fonts"><img
                                                    src="<?php echo e(asset('assets/img/icons/misc/check-round.svg')); ?>">
                                                <?php $__currentLoopData = pricingTrail(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($key == $listing->getMeta('trail_duration')): ?>
                                                        <?php echo e($value); ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($listing->getMeta('is_free_version'))): ?>
                                    <div class="col-lg-3">
                                        <h4>Free Version</h4>
                                        <ul class="list-group list-inline gap-3">
                                            <li class="s-fonts"><img
                                                    src="<?php echo e(asset('assets/img/icons/misc/check-round.svg')); ?>">
                                                <?php if($listing->getMeta('is_free_version')): ?>
                                                    Yes
                                                <?php else: ?>
                                                    No
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex gap-2 justify-content-start pt-3 pricing_btn">
                                <?php if(!empty($listing->getMeta('pricing_url'))): ?>
                                    <a href="<?php echo e($listing->getMeta('pricing_url')); ?>" class="btn btn-secondary"
                                        target="_blank">Pricing Page &nbsp;<i class="ti ti-external-link"></i></a>
                                <?php endif; ?>
                                <?php if(!empty($listing->getMeta('trail_url'))): ?>
                                    <a href="<?php echo e($listing->getMeta('trail_url')); ?>" class="btn btn-secondary"
                                        target="_blank">Trail Page &nbsp;<i class="ti ti-external-link"></i></a>
                                <?php endif; ?>
                                <?php if(!empty($listing->getMeta('demo_url'))): ?>
                                    <a href="<?php echo e($listing->getMeta('demo_url')); ?>" class="btn btn-secondary"
                                        target="_blank">Demo Page &nbsp;<i class="ti ti-external-link"></i></a>
                                <?php endif; ?>
                            </div>

                            <h4 class="border-top mt-4 pt-4">Plans & Packages</h4>
                            <?php if($listing->getMeta('is_price_plan') == 1): ?>
                                <?php $packages = $listing->getMeta('package') ?>
                                <?php if(!empty($packages)): ?>
                                    <div
                                        class="row packages_list row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-4 gx-lg-5">
                                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($package['name'])): ?>
                                                <div class="col">
                                                    <div class="pack_list border p-3 text-center pb-0">
                                                        <p class="p-2 pt-0 package_title border-bottom">
                                                            <?php echo e($package['name']); ?></p>
                                                        <p class="package_pack">
                                                            <?php echo e($package['price'] ?? 0); ?>

                                                            <?php switch($package['units']):
                                                                case ('one'): ?>
                                                                    One-time
                                                                <?php break; ?>

                                                                <?php case ('year'): ?>
                                                                    Per Year
                                                                <?php break; ?>

                                                                <?php case ('month'): ?>
                                                                    Per Month
                                                                <?php break; ?>

                                                                <?php case ('day'): ?>
                                                                    Per Day
                                                                <?php break; ?>

                                                                <?php case ('hour'): ?>
                                                                    Per Hour
                                                                <?php break; ?>

                                                                <?php case ('user'): ?>
                                                                    Per User
                                                                <?php break; ?>

                                                                <?php case ('feautre'): ?>
                                                                    Per Feature
                                                                <?php break; ?>

                                                                <?php default: ?>
                                                                    Per Plan
                                                            <?php endswitch; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing -->

        <!-- focus -->
        <section id="reviews" class="section_service hide_review_only mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2>Zoho CRM Reviews</h2>
                            <div class="review_sort mb-4">
                                <div class="row">
                                    <div class="align-items-center review_top_row row">
                                        <div class="col-lg-3">
                                            <div class="align-items-center d-flex gap-2">
                                                <label>Services: </label>
                                                <select class="form-control">
                                                    <option value="">All Services</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="align-items-center d-flex gap-2">
                                                <label>Sort By:</label>
                                                <select id="ss_sort_review" class="form-control">
                                                    <option value="">Relevance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul
                                                class="list-group list-group-horizontal list-inline gap-1 justify-content-start">
                                                <li><i class="ti ti-star-filled"></i></li>
                                                <li><i class="ti ti-star-filled"></i></li>
                                                <li><i class="ti ti-star-filled"></i></li>
                                                <li><i class="ti ti-star"></i></li>
                                                <li><i class="ti ti-star"></i></li>
                                                <li class="r_count">3.0</li>
                                                <li class="r_link"><a href="javascript:void(0);">19 Reviews</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="<?php echo e(route('front_write_review', ['software', $listing->name])); ?>"
                                                class="btn btn-secondary" id="add_review">Write a Review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 review_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-5 col-xs-12 col-sm-12 border-end">
                                            <div class="row mb-4">
                                                <div class="col-sm-2">
                                                    <img src="<?php echo e(asset('assets/img/placeholder/review-man.png')); ?>"
                                                        width="100px" height="100px" class="img-fluid rounded-1">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="name_details mb-2">
                                                        <h3 class="d-inline">Ross E</h3>
                                                        <p class="time_leap d-inline">Posted 1 day ago</p>
                                                    </div>
                                                    <p class="r_role">General Manager</p>
                                                    <p class="r_role">Events Services, 51 - 200 Employess</p>
                                                </div>
                                            </div>
                                            <h4>Rating</h4>
                                            <div class="row o-rating align-items-center mb-4 pe-4">
                                                <div class="col-sm-6">
                                                    <p class="m-0">Overall Rating</p>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <div class="soft_ratings mb-3 mt-2">
                                                        <ul
                                                            class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li class="r_count">3.0</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-0">Quality </p>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <div class="soft_ratings mb-3 mt-2">
                                                        <ul
                                                            class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li class="r_count">3.0</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-0">Communication</p>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <div class="soft_ratings mb-3 mt-2">
                                                        <ul
                                                            class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li class="r_count">3.0</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-0">Cost</p>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <div class="soft_ratings mb-3 mt-2">
                                                        <ul
                                                            class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li class="r_count">3.0</li>
                                                        </ul>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row pro_details border-top me-0">
                                                <div class="col-md-8 border-end pt-3 pb-2">
                                                    <h4>Project Details</h4>
                                                    <p>Project Cost :- <span>$100000 to $500000</span></p>
                                                    <p>Project Status :- <span>On Going</span></p>
                                                </div>
                                                <div class="col-md-4 text-center pt-3">
                                                    <h4 class="text-center">Share it on</h4>
                                                    <ul
                                                        class="list-group list-group-horizontal list-inline gap-3 justify-content-center">
                                                        <li><img src="<?php echo e(asset('assets/img/icons/linkedin-web.svg')); ?>"
                                                                width="24px" height="24px" class="img-fluid"></li>
                                                        <li><img src="<?php echo e(asset('assets/img/icons/facebook-web.svg')); ?>"
                                                                width="24px" height="24px" class="img-fluid"></li>
                                                        <li><img src="<?php echo e(asset('assets/img/icons/x-web.svg')); ?>"
                                                                width="24px" height="24px" class="img-fluid"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-xs-12 col-sm-12 r_content">
                                            <h2>“Zoho CRM is one of the best products”</h2>
                                            <ul>
                                                <li>
                                                    <p class="r_ques">What was the project name that you have worked with
                                                        OpenXcell?</p>
                                                    <p class="r_ans">Goodfirms</p>
                                                </li>
                                                <li>
                                                    <p class="r_ques">What did you find most impressive about Hashthink
                                                        Technologies Inc</p>
                                                    <p class="r_ans">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s,
                                                        when an unknown printer took a galley of type and scrambled it to
                                                        make a type specimen
                                                        book.</p>
                                                </li>
                                                <li class="hiiden_item">
                                                    <p class="r_ques">What did you find most impressive about Hashthink
                                                        Technologies Inc</p>
                                                    <p class="r_ans">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s,
                                                        when an unknown printer took a galley of type and scrambled it to
                                                        make a type specimen
                                                        book.</p>
                                                </li>
                                                <li class="hiiden_item">
                                                    <p class="r_ques">What did you find most impressive about Hashthink
                                                        Technologies Inc</p>
                                                    <p class="r_ans">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s,
                                                        when an unknown printer took a galley of type and scrambled it to
                                                        make a type specimen
                                                        book.</p>
                                                </li>
                                            </ul>
                                            <div class="text-end">
                                                <button class="expand-btn btn btn-primary">Read Full Review <i
                                                        class="ti ti-chevron-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- focus -->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/front/web/software/index.blade.php ENDPATH**/ ?>