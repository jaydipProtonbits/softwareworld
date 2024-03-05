<?php $__env->startSection('title', 'Listing'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <h3 class="m_page_title">Listing</h3>
    </div>
</div>
  <div class="row new_listing">
    <div class="col-md-12">
      <?php if(auth()->user()->type_id == 1): ?>
        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->services() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img
                    src="<?php echo e($service->logo ? asset('assets/service/'.$service->logo) : asset('assets/img/placeholder/company-logo.jpg')); ?>"
                    class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title"><?php echo e($service->name); ?></h2>
                  <p class="soft_sub_t mb-0"><?php echo e($service->tagline); ?></p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <a href="<?php echo e(route('manage_service_step', ['info', $service->id])); ?>" class="btn btn btn-primary"> <i
                      class="ti ti-edit"></i> &nbsp; Edit</a>
                </div>
              </div>
              <div class="soft_details">
                <p><?php echo e($service->getMeta('short_description') ? \Str::limit($service->getMeta('short_description'), 500, '... ') : null); ?>

                <!-- "Read more" link -->
                  <?php if($service->getMeta('short_description') && strlen($service->getMeta('short_description')) > 500): ?>
                    <a href="javascript:void(0)">Read more</a>
                  <?php endif; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <?php if(!auth()->user()->is_admin() && auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 1))->count() == 0): ?>
            <div class="card mb-4">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-md-12 text-center">
                    <p>You dont have any listing yet please create a listing using the below button.</p>
                    <a type="button" class="btn btn-primary" href="<?php echo e(route('manage_service.create')); ?>">
                      <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Listing
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        
        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 1))->get() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img src="<?php echo e($service->claim->logo ? asset('assets/service/'.$service->claim->logo) : asset('assets/img/placeholder/company-logo.jpg')); ?>" class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title"><?php echo e($service->claim->name??''); ?></h2>
                  <p class="soft_sub_t mb-0"><?php echo e($service->claim->tagline??''); ?></p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <span class="btn btn-primary">Pending Approval</span>
                </div>
              </div>
              <div class="soft_details">
                <p><?php echo e($service->claim->getMeta('short_description') ? \Str::limit($service->claim->getMeta('short_description')??'', 500, '... ') : null); ?>

                <!-- "Read more" link -->
                  <?php if($service->claim->getMeta('short_description') && strlen($service->claim->getMeta('short_description')) > 500): ?>
                    <a href="javascript:void(0)">Read more</a>
                  <?php endif; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
      <?php endif; ?>

      <?php if(auth()->user()->type_id == 2): ?>
        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->software() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img
                    src="<?php echo e($software->logo ? asset('assets/company/'.$software->logo) : asset('assets/img/placeholder/company-logo.jpg')); ?>"
                    class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title"><?php echo e($software->name); ?></h2>
                  <p class="soft_sub_t mb-0"><?php echo e($software->tagline); ?></p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <a href="<?php echo e(route('manage_details', ['information', $software->id])); ?>" class="btn btn btn-primary">
                    <i class="ti ti-edit"></i> &nbsp; Edit</a>
                </div>
              </div>
              <div class="soft_details">
                <p><?php echo e($software->getMeta('short_description') ? \Str::limit($software->getMeta('short_description'), 500, '... ') : null); ?>

                <!-- "Read more" link -->
                  <?php if($software->getMeta('short_description') && strlen($software->getMeta('short_description')) > 500): ?>
                    <a href="javascript:void(0)">Read more</a>
                  <?php endif; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <?php if(!auth()->user()->is_admin() && auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 2))->count() == 0): ?>
            <div class="card mb-4">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-md-12 text-center">
                    <p>You dont have any listing yet please create a listing using the below button.</p>
                    <a type="button" class="btn btn-primary" href="<?php echo e(route('manage_listing.create')); ?>">
                      <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Listing
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        
        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 2))->get() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img
                    src="<?php echo e($software->claim->logo ? asset('assets/company/'.$software->claim->logo) : asset('assets/img/placeholder/company-logo.jpg')); ?>"
                    class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title"><?php echo e($software->claim->name??''); ?></h2>
                  <p class="soft_sub_t mb-0"><?php echo e($software->claim->tagline??''); ?></p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <span class="btn btn-primary">Pending Approval</span>
                </div>
              </div>
              <div class="soft_details">
                <p><?php echo e($software->claim->getMeta('short_description') ? \Str::limit($software->claim->getMeta('short_description')??'', 500, '... ') : null); ?>

                <!-- "Read more" link -->
                  <?php if($software->claim->getMeta('short_description') && strlen($software->claim->getMeta('short_description')) > 500): ?>
                    <a href="javascript:void(0)">Read more</a>
                  <?php endif; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/front/user/listing/new-list.blade.php ENDPATH**/ ?>