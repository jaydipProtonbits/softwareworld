<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Update Features'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<style type="text/css">
    span.remove_feature {
        cursor: pointer;
        color: red;
        position: absolute;
        right: 13px;
        top: 34%;
        font-size: 17px;
        background: #f3f3f3;
        padding: 5px 10px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    #features-outer .col-12 {
        position: relative;
    }
    /*h2#swal2-title {
        font-size: 18px;
        margin: 0;
        padding: 14px !important;
    }*/
    /*.swal2-popup.swal2-modal.swal2-show {
        padding-bottom: 0;
    }*/
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?php echo e(route('features.index')); ?>">Features</a>
    </li>
    <li class="breadcrumb-item active">Update Features</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Features</h5>
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
                    <form method="post" action="<?php echo e(route('features.update',$category_id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                      <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option></option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e($category_id == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </select>
                      </div>
                        <div class="row" id="features-outer">
                            <?php if(!empty($features)): ?>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Feature Name</label>
                                        <input type="text" name="name[][<?php echo e($feature->id); ?>]" class="form-control" value="<?php echo e($feature->name); ?>" id="basic-default-fullname" placeholder="Software" required>
                                    </div>
                                    <?php if($loop->iteration != 1): ?>
                                        <span class="remove_feature" data-id="<?php echo e($feature->id); ?>"><i class="fa fa-close"></i></span>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <?php endif; ?>
                        </div>
                        <div class="mt-3 mb-3 text-end">
                            <a href="javascript:void(0)" id="add_features"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Feature</button>
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="button" class="btn btn-danger delete-record" data-id="<?php echo e($category_id); ?>">Delete All Features</button>
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
                        url: "".concat(baseUrl, "admin/deleteFeatures/").concat(user_id),
                        dataType: 'JSON',
                        data: {
                            'id': user_id,
                            '_token': '<?php echo e(csrf_token()); ?>',
                        },
                        success: function success() {
                            setTimeout(function() {
                                window.location.href = "<?php echo e(route('features.index')); ?>";
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
                        text: 'Features has been deleted!',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Feature is not deleted!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
        });

        $("#category_id").select2({
            placeholder: "Select Category",
            allowClear: true
        });
        $(document).on('click', '#add_features', function(event) {
           event.preventDefault();
            $('#features-outer').append('<div class="col-12"><div class="mb-3"><label class="form-label" for="basic-default-fullname">Feature Name</label><input type="text" name="name[][]" class="form-control" value="" id="basic-default-fullname" placeholder="Software" required></div><span class="remove_feature" data-id=""><i class="fa fa-close"></i></span></div>');
        });
        $(document).on('click', '.remove_feature', function(event) {
            event.preventDefault();
            $(this).closest('.col-12').remove();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/admin/features/edit.blade.php ENDPATH**/ ?>