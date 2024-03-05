<?php
  $configData = Helper::appClasses();
?>



<?php $__env->startSection('title', $page->title); ?>

<?php $__env->startSection('meta_title', $page->meta_title); ?>
<?php $__env->startSection('meta_description', $page->meta_description); ?>
<?php $__env->startSection('meta_keywords', $page->meta_keyword ? implode(',', json_decode($page->meta_keyword ?? '', true)): null); ?>

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
    var _moreText = document.getElementById("more-about-"+id);
    var _readMoreButton = document.getElementById("read-more-about-"+id);

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
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="b_link active"><?php echo e($page->title ?? null); ?></a></li>
                                </ul>
                            </div>
                            <div class="card-body mt-3 pb-0">
                              <h1><?php echo e($page->heading_one ?? null); ?></h1>
                              <?php
                                  $description = $page->description;
                              ?>

                              <?php echo substr($description, 0, 500) ?? null; ?>

                              <?php if(strlen($description) > 500): ?>
                                <a href="javascript:void(0);" id="read_more" onclick="readMore()">Show More <i class="fa-solid fa-chevron-down"></i></a>
                                <div id="more" style="display:none;">
                                  <span><?php echo substr($description, 500) ?? null; ?></span>
                                </div>
                              <?php endif; ?>

                                <div class="goto_btn mt-3">
                                    <a href="javascript:void(0)" class="btn btn-primary ms-0"><img src="<?php echo e(asset('assets/img/icons/misc/code.svg')); ?>"> All Companies</a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-grey"><img src="<?php echo e(asset('assets/img/icons/misc/Path.svg')); ?>"> Buyer’s Guide</a>
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
                    <div class="col-lg-6 col-md-8 col-sm-8 col-8">
                        <label for="sort_by" class="">Sort By :</label>
                        <select class="form-control" name="sort_by" id="sort_by">
                          <option value="">Select From</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-4 col-4 text-end">
                        <a href="javascript:void(0);" class="filter_btn btn btn-outline-light">Filter</a>
                    </div>
                </div>
            </div>
        </section>
    <!-- Filter -->

    <!-- Listings -->
        <section id="listing_sec" class="mt-3 mb-3 service_listing">
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
                                  <div class="col-lg-4 border-bottom border-end">
                                    <div class="branding text-center">
                                      <a href="<?php echo e(route('listing_details', [$page->type_id == 1 ? 'service' : 'software', str_replace(' ', '-', $list->name)])); ?>">
                                          <?php if($list->logo): ?>
                                            <img src="<?php echo e($page->type_id == 1 ? asset('assets/service/'.$list->logo) : asset('assets/company/'.$list->logo)); ?>" class="listing-logo">
                                          <?php else: ?>
                                          <div class="pre_img">
                                              <?php echo e(substr($list->name, 0, 1)); ?>

                                          </div>
                                          <?php endif; ?>
                                        <h3 class="mb-1 mt-1"><?php echo e($list->name); ?></h3>
                                        <p class="text-center"><?php echo e($list->tagline); ?></p>
                                      </a>

                                      <div class="soft_ratings mb-3 mt-2">
                                        <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-center">
                                          <li><i class="ti ti-star-filled"></i></li>
                                          <li><i class="ti ti-star-filled"></i></li>
                                          <li><i class="ti ti-star-filled"></i></li>
                                          <li><i class="ti ti-star"></i></li>
                                          <li><i class="ti ti-star"></i></li>
                                          <li class="r_count">3.0 <a href="javascript:void(0);">4 Reviews</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-8 border-bottom">
                                    <p class="list_desc">
                                      <?php echo nl2br($list->truncatedLongDescription) ?? ''; ?>

                                      <a href="<?php echo e(route('listing_details', [$page->type_id == 1 ? 'service' : 'software', str_replace(' ', '-', $list->name)])); ?>">Read More</a>
                                    </p>
                                  </div>
                                </div>
                                <div class="row item_metas">
                                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                    <img src="<?php echo e(asset('assets/img/icons/misc/user-circle.svg')); ?>">
                                    <p><?php echo e($list->employees); ?></p>
                                  </div>
                                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                    <img src="<?php echo e(asset('assets/img/icons/misc/clock.svg')); ?>">
                                    <p>
                                      <?php echo e($list->hourly_rate); ?> /hr
                                    </p>
                                  </div>
                                  <?php if($list->project_cost ?? 0): ?>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                      <img src="<?php echo e(asset('assets/img/icons/misc/coin.svg')); ?>">
                                      <p><?php echo e($list->project_cost); ?></p>
                                    </div>
                                  <?php endif; ?>
                                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                    <img src="<?php echo e(asset('assets/img/icons/misc/map-pin.svg')); ?>">
                                    <p>
                                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(($list->country ?? 0) == $data->id ? $data->name : ''); ?>

                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                  </div>
                                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 text-center web_link">
                                    <a href="<?php echo e($list->website); ?>" class="btn btn-primary">VISIT WEBSITE <i class="ti ti-external-link"></i></a>
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

<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/front/web/service.blade.php ENDPATH**/ ?>