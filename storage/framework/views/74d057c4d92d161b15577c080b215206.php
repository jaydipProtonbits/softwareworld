<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Scripts'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<style type="text/css">
    span.remove_feature {
        cursor: pointer;
        color: red;
        position: absolute;
        right: 13px;
        top: 34%;
        font-size: 17px;
        background: #f3f3f3;
        padding: 5px 10px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    #features-outer .col-12 {
        position: relative;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Layout Demo -->
    <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Scripts</h5>
                  </div>
                  <div class="card-body">
                    <?php if(count($errors) > 0 ): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(\Session::has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo \Session::get('success'); ?>

                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo e(route('saveScripts')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Script</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="script_in_header">Script in head tag</label>
                            <textarea id="script_in_header" rows="15" name="meta[script_in_header]" class="form-control"><?php echo e($values['script_in_header'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="script_in_body">Script in body tag</label>
                            <textarea id="script_in_body"  rows="15" name="meta[script_in_body]" class="form-control"><?php echo e($values['script_in_body'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="script_before_body">Script before body tag close</label>
                            <textarea id="script_before_body" rows="15" name="meta[script_before_body]" class="form-control"><?php echo e($values['script_before_body'] ?? ''); ?></textarea>
                        </div>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Save Script</button>
                    </form>
                  </div>
                </div>
          </div>
    </div>


<!--/ Layout Demo -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#category_id").select2({
            placeholder: "Select Category",
            allowClear: true
        });
        $(document).on('click', '#add_features', function(event) {
           event.preventDefault();
            $('#features-outer').append('<div class="col-12"><div class="mb-3"><label class="form-label" for="basic-default-fullname">Feature Name</label><input type="text" name="name[]" class="form-control" value="" id="basic-default-fullname" placeholder="Software" required></div><span class="remove_feature"><i class="fa fa-close"></i></span></div>');
        });
        $(document).on('click', '.remove_feature', function(event) {
            event.preventDefault();
            $(this).closest('.col-12').remove();
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/settings/scripts.blade.php ENDPATH**/ ?>