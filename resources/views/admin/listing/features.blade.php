@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update '. $type)

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
        <form class="needs-validation1" action="{{route('saveFeatures'
        ,[$type,$listing->id])}}" method="POST" enctype="maltipart/form-data" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <div class="row g-3">
                <div class="col-12 category-box-description">
                    <h5 class="listing_title">Features<br><small>Add Features</small></h5>
                    <div class="accordion mt-3" id="accordionWithIcon">

                      @if(!empty($allCat = getCategory($listing->categories)))
                      @foreach ($allCat as $key => $value)
                        @php
                            $CatUrl = !empty($listing->getMeta('features_cat_page_url')[$value->id]) ? $listing->getMeta('features_cat_page_url')[$value->id] : '';
                        @endphp
                          <div class="card accordion-item active">
                                <h2 class="accordion-header">
                                  <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-{{$value->id}}" aria-expanded="true">
                                    {{$value->name}}
                                  </button>
                                    
                                </h2>
                                <div id="accordionWithIcon-{{$value->id}}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordionWithIcon">
                                  <div class="accordion-body">
                                        <div class="p-2">
                                            <label><small>Page URL</small></label>
                                            <select class="form-control" name="cat_page_url[{{$value->id}}]">
                                                <option value="">Select Page</option>
                                                @foreach (getAdminPages() as $key => $page)
                                                    <option {{$CatUrl == $key ? 'selected="selected"' : ''}} value="{{$key}}">{{$page}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <ul class="list-group f-list">

                                            @if(!empty($feature = $value->feature))
                                                @foreach ($feature as $feat)
                                                    <li class="list-group-item border-0">
                                                        <div class="form-check form-check-primary">
                                                            <input
                                                            class="form-check-input form-select-lg"
                                                            name="features[{{$value->id}}][{{$feat->id}}]"
                                                            type="checkbox"
                                                            {{ !empty($listing->getMeta('features')[$value->id]) && in_array($feat->id,$listing->getMeta('features')[$value->id]) ? 'checked' : ''}}
                                                            value="{{$feat->id}}"
                                                            id="customCheckSuccess_{{$feat->id}}">
                                                            <label class="form-check-label" for="customCheckSuccess_{{$feat->id}}">{{$feat->name}}</label>
                                                          </div>

                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>

                                  </div>
                                </div>
                            </div>
                      @endforeach
                      @endif

                    </div>

                </div>

            </div>
          </div>
              <div class="row mt-5">
                <div class="col-6 text-start">
                  <a href="{{ (auth()->user()->is_admin()) ? route('details',['description',$listing->id]) : route('manage_details',['description',$listing->id]) }}" type="reset" class="btn btn-label-default waves-effect">
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
