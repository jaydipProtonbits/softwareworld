<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset(mix('assets/vendor/libs/jquery/jquery.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/popper/popper.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/js/bootstrap.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/node-waves/node-waves.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/hammer/hammer.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/libs/typeahead-js/typeahead.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assets/vendor/js/menu.js'))); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<?php echo $__env->yieldContent('vendor-script'); ?>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset(mix('assets/js/main.js'))); ?>"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<?php echo $__env->yieldPushContent('pricing-script'); ?>
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<?php echo $__env->yieldContent('page-script'); ?>
<!-- END: Page JS-->
<?php if(auth()->check() && !auth()->user()->is_admin()): ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/js/vendor_script.js')); ?>"></script>
<?php endif; ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/layouts/sections/scripts.blade.php ENDPATH**/ ?>