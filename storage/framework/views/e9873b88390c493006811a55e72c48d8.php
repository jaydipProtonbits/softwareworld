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
    <div class="row justify-content-center align-items-center vh-100 register_conta">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <div class="row me-0">
                        <div class="col-md-6 back_inner">
                            <div class="rg_inner text-center">
                                <div class="rg_wrapper">
                                    <h3 class="rg_title">
                                        Why Submit Your<br>
                                        <span>Software & Services ?</span>
                                    </h3>
                                    <div class="r_points">
                                        <div class="point_item">
                                            <img src="<?php echo e(asset('assets/img/icons/r_item-1.svg')); ?>" alt="Lifetime Listing" class="img-fluid rg_i_m_big">
                                            <p>Lifetime Listing</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="<?php echo e(asset('assets/img/icons/r_item-2.svg')); ?>" alt="Great Exposure" class="img-fluid">
                                            <p>Great Exposure</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="<?php echo e(asset('assets/img/icons/r_item-3.svg')); ?>" alt="Brand Recognition" class="img-fluid">
                                            <p>Brand Recognition</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="<?php echo e(asset('assets/img/icons/r_item-4.svg')); ?>" alt="Increase in Prospects" class="img-fluid">
                                            <p>Increase in Prospects</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="<?php echo e(asset('assets/img/icons/r_item-5.svg')); ?>" alt="Acquire Potential Customers" class="img-fluid">
                                            <p>Acquire Potential Customers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bg-white">
                            <img src="<?php echo e(asset('assets/img/branding/latest_logo.png')); ?>" alt="SoftwareWorld logo" class="d-block img-fluid m-auto">
                            <div class="mb-4 base-title">Vendor can sign up here</div>
                            <form id="formAuthentication" class="mb-3" action="<?php echo e(route('vendor_register')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_id" value="<?php echo e($user->id ?? 0); ?>">
                                <input type="hidden" name="claim_token" value="<?php echo e($token ?? null); ?>">
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
                                    <label for="first_name" class="form-label">First Name </label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" autofocus value="<?php echo e($user ? (explode(' ', $user->name)[0] ?? '') : null); ?>" required>
                                    <?php $__errorArgs = ['first_name'];
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
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" autofocus required value="<?php echo e($user ? (explode(' ', $user->name)[1] ?? '') : null); ?>">
                                    <?php $__errorArgs = ['last_name'];
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
                                <div class="mb-3">
                                    <label for="email" class="form-label">Business Email Address </label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Business Email" autofocus required value="<?php echo e($user ? $user->email : null); ?>" <?php echo e($user ? 'readonly' : null); ?>>
                                    <?php $__errorArgs = ['email'];
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
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password </label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        <?php $__errorArgs = ['password'];
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
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="confirm_password">Confirm Password </label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        <?php $__errorArgs = ['confirm_password'];
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
                                </div>
                                <div class="mb-3 min_captcha">
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
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid sign-up-btn w-100" type="submit">Register</button>
                                </div>
                            </form>
                            <p class="text-center new-platform mb-1 mt-4">
                                <span class="black_title">Already have an account?</span>
                                <a href="<?php echo e(route('login')); ?>">
                                    <span>
                                        <strong class="register">
                                            Sign in 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M4.50003 14.25L14.25 4.49997M14.25 4.49997V13.86M14.25 4.49997H4.89004" stroke="#38B6FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </strong>
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
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/front/user/auth_register.blade.php ENDPATH**/ ?>