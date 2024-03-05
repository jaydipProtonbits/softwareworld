@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Category')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection



@section('content')
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('category.index')}}">Category</a>
    </li>
    <li class="breadcrumb-item active">Add Category</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Category</h5>
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
                    <form method="post" action="{{route('category.store')}}">
                        @csrf

                      <div class="mb-3">
                        <label class="form-label" for="type_id">Type</label>
                        <select class="form-control" name="type_id" id="type_id" required>
                            <option value="">Select Type</option>
                            @foreach ($type as $key => $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="c_name">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="c_name" placeholder="Software">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Parent Category</label>
                        <select class="select2 form-control" name="parent_id">
                        </select>
                      </div>
                      
                      
                      
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Add Category</button>
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
        $(".select2").select2({
            placeholder: "Select Parent",
            allowClear: true
        });
        $(document).on('change', '#c_name', function(event) {
            var str = $(this).val();
            str = str.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(str);
        });

        $(document).on('keyup, keydown', '#slug', function(event) {
            var str = $(this).val();
            str = str.replace(/\s+/g, '-').toLowerCase();
            $(this).val(str);
        });

        $(document).on('change', '#type_id', function(event) {
            event.preventDefault();
            $val = $(this).val();
            if ($val != '') {
                $.ajax({
                    url: "{{url('admin/category/getCategory')}}/"+$val,
                })
                .done(function(res) {
                    if (res.status == 1) {
                        $('select.select2 option').remove();
                        $.each(res.data, function(index, val) {
                            $('select.select2')
                                .append($("<option></option>")
                                .attr("value", index)
                                .text(val)); 
                        });
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            }
        });
    });
</script>
@endsection