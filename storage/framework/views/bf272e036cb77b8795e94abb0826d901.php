<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <h3>Dashboard</h3>
  </div>
</div>
<div class="row">
    <div class="col-lg-4 ">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Software Listings</h5>
                <a href="<?php echo e(route('listing.index')); ?>" class="btn btn-primary waves-effect waves-light">View Listings</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1"><?php echo e($listing); ?></h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Service Listings</h5>
                <a href="<?php echo e(route('service.index')); ?>" class="btn btn-primary waves-effect waves-light">View Service</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1"><?php echo e($service_listing ?? 0); ?></h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 ">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Categories</h5>
                <a href="<?php echo e(route('category.index')); ?>" class="btn btn-primary waves-effect waves-light">View Category</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1"><?php echo e($category); ?></h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Industries</h5>
                <a href="<?php echo e(route('industries.index')); ?>" class="btn btn-primary waves-effect waves-light">View Industries</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1"><?php echo e($industries); ?></h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 ">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Feature</h5>
                <a href="<?php echo e(route('features.index')); ?>" class="btn btn-primary waves-effect waves-light">View Feature</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1"><?php echo e($feature); ?></h1>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>