
<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/dropdown-hover.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/mega-dropdown.js')); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/node-waves/node-waves.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/popper/popper.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/js/bootstrap.js'))); ?>"></script>

<?php echo $__env->yieldContent('vendor-script'); ?>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset(mix('assets/js/front-main.js'))); ?>"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<?php echo $__env->yieldPushContent('pricing-script'); ?>
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<?php echo $__env->yieldContent('page-script'); ?>
<!-- END: Page JS-->
<?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/layouts/sections/scriptsFront.blade.php ENDPATH**/ ?>