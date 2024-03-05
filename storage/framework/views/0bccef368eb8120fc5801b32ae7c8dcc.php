<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('page-style'); ?>
  <style>
    .upload-btn {
      font-family: var(--para-font) !important;
      font-size: 14px !important;
      font-weight: 500 !important;
      line-height: 18px !important;
      letter-spacing: 0.43px !important;
      text-align: left !important;
    }
    .reset-btn {
      font-family: var(--para-font) !important;
      font-size: 14px;
      font-weight: 500;
      line-height: 18px;
      letter-spacing: 0.43px;
      text-align: left;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
  <script>
    $(function () {
      console.log('hey');
    });
    // File input change event
    $('#upload').change(function () {
      readURL(this);
    });

    // Reset button click event
    $('#resetImage').click(function () {
      $('#upload').val('');
      $('#uploadedAvatar').attr('src', '<?php echo e(auth()->user()->profile_url); ?>');
    });

    // Function to read the file and display the preview
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#uploadedAvatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-12">
      <h3 class="m_page_title">Profile</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <!-- Account -->
        <div class="card-body">
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

          <form method="POST" action="<?php echo e(route('profile.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="<?php echo e(auth()->user()->profile_url); ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
                  <span class="d-none d-sm-block upload-btn">Upload new photo</span>
                  <i class="ti ti-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" name="profile_pic" class="account-file-input" hidden="">
                </label>
                <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect" id="resetImage">
                  <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                  <span class="d-none d-sm-block reset-btn">Reset</span>
                </button>
                <?php $__errorArgs = ['profile_pic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
              </div>
            </div>
            <div class="row">
                <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                  <label for="name" class="form-label">Full Name</label>
                  <input class="form-control" type="text" id="name" name="name" autofocus="" placeholder="Doe" value="<?php echo e(auth()->user()->name); ?>">
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                  <label for="company_name" class="form-label">Company Name</label>
                  <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Enter Company name" value="<?php echo e(auth()->user()->user_details->company_name ?? ''); ?>">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="job_title" class="form-label">Job Title</label>
                  <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter Job Title" value="<?php echo e(auth()->user()->user_details->job_title ?? ''); ?>">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="company_site" class="form-label">Company Website</label>
                  <input type="url" class="form-control" id="company_site" name="company_site" placeholder="Enter Company Website" value="<?php echo e(auth()->user()->user_details->company_site ?? ''); ?>">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input class="form-control" type="email" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>"
                         placeholder="Enter Email Address" readonly>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="linkedin_url" class="form-label">LinkedIn Profile URL</label>
                  <input class="form-control" type="url" id="linkedin_url" name="linkedin_url" placeholder="Enter LinkedIn Profile URL" value="<?php echo e(auth()->user()->user_details->linkedin_url ?? ''); ?>">
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="country_id">Country</label>
                  <div class="position-relative">
                    <select id="country_id" name="country_id" class="select2 form-select select2-hidden-accessible" data-select2-id="country_id" tabindex="-1" aria-hidden="true">
                      <option value="" data-select2-id="0">Choose Country</option>
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php echo e(auth()->user()->user_details->country_id ?? 0 == $country->id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2 waves-effect waves-light upload-btn">Save changes</button>
                <button type="reset" class="btn btn-label-default waves-effect">Cancel</button>
              </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/front/user/profile.blade.php ENDPATH**/ ?>