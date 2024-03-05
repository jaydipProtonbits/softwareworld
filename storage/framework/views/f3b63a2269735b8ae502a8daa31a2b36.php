<?php
$configData = Helper::appClasses();
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <?php if(!isset($navbarFull)): ?>
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <img src="<?php echo e((auth()->check() && auth()->user()->is_admin()) ? asset('assets/img/branding/SoftwareWorld.png') : asset('assets/img/branding/nav_logo.svg')); ?>">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>
  <?php endif; ?>

  <ul class="menu-inner py-1">
    <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php if( $menu->role == 'admin' && in_array('admin', auth()->user()->roles()->pluck('name')->toArray()) ): ?>
        

        
        <?php if(isset($menu->menuHeader)): ?>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text"><?php echo e(__($menu->menuHeader)); ?></span>
          </li>
        <?php else: ?>
          
          <?php
            $activeClass = null;
            $currentRouteName = Route::currentRouteName();

            if ($currentRouteName === $menu->slug) {
            $activeClass = 'active';
            }
            elseif (isset($menu->submenu)) {
            if (gettype($menu->slug) === 'array') {
            foreach($menu->slug as $slug){
            if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
            $activeClass = 'active open';
            }
            }
            }
            else{
            if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
            $activeClass = 'active open';
            }
            }

            }
          ?>

          
          <li class="menu-item <?php echo e($activeClass); ?>">
            <a href="<?php echo e(isset($menu->url) ? url($menu->url) : 'javascript:void(0);'); ?>" class="<?php echo e(isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link'); ?>" <?php if(isset($menu->target) and !empty($menu->target)): ?> target="_blank" <?php endif; ?>>
              <?php if(isset($menu->icon)): ?>
                <i class="<?php echo e($menu->icon); ?>"></i>
              <?php endif; ?>
              <div><?php echo e(isset($menu->name) ? __($menu->name) : ''); ?></div>
              <?php if(isset($menu->badge)): ?>
                <div class="badge bg-<?php echo e($menu->badge[0]); ?> rounded-pill ms-auto"><?php echo e($menu->badge[1]); ?></div>

              <?php endif; ?>
            </a>

            
            <?php if(isset($menu->submenu)): ?>
              <?php echo $__env->make('layouts.sections.menu.submenu',['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          </li>
        <?php endif; ?>
      <?php endif; ?>

      <?php if( $menu->role == 'vendor' && in_array('vendor', auth()->user()->roles()->pluck('name')->toArray()) ): ?>
        

        
        <?php if(isset($menu->menuHeader)): ?>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text"><?php echo e(__($menu->menuHeader)); ?></span>
          </li>
        <?php else: ?>
          
          <?php
            $activeClass = null;
            $currentRouteName = Route::currentRouteName();

            if ($currentRouteName === $menu->slug) {
            $activeClass = 'active';
            }
            elseif (isset($menu->submenu)) {
            if (gettype($menu->slug) === 'array') {
            foreach($menu->slug as $slug){
            if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
            $activeClass = 'active open';
            }
            }
            }
            else{
            if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
            $activeClass = 'active open';
            }
            }

            }
          ?>

          
          <li class="menu-item <?php echo e($activeClass); ?>">
            <a href="<?php echo e(isset($menu->url) ? url($menu->url) : 'javascript:void(0);'); ?>" class="<?php echo e(isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link'); ?>" <?php if(isset($menu->target) and !empty($menu->target)): ?> target="_blank" <?php endif; ?>>
              <?php if(isset($menu->icon)): ?>
                <i class="<?php echo e($menu->icon); ?>"></i>
              <?php endif; ?>
              <div><?php echo e(isset($menu->name) ? __($menu->name) : ''); ?></div>
              <?php if(isset($menu->badge)): ?>
                <div class="badge bg-<?php echo e($menu->badge[0]); ?> rounded-pill ms-auto"><?php echo e($menu->badge[1]); ?></div>

              <?php endif; ?>
            </a>

            
            <?php if(isset($menu->submenu)): ?>
              <?php echo $__env->make('layouts.sections.menu.submenu',['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          </li>
        <?php endif; ?>
      <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>

</aside>
<?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/layouts/sections/menu/verticalMenu.blade.php ENDPATH**/ ?>