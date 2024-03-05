<?php
  $configData = Helper::appClasses();
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Update Service'); ?>

<?php $__env->startSection('vendor-style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/service.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
  <script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/ckeditor/ckeditor.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
  <style type="text/css">
    #upload_logo {
      opacity: 0;
      height: 0;
      width: 0;
    }
    .ck-editor__editable {
      min-height: 200px;
    }

    img.upload_logo {
      cursor: pointer;
    }

    label.form-label {
      margin-top: 1rem;
    }

    input.device_urls, label.device_urls {
      display: none;
      margin-top: 1rem;
    }

    tags.tagify.form-control {
      height: 100px;
    }

    img.upload_logo {
      cursor: pointer;
      max-height: 150px;
      object-fit: cover;
    }

    .a-admin button.step-trigger.activeBTN span.bs-stepper-title,
    .a-admin button.step-trigger.activeBTN span.bs-stepper-subtitle {
      color: var(--bs-primary) !important;
      font-weight: bold !important;
    }

    .a-admin .activeBTN span.bs-stepper-circle {
      background: var(--bs-primary) !important;
      color: #FFF !important;
    }

  </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

  <!-- Validation Wizard -->
  <div class="col-12 mb-4">
    <div class="row title_row">
      <div class="col-md-4">
        <h4 class="">Listing</h4>
      </div>
      <?php echo $__env->make('admin.service.status-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div id="" class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      <?php echo $__env->make('admin.service.top_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="bs-stepper-content">
        <?php if(count($errors) > 0 ): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>
        <form id="wizard-validation-form" class="needs-validation1" method="post"
              action="<?php echo e(route('service.update',$service->id)); ?>" enctype="multipart/form-data" novalidate>
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <!-- Account Details -->
          <div id="account-details-validation" class="content active">
            <div class="row g-3">
              <div class="content-header">
                <h5 class="listing_title">Company Details <br><small>Enter Your Company Details.</small></h5>
              </div>
              <div class="row g-3">
                <div class="row">
                  <div class="col-sm-3">
                    <?php
                      $filePath = public_path('assets/service/'.$service->logo);

                      $img = (!empty($service->logo) && file_exists($filePath)) ? asset('assets/service/'.$service->logo) : asset('assets/img/placeholder/company-logo.jpg');
                    ?>
                    <img src="<?php echo e($img); ?>" class="img-fluid upload_logo">

                    <input type="file" class="form-control" name="logo" id="upload_logo" accept="image/*">
                  </div>
                  <div class="col-sm-9">
                    <button type="button" class="btn btn-primary upload_logo_btn ps-5 pe-5">Upload Logo</button>
                    <div class="company-logo-message mt-3">
                      <div class="company-logo-message-text">Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>

                  </div>
                  <div class="col-md-6 pb-2">
                    <label class="form-label required-label " for="name">Company Name</label>
                    <input type="text" id="name" value="<?php echo e($service->name); ?>" name="name" class="form-control"
                           placeholder="Company name" required/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-label" for="tagline">Company Tagline</label>
                    <input type="text" id="tagline" value="<?php echo e($service->tagline); ?>" name="tagline" class="form-control"
                           placeholder="Company Tagline" required/>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label required-label">Founded</label>
                    <input type="text" value="<?php echo e($service->founded); ?>" name="founded" class="form-control"
                           placeholder="YYYY" maxlength="4" required>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label required-label">Employees</label>
                    <select class="form-control" name="employees" required>
                      <?php $__currentLoopData = EmployeesSize(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($service->employees == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label required-label">Avg. Hourly Rate</label>
                    <select class="form-control" name="hourly_rate" required>
                      <?php $__currentLoopData = HourlyRate(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($service->hourly_rate == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label required-label">Project Cost</label>
                    <select class="form-control" name="project_cost" required>
                      <?php $__currentLoopData = ProjectCost(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($service->project_cost == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label required-label">Website</label>
                    <input type="url" value="<?php echo e($service->website); ?>" name="website" class="form-control"
                           placeholder="www.website.com" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-label">Email Address</label>
                    <input type="email" value="<?php echo e($service->email); ?>" name="email" class="form-control"
                           placeholder="company@email.com" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label required-label">Phone Number</label>
                    <input type="text" value="<?php echo e($service->phone_number); ?>" name="phone_number" class="form-control"
                           placeholder="+1-123-123-1234" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Facebook</label>
                    <input type="url" value="<?php echo e($service->getMeta('facebook')); ?>" name="meta[facebook]"
                           class="form-control" placeholder="www.facebook.com/profile">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Twitter</label>
                    <input type="url" value="<?php echo e($service->getMeta('twitter')); ?>" name="meta[twitter]"
                           class="form-control" placeholder="www.twitter.com/profile">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">LinkedIn</label>
                    <input type="url" value="<?php echo e($service->getMeta('linkedin')); ?>" name="meta[linkedin]"
                           class="form-control" placeholder="www.linkedin.com/profile">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label">Certifications</label>
                  </div>
                  <?php $__currentLoopData = getCertifications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-4">
                      <label class="form-label cms-check">
                        <input type="checkbox" class="form-check-input"
                               <?php echo e(in_array($key,$service->getMeta('certifications',array())) ? 'checked' : ''); ?> name="meta[certifications][]"
                               value="<?php echo e($key); ?>"> <?php echo e($value); ?></label>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="TagifyBasic" class="form-label required-label">Key Clients (mention here names of
                      important projects, companies or clients you worked with)</label>
                    <input id="TagifyBasic" class="form-control" name="meta[key_clients]"
                           value="<?php echo e(implode(',',$service->getMeta('key_clients',array()))); ?>" required/>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-12 text-end">
                    <button class="btn btn-primary btn-next">
                         <span class="align-middle d-sm-inline-block me-sm-1">
                           Save & Next &nbsp;&nbsp; <i class="fa fa-arrow-right"></i>
                         </span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
  <script src="<?php echo e(asset('assets/js/forms-tagify.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/service.js')); ?>"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('.ckeditor').each(function (e) {
        ClassicEditor
          .create(this, {
            toolbar: [
              'Bold', 'Italic', 'NumberedList', 'BulletedList'
            ],
            removeButtons: 'Subscript,Superscript',
            format_tags: 'p;h1;h2;h3;pre',
            pasteFromWordRemoveFontStyles: true,
            removeDialogTabs: 'image:advanced;link:advanced',
          })
          .then(editor => {
            editor.ui.view.editable.element.style.height = '200px';
            editor.model.document.on('change', () => {
              $(this).val(editor.getData());
            });
          })
          .catch(error => {
            console.error(error);
          });
      });

      /*$(document).on('click', '.upload_logo_btn', function(event) {
        $('#upload_logo').trigger('click');
      });

      $('#upload_logo').on('change', function (e) {
          var file = e.target.files[0];
          if (file) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  // Set the source of the image to the result of the FileReader
                  $('.upload_logo').attr('src', e.target.result);
              };
              reader.readAsDataURL(file);
          }else {
              $('.upload_logo').attr('src', "<?php echo e(asset('assets/img/placeholder/company-logo.jpg')); ?>");
          }
      });*/

      $(document).on('click', '.upload_logo_btn', function(event) {
        $('#upload_logo').trigger('click');
      });

      $('#upload_logo').change(function () {
        readAndDisplayImage(this);
      });

      // Function to read the file, check size, resize, and display the preview
      function readAndDisplayImage(input) {
        if (input.files && input.files[0]) {
          var file = input.files[0];

          var reader = new FileReader();

          reader.onload = function (e) {
            var image = new Image();
            image.src = e.target.result;

            image.onload = function () {
              // Check if both height and width are less than or equal to 120 pixels
              if (image.width <= 120 && image.height <= 120) {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');

                // Resize the image to 120x120
                canvas.width = 120;
                canvas.height = 120;
                ctx.drawImage(image, 0, 0, 120, 120);

                // Display the resized image
                $('.upload_logo').attr('src', canvas.toDataURL('image/jpeg'));
              } else {
                // Handle image dimensions exceeded exception
                alert('Image dimensions exceed the allowed limit (120x120 pixels).');
                // You can also display a message or perform other actions as needed.
              }
            };
          };

          reader.readAsDataURL(file);
        }
      }

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/info.blade.php ENDPATH**/ ?>