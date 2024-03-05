<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Support & Training '. $type); ?>

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
    button.step-trigger {
        width: 100% !important;
        justify-content: space-between !important;
    }
    label.form-label {
        margin-top: 1rem;
    }
    .f-big input {
        width: 20px;
        height: 20px;
        vertical-align: middle;
    }
    .knowledge_box_enitity {
        display: flex;
        padding-bottom: 20px;
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
        top: 14px;
        cursor: pointer;
        color: transparent;
        flex: 0 0 24px;
    }
    .support_time_enitity .remove-features-disabled, .remove-knowledge, .remove-knowledge-disabled {
        margin-right: 12px;
        top: 11px;
    }
    .knowledge_type {
        width: 310px;
        margin-right: 20px;
    }
    .software-profile-box input.form-control, .reviewer-profile-box input.form-control {
        border: solid 1px #e4e8f2;
        height: 44px;
    }

    .software-profile-box .form-control, .reviewer-profile-box .form-control {
        font-size: 16px;
        color: #333;
        line-height: 1.5;
        padding: 10px 15px 11px;
        margin-top: 5px;
        max-width: none;
    }
    .knowledge_url {
        width: 310px;
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
    .remove-features-disabled, .remove-knowledge-disabled {
        background: #c4c4c4;
        cursor: default;
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
        <form class="needs-validation1" action="<?php echo e(route('saveTraining'
        ,[$type,$listing->id])); ?>" method="POST" enctype="maltipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active sptrining">
            <h5 class="listing_title">Support Training<br><small>Add Support Details</small></h5>
            <div class="row g-3">
                <div class="col-12">
                    <h6 class="listing_in_title">Support</h6>
                  <label class="form-label d-block required-label notice-label">How do you provide support to your customers?</label>

                  <label class="f-big d-block mb-2 mt-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('27x7 Support',$listing->getMeta('customer_support') ?? []) ? 'checked' : ''); ?> name="customer_support[]" value="27x7 Support"> 24/7 Support
                  </label>

                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Email',$listing->getMeta('customer_support') ?? []) ? 'checked' : ''); ?> name="customer_support[]" value="Email"> Email/Help Desk
                  </label>

                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Phone',$listing->getMeta('customer_support') ?? []) ? 'checked' : ''); ?> name="customer_support[]" value="Phone"> Phone Support
                  </label>


                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Chat',$listing->getMeta('customer_support') ?? []) ? 'checked' : ''); ?> name="customer_support[]" value="Chat"> Chat
                  </label>

                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Knowledge Base',$listing->getMeta('customer_support') ?? []) ? 'checked' : ''); ?> name="customer_support[]" value="Knowledge Base"> Knowledge Base
                  </label>

                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('FAQs/Forum',$listing->getMeta('customer_support') ?? []) ? 'checked' : ''); ?> name="customer_support[]" value="FAQs/Forum"> FAQs/Forum
                  </label>



                </div>
                <div class="row">
                    <div class="col-md-4">
                      <label class="form-label" for="support_email">Support Email</label>
                      <input type="email" name="support_email" id="support_email" class="form-control" placeholder="Enter Support Email" value="<?php echo e($listing->getMeta('support_email') ?? ''); ?>">
                    </div>
                </div>
                <h6 class="listing_in_title">Training </h6>
                <div class="col-12">
                  <label class="form-label d-block notice-label required-label">How Do You Provide Training For Your Customers ?</label>
                  <label class="f-big d-block mb-2 mt-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('In-person',$listing->getMeta('provide_training') ?? []) ? 'checked' : ''); ?> name="provide_training[]" value="In-person"> In-person
                  </label>
                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Live Online',$listing->getMeta('provide_training') ?? []) ? 'checked' : ''); ?> name="provide_training[]" value="Live Online"> Live Online
                  </label>
                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Webinar',$listing->getMeta('provide_training') ?? []) ? 'checked' : ''); ?> name="provide_training[]" value="Webinar"> Webinar
                  </label>
                  <label class="f-big d-block mb-2">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Documentation',$listing->getMeta('provide_training') ?? []) ? 'checked' : ''); ?> name="provide_training[]" value="Documentation"> Documentation
                  </label>
                  <label class="f-big d-block">
                      <input type="checkbox" class="form-check-label" <?php echo e(in_array('Videos',$listing->getMeta('provide_training') ?? []) ? 'checked' : ''); ?> name="provide_training[]" value="Videos"> Videos
                  </label>
                </div>
                <!-- <div class="col-12">
                    <label class="form-label d-block">Knowledge Base</label>
                    <div class="knowledge_box_lists">
                        <?php if(!empty($listing->getMeta('knowledge_base'))): ?>
                            <?php $__currentLoopData = $listing->getMeta('knowledge_base'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $knowledge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="knowledge_box_enitity" id="knowledge_box_enitity_1">
                                    <span class="remove-knowledge">-</span>
                                    <div class="knowledge_type">
                                        <input name="knowledge_base[<?php echo e($key); ?>][type]" placeholder="Enter type title" class="form-control type valid" autocomplete="off" value="<?php echo e($knowledge['type']??''); ?>" type="text" maxlength="50" aria-invalid="false">
                                    </div>
                                    <div class="knowledge_url">
                                        <input name="knowledge_base[<?php echo e($key); ?>][url]" placeholder="Enter URL" class="form-control knowledge-url" value="<?php echo e($knowledge['url']??''); ?>" autocomplete="off" type="text">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="knowledge_box_enitity" id="knowledge_box_enitity_1">
                                <span class="remove-knowledge">-</span>
                                <div class="knowledge_type">
                                    <input name="knowledge_base[1][type]" placeholder="Enter type title" class="form-control type valid" autocomplete="off" value="" type="text" maxlength="50" aria-invalid="false">
                                </div>
                                <div class="knowledge_url">
                                    <input name="knowledge_base[1][url]" placeholder="Enter URL" class="form-control knowledge-url" value="" autocomplete="off" type="text">
                                </div>
                            </div>
                            <div class="knowledge_box_enitity" id="knowledge_box_enitity_2">
                                <span class="remove-knowledge">-</span>
                                <div class="knowledge_type">
                                    <input name="knowledge_base[2][type]" placeholder="Enter type title" class="form-control type" autocomplete="off" value="" type="text" maxlength="50">
                                </div>
                                <div class="knowledge_url">
                                    <input name="knowledge_base[2][url]" placeholder="Enter URL" class="form-control knowledge-url" value="" autocomplete="off" type="text">
                                </div>
                            </div>
                            <div class="knowledge_box_enitity" id="knowledge_box_enitity_3">
                                <span class="remove-knowledge">-</span>
                                <div class="knowledge_type">
                                    <input name="knowledge_base[3][type]" class="form-control type" placeholder="Enter type title" autocomplete="off" type="text" maxlength="50">
                                </div>
                                <div class="knowledge_url">
                                    <input name="knowledge_base[3][url]" class="form-control knowledge-url" placeholder="Enter URL" autocomplete="off" type="text">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div> -->



            </div>
          </div>

          
              <div class="row mt-5">
                <div class="col-6 text-start">
                  <a href="<?php echo e((auth()->user()->is_admin()) ? route('details',['integration',$listing->id]) : route('manage_details',['integration',$listing->id])); ?>" type="reset" class="btn btn-label-default waves-effect">
                    <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Previous
                  </a>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-primary btn-next">
                     <span class="align-middle d-sm-inline-block me-sm-1">
                       Submit
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
    function enablenewknowledgeBase(parent_div)
    {
        var str_box_len = $('.knowledge_box_enitity').length;
        var str_ind = $('#'+parent_div).index()+1;
        var target_div = $('#'+parent_div);

        if($.trim(target_div.find('.type').val()) || $.trim(target_div.find('.knowledge-url').val()))
        {
            var next_index =  str_ind + 1;

            var new_features = '<div class="knowledge_box_enitity" id="knowledge_box_enitity_'+next_index+'"><span class="remove-knowledge">-</span><div class="knowledge_type"><input name="knowledge_base['+next_index+'][type]" class="form-control type" placeholder="Enter type title" autocomplete="off" type="text" maxlength="50"></div><div class="knowledge_url"><input name="knowledge_base['+next_index+'][url]" class="form-control knowledge-url" placeholder="Enter URL" autocomplete="off" type="text"></div></div>';
            if(str_box_len == 1)
            {
                $('.knowledge_box_enitity').find('.remove-knowledge-disabled').addClass('remove-knowledge').removeClass('remove-knowledge-disabled');
                $('.knowledge_box_lists').append(new_features);
            }
            else if(str_ind == str_box_len)
            {
                if(str_ind >= 15)
                {
                    return false;
                }
                else
                    $('.knowledge_box_lists').append(new_features);
            }
        }
    }
    jQuery(document).ready(function($) {
        $(document).on('click', '.remove-knowledge', function (e) {
            //hideshowhelp('features');

            var str_box_len = $('.knowledge_box_enitity').length;

            if(str_box_len == 1)
            {
                // do not delete
                return false;
            }
            $(this).parents('.knowledge_box_enitity').remove();
            var newindx = 1;
            $('.knowledge_box_lists').find(".knowledge_box_enitity").each(function() {
                $(this).attr('id', 'knowledge_box_enitity_'+newindx);
                $(this).find('input.type').attr('name', 'knowledge_base['+newindx+'][type]');
                $(this).find('input.knowledge-url').attr('name', 'knowledge_base['+newindx+'][url]');
                newindx++;
            });
            str_box_len = $('.knowledge_box_enitity').length;
            if(str_box_len == 1)
            {
                $('.knowledge_box_enitity').find('.remove-knowledge').addClass('remove-knowledge-disabled').removeClass('remove-knowledge');
            }
        });
        $(document).on('keyup', 'input.type', function (e) {
            var parent_div = $(this).parents('.knowledge_box_enitity').attr('id');
            enablenewknowledgeBase(parent_div);
        });
        $(document).on('keyup', 'input.knowledge-url', function (e) {
            var parent_div = $(this).parents('.knowledge_box_enitity').attr('id');
            enablenewknowledgeBase(parent_div);
        });


    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/listing/training.blade.php ENDPATH**/ ?>