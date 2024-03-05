<?php
$customizerHidden = 'customizer-hide';
?>

<?php $__env->startSection('title', 'Login or Signup'); ?>
<?php $__env->startSection('vendor-style'); ?>
<!-- Vendor -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/auth.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/pages-auth.js')); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container" id="login-page">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <div class="row me-0">
                        <div class="col-md-6 back_inner">
                            <div class="login_inner text-center">
                                <div>
                                    <img src="<?php echo e(asset('assets/img/branding/nav_logo.svg')); ?>" alt="SoftwareWorld Login" class="img-fluid white_logo">
                                    <div class="mt-5">
                                        <h5>For Reviewer</h5>
                                        <p>Want To Review a Software Or Service?</p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <a href="<?php echo e(url('/redirect')); ?>" class="btn btn-primary" id="linkedin-login">
                                          <img src="<?php echo e(asset('assets/img/icons/linkedin-web.svg')); ?>"> Sign in with LinkedIn
                                      </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="title-here mb-2">Welcome to SoftwareWorld! 👋</div>
                            <div class="mb-4 base-title">Vendor can sign in here</div>
                            <form id="formAuthentication" class="mb-3" action="<?php echo e(route('vendor_login')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <?php if(session('success')): ?>
                                    <div class="alert alert-success">
                                        <strong><?php echo e(session('success')); ?></strong>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(session('error')): ?>
                                    <div class="alert alert-danger">
                                        <strong><?php echo e(session('error')); ?></strong>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" autofocus>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3 form-password-toggle clearfix">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" aria-describedby="password" />
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <a href="<?php echo e(route('forgot-password')); ?>" class="f-password float-end">Forgot Password?</a>
                                </div>
                                <div class="mb-3 recaptcha min_captcha">
                                    <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.google_recaptcha.recaptcha_site_key')); ?>"></div>
                                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3 m-1">
                                    <button class="btn btn-primary d-grid w-100 sign-up-btn" type="submit">Sign in</button>
                                </div>
                            </form>
                            <p class="text-center new-platform mb-1 mt-4">
                                <span class="black_title">New Vendor on our platform?</span>
                                <a href="<?php echo e(route('auth-register-basic')); ?>">
                                <span>
                                <strong class="register">Register <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M4.50003 14.25L14.25 4.49997M14.25 4.49997V13.86M14.25 4.49997H4.89004" stroke="#38B6FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></strong>
                                </span>
                                </a>
                            </p>
                            <p class="terms">
                                By signing in aggrege to our <a href="javascript:void(0)" class="primary-color">Terms of Use</a> and <a href="javascript:void(0)" class="primary-color">Privacy Policy</a>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/front/user/login.blade.php ENDPATH**/ ?>