<?php if(isset($pageConfigs)): ?>
<?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>
<?php
$configData = Helper::appClasses();
?>

<?php if(isset($configData["layout"])): ?>
<?php echo $__env->make('layouts.layoutFront', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/layouts/web/layoutMaster.blade.php ENDPATH**/ ?>