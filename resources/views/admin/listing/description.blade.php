@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Listing '. $type)

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
    #short_summary_count::after, .short_summary_count::after {
        content: "/140";
    }
    #summary_count::after, .summary_count::after, .long_summary_count::after {
        content: "/1000";
    }
    textarea {
        resize: none !important;
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
        <form class="needs-validation1" action="{{route('saveDescription'
        ,[$type,$listing->id])}}" method="POST" enctype="maltipart/form-data" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <div class="row g-3 category-box-description">
                <div class="col-12">
                    <h5 class="listing_title">Default Description <br><small>Setup Description</small></h5>
                    <div class="form-group">
                        <span  class="float-end lighttagc pt-2 short_summary_count">0</span>
                        <label class="form-label required-label" for="short_description">Short Description</label>
                        <textarea rows="3" cols="30" class="form-control category_short_summary" id="short_summary" name="short_description" required>{{$listing->getMeta('short_description')??''}}</textarea>
                        <div class="invalid-feedback">
                            Please enter Short Description.
                        </div>
                    </div>
                    <div class="form-group">
                      <span  class="float-end lighttagc pt-2 long_summary_count">0</span>
                        <label class="form-label required-label" for="long_description">Long Description</label>
                        <textarea cols="30" rows="5" class="form-control category_long_summary" id="summary" name="long_description" required>{{$listing->getMeta('long_description')??''}}</textarea>
                        <div class="invalid-feedback">
                            Please enter Long Description.
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5 category-box-description">
                    <h5>Category Wise Description</h5>
                      @if(!empty($allCat = getCategory($listing->categories)))
                      @foreach ($allCat as $key => $value)
                        <div class="form-group">
                            <span  class="float-end lighttagc pt-2 summary_count"></span>
                            <label class="form-label" for="long_description">{{$value->name}}</label>
                            <textarea cols="30" rows="5" class="form-control category_summary" id="summary" name="category_description[{{$value->id}}][long]">{{$listing->getMeta('category_description')[$value->id]['long']??''}}</textarea>
                        </div>

                      @endforeach

                      @endif
                </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-6 text-start">
              <a href="{{ (auth()->user()->is_admin()) ? route('details',['information',$listing->id]) : route('manage_details',['information',$listing->id]) }}" type="reset" class="btn btn-label-default waves-effect">
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
            <input type="hidden" name="listing_id" value="{{$listing->id}}">
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
    function countNewWords(val, ele, count) {
      var words = val.val().trim().split(/\s+/); // Split input value into words
      var wordCount = words.length;

      $(ele).text(wordCount); // Update the text of the specified element

      if (wordCount <= count) {
        $(val).css('border-color', '');
      }

      if (wordCount >= count)
      {
        $(val).css('border-color', 'red');
      }

    }

    jQuery(document).ready(function($) {
        countNewWords($('#summary'),$('.long_summary_count'),1000);
        countNewWords($('#short_summary'),$('.short_summary_count'),250);

        $(document).on('keyup', '.category_short_summary', function () {
            countNewWords($(this),$(this).parents('.category-box-description').find('.short_summary_count'), 140);
        });

        $(document).on('keyup', '.category_long_summary', function () {
            countNewWords($(this),$(document).find('.long_summary_count'), 1000);
        });

        $(".category-box-description .category_summary").each(function() {
          countNewWords($(this),$(this).parent().find('span'),1000);
        });

        $(document).on('keyup', ".category-box-description .category_summary", function () {
          countNewWords($(this),$(this).parent().find('span'),1000);
        });
    });
  </script>
@endsection
