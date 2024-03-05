@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update User')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('content')
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('users.index')}}">User</a>
    </li>
    <li class="breadcrumb-item active">Update User</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update User</h5>
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
                    <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="basic-default-fullname" placeholder="Johne Doe">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-email">Email</label>
                        <input type="email" name="email" value="{{$user->email}}"  class="form-control" id="basic-email" placeholder="demo@example.com">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-password">Change Password</label>
                        <input type="password" name="password" value=""  class="form-control" id="basic-password" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="c-password">Confirm Change Password</label>
                        <input type="password" name="c_password" value=""  class="form-control" id="c-password" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Role</label>
                        <select class="select2 form-control" name="role">
                            <option></option>
                            @foreach ($roles as $key => $value)
                                <option value="{{$value->name}}" {{(!empty($user->roles[0]->name) && $user->roles[0]->name == $value->name) ? 'selected' : ''}}>{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Profile Photo</label>
                        <input type="file" name="profile_pic" value="" class="form-control">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update User</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-danger delete-record" data-id="{{$user->id}}}">Delete User</button>
                        </div>
                      </div>
                      
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
        $(document).on('click', '.delete-record', function() {
            var user_id = $(this).data('id'),
                dtrModal = $('.dtr-bs-modal.show');

            // hide responsive modal in small screen
            if (dtrModal.length) {
                dtrModal.modal('hide');
            }

            // sweetalert for confirmation of delete
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    // delete the data

                    $.ajax({
                        type: 'DELETE',
                        url: "".concat(baseUrl, "admin/users/").concat(user_id),
                        dataType: 'JSON',
                        data: {
                            'id': user_id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function success() {
                            setTimeout(function() {
                                window.location.href = "{{route('users.index')}}";
                            }, 500);

                        },
                        error: function error(_error) {
                            console.log(_error);
                        }
                    });

                    // success sweetalert
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The user has been deleted!',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'The user is not deleted!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
        });
    });
</script>
@endsection