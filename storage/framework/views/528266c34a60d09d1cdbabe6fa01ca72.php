<?php
    $configData = Helper::appClasses();
?>


<?php $__env->startSection('title', $page->title); ?>

<?php $__env->startSection('meta_title', $page->meta_title); ?>
<?php $__env->startSection('meta_description', $page->meta_description); ?>
<?php $__env->startSection('meta_keywords', $page->meta_keyword ? implode(',', json_decode($page->meta_keyword ?? '', true)) : null); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/front-page-landing.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/front-page-landing.js')); ?>"></script>
    <!-- JavaScript Code -->
    <script>
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

        function readMoreAbout(id) {
            var _moreText = document.getElementById("more-about-" + id);
            var _readMoreButton = document.getElementById("read-more-about-" + id);

            if (_moreText.style.display === "none") {
                _moreText.style.display = "inline";
                _readMoreButton.style.display = "none";
            } else {
                _moreText.style.display = "none";
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div data-bs-spy="scroll" class="scrollspy-example">

        <!-- Heading Title -->
        <section id="page_heading" class="mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-3 pb-3">
                                <ul class="list-inline m-0 p-0 m-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="b_link">Home /</a></li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="b_link active">
                                            <?php echo e($page->title ?? null); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body mt-3 pb-0">
                                <h1><?php echo e($page->heading_one ?? null); ?></h1>
                                <?php
                                    $description = $page->description;
                                ?>

                                <div>
                                    <?php echo substr($description, 0, 500) ?? null; ?>

                                    <?php if(strlen($description) > 500): ?>
                                        <a href="javascript:void(0);" id="read_more" onclick="readMore()">..... Read
                                            More</a>
                                        <div id="more" style="display:none;">
                                            <?php echo substr($description, 0) ?? null; ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="goto_btn mt-3">
                                    <a href="javascript:void(0)" class="btn btn-primary ms-0"><img
                                            src="<?php echo e(asset('assets/img/icons/misc/code.svg')); ?>"> All Software</a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-grey"><img
                                            src="<?php echo e(asset('assets/img/icons/misc/Path.svg')); ?>"> Buyer’s Guide</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Heading Title -->
        <!-- Filter -->
        <section id="filter_bar" class="mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sort_by" class="">Sort By :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Sort By</option>
                                <option value="Most Reviewed">Most Reviewed</option>
                                <option value="Highest Rate">Highest Rate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-none">
                        <div class="form-group">
                            <label for="sort_by" class="">Pricing Model :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Pricing Model</option>
                                <option value="Free">Free</option>
                                <option value="Monthly Payment">Monthly Payment</option>
                                <option value="Annual Subscription">Annual Subscription</option>
                                <option value="Quote Based">Quote Based</option>
                                <option value="One-Time Payment">One-Time Payment</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-none">
                        <div class="form-group">
                            <label for="sort_by" class="">Devices Supported :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Devices Supported :</option>
                                <option value="Web-based">Web-based</option>
                                <option value="iPhone/iPad">iPhone/iPad</option>
                                <option value="Android">Android</option>
                                <option value="Windows">Windows</option>
                                <option value="Mac">Mac</option>
                                <option value="Linux">Linux</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-none">
                        <div class="form-group">
                            <label for="sort_by" class="">Deployment :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Deployment :</option>
                                <option value="Cloud Hosted">Cloud Hosted</option>
                                <option value="On Premises">On Premises</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <a href="javascript:void(0);" class="filter_btn btn btn-outline-light">Filter</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Filter -->

        <!-- Listings -->
        <section id="listing_sec" class="mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2><?php echo e($page->heading_two ?? null); ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="list_wapper">
                            <?php $__empty_1 = true; $__currentLoopData = $listing ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="list_single_item mb-4 card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 border-bottom border-end">
                                                <div class="branding text-center">
                                                    
                                                    <a style="color: #000"
                                                        href="<?php echo e(route('listing_details', [$page->type_id == 1 ? 'service' : 'software', str_replace(' ', '-', $list->name)])); ?>">

                                                        <?php if($list->logo): ?>
                                                            <img src="<?php echo e($page->type_id == 1 ? asset('assets/service/' . $list->logo) : asset('assets/company/' . $list->logo)); ?>"
                                                                class="listing-logo" alt="<?php echo e($list->name); ?>">
                                                        <?php else: ?>
                                                            <div class="pre_img">
                                                                <?php echo e(substr($list->name, 0, 1)); ?>

                                                            </div>
                                                        <?php endif; ?>

                                                        <h3 class="mb-1 mt-1">
                                                            <?php echo e($list->name); ?>

                                                        </h3>
                                                    </a>

                                                    <p class="text-center"><?php echo e($list->tagline); ?></p>
                                                    <div class="soft_ratings mb-3 mt-2 hide_review_only">
                                                        <ul
                                                            class="list-group list-group-horizontal list-inline gap-1 justify-content-center">
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li class="r_count">3.0 <a href="javascript:void(0);">4
                                                                    Reviews</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 border-bottom">
                                                <p class="list_desc">
                                                    <?php echo substr($list->truncatedLongDescription, 0, 400) ?? null; ?>

                                                    <?php if(strlen($list->truncatedLongDescription) > 400): ?>
                                                        <a href="<?php echo e(route('listing_details', [$page->type_id == 1 ? 'service' : 'software', str_replace(' ', '-', strtolower($list->name))])); ?>"
                                                            id="read-more-about-<?php echo e($list->id); ?>" target="_blank"
                                                            onclick="readMoreAbout()"> ..... Read
                                                            More</a>
                                                        <div id="more_full_page" style="display:none;">
                                                            <?php echo substr($list->truncatedLongDescription, 0) ?? null; ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </p>
                                                

                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12 border-end">
                                                
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-sm-12">
                                                <div class="row item_metas">
                                                    <div
                                                        class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                        <img
                                                            src="<?php echo e(asset('assets/img/icons/misc/calendar-clock.svg')); ?>">
                                                        <?php $__currentLoopData = pricingTrail(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <p>
                                                                <?php echo e($key == ($list->getMeta('trail_duration') ?? false) ? $value : ''); ?>

                                                            </p>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <?php $packages = $list->getMeta('package') ?? []; ?>
                                                    <?php if(!empty($packages)): ?>
                                                        <div
                                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                            <img src="<?php echo e(asset('assets/img/icons/misc/dollar.svg')); ?>">
                                                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($loop->first): ?>
                                                                    <p>
                                                                        <?php echo e($package['price']); ?> / <?php echo e($package['units']); ?>

                                                                        /
                                                                        <?php $__currentLoopData = pricingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php echo e($key == ($list->getMeta('pricing_type') ?? 0) ? $value : ''); ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                        <img src="<?php echo e(asset('assets/img/icons/misc/map-pin.svg')); ?>">
                                                        <p>
                                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($data->id == ($list->getMeta('country') ?? 0) ? $data->name : ''); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center">
                                                        <a href="<?php echo e($list->website); ?>" class="btn btn-primary"
                                                            target="_blank">VISIT
                                                            WEBSITE <i class="ti ti-external-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-center">No listing found!</p>
                            <?php endif; ?>


                            <?php echo e($listing->links('pagination::bootstrap-4')); ?>


                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Listings -->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/front/web/landing.blade.php ENDPATH**/ ?>