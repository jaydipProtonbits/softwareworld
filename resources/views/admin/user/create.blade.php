@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add User')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".select2").select2({
            placeholder: "Assign Role",
            allowClear: true
        });
    });
</script>
@endsection

@section('content')
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('users.index')}}">Users</a>
    </li>
    <li class="breadcrumb-item active">Add User</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add User</h5>
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
                    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf

                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Name</label>
                        <input type="text" name="name" class="form-control" required value="{{old('name')}}" id="basic-default-fullname" placeholder="Johne Doe">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-email">Email</label>
                        <input type="email" name="email" value="{{old('email')}}"  class="form-control" required id="basic-email" placeholder="demo@example.com">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-password">Password</label>
                        <input type="password" name="password" value=""  class="form-control" required id="basic-password" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="c-password">Confirm Change Password</label>
                        <input type="password" name="c_password" value=""  class="form-control" required id="c-password" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Role</label>
                        <select class="select2 form-control" name="role" required>
                            <option></option>
                            @foreach ($roles as $key => $value)
                                <option value="{{$value->name}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Profile Photo</label>
                        <input type="file" name="profile_pic" value="" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Add User</button>
                    </form>
                  </div>
                </div>
          </div>
    </div>
    

<!--/ Layout Demo -->
@endsection
