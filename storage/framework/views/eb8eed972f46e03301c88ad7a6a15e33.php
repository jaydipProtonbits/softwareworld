<?php
  $configData = Helper::appClasses();
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Update Service'); ?>

<?php $__env->startSection('vendor-style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/service.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
  <script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/ckeditor/ckeditor.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
  <style type="text/css">
    .ck-editor__editable {min-height: 200px;}
    img.upload_logo {
      cursor: pointer;
    }
    label.form-label {
      margin-top: 1rem;
    }
    input.device_urls, label.device_urls {
      display: none;
      margin-top: 1rem;
    }
    tags.tagify.form-control {
      height: 100px;
    }
    img.upload_logo {
      cursor: pointer;
      max-height: 150px;
      object-fit: cover;
    }
    button.step-trigger {
      width: 100% !important;
      justify-content: space-between !important;
    }
  </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

  <!-- Validation Wizard -->
  <div class="col-12">
    <div class="row title_row">
        <div class="col-md-4">
            <h4 class="">Listing</h4>
        </div>
        <?php echo $__env->make('admin.service.status-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div id="" class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      <?php echo $__env->make('admin.service.top_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="bs-stepper-content">
        <?php if(count($errors) > 0 ): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>
        <form class="needs-validation1" action="<?php echo e(route('saveServiceDestination'
        ,[$service->id])); ?>" method="POST" enctype="maltipart/form-data" novalidate>
        <?php echo csrf_field(); ?>
        <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <h5 class="listing_title">Destination URLs <br><small>Setup Landing Page URLs</small></h5>
            <div class="row g-3">
              <?php if(!empty($allCat = $service->category)): ?>
                <?php $__currentLoopData = $allCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-6">
                    <label class="form-label" for="landing_page_url[<?php echo e($value->id); ?>]"><?php echo e($value->name); ?></label>
                    <input type="url" id="landing_page_url[<?php echo e($value->id); ?>]" name="landing_page_url[<?php echo e($value->id); ?>]" value="<?php echo e($service->getMeta('landing_page_url')[$value->id]??''); ?>" class="form-control" placeholder="Landing Page URL" aria-label="" />
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-6 text-start">
              <a href="<?php echo e((auth()->user()->is_admin()) ? route('service_step',['description',$service->id]) : route('manage_service_step',['description',$service->id])); ?>" type="reset" class="btn btn-label-default waves-effect">
                <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Previous
              </a>
            </div>
            <div class="col-6 text-end">
              <button class="btn btn-primary btn-next">
                   <span class="align-middle d-sm-inline-block me-sm-1">
                     Save & Next &nbsp;&nbsp; <i class="fa fa-arrow-right"></i>
                   </span>
              </button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  <!-- /Validation Wizard -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
  <script src="<?php echo e(asset('assets/js/forms-tagify.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/service.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/destination.blade.php ENDPATH**/ ?>