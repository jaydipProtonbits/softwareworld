<?php
$configData = Helper::appClasses();
?>

<?php $__env->startSection('title', '404 Not Found'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/front-page-landing.css')); ?>" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/front-page-landing.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages-auth.js')); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div data-bs-spy="scroll" class="scrollspy-example">
    <div id="not-found-404">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="top_head">404</h1>
                        <p class="">PAGE NOT FOUND</p>
                        <a class="btn btn-secondary btn-blue bth" href="<?php echo e(url('/')); ?>">Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/errors/404.blade.php ENDPATH**/ ?>