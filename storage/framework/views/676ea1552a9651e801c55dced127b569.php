<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'List Portfolio'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/service.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<style type="text/css">
    .ck-editor__editable {min-height: 200px;}
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
    button.step-trigger {
      width: 100% !important;
      justify-content: space-between !important;
    }
    body button.step-trigger.activeBTN span.bs-stepper-title,
    body button.step-trigger.activeBTN span.bs-stepper-subtitle {
      color: blue !important;
      font-weight: bold !important;
    }
    .activeBTN span.bs-stepper-circle {
      background: var(--bs-primary) !important;
      color: #FFF !important;
    }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<!-- Validation Wizard -->
  <div class="col-12">
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

            <div class="add_new row mb-3">

                <div class="col-md-6">
                  <h5 class="listing_title border-0 p-0 m-0">Portfolio <br><small>Setup Portfolio Details</small></h5>
                </div>
                <div class="col-md-6 float-end clearfix">
                    <a href="<?php echo e((auth()->user()->is_admin()) ? route('service_step',['portfolios',$service->id]) : route('manage_service_step',['portfolios',$service->id])); ?>" class="btn btn-primary float-end"><i class="fa fa-plus"></i> &nbsp;Add Portfolio</a>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table">
                  <thead class="border-top">
                    <tr>
                      <th>Project Name</th>
                      <th>Amount</th>
                      <th>Timeline</th>
                      <th>Industry</th>
                      <th>Submitted On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(count($service->portfolio) > 0): ?>
                    <?php $__currentLoopData = $service->portfolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($portfolio->name); ?></td>
                            <td><?php echo e($portfolio->project_cost); ?></td>
                            <td><?php echo e($portfolio->timeline); ?> weeks</td>
                            <td><?php echo e($portfolio->industry->name); ?></td>
                            <td><?php echo e(date("m-d-Y h:i", strtotime($portfolio->created_at))); ?></td>
                            <td>
                              <a href="<?php echo e((auth()->user()->is_admin()) ? route('editPortfolio',[$portfolio->id, $service->id]) : route('manage_editPortfolio',[$portfolio->id, $service->id])); ?>"><i class="ti ti-edit"></i></a>
                              <a class="delete-record" href="javascript:void(0)" data-id="<?php echo e($portfolio->id); ?>"><i class="ti ti-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr align="center">
                            <td colspan="6">No any portfolio found</td>
                        </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
      </div>
    </div>
  </div>
<!-- /Validation Wizard -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/service.js')); ?>"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on('click', '.delete-record', function () {
            var user_id = $(this).data('id'),
              dtrModal = $('.dtr-bs-modal.show');

            // hide responsive modal in small screen
            if (dtrModal.length) {
              dtrModal.modal('hide');
            }

            // sweetalert for confirmation of delete
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  customClass: {
                    confirmButton: 'btn btn-primary me-3',
                    cancelButton: 'btn btn-label-secondary'
                  },
                  buttonsStyling: false
                }).then(function (result) {
                  if (result.value) {
                    // delete the data

                    $.ajax({
                      type: 'DELETE',
                      url: "<?php echo e(route('deletePortfolio',[$portfolio->id??0])); ?>",
                       dataType: 'JSON',
                        data:{
                            'id': user_id,
                            '_token': '<?php echo e(csrf_token()); ?>',
                        },
                      success: function success() {
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                      },
                      error: function error(_error) {
                        console.log(_error);
                      }
                    });

                    // success sweetalert
                    Swal.fire({
                      icon: 'success',
                      title: 'Deleted!',
                      text: 'The portfolio has been deleted!',
                      customClass: {
                        confirmButton: 'btn btn-success'
                      }
                    });
                  } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                      title: 'Cancelled',
                      text: 'The portfolio is not deleted!',
                      icon: 'error',
                      customClass: {
                        confirmButton: 'btn btn-success'
                      }
                    });
                  }
                });
            });

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/portfolio_list.blade.php ENDPATH**/ ?>