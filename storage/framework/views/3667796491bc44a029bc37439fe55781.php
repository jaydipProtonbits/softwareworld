<?php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
?>



<?php $__env->startSection('title', 'Add Service'); ?>

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
<script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<style type="text/css">
  .s-o-s-list.active .s-o-search-name {
    margin-left: 15px;
  }
  div#not-found-software {
    margin-top: 15px;
  }
  div#not-found-software span.s-o-search-name {
    display: none;
  }
  .name-hits.common-search-hit .s-o-s-list.active {
    cursor: pointer;
  }
  .name-content.common-search-content {
    box-shadow: 0px 0px 6px 2px #0000002b;
    border-radius: 6px;
    margin-top: 20px;
    padding: 15px;
  }

    #upload_logo {
        opacity: 0;
        height: 0;
        width: 0;
    }
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
  <div class="row title_row">
      <div class="col-md-12">
          <h4 class="">Listing</h4>
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
          <form id="wizard-validation-form" class="needs-validation1" method="post" action="<?php echo e(route('service.store')); ?>" enctype="multipart/form-data" novalidate>
          <?php echo csrf_field(); ?>
            <input type="hidden" name="created_by" value="<?php echo e(auth()->user()->id); ?>">
          <!-- Account Details -->
            <div id="account-details-validation" class="content active">
              <div class="row g-3">
                <div class="content-header">
                  <h5 class="listing_title">Company Details <br><small>Enter Your Company Details.</small></h5>
                </div>
                <div class="row g-3">
                  <div class="row">
                    <div class="col-sm-3">
                        <img src="<?php echo e(asset('assets/img/placeholder/company-logo.jpg')); ?>" class="img-fluid upload_logo">
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
                        <input type="text" id="name" value="" name="name" class="form-control software-search-input"
                               placeholder="Company name" required autocomplete="off" />

                        <?php if(!auth()->user()->is_admin()): ?>
                          <div class="name-content common-search-content" style="display: none;">
                            <p class="already_soft">This software is already listed. Do you want to claim this software?</p>
                            <div id="name" class="name-hits common-search-hit"></div>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label required-label" for="tagline">Company Tagline</label>
                        <input type="text" id="tagline" value="" name="tagline" class="form-control"
                               placeholder="Company Tagline" required/>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label required-label">Founded</label>
                      <input type="text" name="founded" class="form-control" placeholder="YYYY" maxlength="4" required>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label required-label">Employees</label>
                      <select class="form-control" name="employees" required>
                        <?php $__currentLoopData = EmployeesSize(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label required-label">Avg. Hourly Rate</label>
                      <select class="form-control" name="hourly_rate" required>
                        <?php $__currentLoopData = HourlyRate(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label required-label">Project Cost</label>
                      <select class="form-control" name="project_cost" required>
                        <?php $__currentLoopData = ProjectCost(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label required-label">Website</label>
                      <input type="url" name="website" class="form-control" placeholder="www.website.com" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label required-label">Email Address</label>
                      <input type="email" name="email" class="form-control" placeholder="company@email.com" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label required-label">Phone Number</label>
                      <input type="text" name="phone_number" class="form-control" placeholder="+1-123-123-1234" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Facebook</label>
                      <input type="url" name="meta[facebook]" class="form-control" placeholder="www.facebook.com/profile">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label">Twitter</label>
                      <input type="url" name="meta[twitter]" class="form-control" placeholder="www.twitter.com/profile">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">LinkedIn</label>
                      <input type="url" name="meta[linkedin]" class="form-control" placeholder="www.linkedin.com/profile">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-12" >
                      <label class="form-label">Certifications</label>
                    </div>
                    <?php $__currentLoopData = getCertifications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-sm-4 ">
                        <label class="form-label cms-check"> <input type="checkbox" class="form-check-input" name="meta[certifications][]" value="<?php echo e($key); ?>"> <?php echo e($value); ?></label>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <div class="row">
                    
                    <div class="col-12">
                      <label for="TagifyBasic" class="form-label required-label">Key Clients (mention here names of important projects, companies or clients you worked with)</label>
                      <input id="TagifyBasic" class="form-control" name="meta[key_clients]" value="" required />
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
  </div>
<!-- /Validation Wizard -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/forms-tagify.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/service.js')); ?>"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
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

        $('.ckeditor').each(function(e){
        ClassicEditor
            .create( this , {
                toolbar: [
                    'Bold','Italic','NumberedList','BulletedList'
                ],
                removeButtons: 'Subscript,Superscript',
                format_tags: 'p;h1;h2;h3;pre',
                pasteFromWordRemoveFontStyles: true,
                removeDialogTabs: 'image:advanced;link:advanced',
            })
            .then( editor => {
                editor.ui.view.editable.element.style.height = '200px';
                editor.model.document.on('change', () => {
                    $(this).val(editor.getData());
                });
            } )
            .catch( error => {
                console.error( error );
            } );
        });

      // Service Claim Process
      var chosenp = '';
      var ajaxRevReq = 'ToCanajaxRevReq';
      $(document).on('keyup', '.software-search-input', function (e) {
        var fieldname = $(this).attr('id');
        var targethits = $(this).attr('id')+"-hits";
        var targetcontent = $(this).attr('id')+"-content";
        var targetlists = $(this).attr('id')+"_lists";
        var term = $(this).val();
        if (e.keyCode == 40)
        {
          console.log('key 40');
          // 38-up, 40-down
          if (chosenp === "")
          {
            chosenp = 0;
          } else if ((chosenp + 1) < $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').length)
          {
            chosenp++;
          }
          $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').removeClass('active');
          $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').addClass('active');
          $(this).val($('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ') .s-o-search-name').text());
          return false;
        } else if (e.keyCode == 38)
        {
          console.log('key 38');
          if (chosenp === "")
          {
            chosenp = 0;
          } else if (chosenp > 0)
          {
            chosenp--;
          }
          $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').removeClass('active');
          $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').addClass('active');
          $(this).val($('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ') .s-o-search-name').text());
          return false;
        } else if (e.keyCode == 27)
        {
          console.log('key 27');
          $('.'+targetcontent).find('.'+targethits+'').html('');
          $('.sec-one-search-content').hide();
          $(this).val('');
          return false;
        } else if (e.keyCode == 13)
        {
          console.log('key 13');
          var searchboxval = $.trim($(this).val());
          if ($('.'+targetcontent).find('.'+targethits+' .s-o-s-list').length > 0)
          {
            enty_id = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').attr('id');
            enty_img = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').find('.imgdiv').html();
            enty_name = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').find('.s-o-search-name').html();
            //var trg_list_id = $(this).parents('.common-search-hit').attr('id')+"_lists";
            if(enty_id == 'not-found-software')
            {
              console.log('Need to confirm with AS, we need to create here or not..!');
              //addfuturesoftware(enty_name,targetlists,fieldname);
            }
            else
            {
              // managestorage(trg_list_id);
              var element = '<div class="software-entity" id="'+enty_id+'"><div class="remove-software">-</div><div class="soft_de"><div class="entity-name">'+enty_name+'</div><input type="hidden" name="'+fieldname+'[]" value="'+enty_id+'" /></div></div>';
              $('#'+targetlists+ '.common-search-list').append(element);
              $('.common-search-list').removeClass('hide');
              $('.softwaresearchextra').addClass('alist');
              softwaresearchextra();
              $('.'+targethits).html('');
              $('.'+targetcontent).hide();
            }
          }
        } else
        {
          console.log('key else');
          chosenp = '';
          if ($(this).val() != '')
          {
            console.log('key not blank');

            //$('.algoliacompanysearch label.error').remove();
            //$('.cross-dark').removeClass('hide');
            if (term.length < 2)
            {
              // $('#content').show();
              // $('#search_content').hide();
              return; //You can always alter this condition to a better one that suits you.
            }
            var switchingid = '';
            if($("#"+targetlists+" .software-entity").length != 0)
            {
              $("#"+targetlists+" .software-entity").each(function(){
                var sw_id = $(this).attr('id');
                if(switchingid == '')
                {
                  switchingid = sw_id;
                }
                else
                {
                  switchingid = switchingid+","+sw_id;
                }
              });
            }

            ajaxRevReq = $.ajax({
              url: "<?php echo e(route('find_service_listing')); ?>", //Don't forget to replace with your own post URL
              type: 'POST',
              data: {'query': term,'switchingbypass':switchingid,'_token':'<?php echo e(csrf_token()); ?>'},
              dataType: 'JSON',
              beforeSend: function () {
                if (ajaxRevReq != 'ToCancelPrevReq' && ajaxRevReq.readyState < 3) {
                  ajaxRevReq.abort();
                }
              },
              success: function (json) {
                var html = createhmResult(json,term,targetlists,$(this).attr('id'));
                if (html != '') {
                  $('.'+targethits).html(html);
                  $('.'+targetcontent).show();
                  if(targetcontent == 'consider_software-content')
                  {
                    $('.'+targetcontent).parents('.softwaresearchextra').addClass('addminheigt');
                  }
                }else {
                  $('.'+targethits).html('');
                  $('.'+targetcontent).hide();
                }

              },
              error: function (xhr, ajaxOptions, thrownError) {
                console.log('key error');
                if (thrownError == 'abort' || thrownError == 'undefined')
                  return;
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                ajaxRevReq.abort();
              }
            }); //end ajaxRevReq
          } else
          {
            $('.'+targethits).html('');
            $('.'+targetcontent).hide();
            if(targetcontent == 'consider_software-content')
            {
              $('.'+targetcontent).parents('.softwaresearchextra').removeClass('addminheigt');
            }

          }
        }
      });

      // Claim by vendor
      $(document).on('click','.common-search-hit .s-o-s-list',function(){
        var service_id = $(this).attr('id');
        $.ajax({
          url: "<?php echo e(route('claimbyvendor')); ?>",
          type: 'POST',
          dataType: 'json',
          data: {
            is_service : 1,
            enty_id: service_id,
            '_token':'<?php echo e(csrf_token()); ?>'
          },
        })
          .done(function(res) {
            if (res.success == 1) {
              window.location.href = res.redirect;
            }else {
              alert(res.message);
            }
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

      });
    });

    function createhmResult(content,term,targetlists)
    {
      var html = '';
      var company_pic = '';
      if (content.hits.length > 0)
      {
        for (var i = 0; i < content.hits.length; ++i)
        {
          var hit = content.hits[i];
          if(i == 0)
            html  += "<div class='s-o-s-list active' id='"+hit["_id"]+"'>";
          else
            html  += "<div class='s-o-s-list' id='"+hit["_id"]+"'>";
          if(hit["logo"] == '')
            company_pic = "<?php echo e(asset('assets/company/no-company-logo.png')); ?>";
          else
            company_pic = "<?php echo e(asset('assets/service')); ?>"+'/'+hit["logo"];
          html += '<img src="'+company_pic+'" height="100px" width="100px">';
          html    += "<span class='s-o-search-name'>"+ hit['name']+"</span>";
          html    += "</div>";
          var searchboxval = term;
          if((i == (content.hits.length-1)) && searchboxval.length > 2)
          {
            if((content.hits[0]['name']).toLowerCase() != searchboxval.toLowerCase())
            {
              var notfound = 0;//parseInt(checknotfoundsoftware(searchboxval.toLowerCase(),targetlists));
              if(notfound == 0)
              {
                html  += "<div class='not-found-software s-o-s-list' id='not-found-software'><span class='s-o-search-name'>"+ searchboxval+"</span> <span class='not-found-add-label'>Click To Claim</span></div>";
              }
            }
            break;
          }
        }
      }
      else
      {
        if(term.length > 2)
        {
          var notfound = 0;//parseInt(checknotfoundsoftware(term.toLowerCase(),targetlists));
          if(notfound == 0)
          {
            /*html  += "<div class='not-found-software s-o-s-list' id='not-found-software'><span class='s-o-search-name'>"+ term+"</span><span class='not-found-add-label'>Press “enter” to add</span></div>";*/
            html += '';
          }
        }
        else
        {
          html += "<div class='padding10'>Please enter minimum 3 characters to find software</div>";
        }
      }
      return html;
    }

    function softwaresearchextra()
    {
      $(".softwaresearchextra").each(function(){
        if($(this).find(".common-search-list .software-entity").length  == 25)
        {
          $(this).find('.software-search-input').attr("disabled", "disabled");
        }
        else
        {
          $(this).find('.software-search-input').removeAttr("disabled");
        }
      });
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/service/create.blade.php ENDPATH**/ ?>