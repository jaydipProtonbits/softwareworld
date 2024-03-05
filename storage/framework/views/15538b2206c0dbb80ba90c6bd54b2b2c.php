<div class="live-search-result">
    <?php if($page->count() > 0): ?>
    <div class="menu-result-section">
        <div class="search-result-label">Categories (<?php echo e($page->count()); ?>)</div>
        <div class="result-container">
            <?php $__currentLoopData = $page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="result-entity">
                <a href="<?php echo e($pages->type_id == 1 ? route('front_service_listing', $pages->slug) : route('front_software_listing', $pages->slug)); ?>" data-type="<?php echo e($pages->type_id == 1 ? 'software' : 'services'); ?>" title="Customer Engagement Software"><span class="enity-tilte"><?php echo e($pages->title); ?></span></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if($service->count() > 0): ?>
    <div class="company-result-section">
        <div class="search-result-label">Companies (<?php echo e($service->count()); ?>)</div>
        <div class="result-container">
            <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="result-entity">
                <a class="detail_page" href="<?php echo e(route('listing_details', ['service', str_replace(' ', '-', $services->name)])); ?>" title="<?php echo e($services->name); ?>">
                    <span class="enity-tilte"><?php echo e($services->name); ?></span>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if($software->count() > 0): ?>
    <div class="software-result-section">
        <div class="search-result-label">Software (21)</div>
        <div class="result-container">
            <?php $__currentLoopData = $software; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="result-entity">
                <a class="detail_page" href="<?php echo e(route('listing_details', ['software', str_replace(' ', '-', $soft->name)])); ?>" title="<?php echo e($soft->name); ?>">
                    <span class="enity-tilte"><?php echo e($soft->name); ?></span>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if($page->count() == 0 && $service->count() == 0 && $software->count() == 0): ?>
        <div class="empty-search-result">
            <p class="no_found">No result found</p>
            <p class="no_found_text">Please try different keywords</p>
        </div>
    <?php else: ?>
        <div class="view-all-search-result-section"><a href="<?php echo e(route('search',['query'=>$search])); ?>">View all results <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M8.5 0a8.5 8.5 0 1 1 0 17 8.5 8.5 0 1 1 0-17zm.429 5.172c-.229-.229-.6-.229-.828 0s-.229.6 0 .828l1.857 1.857H4.586c-.324 0-.586.262-.586.586s.262.586.586.586h5.455l-1.941 1.942c-.229.229-.229.6 0 .828s.6.229.828 0l2.899-2.899c.229-.229.229-.6 0-.828z" fill="#38B6FF" fill-rule="evenodd"></path></svg></a></div>
    <?php endif; ?>
</div>
<?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/front/web/search-dropdown.blade.php ENDPATH**/ ?>