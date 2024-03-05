<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Add Location'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/service.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/ckeditor/ckeditor.js')); ?>"></script>

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
    .location-title {
        font-weight: 700;
        font-size: 18px;
        color: #494848;
    }
    .location-row:not(:first-child) .location-title {
        border-top: 2px solid #f5f5f5;
        padding-top: 15px;
        margin-top: 15px;
    }
    .remove-location-btn {
        font-size: 14px;
        line-height: 2.2;
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
  </div>
  <div class="row">
    <div class="col-md-12">
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
          <form id="wizard-validation-form" class="needs-validation1" method="post" action="<?php echo e(route('save_location',$service->id)); ?>" enctype="multipart/form-data" novalidate>
          <?php echo csrf_field(); ?>
          <!-- Account Details -->
            <div id="account-details-validation" class="content active">
              <div class="row g-3">
                <div class="row g-2">
                  <h5 class="listing_title">Locations Details <br><small>Enter Your Location Details.</small></h5>

                  <div class="row location-row">
                    <div class="col-sm-6">
                      <label class="form-label required-label" for="country-dd">Country</label>
                      <select  id="country-dd" class="form-control country-dd" name="country" required>
                        <option></option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($data->id); ?>" <?php echo e($service->country == $data->id ? 'selected' : ''); ?>>
                            <?php echo e($data->name); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label required-label" for="state-dd">State</label>
                      <select  id="state-dd" class="form-control" name="state" required>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label required-label" for="city-dd">City</label>
                      <select  id="city-dd" class="form-control" name="city" required>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label required-label" for="street">Street</label>
                      <input type="text" id="street" value="<?php echo e($service->street??''); ?>" name="street" class="form-control" placeholder="" aria-label="" required />
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label required-label" for="zip_code">Zip code</label>
                      <input type="text"  id="zip_code" value="<?php echo e($service->postal_code??''); ?>" class="form-control" name="zip_code" required>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label " for="contact_no">Phone Number</label>
                      <input type="text" id="contact_no" value="<?php echo e($service->location_phone??''); ?>" class="form-control" name="contact_no">
                    </div>
                  </div>

                  <div id="locations_outer">
                    <?php
                      $locations = $service->getMeta('locations',array());
                    ?>
                    <?php for($i=2; $i<=4 ; $i++): ?>
                      <?php
                        $loc = empty($locations[$i]) ? [] : $locations[$i];
                      ?>
                      <div class="row location-row <?php echo e(empty($locations[$i]) ? 'd-none' : ''); ?> ">
                        <div class="location-header">
                          <div class="location-title">
                            <span>Location <?php echo e($i); ?></span>
                            <a href="javascript:;" class="float-end remove-location-btn">Remove</a>
                          </div>
                        </div>
                        <div class="location-body mb-2 clearfix">
                          <input type="hidden" class="row_no" value="<?php echo e($i); ?>">
                          <div class="row">
                            <div class="col-sm-6">
                              <label class="form-label " for="country-dd">Country</label>
                              <select  class="form-control country-dd" name="location[<?php echo e($i); ?>][country]" onchange="if (!window.__cfRLUnblockHandlers) return false; setLocationState(this)">
                                <option></option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($data->id); ?>" <?php echo e(!empty($loc['country']) && $loc['country'] == $data->id ? 'selected' : ''); ?>>
                                    <?php echo e($data->name); ?>

                                  </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label " for="state-dd">State</label>
                              <select  id="" class="form-control state-dd state-dd-<?php echo e($i); ?>" data-value="<?php echo e($loc['state']??''); ?>" name="location[<?php echo e($i); ?>][state]">
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label " for="city-dd">City</label>
                              <select  id="" class="form-control city-dd-<?php echo e($i); ?>" data-value="<?php echo e($loc['city']??''); ?>" name="location[<?php echo e($i); ?>][city]" >
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label " for="street">Street</label>
                              <input type="text" id="street" value="<?php echo e($loc['street']??''); ?>" name="location[<?php echo e($i); ?>][street]" class="form-control" placeholder="" aria-label="" />
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label " for="zip_code">Zip code</label>
                              <input type="text"  id="zip_code" value="<?php echo e($loc['zip_code']??''); ?>" class="form-control" name="location[<?php echo e($i); ?>][zip_code]" >
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label " for="contact_no">Phone Number</label>
                              <input type="text" id="contact_no" value="<?php echo e($loc['contact_no']??''); ?>" class="form-control" name="location[<?php echo e($i); ?>][contact_no]" >
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endfor; ?>

                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <a href="javascript:;" class="btn btn-primary add-location-row-btn" style="display: inline-block;">Add Location</a>
                    </div>
                  </div>

                  <div class="row mt-5">
                    <div class="col-6 text-start">
                      <a href="<?php echo e((auth()->user()->is_admin()) ? route('service_step',['info',$service->id]) : route('manage_service_step',['info', $service->id])); ?>" type="reset" class="btn btn-label-default waves-effect">
                        <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; <span>Previous</span>
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
                  
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- /Validation Wizard -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
  <script src="<?php echo e(asset('assets/js/service.js')); ?>"></script>
  <?php
  echo '<script>';
    echo 'var locations = ' . json_encode($service->getMeta('locations',array())) . ';';
    echo '</script>';
    ?>
  <script type="text/javascript">

    setTimeout(function() {
        $.each(locations, function(index, val) {
            var eq = parseInt(index - 1);
            $('#locations_outer .row:eq('+eq+') .country-dd').trigger('change');
        });
    }, 500);




    $( document ).on( 'click', '.remove-location-btn', function() {
        var index = 2;
        $(this).parents( '.location-row' ).find( 'select' ).val( '' ).trigger( 'change.select2' );
        $(this).parents( '.location-row' ).find( 'input' ).val( '' );
        $(this).parents( '.location-row' ).removeClass('show').addClass( 'd-none' );
        $( '.row.location-row:not(.d-none)' ).each( function( i, obj ) {
            $(this).find( '.location-title span' ).text( 'Location ' + index);
            index = index + 1;
        });
        if( $( '.location-row.d-none' ).length >= 1 ) {
            $( '.add-location-row-btn' ).removeClass('d-none');
        }
    });

    $( '.add-location-row-btn' ).on( 'click', function() {
        var index = 2;
        $( '.location-row.d-none:first' ).removeClass( 'd-none' );
        $( '.row.location-row:not(:first-child):not(.d-none)' ).each( function( i, obj ) {
            $(this).find( '.location-title span' ).text( 'Location ' + index );
            index = index + 1;
        });

        if($( '.location-row.d-none' ).length == 0) {
            $(this).addClass('d-none');
        }
    });

    setTimeout(function() {
        $('#country-dd').trigger('change');
    }, 500);

    $(".country-dd").select2({
        placeholder: "Select Country",
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
                $("#state-dd").val("<?php echo e($service->state); ?>");
                $("#state-dd").trigger('change');
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

                $("#city-dd").val("<?php echo e($service->city); ?>");
                $("#city-dd").trigger('change');
            }
        });
    });


    $('.country-dd').on('change', function () {
        var idCountry = this.value;
        var row_no = $(this).parents( '.location-row' ).find( '.row_no' ).val();
        $(".state-dd-"+row_no).html('').select2();

        $.ajax({
            url: "<?php echo e(url('api/fetch-states')); ?>",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            dataType: 'json',
            success: function (result) {
                $(".state-dd-"+row_no).html('<option value="">Select State</option>');
                $.each(result.states, function (key, value) {
                    $(".state-dd-"+row_no).append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $(".state-dd-"+row_no).select2("destroy").select2({
                      placeholder: "Select State",
                      allowClear: true
                  });
                var dvalue = $(".state-dd-"+row_no).data('value');
                if (dvalue != '') {
                    $(".state-dd-"+row_no).val(dvalue).trigger('change');
                    $(".state-dd-"+row_no).data('value','');
                }
                $(".city-dd-"+row_no).html('<option value="">Select City</option>');
            }
        });
    });
    $('.state-dd').on('change', function () {
        var idState = this.value;
        var row_no = $(this).parents( '.location-row' ).find( '.row_no' ).val();
        $(".city-dd-"+row_no).html('').select2();
        $.ajax({
            url: "<?php echo e(url('api/fetch-cities')); ?>",
            type: "POST",
            data: {
                state_id: idState,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            dataType: 'json',
            success: function (res) {
                $(".city-dd-"+row_no).html('<option value="">Select City</option>');
                $.each(res.cities, function (key, value) {
                    $(".city-dd-"+row_no).append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $(".city-dd-"+row_no).select2("destroy").select2({
                    placeholder: "Select City",
                    allowClear: true
                });

                var dvalue = $(".city-dd-"+row_no).data('value');
                if (dvalue != '') {
                    $(".city-dd-"+row_no).val(dvalue).trigger('change');
                    $(".city-dd-"+row_no).data('value','');
                }
            }
        });
    });



  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/location.blade.php ENDPATH**/ ?>