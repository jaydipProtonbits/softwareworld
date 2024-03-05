<div class="bs-stepper-header">
  <div class="step <?php echo e((!empty($type) && $type == 'info' || \Route::currentRouteName() == 'manage_service.create' || \Route::currentRouteName() == 'service.create') ? 'active' : ''); ?>" data-target="#account-details-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/info/'.$service->id) : url('manage/service/step/info/'.$service->id)) : ''); ?>" type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-user-circle"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Company Information</span>
        <span class="bs-stepper-subtitle">Name/Email/Contact</span>
      </span>
    </button>
  </div>
  <div class="line"></div>
  <div class="step <?php echo e(!empty($type) && $type == 'location' ? 'active' : ''); ?> <?php echo e(empty($service) ? 'menu_disabled' : ''); ?>" data-depend="General information" data-target="#personal-info-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/location/'.$service->id) : url('manage/service/step/location/'.$service->id)) : ''); ?>" <?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? '' : 'disabled="disabled"'); ?> type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-map-pin"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Locations</span>
        <span class="bs-stepper-subtitle">Property Type</span>
      </span>
    </button>
  </div>
  <div class="line"></div>
  <div class="step <?php echo e(!empty($type) && $type == 'service' ? 'active' : ''); ?> <?php echo e(empty($service) ? 'menu_disabled' : ''); ?>" data-depend="General information" data-target="#social-links-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/service/'.$service->id) : url('manage/service/step/service/'.$service->id)) : ''); ?>" <?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? '' : 'disabled="disabled"'); ?> type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-sitemap"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Services</span>
        <span class="bs-stepper-subtitle">Setup Services</span>
      </span>
    </button>
  </div>
  <div class="line"></div>
  <div class="step <?php echo e(!empty($type) && $type == 'description' ? 'active' : ''); ?> <?php echo e(!empty($service) && $service->getMeta('is_service') != 1 ? 'menu_disabled' : ''); ?>" data-depend="Service" data-target="#social-links-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_service') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/description/'.$service->id) : url('manage/service/step/description/'.$service->id)) : ''); ?>" <?php echo e((!empty($service) && $service->getMeta('is_service') == 1) ? '' : 'disabled="disabled"'); ?> type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-file-text"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Description</span>
        <span class="bs-stepper-subtitle">Setup Service Description</span>
      </span>
    </button>
  </div>
  <div class="line"></div>
  <div class="step <?php echo e(!empty($type) && $type == 'destination' ? 'active' : ''); ?> <?php echo e(!empty($service) && $service->getMeta('is_service') != 1 ? 'menu_disabled' : ''); ?>" data-depend="Service" data-target="#social-links-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_service') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/destination/'.$service->id) : url('manage/service/step/destination/'.$service->id)) : ''); ?>" <?php echo e((!empty($service) && $service->getMeta('is_service') == 1) ? '' : 'disabled="disabled"'); ?> type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-link"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Destination URLs</span>
        <span class="bs-stepper-subtitle">Setup Destination URLs</span>
      </span>
    </button>
  </div>
  <div class="line"></div>
  <div class="step <?php echo e(!empty($type) && $type == 'clients' ? 'active' : ''); ?> <?php echo e(empty($service) ? 'menu_disabled' : ''); ?>" data-depend="General information" data-target="#social-links-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/clients/'.$service->id) : url('manage/service/step/clients/'.$service->id)) : ''); ?>" <?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? '' : 'disabled="disabled"'); ?> type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-building"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Clients & Industries</span>
        <span class="bs-stepper-subtitle">Covered Area</span>
      </span>
    </button>
  </div>
  <div class="line"></div>
  <div class="step <?php echo e(!empty($type) && $type == 'portfolios' ? 'active' : ''); ?> <?php echo e(empty($service) ? 'menu_disabled' : ''); ?>" data-depend="General information" data-target="#social-links-validation">
    <button data-url="<?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? (auth()->user()->is_admin() ? url('admin/service/step/portfolios/list/'.$service->id) : url('manage/service/step/portfolios/list/'.$service->id)) : ''); ?>" <?php echo e((!empty($service) && $service->getMeta('is_info') == 1) ? '' : 'disabled="disabled"'); ?> type="button" class="step-trigger">
      <span class="bs-stepper-circle">
        <i class="ti ti-user"></i>
      </span>
      <span class="bs-stepper-label">
        <span class="bs-stepper-title">Portfolio</span>
        <span class="bs-stepper-subtitle">Setup & Portfolio Details</span>
      </span>
    </button>
  </div>

  <?php if(!empty($service) && $service->status == 0 && auth()->user()->is_admin()): ?>
    
    <a href="javascript:void(0)" class="btn btn-success status_change d-block mt-3" data-action="1" data-id="<?php echo e($service->id??''); ?>">Approve</a>
    <a href="javascript:void(0)" class="btn btn-danger status_change d-block mt-3" data-action="0" data-id="<?php echo e($service->id??''); ?>">Decline</a>
  <?php endif; ?>
</div>
<?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/top_header.blade.php ENDPATH**/ ?>