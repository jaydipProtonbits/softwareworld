<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Update Page'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/page.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>

<script src="https://cdn.tiny.cloud/1/v1yreane5bk0fymyb220jta7r6l1tm8cm6yfa0ohp2rq2ejh/tinymce/5-stable/tinymce.min.js"></script>
<script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?php echo e(route('page.index')); ?>">Page</a>
    </li>
    <li class="breadcrumb-item active">Update Page</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Page</h5>
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
                    <form method="post" action="<?php echo e(route('page.update',[$page->id])); ?>" class="needs-validation1" id="page_create" novalidate>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="type_id">Type</label>
                            <select name="type_id" class="form-control" id="type_id" required>
                                <option></option>
                                <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($page->type_id == $value->id ? 'selected' : ''); ?> value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php echo e($page->title); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-label" for="slug">Page Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="<?php echo e($page->slug); ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="heading_one">Title H1</label>
                            <input type="text" name="heading_one" id="heading_one" class="form-control" value="<?php echo e($page->heading_one); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-label" for="heading_two">Title H2</label>
                            <input type="text" name="heading_two" id="heading_two" class="form-control" value="<?php echo e($page->heading_two); ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label required-label" for="description">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="12" id="description" required><?php echo e($page->description); ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?php echo e($page->meta_title); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-label" for="TagifyBasic">Meta Keywords</label>
                            <input type="text" name="meta_keyword" id="TagifyBasic" class="form-control" value="<?php echo e($page->meta_keyword); ?>" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label required-label" for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="6" id="meta_description" required><?php echo e($page->meta_description); ?></textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                          <label class="form-label" for="buyer_guide">Buyers’ Guide</label>
                          <textarea class="form-control ckeditor" name="buyer_guide" rows="12" id="buyer_guide"><?php echo e($page->buyer_guide); ?></textarea>
                        </div>
                    </div>

                    <?php if( !empty($page) && $items ): ?>
                      <hr>
                      <h5><?php echo e($page->type_id == 2 ? 'Software:' : 'Service'); ?></h5>
                      <hr>

                      <div class="card mb-4">
                        <div class="card-datatable table-responsive">
                          <table class="table table-striped table-bordered">
                            <thead class="border-top">
                            <tr>
                              <th>Sr No.</th>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if( count($items) ): ?>
                              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e(++$index); ?></td>
                                  <td><?php echo e($item->id); ?></td>
                                  <td><?php echo e($item->name); ?></td>
                                  <td><?php echo e(Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i A')); ?></td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    <?php endif; ?>

                    <hr>
                    <h5>Filters:</h5>
                    <hr>
                    <div class="mb-3" id="add_filter_inner">
                        <?php if($page->type_id == 2 && !empty($page->filter)): ?>
                            <?php
                                $filter_type = $page->filter_val->filter_type ?? [];
                                $filter_val = $page->filter_val->filter_val ?? [];
                            ?>
                            <?php $__currentLoopData = $filter_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row filter_list mb-3" data-id="<?php echo e($key); ?>">
                                    <div class="col-md-4">
                                        <label class="form-label required-label">Select Filter Type</label>
                                        <select class="form-control change_f_type f_added" name="filter_type[<?php echo e($key); ?>]" class="filter_type" data-id="<?php echo e($key); ?>">
                                            <option value="">Select filter type</option>
                                            <?php $__currentLoopData = softwareFilterVal(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($filter == $k ? 'selected' : ''); ?> value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-8 filter_values" id="filter-<?php echo e($key); ?>" data-val="<?php echo e($filter_val->$key); ?>"></div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if($page->type_id == 1 && !empty($page->filter)): ?>
                            <?php
                                $filter_type = $page->filter_val->filter_type ?? [];
                                $filter_val = $page->filter_val->filter_val ?? [];
                            ?>
                            <?php $__currentLoopData = $filter_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row filter_list mb-3" data-id="<?php echo e($key); ?>">
                                    <div class="col-md-4">
                                        <label class="form-label required-label">Select Filter Type</label>
                                        <select class="form-control change_f_type f_added" name="filter_type[<?php echo e($key); ?>]" class="filter_type" data-id="<?php echo e($key); ?>">
                                            <option value="">Select filter type</option>
                                            <?php $__currentLoopData = serviceFilterVal(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($filter == $k ? 'selected' : ''); ?> value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-8 filter_values" id="filter-<?php echo e($key); ?>" data-val="<?php echo e($filter_val->$key); ?>"></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                    <div class="mb-3 mt-3">
                        <a href="javascript:void(0)" class="add_new_filter text-decoration-underline"><i class="ti ti-plus"></i> Add Filter</a>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label required-label" for="status">Publish Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option <?php echo e($page->status == 1 ? 'selected' : ''); ?> value="1">Publish</option>
                                <option <?php echo e($page->status == 0 ? 'selected' : ''); ?> value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Page</button>
                    </form>
                  </div>
                </div>
          </div>
    </div>


<!--/ Layout Demo -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/admin/page/edit.blade.php ENDPATH**/ ?>