@php
  $configData = Helper::appClasses();
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Service')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/service.css')}}" />

@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>

@endsection
@section('page-style')
  <style type="text/css">
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
    img.upload_logo {
      cursor: pointer;
      max-height: 150px;
      object-fit: cover;
    }
    button.step-trigger {
      width: 100% !important;
      justify-content: space-between !important;
    }
  </style>
@endsection


@section('content')

  <!-- Validation Wizard -->
  <div class="col-12">
    <div class="row title_row">
        <div class="col-md-4">
            <h4 class="">Listing</h4>
        </div>
        @include('admin.service.status-button')
    </div>
    <div id="" class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      @include('admin.service.top_header')
      <div class="bs-stepper-content">
        @if(count($errors) > 0 )
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form class="needs-validation1" action="{{route('saveServiceDestination'
        ,[$service->id])}}" method="POST" enctype="maltipart/form-data" novalidate>
        @csrf
        <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <h5 class="listing_title">Destination URLs <br><small>Setup Landing Page URLs</small></h5>
            <div class="row g-3">
              @if(!empty($allCat = $service->category))
                @foreach ($allCat as $key => $value)
                  <div class="col-md-6">
                    <label class="form-label" for="landing_page_url[{{$value->id}}]">{{$value->name}}</label>
                    <input type="url" id="landing_page_url[{{$value->id}}]" name="landing_page_url[{{$value->id}}]" value="{{$service->getMeta('landing_page_url')[$value->id]??''}}" class="form-control" placeholder="Landing Page URL" aria-label="" />
                  </div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-6 text-start">
              <a href="{{ (auth()->user()->is_admin()) ? route('service_step',['description',$service->id]) : route('manage_service_step',['description',$service->id]) }}" type="reset" class="btn btn-label-default waves-effect">
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
            <button class="btn btn-primary btn-submit">Save</button>
          </div>--}}
        </form>
      </div>
    </div>
  </div>
  <!-- /Validation Wizard -->
@endsection
@section('page-script')
  <script src="{{asset('assets/js/forms-tagify.js')}}"></script>
  <script src="{{asset('assets/js/service.js')}}"></script>
@endsection
