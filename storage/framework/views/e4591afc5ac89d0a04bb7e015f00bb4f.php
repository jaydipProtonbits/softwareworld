<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>

<?php $__env->startSection('title', 'Update Type'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?php echo e(route('type.index')); ?>">Type</a>
    </li>
    <li class="breadcrumb-item active">Update Type</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Type</h5>
                  </div>
                  <div class="card-body">
                    <?php if(count($errors) > 0 ): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo e(route('type.update',$type->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Type Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($type->name); ?>" id="basic-default-fullname" placeholder="Software">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Type</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-danger delete-record" data-id="<?php echo e($type->id); ?>}">Delete Type</button>
                        </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
          </div>
    </div>
<!--/ Layout Demo -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".select2").select2({
            placeholder: "Select Parent",
            allowClear: true
        });
        $(document).on('click', '.delete-record', function() {
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
            }).then(function(result) {
                if (result.value) {
                    // delete the data

                    $.ajax({
                        type: 'DELETE',
                        url: "".concat(baseUrl, "admin/type/").concat(user_id),
                        dataType: 'JSON',
                        data: {
                            'id': user_id,
                            '_token': '<?php echo e(csrf_token()); ?>',
                        },
                        success: function success() {
                            setTimeout(function() {
                                window.location.href = "<?php echo e(route('type.index')); ?>";
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
                        text: 'The type has been deleted!',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'The type is not deleted!',
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
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/admin/types/edit.blade.php ENDPATH**/ ?>