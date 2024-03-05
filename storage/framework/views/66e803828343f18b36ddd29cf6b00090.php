<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Add Services'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/service.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/progress-animation.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/ckeditor/ckeditor.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<style type="text/css">
    ul#catInputUL li.category-li.hide {
        display: none;
    }
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
        <form id="c_profile_info" class="needs-validation1" method="post" action="<?php echo e(route('save_service',$service->id)); ?>" enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
            <div id="account-details-validation" class="content active">
                <div class="row g-3">
                  <div class="content-header">
                    <h5 class="listing_title">Service <br><small>Enter Your Service Details.</small></h5>
                  </div>

                    <div class="clearfix service-box-wraper">
                        <div class="col-xs-12 radious4 whitebg padding blackc border">
                            <div id="service_lines" class="clear padding-bottom">
                                <div class="col-md-12 no-padding">
                                    <div class="row">
                                        <div class="account-tab-form-title no-padding col-md-6">Main Services</div>
                                        <div class="main-category col-md-6 no-padding">
                                            <div class="category-count">Select main services</div>
                                            <div class="category-list">
                                                <input class="find-category" type="search" id="catInput" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" placeholder="Search Category">
                                                <ul class="category-ul" id="catInputUL">
                                                    
                                                  <?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="category-li"><a cat-id="<?php echo e($value->id); ?>" cat-slug="<?php echo e(slugify($value->name)); ?>"><?php echo e($value->name); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear progress-line ">
                                        Total Progress <span class="service-line-total-percentage">0</span>% <span class="pull-right sev-err"></span>
                                        <div class="progress">
                                            <div style="width:0%" aria-valuemin="0" role="progressbar" id="service-line-progress-bar" class="progress-bar progress-bar-success">
                                            </div>
                                        </div>
                                      <table width=100% style='font-family: monospace;'>
                                        <tr class="dot_top">

                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                          <td width="10%">|</td>
                                        </tr>
                                        <tr class="num_bottom">
                                          <td width="10%">0</td>
                                          <td width="10%">10</td>
                                          <td width="10%">20</td>
                                          <td width="10%">30</td>
                                          <td width="10%">40</td>
                                          <td width="10%">50</td>
                                          <td width="10%">60</td>
                                          <td width="10%">70</td>
                                          <td width="10%">80</td>
                                          <td width="10%">90</td>
                                          <td width="10%">100</td>
                                        </tr>
                                      </table>
                                    </div>
                                </div>
                                <div class="account-tab-form-spe clear overflow">
                                    <div class="form-group overflow">
                                        <div class="row no-padding">
                                            
                                            <?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group all-services padding-top col-md-4 mt-3 hide cat-id-<?php echo e($cat->id); ?>">
                                                    <input type="hidden" name="ServiceLine[<?php echo e($cat->id); ?>][category_id]" value="<?php echo e($cat->id); ?>" id="ServiceLine<?php echo e($cat->id); ?>UsersFocusCategoryId">
                                                    <input type="hidden" name="ServiceLine[<?php echo e($cat->id); ?>][is_parent]" value="<?php echo e($cat->id); ?>" id="ServiceLine0UsersFocusIsParent">
                                                    <input type="hidden" name="ServiceLine[<?php echo e($cat->id); ?>][slug]" value="<?php echo e(slugify($cat->name)); ?>" id="ServiceLine<?php echo e($cat->id); ?>UsersFocusSlug">
                                                    <label for=""><?php echo e($cat->name); ?></label>
                                                    <div class="input-group col-md-8">
                                                        <input name="ServiceLine[<?php echo e($cat->id); ?>][percentage]" id="<?php echo e(slugify($cat->name)); ?>" class="form-control service-line-percentage" type="text" value="0">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      <?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <div id="focy-<?php echo e(slugify($value->name)); ?>" class="<?php echo e(slugify($value->name)); ?> focyparentdiv-<?php echo e($value->id); ?>  focyparentdiv col-xs-12 radious4 whitebg margin-top padding blackc border hide" >
                          <div class="focyelement" focy-id="top-website-development-companies">
                            <div class="row">
                              <div class="col-md-4 no-padding">
                                <div class="main-focus mb-3">
                                  <div class="focus-count">Select services</div>
                                  <div class="focus-list">
                                    <input type="search" class="focusInput" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" placeholder="Search Category">
                                    <ul class="focus-ul">
                                      <?php $__currentLoopData = $category->where('parent_id',$value->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="focus-li"><a focus-id="<?php echo e($val->id); ?>" focus-slug="<?php echo e(slugify($val->name)); ?>"><?php echo e($val->name); ?></a></li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                  </div>
                                </div>
                                <div class="circle-progress" data-percentage="0">
                                  <span class="circle-progress-left"><span class="circle-progress-bar"></span></span><span class="circle-progress-right"><span class="circle-progress-bar"></span></span>
                                  <div class="circle-progress-value">0%</div>
                                </div>
                                <div class="progress-bar-status account-tab-form-title ">Sub Categories of <div class="sub_focus"><?php echo e($value->name); ?></div>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="tab-content clear overflow">
                                  <div id="mobile_focus">
                                    <div class="account-tab-form-spe clear overflow">
                                      <div class="form-group overflow">
                                        <div class="row no-padding">
                                          <?php $__currentLoopData = $category->where('parent_id',$value->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group allfocy padding-top col-md-6 mb-2 no-padding hide focus-id-<?php echo e($val->id); ?>">
                                              <input type="hidden" name="data[MobileFocus][<?php echo e($value->id); ?>][<?php echo e($val->id); ?>][focus_id]" value="<?php echo e($val->id); ?>" id="MobileFocus20UsersFocusFocusId"><input type="hidden" name="data[MobileFocus][<?php echo e($value->id); ?>][<?php echo e($val->id); ?>][category_id]" value="<?php echo e($val->id); ?>" id="MobileFocus20UsersFocusCategoryId"><input type="hidden" name="data[MobileFocus][<?php echo e($value->id); ?>][<?php echo e($val->id); ?>][slug]" value="<?php echo e(slugify($val->name)); ?>" id="MobileFocus20UsersFocusSlug"> <label for="<?php echo e(slugify($val->name)); ?>"><?php echo e($val->name); ?></label>
                                              <div class="input-group col-md-8">
                                                <input name="data[MobileFocus][<?php echo e($value->id); ?>][<?php echo e($val->id); ?>][percentage]" id="<?php echo e(slugify($val->name)); ?>" class="form-control platform-percentage" type="text" value="0">
                                                <span class="input-group-text">%</span>
                                              </div>
                                            </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <span class="focy-err"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>



                  <div class="row mt-5">
                    <div class="col-6 text-start">
                      <a href="<?php echo e((auth()->user()->is_admin()) ? route('service_step',['location',$service->id]) : route('manage_service_step',['location',$service->id])); ?>" type="reset" class="btn btn-label-default waves-effect">
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
                    
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- /Validation Wizard -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
  <script src="<?php echo e(asset('assets/js/service.js')); ?>"></script>
    <?php echo '<script>';
    echo 'var Pservice = ' . json_encode($Pservice) . ';';
    echo 'var Cservice = ' . json_encode($Cservice) . ';';
    echo '</script>';
    ?>
<script type="text/javascript">
    function calculateServiceLineSum(){
        var service_line_sum = 0;
        $('.sev-err').html('');

        $(".service-line-percentage").each(function() {

            var inputValue = parseInt(this.value);
            if( isNaN( inputValue ) )
                this.value = 0;
            else {

                this.value = inputValue;
                if( /^\+?\d+$/.test( inputValue ) )
                    service_line_sum += inputValue;
                else
                    this.value = 0;
            }

            if(parseInt(this.value) <= 0)
            {
                console.log($(this).attr('id'));
              $('.'+$(this).attr('id')).addClass('hide');
              $('.'+$(this).attr('id')).find('.platform-percentage').val('0');
              $('.'+$(this).attr('id')).find('#mobile-focus-progress-bar').css('width','0%');
              $('.'+$(this).attr('id')).find('.mobile-focus-total-percentage').text('0');

              $('.'+$(this).attr('id')).find('.focus-count').text('Select services');
              $('.'+$(this).attr('id')).find('.focusInput').val('');
              $('.'+$(this).attr('id')).find('.focus-ul li').removeClass('searched').removeClass('checked').removeClass('hide');
              $('.'+$(this).attr('id')).find('.allfocy').addClass('hide');
            }
            else
            {
                console.log($(this).attr('id'));
              $('.'+$(this).attr('id')).removeClass('hide');
            }
            $("#c_profile_info").find('.bottom-fixbar input.btn.btn-primary').prop('disabled', false);
        });

        $('#service-line-progress-bar').css('width',service_line_sum+'%');
        $('.service-line-total-percentage').text(service_line_sum);

        if(service_line_sum > 100){
          $('#service-line-progress-bar').removeClass('progress-bar-success').addClass('progress-bar-error');
          $('.progress-bar-status.service-line-status').css('color','#e4656c');
        }
        else{
          $('#service-line-progress-bar').removeClass('progress-bar-error').addClass('progress-bar-success');
          $('.progress-bar-status.service-line-status').css('color','#7a7a7a');
        }

        $('.service-box-wraper .focyparentdiv').css({'margin-bottom': ''});
        $('.service-box-wraper .focyparentdiv:not(.hide)').last().css({'margin-bottom':'90px'});
    }

    function calculatePlatformSum() {
        $(".focyparentdiv:not(.hide) .focyelement").each(function(){

            var platform_sum = 0;
            $('.focy-err').html('');

            $(this).find(".platform-percentage").each(function() {

                var inputValue = parseInt(this.value);
                if( isNaN( inputValue ) )
                    this.value = 0;
                else {

                    this.value = inputValue;
                    if( /^\+?\d+$/.test( inputValue ) )
                        platform_sum += inputValue;
                    else
                        this.value = 0;
                }

                if ($('.'+$(this).attr('id')).length)
                {
                  if(parseInt(this.value) <= 0)
                  {
                    $('.company-location-form .'+$(this).attr('id')).addClass('hide');
                    $('.'+$(this).attr('id')).find('.platform-percentage').val('0');
                    $('.'+$(this).attr('id')).find('#mobile-focus-progress-bar').css('width','0%');
                    $('.'+$(this).attr('id')).find('.mobile-focus-total-percentage').text('0');

                    $('.'+$(this).attr('id')).find('.focus-count').text('Select services');
                    $('.'+$(this).attr('id')).find('.focusInput').val('');
                    $('.'+$(this).attr('id')).find('.focus-ul li').removeClass('searched').removeClass('checked').removeClass('hide');
                    $('.'+$(this).attr('id')).find('.allfocy').addClass('hide');

                  }
                  else
                  {
                    $('.'+$(this).attr('id')).removeClass('hide');
                  }
                }
            });

            $(this).find('.circle-progress').attr('data-percentage',platform_sum);
            $(this).find('.circle-progress-value').text(platform_sum+'%');
        });
    }
    function lastFocusDiv()
    {
        var lastDivCount = $('.focyparentdiv ').not(".hide").length;
        let cnt = 1;
        $('.focyparentdiv ').not(".hide").each(function() {
          if(cnt == lastDivCount)
          {
            $(this).addClass('lastFocusDiv');
          }
          else
          {
            $(this).removeClass('lastFocusDiv');
            cnt++;
          }
        });

    }

    jQuery(document).ready(function($) {
        $(document).on('submit', 'form#c_profile_info', function(event) {
            var service_percentage = $( '.service-line-total-percentage' ).text();
            if( service_percentage != 100 ) {
                $( "#c_profile_info .alert" ).remove();
                $( "#c_profile_info" ).prepend( '<div class="alert alert-danger">Service line percentage must be 100</div>' );
                event.preventDefault();
                $( 'html,body' ).animate({
                    scrollTop: $( '#service_lines' ).offset().top - 130
                }, 'slow');
                return false;
            }

            $('body .circle-progress-value').each(function () {
              let sub_category_with_percentage = $(this).text();
              let sub_category_percentage = sub_category_with_percentage.replace(/%/g, '');

              if( sub_category_percentage > 100 ) {
                $("#c_profile_info .alert").remove();
                $("#c_profile_info").prepend('<div class="alert alert-danger">Sub category line percentage must be 100</div>');
                event.preventDefault();
                $('html,body').animate({
                  scrollTop: $('#service_lines').offset().top - 130
                }, 'slow');
                return false;
              }
            });

        });


        setTimeout(function() {
            $.each(Pservice, function(index, val) {
                $('.category-li a[cat-id="'+val.category_id+'"]').trigger('click');
                $('input[name="ServiceLine['+val.category_id+'][percentage]"]').val(val.percentage).trigger('blur');
            });
        }, 10);

        setTimeout(function() {
            $.each(Cservice, function(index, val) {
                console.log(index);
                console.log(val);
                setTimeout(function() {
                    $('.focyparentdiv-'+val.parent_category_id+' .focus-li a[focus-id="'+val.category_id+'"]').trigger('click');
                    $('input[name="data[MobileFocus]['+val.parent_category_id+']['+val.category_id+'][percentage]"]').val(val.percentage).trigger('blur');
                }, 1500);
            });
        }, 50);




        $(document).on("click", ".category-count", function(k) {
            k.stopPropagation();
            $('.category-ul li.searched').removeClass('focus');
            if($(this).parents('.main-category').hasClass('opened')) {
                $(this).parents('.main-category').removeClass('opened');
            } else {
                $(this).parents('.main-category').addClass('opened');
                $('#catInput').focus();
            }
        });
         $('#catInput').on('keypress', function(e) {
            e.stopPropagation();
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
              e.preventDefault();
              return false;
            }
        });
        $('#catInput').on('click', function(e) {
            e.stopPropagation();
        });
        $(document).click(function(){
            $('#service_lines .main-category').removeClass('opened');
        });

        $(document).on('click', '#catInputUL .category-li a', function(e) {
            e.stopPropagation();
            var cat_id = $(this).attr('cat-id');
            if ($(this).parents('.category-li').hasClass('checked')) {
                $(this).parents('.category-li').removeClass('checked');
            } else {
                $(this).parents('.category-li').addClass('checked');
            }

            var activeCat = $('.category-ul li.checked').length;
            if (activeCat == 0) {
                $('.category-count').text('Select main services');
                $('.all-services').addClass('hide');
                $('#service_lines .progress-line').removeClass('open');
                $('.focyparentdiv .account-tab-form-spe input.platform-percentage').val('0');
                $('.focyparentdiv .allfocy').addClass('hide');
                $('.focyparentdiv .circle-progress-value').text('0%');
                $('.focyparentdiv').addClass('hide');
                $('.focyparentdiv .focus-count').text('Select services');
                $('.focyparentdiv .focusInput').val('');
                $('.focyparentdiv .focus-ul li').removeClass('searched').removeClass('checked').removeClass('hide');
                $('#service_lines .service-line-total-percentage').text('0');
                $('#service-line-progress-bar').css('width', 0 + '%');
                $('.all-services input.service-line-percentage').val('0');
                $('.all-services').addClass('hide');
            } else {
                if (activeCat == 1) {
                    $('.category-count').text('1 service selected');
                    // var cat_id = $('.category-ul li.checked').find('a').attr('cat-id');
                    // var cat_slug = $('.category-ul li.checked').find('a').attr('cat-slug');
                    // $('.account-tab-form-spe .cat-id-'+cat_id).find('.service-line-percentage').val('100');
                } else
                    $('.category-count').text(activeCat + ' services selected');

                $('#service_lines .progress-line').addClass('open');
                $('.all-services').addClass('hide');
                var cat_ids = [];
                var templen = 0;
                var lilen = $(".category-ul li").length;
                $(".category-ul li").each(function() {
                    var cat_id = $(this).find('a').attr('cat-id');
                    var cat_slug = $(this).find('a').attr('cat-slug');
                    if ($(this).hasClass('checked')) {
                        $('.account-tab-form-spe .cat-id-' + cat_id).removeClass('hide');
                    } else {
                        $('.account-tab-form-spe .cat-id-' + cat_id).find('.service-line-percentage').val('0');
                        $('.focyparentdiv#focy-' + cat_slug).find('.account-tab-form-spe input.platform-percentage').val('0');
                        $('.focyparentdiv#focy-' + cat_slug).find('.allfocy').addClass('hide');
                        $('.focyparentdiv#focy-' + cat_slug).find('.circle-progress-value').text('0%');
                        $('.focyparentdiv#focy-' + cat_slug).addClass('hide');
                        $('.focyparentdiv#focy-' + cat_slug).find('.focus-count').text('Select services');
                        $('.focyparentdiv#focy-' + cat_slug).find('.focusInput').val('');
                        $('.focyparentdiv#focy-' + cat_slug).find('.focus-ul li').removeClass('searched').removeClass('checked').removeClass('hide');
                    }
                    templen++;
                    if (lilen == templen) {
                        calculateServiceLineSum();
                        calculatePlatformSum();
                    }
                });
            }

            $('.service-box-wraper .focyparentdiv').css({ 'margin-bottom': '' });
            $('.service-box-wraper .focyparentdiv:not(.hide)').last().css({ 'margin-bottom': '90px' });
        });

        var chosencat = '';
        $(document).on('keyup', '#catInput', function(e) {
            var term = $(this).val();
            if (term == '') {
                chosencat = '';
            }
            jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function(arg) {
                return function(elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
            if (e.keyCode == 40) { // 38-up, 40-down
                if (chosencat === "") {
                    chosencat = 0;
                } else if ((chosencat + 1) < $('.category-ul li.searched').length) {
                    chosencat++;
                }

                $('.category-ul li.searched').removeClass('focus');
                $('.category-ul li.searched:eq(' + chosencat + ')').addClass('focus');
                $('#catInput').val($('.category-ul li.searched:eq(' + chosencat + ') a').text());

                $this = $('.category-ul li.searched:eq(' + chosencat + ')');
                var liIndex = $('.category-ul li.searched:eq(' + chosencat + ')').index("li.searched");
                $this.closest('.category-ul').scrollTop(liIndex * $this.outerHeight());

                return false;
            } else if (e.keyCode == 38) {
                if (chosencat === "") {
                    chosencat = 0;
                } else if (chosencat > 0) {
                    chosencat--;
                }
                $('.category-ul li.searched').removeClass('focus');
                $('.category-ul li.searched:eq(' + chosencat + ')').addClass('focus');
                $('#catInput').val($('.category-ul li.searched:eq(' + chosencat + ') a').text());

                $this = $('.category-ul li.searched:eq(' + chosencat + ')');
                var liIndex = $('.category-ul li.searched:eq(' + chosencat + ')').index("li.searched");
                $this.closest('.category-ul').scrollTop(liIndex * $this.outerHeight());

                return false;
            } else if (e.keyCode == 27) {
                //h_searchListing();
                $(this).val('');
                return false;
            } else if (e.keyCode == 13) {
                console.log('chosencat ' + chosencat);
                e.preventDefault();
                if ($('.category-ul li.searched').length > 0) {
                    $('.category-ul li.searched:eq(' + chosencat + ') a')[0].click();
                }
                return false;
            } else {
                console.log('im mhere');
                $('.category-ul li').addClass('hide');
                $('.category-ul li').removeClass('searched');
                $('.category-ul li a:Contains("' + term + '")').parents("li").removeClass("hide");
                $('.category-ul li a:Contains("' + term + '")').parents("li").addClass("searched");
            }
        });

        $(".platform-percentage").on('blur',function(){
            calculatePlatformSum();
            $('#service_lines .main-category').removeClass('opened');
            $('.main-focus').removeClass('opened');
            $("#c_profile_info").find('.bottom-fixbar input.btn.btn-primary').prop('disabled', false);
        });

        $(document).on("click", ".focus-count", function(k) {
            k.stopPropagation();
            $('.focus-ul li.searched').removeClass('focus');
            if ($(this).parents('.main-focus').hasClass('opened')) {
                $(this).parents('.main-focus').removeClass('opened');
            } else {
                $('.main-focus').removeClass('opened');
                $(this).parents('.main-focus').addClass('opened');
                $(this).parents('.main-focus').find('.focusInput').focus();
            }
            lastFocusDiv();
        });

        $('.focusInput').on('keypress', function(e) {
            e.stopPropagation();
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        $(document).click(function() {
            $('.main-focus').removeClass('opened');
            $('.focyparentdiv ').removeClass('lastFocusDiv');
        });

        $('.focusInput').on('click', function(e) {
            e.stopPropagation();
        });

        $(document).on('click', '.focus-ul .focus-li a', function(e) {
            e.stopPropagation();
            var parent_focus = $(this).parents('.main-focus');
            var parent_focus_ul = $(this).parents('.main-focus').find('.focus-ul');
            var focus_id = $(this).attr('focus-id');

            if ($(this).parents('.focus-li').hasClass('checked')) {
                $(this).parents('.focus-li').removeClass('checked');
            } else {
                $(this).parents('.focus-li').addClass('checked');
            }
            var parent_focyparentdiv = $(this).parents('.focyelement');
            var activeCat = $(this).parents('.main-focus').find('.focus-ul li.checked').length;
            if (activeCat == 0) {
                $(this).parents('.main-focus').find('.focus-count').text('Select main services');
                parent_focyparentdiv.find('.allfocy.focus-id-' + focus_id + ' .platform-percentage').val('0');
                parent_focyparentdiv.find('.account-tab-form-spe input.platform-percentage').val('0');
                parent_focyparentdiv.find('.allfocy').addClass('hide');
                parent_focyparentdiv.find('.circle-progress-value').text('0%');
                parent_focyparentdiv.find('.focus-count').text('Select services');
                parent_focyparentdiv.find('.focusInput').val('');
                parent_focyparentdiv.find('.focus-ul li').removeClass('searched').removeClass('checked').removeClass('hide');

                calculateServiceLineSum();
                calculatePlatformSum();
            } else {
                if (activeCat == 1) {
                    $(this).parents('.main-focus').find('.focus-count').text('1 service selected');
                    // var focus_id = $(this).parents('.main-focus').find('.focus-ul li.checked').find('a').attr('focus-id');
                    // var focus_slug = $(this).parents('.main-focus').find('.focus-ul li.checked').find('a').attr('focus-slug');
                    // parent_focyparentdiv.find('.allfocy.focus-id-'+focus_id+' .platform-percentage').val('100');
                } else
                    $(this).parents('.main-focus').find('.focus-count').text(activeCat + ' services selected');


                var activeFocus = $(this).parents('.main-focus').find('.focus-ul li.checked').length;
                var allFocus = $(this).parents('.main-focus').find('.focus-ul li').length;

                //var cat_ids = new Array(activeCat)
                parent_focyparentdiv.find('#mobile_focus .progress-line').addClass('open');
                parent_focyparentdiv.find('.allfocy').addClass('hide');
                var temp = 0;
                $(this).parents('.main-focus').find('.focus-ul li').each(function() {
                    var focus_id = $(this).find('a').attr('focus-id');
                    var focus_slug = $(this).find('a').attr('focus-slug');
                    var child_focus = $('#focy-' + focus_slug);
                    if ($(this).hasClass('checked')) {
                        parent_focyparentdiv.find('.allfocy.focus-id-' + focus_id).removeClass('hide');
                    } else {
                        parent_focyparentdiv.find('.allfocy.focus-id-' + focus_id + ' .platform-percentage').val('0');
                        child_focus.find('#mobile_focus .progress-line').removeClass('open');
                        child_focus.find('.account-tab-form-spe input.platform-percentage').val('0');
                        child_focus.find('.allfocy').addClass('hide');
                        child_focus.find('.circle-progress-value').text('0%');
                        child_focus.addClass('hide');
                        child_focus.find('.focus-count').text('Select services');
                        child_focus.find('.focusInput').val('');
                        child_focus.find('.focus-ul li').removeClass('searched').removeClass('checked').removeClass('hide');
                    }
                    temp++;
                    if (allFocus == temp) {
                        calculateServiceLineSum();
                        calculatePlatformSum();
                    }
                });
            }
        });

        var chosenfoc = '';
        $(document).on('keyup', '.focusInput', function(e) {
            var term = $(this).val();
            var parent_focus = $(this).parents('.main-focus');
            var parent_focus_ul = $(this).parents('.main-focus').find('.focus-ul');

            if (term == '') {
                chosenfoc = '';
            }
            jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function(arg) {
                return function(elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
            if (e.keyCode == 40) { // 38-up, 40-down
                if (chosenfoc === "") {
                    chosenfoc = 0;
                } else if ((chosenfoc + 1) < parent_focus_ul.find('li.searched').length) {
                    chosenfoc++;
                }

                parent_focus_ul.find('li.searched').removeClass('focus');
                parent_focus_ul.find('li.searched:eq(' + chosenfoc + ')').addClass('focus');
                parent_focus.find('.focusInput').val(parent_focus_ul.find('li.searched:eq(' + chosenfoc + ') a').text());

                $this = parent_focus_ul.find('li.searched:eq(' + chosenfoc + ')');
                var liIndex = parent_focus_ul.find('li.searched:eq(' + chosenfoc + ')').index("li.searched");
                $this.closest('.focus-ul').scrollTop(liIndex * $this.outerHeight());

                return false;
            } else if (e.keyCode == 38) {
                if (chosenfoc === "") {
                    chosenfoc = 0;
                } else if (chosenfoc > 0) {
                    chosenfoc--;
                }
                parent_focus_ul.find('li.searched').removeClass('focus');
                parent_focus_ul.find('li.searched:eq(' + chosenfoc + ')').addClass('focus');
                parent_focus.find('.focusInput').val(parent_focus_ul.find('li.searched:eq(' + chosenfoc + ') a').text());

                $this = parent_focus_ul.find('li.searched:eq(' + chosenfoc + ')');
                var liIndex = parent_focus_ul.find('li.searched:eq(' + chosenfoc + ')').index("li.searched");
                $this.closest('.focus-ul').scrollTop(liIndex * $this.outerHeight());

                return false;
            } else if (e.keyCode == 27) {
                //h_searchListing();
                $(this).val('');
                return false;
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (parent_focus_ul.find('li.searched').length > 0) {
                    parent_focus_ul.find('li.searched:eq(' + chosenfoc + ') a')[0].click();
                }
                return false;
            } else {
                parent_focus_ul.find('li').addClass('hide');
                parent_focus_ul.find('li').removeClass('searched');
                parent_focus_ul.find('li a:Contains("' + term + '")').parents("li").removeClass("hide");
                parent_focus_ul.find('li a:Contains("' + term + '")').parents("li").addClass("searched");
            }
        });

        $(".service-line-percentage").on('blur',function(){
            calculateServiceLineSum();
            $('#service_lines .main-category').removeClass('opened');
            $('.main-focus').removeClass('opened');
            $("#c_profile_info").find('.bottom-fixbar input.btn.btn-primary').prop('disabled', false);
        });


    });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/service.blade.php ENDPATH**/ ?>