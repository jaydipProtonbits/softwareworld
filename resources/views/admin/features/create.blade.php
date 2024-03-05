@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Feature')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection
@section('page-style')
<style type="text/css">
    span.remove_feature {
        cursor: pointer;
        color: red;
        position: absolute;
        right: 13px;
        top: 34%;
        font-size: 17px;
        background: #f3f3f3;
        padding: 5px 10px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    #features-outer .col-12 {
        position: relative;
    }
</style>
@endsection
@section('content')
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('features.index')}}">Feature</a>
    </li>
    <li class="breadcrumb-item active">Add Feature</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Feature</h5>
                  </div>
                  <div class="card-body">
                    @if(count($errors) > 0 )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{route('features.store')}}">
                        @csrf

                      <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option></option>
                            @foreach ($category as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                            
                        </select>
                      </div>
                        <div class="row" id="features-outer">
                            <div class="col-12">
                              <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Feature Name</label>
                                    <input type="text" name="name[]" class="form-control" value="" id="basic-default-fullname" placeholder="Software" required>
                              </div>
                            </div>
                        </div>
                        <div class="mt-3 mb-3 text-end">
                            <a href="javascript:void(0)" id="add_features"><i class="fa fa-plus"></i> Add New</a>
                        </div>

                      <!-- <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Description</label>
                        <textarea id="basic-default-message" name="description" class="form-control" placeholder="Feature description here!">{{old('description')}}</textarea>
                      </div> -->
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Add Feature</button>
                    </form>
                  </div>
                </div>
          </div>
    </div>
    

<!--/ Layout Demo -->
@endsection
@section('page-script')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#category_id").select2({
            placeholder: "Select Category",
            allowClear: true
        });
        $(document).on('click', '#add_features', function(event) {
           event.preventDefault();
            $('#features-outer').append('<div class="col-12"><div class="mb-3"><label class="form-label" for="basic-default-fullname">Feature Name</label><input type="text" name="name[]" class="form-control" value="" id="basic-default-fullname" placeholder="Software" required></div><span class="remove_feature"><i class="fa fa-close"></i></span></div>');
        });
        $(document).on('click', '.remove_feature', function(event) {
            event.preventDefault();
            $(this).closest('.col-12').remove();
        });
    });
</script>
@endsection
