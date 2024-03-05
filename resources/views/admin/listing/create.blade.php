@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Listings')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection
@section('page-style')
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
    img.upload_logo {
        cursor: pointer;
    }
    input.device_urls, label.device_urls {
        display: none;
        margin-top: 1rem;
    }
    .row.deviceSupported {
      min-height: 50px;
    }
    input.target_company_size_urls, label.target_company_size_urls {
        display: none;
        margin-top: 1rem;
    }
    label.form-label-listing {
      margin-top: 1rem;
      color: #000;
      font-feature-settings: 'clig' off, 'liga' off;
      font-family: var(--para-font);
      font-size: 12px;
      font-style: normal;
      font-weight: 500;
      line-height: normal;
    }
    label.mini_label {
      color: #000;
      font-feature-settings: 'clig' off, 'liga' off;
      font-family: var(--para-font);
      font-size: 16px;
      font-style: normal;
      font-weight: 600;
      line-height: 18px;
      letter-spacing: 0.43px;
    }

    .remove-option {
      cursor: pointer;
      color: red;
      margin-left: 5px;
    }
</style>
@endsection


@section('content')
<div class="row title_row">
    <div class="col-md-4">
        <h4 class="">Listing</h4>
    </div>
</div>
<div class="row">
  <!-- Vertical Icons Wizard -->
  <div class="col-12 mb-4">
    <div class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      @include('admin.listing.sidebar')

        @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="needs-validation1" action="{{route('listing.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <div class="row g-3">
              <div class="content-header">
                <h5 class="listing_title">Software Details <br><small>Enter Your Software Details.</small></h5>
              </div>
              <div class="row">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="{{asset('assets/img/placeholder/company-logo.jpg')}}" class="img-fluid upload_logo">
                    <input type="file" class="form-control" name="logo" id="upload_logo" accept="image/*">
                  </div>
                  <div class="col-sm-9">
                    <button type="button" class="btn btn-primary upload_logo_btn ps-5 pe-5">Upload Logo</button>

                      <div class="company-logo-message mt-3">
                        <div class="company-logo-message-text">Allowed JPG, GIF or PNG. Max size of 800K</div>
                      </div>
                  </div>
                  <div class="col-6">
                    <label class="form-label-listing required-label" for="name">Software Name</label>
                    <input type="text" id="name" name="name" class="form-control software-search-input" placeholder="Enter Software Name" required />
                    @if (!auth()->user()->is_admin())
                        <div class="name-content common-search-content" style="display: none;">
                            <p class="already_soft">This software is already listed. Do you want to claim this software?</p>
                          <div id="name" class="name-hits common-search-hit"></div>
                        </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label class="form-label-listing required-label" for="tagline">Tagline</label>
                    <input type="text"  id="tagline" name="tagline" class="form-control" placeholder="Enter Software Tagline" required/>
                  </div>
                </div>
                <div class="col-6">
                  <label class="form-label-listing required-label" for="website">Software Website</label>
                  <input type="url" id="website" name="website" class="form-control" placeholder="Enter Software Website" aria-label="" required/>
                </div>
                <div class="col-6">
                  <label class="form-label-listing required-label" for="vendor_name">Vendor Name</label>
                  <input type="text" id="vendor_name" name="vendor_name" class="form-control" placeholder="Enter Vendor Name" aria-label="" required />
                </div>
                <div class="col-4">
                  <label class="form-label-listing required-label" for="year_founded">Vendor/Company Year Founded</label>
                  <input type="text" id="year_founded" name="year_founded" class="form-control" required placeholder="YYYY" aria-label="" />
                </div>
                <div class="col-4">
                    <label class="form-label-listing required-label" for="target_company_size-dd">Employees</label>
                    <select  id="target_company_size-dd" class="form-control" name="vendor_company_size" required>
                        <option value="">Select Size</option>
                        @foreach (companySize() as $data): ?>
                          @if (!empty($data))
                          <option value="{{$data}}">
                              {{$data}}
                          </option>
                          @endif
                        @endforeach

                    </select>
                </div>
                <div class="col-12">
                    <label class="mt-3 mini_label"><b>Headquarter Address</b></label>
                    <div class="row">
                        <div class="col-sm-4">
                          <label class="form-label-listing required-label" for="country-dd">Country</label>
                          <select  id="country-dd" class="form-control" name="country" required>
                              <option></option>
                              @foreach ($countries as $data)
                              <option value="{{$data->id}}">
                                  {{$data->name}}
                              </option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col-sm-4">
                          <label class="form-label-listing" for="state-dd">State</label>
                          <select  id="state-dd" class="form-control" name="state">
                          </select>
                        </div>
                        <div class="col-sm-4">
                          <label class="form-label-listing" for="city-dd">City</label>
                          <select  id="city-dd" class="form-control" name="city">
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <label class="form-label-listing" for="street">Street</label>
                        <input type="text" id="street" name="street" class="form-control" placeholder="Enter Street" aria-label="" />
                        </select>
                      </div>
                        <div class="col-sm-4">
                          <label class="form-label-listing" for="zip_code">Zip code</label>
                          <input type="text"  id="zip_code" class="form-control" name="zip_code" placeholder="Enter Zip Code">
                        </div>
                        <div class="col-sm-4">
                          <label class="form-label-listing required-label" for="contact_no">Contact Number</label>
                          <input type="text" id="contact_no" class="form-control" name="contact_no" placeholder="Enter Contact Number " required>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                  <label class="mb-3 mt-3 mini_label required-label"><b>Software Category</b></label>
                      {{--<label class="form-label-listing required-label" for="category-dd">Software Category</label>--}}
                      <select  id="category-dd" class="form-control" multiple name="category[]" required>
                          <option></option>
                          @foreach ($category as $data)
                          <option value="{{$data->id}}">
                              {{$data->name}}
                          </option>
                          @endforeach
                      </select>
                </div>

                {{--<div class="col-12">
                  <label class="mini_label required-label d-block mb-3">Device Supported</label>
                  <select name="device_supported[]" class="form-control" multiple="multiple" style="width: 100%;" id="deviceSelect">
                    <?php foreach (deviceSupported() as $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-12 mt-3">
                  <label class="mini_label required-label d-block mb-3">Textarea</label>
                  <textarea name="textarea_content" class="form-control" rows="4" cols="50" id="textareaWithSelect" readonly></textarea>
                </div>--}}

                <div class="col-12">
                  <label class="form-label-listing required-label" for="languages_supported-dd">Languages Supported</label>
                  <select id="languages_supported-dd" class="form-control" multiple name="languages_supported[]" required>
                    <option></option>
                    @foreach (languagesSupported() as $key => $value): ?>
                    <option value="{{$key}}">
                      {{$value}}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label-listing required-label" for="target_industry-dd">Target Industries</label>
                  <select  id="target_industry-dd" class="form-control" multiple name="target_industry[]" required>
                    <option></option>
                    @foreach ($industries as $data): ?>
                    <option value="{{$data->id}}">
                      {{$data->name}}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12">
                      <label class="form-label-listing required-label d-block" for="include-country">
                        Target Countries
                          <small style="float: right;">
                              <label><input type="checkbox" name="all_include_country" value="1" class="form-check-input"> Select All</label>
                          </small>
                      </label>
                      <select  id="include-country-dd" class="form-control" multiple name="include_countries[]" required>
                          <option></option>
                          @foreach ($countries as $data)
                              <option value="{{$data->id}}">
                                  {{$data->name}}
                              </option>
                          @endforeach
                      </select>
                </div>


                <div class="col-12">
                  <label class="mini_label required-label d-block mb-3 mt-3">Target Company Size</label>
                  <div class="row">
                    @foreach(targetCompanySize() as $key => $value)
                      <div class="col-3">
                        <label class="form-check-label d-block mt-1">
                          <input name="target_company_size[]" class="form-check-input" type="checkbox" value="{{$value}}" id="{{$key}}"> {{$value}}
                        </label>
                      </div>
                    @endforeach
                  </div>
                </div>

                <div class="col-12">
                    <label class="mini_label required-label d-block mb-3 mt-3" for="licensing_model-dd">What is Licensing Model of Your Software?</label>
                    <label class="form-check-label" for="licensing_model"><input name="licensing_model" class="form-check-input" type="radio" value="Proprietary" id="licensing_model" checked=""> Proprietary</label>
                    <label class="form-check-label" for="licensing_model2"><input name="licensing_model" class="form-check-input" type="radio" value="Open Source" id="licensing_model2"> Open Source</label>
                </div>
                <div class="col-12">
                    <label class="mini_label required-label d-block mb-3 mt-3" for="licensing_model-dd">What is your Software Deployment Type?</label>

                    <label class="form-check-label" for="software_development_type">
                      <input name="software_development_type[]" class="form-check-input" type="checkbox" value="Cloud Hosted" id="software_development_type"> Cloud Hosted
                    </label>

                    <label class="form-check-label" for="software_development_type2">
                      <input name="software_development_type[]" class="form-check-input" type="checkbox" value="Deployment Type" id="software_development_type2"> On Premises
                    </label>
                </div>

                <div class="col-12">
                  <label class="mini_label required-label d-block mt-3">Device Supported</label>
                  @foreach (deviceSupported() as $value)
                    <div class="row align-items-center deviceSupported">
                      <div class="col-md-2">
                        <label class="form-check-label d-block">
                          <input name="device_supported[]" class="form-check-input" type="checkbox" value="{{$value}}" id="{{$value}}"> {{$value}}
                        </label>
                      </div>
                      <div class="col-md-6">
                        @if (!in_array($value, ['Windows','Mac','Linux']))
                          <input type="url" name="device_supported_url[{{$value}}]" class="form-control mt-0 device_urls {{$value}}" placeholder="Enter {{$value}} URL">
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>

                <div class="col-12">
                  <label class="mini_label d-block mt-3">
                    <b>Social Media Profiles</b>
                  </label>
                  <div class="row">
                    <?php foreach (socialMedia() as $value): ?>
                      <div class="col-6">
                        <label class="form-label-listing">{{$value}}</label>
                        <input name="social_profile[{{$value}}]" class="form-control mt-0 mb-2" type="url" value="" placeholder="{{$value}} Page URL">
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{--<div class="mt-4 ms-auto">
            <button class="btn btn-primary btn-submit">Save & Next</button>
          </div>--}}
          <div class="row mt-5">
            <div class="col-12 text-end">
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
@endsection
@section('page-script')
<script src="{{asset('assets/js/listing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $(document).on('click','.common-search-hit .s-o-s-list',function(){
            var enty_id = $(this).attr('id');
            $.ajax({
                url: "{{route('claimbyvendor')}}",
                type: 'POST',
                dataType: 'json',
                data: {enty_id: enty_id, '_token':'{{csrf_token()}}'},
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
              url: "{{ route('find_listing') }}", //Don't forget to replace with your own post URL
              type: 'POST',
              data: {
                'is_claim': 1,
                'query': term,
                'switchingbypass':switchingid,
                '_token':'{{csrf_token()}}'
              },
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

      $('#deviceSelect').select2();

      // Handle change event on the select and update the textarea content
      $('#deviceSelect').on('change', function () {
        var selectedValues = $(this).val();
        updateTextareaWithSelect(selectedValues);
      });

      // Remove option when clicking on the remove button
      $('#textareaWithSelect').on('click', '.remove-option', function () {
        var valueToRemove = $(this).data('value');
        var selectedValues = $('#deviceSelect').val();
        selectedValues = selectedValues.filter(value => value !== valueToRemove);

        $('#deviceSelect').val(selectedValues).trigger('change');
      });

      function updateTextareaWithSelect(selectedValues) {
        var textarea = $('#textareaWithSelect');
        textarea.val(selectedValues.join('\n'));

        // Add remove buttons after each selected option
        var newText = selectedValues.map(function (value) {
          return value + ' <span class="remove-option" data-value="' + value + '">Remove</span>';
        }).join('\n');

        textarea.html(newText);
      }

      // End
      /*$(document).on('click', '.upload_logo_btn', function(event) {
        $('#upload_logo').trigger('click');
      });

      $('#upload_logo').on('change', function (e) {
        var file = e.target.files[0];
        if (file.size <= 120 * 120) {
          if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
              // Set the source of the image to the result of the FileReader
              $('.upload_logo').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
          }else {
            $('.upload_logo').attr('src', "{{--asset('assets/img/placeholder/company-logo.jpg')--}}");
          }
        }else {
          // Handle file size exceeded exception
          alert('File size exceeds the allowed (120*120).');
          // You can also display a message or perform other actions as needed.
        }
      });*/

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

  $('input[name="device_supported[]"]').change(function(event) {
      if($(this).is(":checked")) {
          console.log($(this).attr('id'));
          $('.device_urls.'+$(this).attr('id')).show();
      }else {
          $('.device_urls.'+$(this).attr('id')).hide();
      }

  });

  $("#country-dd").select2({
        placeholder: "Select a Country",
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
        placeholder: "Select a City",
        allowClear: true
    });

  $("#state-dd").select2({
        placeholder: "Select a State",
        allowClear: true
    });

     $('#country-dd').on('change', function () {
          var idCountry = this.value;
          $("#state-dd").html('');
          $.ajax({
              url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
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
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
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

      $('[name="all_include_country"]').on('click', function () {
        var selectElement = document.getElementById('include-country-dd');

        // Check if the "Select All" checkbox is checked
        if (this.checked)
        {
          selectElement.disabled = true;
          selectElement.style.backgroundColor = 'lightgrey';
          selectElement.removeAttribute('required');
        }
        else
        {
          selectElement.disabled = false;
          selectElement.style.backgroundColor = '';
          selectElement.setAttribute('required', 'required');
        }
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
            company_pic = "{{asset('assets/company/no-company-logo.png')}}";
          else
            company_pic = "{{asset('assets/company')}}"+'/'+hit["logo"];
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
@endsection
