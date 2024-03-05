@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Features')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
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
    /*h2#swal2-title {
        font-size: 18px;
        margin: 0;
        padding: 14px !important;
    }*/
    /*.swal2-popup.swal2-modal.swal2-show {
        padding-bottom: 0;
    }*/
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
      <a href="{{route('features.index')}}">Features</a>
    </li>
    <li class="breadcrumb-item active">Update Features</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Features</h5>
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
                    <form method="post" action="{{route('features.update',$category_id)}}">
                        @csrf
                        @method('PUT')

                      <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option></option>
                            @foreach ($category as $value)
                                <option value="{{$value->id}}" {{$category_id == $value->id ? 'selected' : ''}}>{{$value->name}}</option>
                            @endforeach
                            
                        </select>
                      </div>
                        <div class="row" id="features-outer">
                            @if (!empty($features))
                                @foreach ($features as $feature)
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Feature Name</label>
                                        <input type="text" name="name[][{{$feature->id}}]" class="form-control" value="{{$feature->name}}" id="basic-default-fullname" placeholder="Software" required>
                                    </div>
                                    @if ($loop->iteration != 1)
                                        <span class="remove_feature" data-id="{{$feature->id}}"><i class="fa fa-close"></i></span>
                                    @endif
                                </div>
                                @endforeach 
                            @endif
                        </div>
                        <div class="mt-3 mb-3 text-end">
                            <a href="javascript:void(0)" id="add_features"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Feature</button>
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="button" class="btn btn-danger delete-record" data-id="{{$category_id}}">Delete All Features</button>
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
                        url: "".concat(baseUrl, "admin/deleteFeatures/").concat(user_id),
                        dataType: 'JSON',
                        data: {
                            'id': user_id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function success() {
                            setTimeout(function() {
                                window.location.href = "{{route('features.index')}}";
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
                        text: 'Features has been deleted!',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Feature is not deleted!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
        });

        $("#category_id").select2({
            placeholder: "Select Category",
            allowClear: true
        });
        $(document).on('click', '#add_features', function(event) {
           event.preventDefault();
            $('#features-outer').append('<div class="col-12"><div class="mb-3"><label class="form-label" for="basic-default-fullname">Feature Name</label><input type="text" name="name[][]" class="form-control" value="" id="basic-default-fullname" placeholder="Software" required></div><span class="remove_feature" data-id=""><i class="fa fa-close"></i></span></div>');
        });
        $(document).on('click', '.remove_feature', function(event) {
            event.preventDefault();
            $(this).closest('.col-12').remove();
        });
    });
</script>
@endsection