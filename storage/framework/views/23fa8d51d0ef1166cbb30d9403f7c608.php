<?php
	$configData = Helper::appClasses();
	if(Route::currentRouteName() != "userLoginsignup"){
		$configData['navbarType'] = 'static';
	}
	$isFront = true;
	$configData['headerType'] = 'static';
?>


<?php $__env->startSection('layoutContent'); ?>

<?php echo $__env->make('layouts/sections/navbar/navbar-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Sections:Start -->
<?php echo $__env->yieldContent('content'); ?>
<!-- / Sections:End -->
<?php echo $__env->make('layouts/sections/footer/footer-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/web/commonFront' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/layouts/layoutFront.blade.php ENDPATH**/ ?>