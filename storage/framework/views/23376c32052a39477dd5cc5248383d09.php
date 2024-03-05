<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Update Pricing'); ?>

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
    .f-big input {
        width: 20px;
        height: 20px;
        vertical-align: middle;
    }
    label.form-label {
        margin-top: 1rem;
    }

    .package-box {
        border-left: 4px solid #e4e8f2;
        padding-top: 20px;
        padding-left: 20px;
        margin-left: 12px;
    }
    .packages-box .package-box:first-child {
        margin-top: 20px;
        padding-top: 0;
    }
    .package-number {
        font-size: 18px;
        color: #333;
        font-weight: 600;
    }
    .remove-features, .remove-features-disabled, .remove-knowledge, .remove-knowledge-disabled {
        float: left;
        height: 24px;
        width: 24px;
        background: #ff5858;
        border-radius: 24px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        font-size: 0;
        position: relative;
        top: 8px;
        cursor: pointer;
        color: transparent;
        flex: 0 0 24px;
    }
    .remove-features::before, .remove-features-disabled::before, .remove-knowledge::before, .remove-knowledge-disabled::before {
        background: #fff;
        height: 3px;
        width: 10px;
        content: "";
        display: inline-block;
        position: relative;
        top: 4px;
        left: 0;
    }
    .software-profile-box input.form-control, .reviewer-profile-box input.form-control {
        border: solid 1px #e4e8f2;
        height: 44px;
    }

    .form-control.features {
        width: calc(100% - 35px);
        float: right;
    }
    .features-box {
        margin-bottom: 15px;
    }
    .add_package {
        color: #333;
        font-size: 18px;
        border: none;
        background: 0 0;
        position: relative;
        margin-left: 40px;
        padding-left: 40px;
        display: flex;
        margin-top: 20px;
    }
    .add_package::before {
        border: 2px solid #3a7af3;
        content: "+";
        color: #3a7af3;
        width: 30px;
        height: 30px;
        display: inline-block;
        border-radius: 30px;
        line-height: 21px;
        position: absolute;
        line-height: 26px;
        left: 0;
        text-align: center;
        font-size: 30px;
    }
    .remove-package {
        height: 28px;
        border: solid 1px #ff6e6e;
        padding: 0 23px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        color: #ff5959;
        border-radius: 29px;
        width: 88px;
        float: right;
        cursor: pointer;
    }
    .remove-features-disabled, .remove-knowledge-disabled {
        background: #c4c4c4;
        cursor: default;
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
        <form class="needs-validation1" action="<?php echo e(route('savePrice'
        ,[$type,$listing->id])); ?>" method="POST" enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <h5 class="listing_title">Pricing<br><small>Add Pricing & Plans</small></h5>

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label required-label" for="pricing_type">Pricing Type</label>
                <select class="form-control" name="pricing_type" id="pricing_type" required>
                    <option></option>
                  <?php $__currentLoopData = pricingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e($key == $listing->getMeta('pricing_type') ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label required-label" for="pricing_currency">Preferred Currency</label>
                <select class="form-control" name="pricing_currency" id="pricing_currency" required>
                    <option></option>
                  <?php $__currentLoopData = pricingCurrency(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($key == $listing->getMeta('pricing_currency') ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label required-label notice-label d-block">Do you have free version available for your software?</label>
                <label class="f-big">
                    <input type="radio" class="form-check-label" <?php echo e(1 == $listing->getMeta('is_free_version') ? 'checked' : ''); ?> name="is_free_version" value="1"> YES
                </label>&nbsp;&nbsp;
                <label class="f-big">
                    <input type="radio" class="form-check-label" <?php echo e(1 != $listing->getMeta('is_free_version') ? 'checked' : ''); ?> name="is_free_version" value="0"> No
                </label>
              </div>
              <div class="col-12">
                    <label class="form-label required-label d-block notice-label">Free trial available in your software?</label>
                    <label class="f-big"><input type="radio" <?php echo e(1 == $listing->getMeta('is_free_trail') ? 'checked' : ''); ?> class="form-check-label" name="is_free_trail" value="1"> YES </label>&nbsp;&nbsp;
                    <label class="f-big"><input type="radio" <?php echo e(1 != $listing->getMeta('is_free_trail') ? 'checked' : ''); ?> class="form-check-label" name="is_free_trail" value="0"> No</label>
              </div>
                <div class="row <?php echo e($listing->getMeta('is_free_trail') == 1 ? '' : 'd-none'); ?> free_trail">
                    <div class="col-md-6">
                        <label class="form-label d-block notice-label">Do customer need to provide Credit Card details for trial?</label>
                        <label class="f-big">
                            <input type="radio" class="form-check-label" <?php echo e(1 == $listing->getMeta('cc_for_trail_period') ? 'checked' : ''); ?> name="cc_for_trail_period" value="1"> YES
                        </label>&nbsp;&nbsp;
                        <label class="f-big">
                            <input type="radio" class="form-check-label" <?php echo e(1 != $listing->getMeta('cc_for_trail_period') ? 'checked' : ''); ?> name="cc_for_trail_period" value="0"> No
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="trail_duration">Trial Period Duration</label>
                        <select class="form-control" name="trail_duration" id="trail_duration">
                          <?php $__currentLoopData = pricingTrail(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php echo e($key == $listing->getMeta('trail_duration') ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

              </div>


             <div class="col-md-12">
                <label class="form-label" for="payment_frequency">Payment Frequency</label>
                <select class="form-control" name="payment_frequency[]" id="payment_frequency" multiple>
                    
                  <?php $__currentLoopData = pricingFrequency(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>" <?php echo e(in_array($value, \Arr::wrap($listing->getMeta('payment_frequency')))  ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

             <div class="col-md-12">
                <label class="form-label" for="pricing_details">Pricing Details</label>
                <textarea name="pricing_details" id="pricing_details" rows="5" placeholder="Enter description" class="form-control pricing_detail_desc" maxlength="500" cols="30"><?php echo e($listing->getMeta('pricing_details')); ?></textarea>
              </div>

             <div class="col-md-6">
                <label class="form-label" for="pricing_pdf">Upload Pricing PDF</label>
                <input type="file" name="pricing_pdf" id="pricing_pdf" class="form-control" accept="application/pdf">
              </div>

            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h6 class="listing_in_title">Plans & Packages</h6>
                </div>
                <div class="col-12">
                    <label class="form-label d-block notice-label">Do you want to create pricing plan?</label>
                    <label class="f-big">
                        <input type="radio" class="form-check-label" <?php echo e(1 == $listing->getMeta('is_price_plan') ? 'checked' : ''); ?> name="is_price_plan" value="1"> YES
                    </label>&nbsp;&nbsp;
                    <label class="f-big">
                        <input type="radio" class="form-check-label" <?php echo e(1 != $listing->getMeta('is_price_plan') ? 'checked' : ''); ?> name="is_price_plan" value="0"> No
                    </label>
                </div>

                <div class="col-12">
                    <?php if($listing->getMeta('is_price_plan') == 1): ?>
                        <?php $packages = $listing->getMeta('package') ?>
                        <?php if(!empty($packages)): ?>
                            <div class="packages-box">
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($package['name'])): ?>
                                    <div class="package-box ">
                                        <div class="form-group">
                                            <div class="package-number">Package #<span class="package-digit"><?php echo e($loop->iteration); ?></span>
                                                <span class="remove-package" data-listing-id="<?php echo e($listing->id); ?>" data-id="<?php echo e($loop->iteration); ?>">Remove</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 ps-0">
                                                <div class="input text">
                                                    <label for="package<?php echo e($loop->iteration); ?>Name" class="form-label">Package Name</label>
                                                    <input name="package[<?php echo e($loop->iteration); ?>][name]" placeholder="Enter package name" class="form-control package_name unique" maxlength="20" type="text" value="<?php echo e($package['name']); ?>" id="package<?php echo e($loop->iteration); ?>Name" required></div>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <div class="input text"><label for="package<?php echo e($loop->iteration); ?>Price" class="form-label">Price ($)</label><input name="package[<?php echo e($loop->iteration); ?>][price]" class="form-control package_price" autocomplete="off" maxlength="8" type="text" value="<?php echo e($package['price']); ?>" id="package<?php echo e($loop->iteration); ?>Price"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6 packageunits">
                                                <label for="package<?php echo e($loop->iteration); ?>Units" class="form-label">Units</label>
                                                <select name="package[<?php echo e($loop->iteration); ?>][units]" class="form-control" id="package<?php echo e($loop->iteration); ?>Units">
                                                    <option value="">Please Select</option>
                                                    <option <?php echo e($package['units'] == 'one-time' ? 'selected' : ''); ?> value="one-time">One-time</option>
                                                    <option <?php echo e($package['units'] == 'year' ? 'selected' : ''); ?> value="year">Per Year</option>
                                                    <option <?php echo e($package['units'] == 'month' ? 'selected' : ''); ?> value="month">Per Month</option>
                                                    <option <?php echo e($package['units'] == 'day' ? 'selected' : ''); ?> value="day">Per Day</option>
                                                    <option <?php echo e($package['units'] == 'hour' ? 'selected' : ''); ?> value="hour">Per Hour</option>
                                                    <option <?php echo e($package['units'] == 'user' ? 'selected' : ''); ?> value="user">Per User</option>
                                                    <option <?php echo e($package['units'] == 'feautre' ? 'selected' : ''); ?> value="feautre">Per Feautre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="package<?php echo e($loop->iteration); ?>Description" class="form-label">Description</label>
                                            <textarea name="package[<?php echo e($loop->iteration); ?>][description]" rows="3" placeholder="Enter description" class="form-control package_description" maxlength="250" cols="30" id="package<?php echo e($loop->iteration); ?>Description"><?php echo e($package['description']); ?></textarea>
                                        </div>
                                        <div class="strengthlayout clear form-group overflow">
                                            <div class="input text strengthlayout-area">
                                                <label for="features" class="form-label">Features</label>
                                                <?php if(!empty($package['features'])): ?>
                                                    <?php $p_l = $loop->iteration; ?>
                                                    <?php $__currentLoopData = $package['features']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="features-box clearfix first">
                                                            <span class="remove-features">-</span>
                                                            <input name="package[<?php echo e($p_l); ?>][features][<?php echo e($k); ?>]" class="form-control features" autocomplete="off" type="text" maxlength="150" value="<?php echo e($val); ?>">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <div class="features-box clearfix first">
                                                        <span class="remove-features">-</span>
                                                        <input name="package[<?php echo e($loop->iteration); ?>][features][1]" class="form-control features" autocomplete="off" type="text" maxlength="150">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        <?php endif; ?>
                    <?php else: ?>
                        <div class="packages-box d-none">
                            <div class="package-box ">
                                <div class="form-group">
                                    <div class="package-number">Package #<span class="package-digit">1</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="input text">
                                            <label for="package1Name" class="form-label">Package Name</label>
                                            <input name="package[1][name]" placeholder="Enter package name" class="form-control package_name unique" maxlength="20" type="text" value="" id="package1Name"></div>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <div class="input text"><label for="package1Price" class="form-label">Price ($)</label><input name="package[1][price]" class="form-control package_price" autocomplete="off" maxlength="8" type="text" value="" id="package1Price"></div>
                                    </div>
                                </div>
                                <div class="clearfix row">
                                    <div class="form-group  col-md-6 packageunits">
                                        <label for="package1Units" class="form-label">Units</label>
                                        <select name="package[1][units]" class="form-control" id="package1Units">
                                            <option value="">Please Select</option>
                                            <option value="one-time">One-time</option>
                                            <option value="year">Per Year</option>
                                            <option value="month">Per Month</option>
                                            <option value="day">Per Day</option>
                                            <option value="hour">Per Hour</option>
                                            <option value="user">Per User</option>
                                            <option value="feautre">Per Feautre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="package1Description" class="form-label">Description</label>
                                    <textarea name="package[1][description]" rows="3" placeholder="Enter description" class="form-control package_description" maxlength="250" cols="30" id="package1Description"></textarea>
                                </div>
                                <div class="strengthlayout clear form-group overflow">
                                    <div class="input text strengthlayout-area">
                                        <label for="features" class="form-label">Features</label>
                                        <div class="features-box clearfix first">
                                            <span class="remove-features">-</span>
                                            <input name="package[1][features][1]" class="form-control features" autocomplete="off" type="text" maxlength="150">
                                        </div>

                                        <div class="features-box clearfix">
                                            <span class="remove-features">-</span>
                                            <input name="package[1][features][2]" class="form-control features" autocomplete="off" type="text" maxlength="150">
                                        </div>

                                        <div class="features-box clearfix">
                                            <span class="remove-features">-</span>
                                            <input name="package[1][features][3]" class="form-control features" autocomplete="off" type="text" maxlength="150">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <a href="javascript:" class="add_package float-end <?php echo e($listing->getMeta('is_price_plan') == 1 ? '' : 'd-none'); ?>">Add More Package</a>
                </div>




            </div>
          </div>
            <div class="row mt-5">
              <div class="col-6 text-start">
                <a href="<?php echo e((auth()->user()->is_admin()) ? route('details',['destination',$listing->id]) : route('manage_details',['destination',$listing->id])); ?>" type="reset" class="btn btn-label-default waves-effect">
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

        $(document).on('change', 'input[name=is_price_plan]', function(event) {
            event.preventDefault();
            if ($(this).val() == 1) {
                $('.packages-box, .add_package').removeClass('d-none');
            }else{
                $('.packages-box, .add_package').addClass('d-none');
            }
        });

        $(document).on('keyup', '.features', function (e) {
            var package_box = $(this).parents('.package-box');
            var parent_index = package_box.find('.package-digit').text();
            var str_box_len = package_box.find('.features-box').length;
            var str_ind = $(this).parents('.features-box').index();
            var next_index =  str_ind + 1;

            var new_features = '<div class="features-box clearfix"><span class="remove-features">-</span><input name="package['+parent_index+'][features]['+next_index+']" class="form-control features" autocomplete="off" type="text" maxlength="150"></div>';
            if(str_box_len == 1)
            {
                package_box.find('.features-box').find('.remove-features-disabled').addClass('remove-features').removeClass('remove-features-disabled');
                $(new_features).insertAfter(package_box.find('.features-box'));
            }
            else if(str_ind == str_box_len)
            {
                if(str_ind >= 15)
                {
                    return false;
                }
                else
                    package_box.find('.strengthlayout-area').append(new_features);
            }
        });
        $(document).on('click', '.remove-features', function (e) {
            var package_box = $(this).parents('.package-box');
            var parent_index = package_box.find('.package-digit').text();
            var str_box_len = package_box.find('.features-box').length;
            if(str_box_len == 1)
            {
                // do not delete
                return false;
            }
            $(this).parents('.features-box').remove();
            var newindx = 1;
            package_box.find(".features-box").each(function() {
                $(this).find('input').attr('name', 'package['+parent_index+'][features]['+newindx+']');
                newindx++;
            });
            str_box_len = package_box.find('.features-box').length;
            if(str_box_len == 1)
            {
                package_box.find('.features-box').find('.remove-features').addClass('remove-features-disabled').removeClass('remove-features');
            }
        });
        $(document).on('click', '.add_package', function (e) {
            var pkg_box_len = $('.package-box').length;

            if(pkg_box_len >= 5)
            {
                return false;
                $('.add_package').addClass('hide');
            }

            var next_index =  pkg_box_len + 1;
            var new_package = '<div class="package-box extra-package"><div class="form-group"><div class="package-number">Package #<span class="package-digit">'+next_index+'</span><span class="remove-package">Remove</span></div></div><div class="row"><div class="form-group col-md-6 ps-0"><div class="input text"><label class="form-label" for="tagline">Package Name</label><input name="package['+next_index+'][name]" required placeholder="Enter package name" class="form-control package_name unique" maxlength="20" type="text"></div></div><div class="form-group col-md-6"><div class="input text"><label class="form-label" for="package1Price">Price ($)</label><input name="package['+next_index+'][price]" class="form-control package_price" autocomplete="off" maxlength="8" type="text" id="package1Price"></div></div></div><div class="clearfix row"><div class="form-group col-md-6 packageunits"><div class="input select"><label class="form-label" for="package1Units">Units</label><select name="package['+next_index+'][units]" class="form-control package_units" id="package'+next_index+'Units" tabindex="-1" aria-hidden="true"><option value="one-time">One-time</option><option value="year">Per Year</option><option value="month">Per Month</option><option value="day">Per Day</option><option value="hour">Per Hour</option><option value="user">Per User</option><option value="feautre">Per Feautre</option></select></div></div></div><div class="form-group clearfix"><div class="input textarea"><span class="pull-right lighttagc short_summary_count"></span><label class="form-label" for="package1Description">Description</label><textarea name="package['+next_index+'][description]" rows="3" placeholder="Enter description" class="form-control package_description" maxlength="250" cols="30" id="package'+next_index+'Description"></textarea></div></div><div class="form-group clearfix"><label class="form-label d-block notice-label" for="include_parent_feature" class="required-label ">Does this plan Include all features of Package #<span class="include_parent_feature_number">'+pkg_box_len+'</span>?</label><div class="clearfix include_parent_feature-model-box radioboxlayout"><label class="checked f-big"><input name="package['+next_index+'][include_parent_feature]" class="include_parent_feature" checked="checked" type="radio" value="yes"> Yes</label>&nbsp; &nbsp; &nbsp;<label class="f-big"><input name="package['+next_index+'][include_parent_feature]" class="include_parent_feature" type="radio" value="no"> No</label></div></div><div class="strengthlayout clear form-group overflow"><div class="input text strengthlayout-area"><label class="form-label" for="features" class="labelh3">Additional Features</label><div class="features-box clearfix first"><span class="remove-features">-</span><input name="package['+next_index+'][features][1]" class="form-control features" autocomplete="off" type="text" maxlength="150"></div><div class="features-box clearfix"><span class="remove-features">-</span><input name="package['+next_index+'][features][2]" class="form-control features" autocomplete="off" type="text" maxlength="150"></div><div class="features-box clearfix"><span class="remove-features">-</span><input name="package['+next_index+'][features][3]" class="form-control features" autocomplete="off" type="text" maxlength="150"></div></div></div></div>';

            $('.packages-box').append(new_package);

            $(".package_description").each(function() {
                //countNewChar($(this),$(this).parents('.textarea').find('.short_summary_count'),250);
            });

            $('.add_package').removeClass('hide');
            if(next_index == 5)
            {
                $('.add_package').addClass('hide');
            }
        });

        /*$(document).on('click', '.remove-package', function (e) {
            var package_box = $(this).parents('.package-box');
            var package_digit = package_box.find('.package-digit').text();
            if (confirm('Are you sure you want to remove Package #'+package_digit+'?'))
            {
                package_box.remove();
                $('.add_package').removeClass('hide');
                if($('.package-box.extra-package').length != 0)
                {
                    var newindx = 2;
                    $(".package-box.extra-package").each(function() {
                        $(this).find('.package-digit').html(newindx);
                        $(this).find('.package_name').attr('name', 'package['+newindx+'][name]');
                        $(this).find('.package_price').attr('name', 'package['+newindx+'][price]');
                        $(this).find('.package_units').attr('name', 'package['+newindx+'][units]');
                        $(this).find('.package_description').attr('name', 'package['+newindx+'][description]');
                        $(this).find('.include_parent_feature').attr('name', 'package['+newindx+'][include_parent_feature]');
                        $(this).find('.include_parent_feature_number').html(newindx-1);

                        var features_indx = 1;
                        $(this).find(".features-box").each(function() {
                            $(this).find('input').attr('name', 'package['+newindx+'][features]['+features_indx+']');
                            features_indx++;
                        });

                        newindx++;
                    });
                }
            }
        });*/

        $(document).on('click', '.remove-package', function () {
          var listing_id = $(this).data('listing-id');
          var package_id = $(this).data('id');

          if (package_id)
          {
            let url = '<?php echo e(route('delete_package', ':id')); ?>';
            url = url.replace(':id', package_id);
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
                $.ajax({
                  type : 'DELETE',
                  url : url,
                  dataType : 'JSON',
                  data : {
                    listing_id : listing_id,
                    '_token': '<?php echo e(csrf_token()); ?>',
                  },
                  success : function success() {
                    setTimeout(function() {
                      location.reload();
                    }, 500);
                  },
                  error : function error(_error) {
                    console.log(_error);
                  }
                });

                // success sweetalert
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: 'The package has been deleted!',
                  customClass: {
                    confirmButton: 'btn btn-success'
                  }
                });
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                  title: 'Cancelled',
                  text: 'The package is not deleted!',
                  icon: 'error',
                  customClass: {
                    confirmButton: 'btn btn-success'
                  }
                });
              }
            });
          }
          else
          {
            var package_box = $(this).parents('.package-box');
            var package_digit = package_box.find('.package-digit').text();
            if (confirm('Are you sure you want to remove Package #'+package_digit+'?'))
            {
              package_box.remove();
              $('.add_package').removeClass('hide');
              if($('.package-box.extra-package').length != 0)
              {
                var newindx = 2;
                $(".package-box.extra-package").each(function() {
                  $(this).find('.package-digit').html(newindx);
                  $(this).find('.package_name').attr('name', 'package['+newindx+'][name]');
                  $(this).find('.package_price').attr('name', 'package['+newindx+'][price]');
                  $(this).find('.package_units').attr('name', 'package['+newindx+'][units]');
                  $(this).find('.package_description').attr('name', 'package['+newindx+'][description]');
                  $(this).find('.include_parent_feature').attr('name', 'package['+newindx+'][include_parent_feature]');
                  $(this).find('.include_parent_feature_number').html(newindx-1);

                  var features_indx = 1;
                  $(this).find(".features-box").each(function() {
                    $(this).find('input').attr('name', 'package['+newindx+'][features]['+features_indx+']');
                    features_indx++;
                  });

                  newindx++;
                });
              }
            }
          }
      });

        $(document).on('change', 'input[name=is_free_trail]', function(event) {
            event.preventDefault();
            if ($(this).val() == 1) {
                $('.free_trail').removeClass('d-none');
            }else{
                $('.free_trail').addClass('d-none');
            }
        });
        $("#pricing_type").select2({
            placeholder: "Select Type",
            allowClear: true
        });
        $("#payment_frequency").select2({
            placeholder: "Select Frequency",
            allowClear: true
        });
        $("#pricing_currency").select2({
            placeholder: "Select Currency",
            allowClear: true
        });




    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/listing/pricing.blade.php ENDPATH**/ ?>