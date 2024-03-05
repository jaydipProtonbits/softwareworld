@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Listings')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection
@section('page-style')
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
    input.device_urls, label.device_urls {
        display: none;
        margin-top: 1rem;
    }
    input.target_company_size_urls, label.target_company_size_urls {
      display: none;
      margin-top: 1rem;
    }
    button.step-trigger {
        width: 100% !important;
        justify-content: space-between !important;
    }
    img.img-fluid.upload_logo {
      width: 192px;
      height: 134px;
      object-fit: cover;
    }
    .row.deviceSupported {
          min-height: 50px;
      }
    #upload_logo {
      opacity: 0;
      height: 0;
      width: 0;
    }
    img.upload_logo {
      cursor: pointer;
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
        <form class="needs-validation1" action="{{route('saveInformation'
        ,[$type,$listing->id])}}" method="POST" enctype="multipart/form-data">
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
                    <img src="{{(!empty($listing->logo)) ? asset('assets/company/'.$listing->logo) : asset('assets/img/placeholder/company-logo.jpg')}}" class="img-fluid upload_logo">
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
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Software Name" required value="{{$listing->name}}" />
                  </div>
                  <div class="col-6">
                    <label class="form-label-listing required-label" for="tagline">Tagline</label>
                    <input type="text"  id="tagline" name="tagline" class="form-control" placeholder="Enter Software Tagline" required value="{{$listing->tagline}}"/>
                  </div>
                </div>

                <div class="col-6">
                  <label class="form-label-listing required-label" for="website">Software Website</label>
                  <input type="url" id="website" name="website" class="form-control" placeholder="Enter Software Website" aria-label="" value="{{$listing->website}}" required/>
                </div>
                <div class="col-6">
                  <label class="form-label-listing required-label" for="vendor_name">Vendor Name</label>
                  <input type="text" id="vendor_name" name="vendor_name" class="form-control" placeholder="Enter Vendor Name" aria-label="" required value="{{$listing->vendor_name}}" />
                </div>
                <div class="col-4">
                  <label class="form-label-listing required-label" for="year_founded">Vendor/Company Year Founded</label>
                  <input type="text" id="year_founded" name="year_founded" class="form-control" required placeholder="YYYY" aria-label="" value="{{$listing->getMeta('year_founded')}}" />
                </div>

                <div class="col-4">
                  <label class="form-label-listing required-label" for="target_company_size-dd">Employees</label>
                  <select  id="target_company_size-dd" class="form-control" name="vendor_company_size" required>
                    <option value="">Select Size</option>
                    @foreach (companySize() as $data): ?>
                    @if (!empty($data))
                      <option  {{$data == $listing->getMeta('target_company_size') ? 'selected' : ''}} value="{{$data}}">
                        {{$data}}
                      </option>
                    @endif
                    @endforeach

                  </select>
                </div>

                <div class="col-12">
                  <label class="mt-3 mini_label "><b>Headquarter Address</b></label>
                    <div class="row">
                      <div class="col-sm-4">
                        <label class="form-label-listing required-label" for="country-dd">Country</label>
                        <select  id="country-dd" class="form-control" name="country" required>
                            <option></option>
                            @foreach ($countries as $data)
                            <option {{$data->id == $listing->getMeta('country') ? 'selected' : ''}} value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                             Please enter Country.
                         </div>
                      </div>
                      <div class="col-sm-4">
                        <label class="form-label-listing" for="state-dd">State</label>
                        <select  id="state-dd" class="form-control" name="state" >
                        </select>
                        <div class="invalid-feedback">
                             Please enter State.
                         </div>
                      </div>
                      <div class="col-sm-4">
                        <label class="form-label-listing" for="city-dd">City</label>
                        <select  id="city-dd" class="form-control" name="city" >
                        </select>
                        <div class="invalid-feedback">
                          Please enter City.
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <label class="form-label-listing" for="street">Street</label>
                        <input type="text" id="street" value="{{$listing->getMeta('street')}}" name="street" class="form-control" placeholder="" aria-label=""  />
                        </select>
                        <div class="invalid-feedback">
                          Please enter Street.
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label class="form-label-listing" for="zip_code">Zip code</label>
                        <input type="text"  id="zip_code" value="{{$listing->getMeta('zip_code')}}" class="form-control" name="zip_code" >
                        <div class="invalid-feedback">
                             Please enter Zip Code.
                         </div>

                      </div>
                      <div class="col-sm-4">
                        <label class="form-label-listing" for="contact_no">Contact Number</label>
                        <input type="text" id="contact_no" class="form-control" value="{{$listing->getMeta('contact_no')}}" name="contact_no" required>
                        <div class="invalid-feedback">
                             Please enter Contact Number.
                         </div>

                      </div>
                    </div>
                </div>

                <div class="col-12">
                  <label class="mb-3 mt-3 mini_label required-label"><b>Software Category</b></label>
                  @php $categories = !empty($listing->categories) ? $listing->categories : []; @endphp
                  <select  id="category-dd" class="form-control" multiple name="category[]" required>
                    <option></option>
                    @foreach ($category as $data)
                      <option {{ in_array($data->id,$categories) ? 'selected' : ''}} value="{{$data->id}}">
                        {{$data->name}}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label-listing required-label" for="languages_supported-dd">Languages Supported</label>
                  <select id="languages_supported-dd" class="form-control" multiple name="languages_supported[]" required>
                    <option></option>
                    @foreach (languagesSupported() as $key => $value): ?>
                    <option {{ in_array($key,$listing->getMeta('languages_supported',array())) ? 'selected' : ''}} value="{{$key}}">
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
                    <option {{ in_array($data->id,$listing->getMeta('target_industry')??[]) ? 'selected' : ''}} value="{{$data->id}}">
                      {{$data->name}}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label-listing required-label d-block" for="include-country">
                    Target Countries
                    <small style="float: right;">
                      <label>
                        <input type="checkbox" name="all_include_country" value="1" class="form-check-input" {{ $listing->getMeta('all_include_country') ? 'checked' : ''}}> Select All</label>
                    </small>
                  </label>
                  <select  id="include-country-dd" class="form-control" multiple name="include_countries[]" required>
                    <option></option>
                    @foreach ($countries as $data)
                      <option {{ in_array($data->id,$listing->getMeta('include_countries')??[]) ? 'selected' : ''}} value="{{$data->id}}">
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
                          <input name="target_company_size[]" class="form-check-input" type="checkbox" {{ in_array($value,$listing->getMeta('company_size')??[]) ? 'checked' : ''}} value="{{$value}}" id="{{$key}}"> {{$value}}
                        </label>
                      </div>
                    @endforeach
                  </div>
                </div>

                <div class="col-12">
                  <label class="mini_label required-label d-block mb-3 mt-3" for="licensing_model-dd">What is Licensing Model of Your Software?</label>
                    <label class="form-check-label" for="licensing_model">
                      <input name="licensing_model" class="form-check-input" type="radio" value="Proprietary" id="licensing_model" {{'Proprietary' == $listing->getMeta('licensing_model') ? 'checked' : ''}}> Proprietary</label>
                    <label class="form-check-label" for="licensing_model2">
                      <input name="licensing_model" class="form-check-input" type="radio" value="Open Source" id="licensing_model2" {{'Open Source' == $listing->getMeta('licensing_model') ? 'checked' : ''}}> Open Source</label>
                </div>

                <div class="col-12">
                  <label class="mini_label required-label d-block mb-3 mt-3" for="licensing_model-dd">What is your Software Deployment Type?</label>
                    <label class="form-check-label" for="software_development_type">
                      <input name="software_development_type[]" class="form-check-input" type="checkbox" value="Cloud Hosted" id="software_development_type" {{ in_array('Cloud Hosted',$listing->getMeta('software_development_type')??[]) ? 'checked' : ''}}> Cloud Hosted
                    </label>

                    <label class="form-check-label" for="software_development_type2">
                      <input name="software_development_type[]" class="form-check-input" type="checkbox" value="Deployment Type" id="software_development_type2" {{ in_array('Deployment Type',$listing->getMeta('software_development_type')??[]) ? "checked" : ''}}> Deployment Type
                    </label>
                </div>
                <div class="col-12">
                  <label class="mini_label required-label d-block mt-3">Device Supported</label>
                    <?php foreach (deviceSupported() as $value): ?>
                      <div class="row align-items-center deviceSupported">
                          <div class="col-md-2">
                              <label class="form-check-label d-block">
                                  <input {{ in_array($value,$listing->getMeta('device_supported')??[]) ? 'checked' : ''}} name="device_supported[]" class="form-check-input" type="checkbox" value="{{$value}}" id="{{$value}}"> {{$value}}
                              </label>
                          </div>
                          <div class="col-md-6">
                              <?php if (!in_array($value, ['Windows','Mac','Linux'])): ?>
                                  <input placeholder="Enter {{$value}} URL" name="device_supported_url[{{$value}}]" class="form-control mt-0 device_urls {{$value}}" type="url" value="{{$listing->getMeta('device_supported_url')[$value] ?? ''}}">
                              <?php endif ?>
                          </div>
                      </div>
                    <?php endforeach ?>
                  </div>

                <div class="col-12">
                  <label class="mini_label d-block mb-3">
                    <b>Social Media Profiles</b>
                  </label>
                  <div class="row">
                    <?php foreach (socialMedia() as $value): ?>
                      <div class="col-6">
                        <label class="form-check-label ">{{$value}}</label>
                          <input name="social_profile[{{$value}}]" class="form-control mt-0 mb-2" type="url" value="{{$listing->getMeta('social_profile')[$value] ?? ''}}" placeholder="{{$value}} Page URL">
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
              <div class="row mt-5">
                {{--<div class="col-6 text-start">
                  <a href="{{ (auth()->user()->is_admin()) ? route('details',['description',$listing->id]) : route('manage_details',['description',$listing->id]) }}" type="reset" class="btn btn-label-default waves-effect">
                    <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Previous
                  </a>
                </div>--}}
                <div class="col-12 text-end">
                  <button class="btn btn-primary btn-next">
                     <span class="align-middle d-sm-inline-block me-sm-1">
                       Save & Next &nbsp;&nbsp; <i class="fa fa-arrow-right"></i>
                     </span>
                  </button>
                </div>
              </div>
          {{--<div class="mt-4 ms-auto">
            <button class="btn btn-primary btn-submit">Save & Next</button>
          </div>--}}
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
     let select_all_country = 0;
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

        $('.bs-stepper-header button').click(function(event) {
           $url = $(this).data('url');
           if($url != '') {
              window.location.replace($url);
           }else {
              return false;
           }
        });
        $('.bs-stepper-header button').each(function(index, el) {
            $url = $(this).data('url');
            if ($url != '') {
               $(this).removeAttr('disabled');
            }
        });


        select_all_country = '{{ $listing->getMeta('all_include_country') }}';
        if(select_all_country)
        {
          var selectElement = document.getElementById('include-country-dd');
          selectElement.disabled = true;
          selectElement.style.backgroundColor = 'lightgrey';
          selectElement.removeAttribute('required');
        }

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
   </script>
  <script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    jQuery(document).ready(function($) {
      setTimeout(function() {
        $('#country-dd').trigger('change');

        $('input[name="device_supported[]"]').each(function(index, el) {
            if($(this).is(':checked')){
              $(this).trigger('change');
            }
        });

        $('input[name="target_company_size[]"]').each(function(index, el) {
            if($(this).is(':checked')){
              $(this).trigger('change');
            }
        });
      }, 500);

      $('input[name="device_supported[]"]').change(function(event) {
          if($(this).is(":checked")) {

              $('.device_urls.'+$(this).attr('id')).show();
          }else {
              $('.device_urls.'+$(this).attr('id')).hide();
          }
      });

      $('.upload_logo').click(function(event) {
            $('#upload_logo').click();
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

                  $("#state-dd").val("{{$listing->getMeta('state')}}");
                  $("#state-dd").trigger('change');

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
                  $("#city-dd").val("{{$listing->getMeta('city')}}");
                  $("#city-dd").trigger('change');
              }
          });
      });
    });
  </script>
@endsection
