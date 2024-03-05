<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Update '. $type); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<style type="text/css">
    body button.step-trigger.activeBTN span.bs-stepper-title,
    body button.step-trigger.activeBTN span.bs-stepper-subtitle {
        color: blue !important;
        font-weight: bold !important;
    }
    .activeBTN span.bs-stepper-circle {
        background: var(--bs-primary) !important;
        color: #FFF !important;
    }
    label.form-label {
        margin-top: 1rem;
    }
    ul.list-group.f-list {
        display: block;
    }
    .f-list li.list-group-item {
        max-width: 33.33% !important;
        display: inline-block !important;
        min-height: 46px;
        margin-bottom: 15px;
        border-top: var(--bs-list-group-border-width) solid var(--bs-list-group-border-color);
        width: 33%;
    }
    .form-check-input[type=checkbox] {
        border-radius: 100% !important;
    }
    button.step-trigger {
      width: 100% !important;
      justify-content: space-between !important;
  }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row title_row">
    <div class="col-md-4">
        <h4 class="">Listing</h4>
    </div>
</div>
<div class="row">
  <!-- Vertical Icons Wizard -->
  <div class="col-12 mb-4">
    <div class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      <?php echo $__env->make('admin.listing.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form class="needs-validation1" action="<?php echo e(route('saveFeatures'
        ,[$type,$listing->id])); ?>" method="POST" enctype="maltipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <div class="row g-3">
                <div class="col-12 category-box-description">
                    <h5 class="listing_title">Features<br><small>Add Features</small></h5>
                    <div class="accordion mt-3" id="accordionWithIcon">

                      <?php if(!empty($allCat = getCategory($listing->categories))): ?>
                      <?php $__currentLoopData = $allCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $CatUrl = !empty($listing->getMeta('features_cat_page_url')[$value->id]) ? $listing->getMeta('features_cat_page_url')[$value->id] : '';
                        ?>
                          <div class="card accordion-item active">
                                <h2 class="accordion-header">
                                  <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-<?php echo e($value->id); ?>" aria-expanded="true">
                                    <?php echo e($value->name); ?>

                                  </button>
                                    
                                </h2>
                                <div id="accordionWithIcon-<?php echo e($value->id); ?>" class="accordion-collapse collapse <?php echo e($loop->first ? 'show' : ''); ?>" data-bs-parent="#accordionWithIcon">
                                  <div class="accordion-body">
                                        <div class="p-2">
                                            <label><small>Page URL</small></label>
                                            <select class="form-control" name="cat_page_url[<?php echo e($value->id); ?>]">
                                                <option value="">Select Page</option>
                                                <?php $__currentLoopData = getAdminPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($CatUrl == $key ? 'selected="selected"' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($page); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <ul class="list-group f-list">

                                            <?php if(!empty($feature = $value->feature)): ?>
                                                <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="list-group-item border-0">
                                                        <div class="form-check form-check-primary">
                                                            <input
                                                            class="form-check-input form-select-lg"
                                                            name="features[<?php echo e($value->id); ?>][<?php echo e($feat->id); ?>]"
                                                            type="checkbox"
                                                            <?php echo e(!empty($listing->getMeta('features')[$value->id]) && in_array($feat->id,$listing->getMeta('features')[$value->id]) ? 'checked' : ''); ?>

                                                            value="<?php echo e($feat->id); ?>"
                                                            id="customCheckSuccess_<?php echo e($feat->id); ?>">
                                                            <label class="form-check-label" for="customCheckSuccess_<?php echo e($feat->id); ?>"><?php echo e($feat->name); ?></label>
                                                          </div>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>

                                  </div>
                                </div>
                            </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

                    </div>

                </div>

            </div>
          </div>
              <div class="row mt-5">
                <div class="col-6 text-start">
                  <a href="<?php echo e((auth()->user()->is_admin()) ? route('details',['description',$listing->id]) : route('manage_details',['description',$listing->id])); ?>" type="reset" class="btn btn-label-default waves-effect">
                    <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Previous
                  </a>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-primary btn-next">
                     <span class="align-middle d-sm-inline-block me-sm-1">
                       Save & Next &nbsp;&nbsp; <i class="fa fa-arrow-right"></i>
                     </span>
                  </button>
                </div>
              </div>
          
        </form>
      </div>
    </div>
  </div>
  <!-- /Vertical Icons Wizard -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/listing.js')); ?>"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {

    $('input[name="device_supported[]"]').change(function(event) {
        if($(this).is(":checked")) {
            console.log($(this).attr('id'));
            $('.device_urls.'+$(this).attr('id')).show();
        }else {
            $('.device_urls.'+$(this).attr('id')).hide();
        }

    });


    $('.upload_logo').click(function(event) {
        console.log('click');
          $('#upload_logo').click();
    });

    $("#country-dd").select2({
          placeholder: "Select Country",
          allowClear: true
      });

    $("#category-dd").select2({
          placeholder: "Search Categories",
          allowClear: true
      });

    $("#target_industry-dd").select2({
          placeholder: "Search Industry",
          allowClear: true
      });

    $("#include-country-dd").select2({
          placeholder: "Search Countries",
          allowClear: true
      });

    $("#languages_supported-dd").select2({
          placeholder: "Search Languages",
          allowClear: true
      });

    $("#city-dd").select2({
          placeholder: "Select City",
          allowClear: true
      });

    $("#state-dd").select2({
          placeholder: "Select State",
          allowClear: true
      });

       $('#country-dd').on('change', function () {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "<?php echo e(url('api/fetch-states')); ?>",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $("#state-dd").select2("destroy").select2({
                          placeholder: "Select State",
                          allowClear: true
                      });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "<?php echo e(url('api/fetch-cities')); ?>",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $("#city-dd").select2("destroy").select2({
                        placeholder: "Select City",
                        allowClear: true
                    });
                }
            });
        });



    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/listing/features.blade.php ENDPATH**/ ?>