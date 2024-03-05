@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Destination ')

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
    body button.step-trigger.activeBTN span.bs-stepper-title,
    body button.step-trigger.activeBTN span.bs-stepper-subtitle {
        color: blue !important;
        font-weight: bold !important;
    }
    .activeBTN span.bs-stepper-circle {
        background: var(--bs-primary) !important;
        color: #FFF !important;
    }
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
    button.step-trigger {
      width: 100% !important;
      justify-content: space-between !important;
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
        <form class="needs-validation1" action="{{route('saveDestination'
        ,[$type,$listing->id])}}" method="POST" enctype="maltipart/form-data" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <h5 class="listing_title">Destination URLs<br><small>Setup Destination URLs</small></h5>
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label" for="pricing_url">Pricing Page URL</label>
                <input type="url" id="pricing_url" name="pricing_url" class="form-control" required placeholder="Enter Pricing Page URL" value="{{$listing->getMeta('pricing_url')}}" aria-label="" />
                <div class="invalid-feedback">
                  Please enter Pricing Page URL.
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="trail_url">Trial Page URL</label>
                <input type="url" id="trail_url" value="{{$listing->getMeta('trail_url')}}" name="trail_url" class="form-control" placeholder="Enter Trial Page URL" aria-label="" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="demo_url">Demo URL</label>
                <input type="url" id="demo_url" value="{{$listing->getMeta('demo_url')}}" name="demo_url" class="form-control" placeholder="Enter Demo URL" aria-label="" />
              </div>
            </div>

                <h5 class="mt-4 mb-2">Category wise URLs</h5>
                <div class="row">

                  @if(!empty($allCat = getCategory($listing->categories)))
                  @foreach ($allCat as $key => $value)
                    <div class="col-md-6">
                        <label class="form-label" for="landing_page_url[{{$value->id}}]">{{$value->name}}</label>
                        <input type="url" id="landing_page_url[{{$value->id}}]" name="landing_page_url[{{$value->id}}]" value="{{$listing->getMeta('landing_page_url')[$value->id]??''}}" class="form-control" placeholder="Enter URL" aria-label="" />
                    </div>
                  @endforeach
                  @endif
                </div>
          </div>
              <div class="row mt-5">
                <div class="col-6 text-start">
                  <a href="{{ (auth()->user()->is_admin()) ? route('details',['media',$listing->id]) : route('manage_details',['media',$listing->id]) }}" type="reset" class="btn btn-label-default waves-effect">
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



    });
  </script>
@endsection
