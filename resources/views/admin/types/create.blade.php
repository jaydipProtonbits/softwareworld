@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Type')
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
      <a href="{{route('type.index')}}">Type</a>
    </li>
    <li class="breadcrumb-item active">Add Type</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Type</h5>
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
                    <form method="post" action="{{route('type.store')}}">
                        @csrf

                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Type Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="basic-default-fullname" placeholder="Software" required>
                      </div>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Add Type</button>
                    </form>
                  </div>
                </div>
          </div>
    </div>
    

<!--/ Layout Demo -->
@endsection
