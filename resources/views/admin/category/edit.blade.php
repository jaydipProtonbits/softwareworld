@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Category')
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
      <a href="{{route('category.index')}}">Category</a>
    </li>
    <li class="breadcrumb-item active">Update Category</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Category</h5>
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
                    <form method="post" action="{{route('category.update',$category->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="type_id">Type</label>
                            <select class="form-control" name="type_id" id="type_id" required>
                                <option value="">Select Type</option>
                                @foreach ($type as $key => $value)
                                    <option {{$category->type_id == $value->id ? 'selected' : ''}}  value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}" id="basic-default-fullname" placeholder="Software">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Parent Category</label>
                        <select class="select2 form-control" name="parent_id">
                            <option></option>
                            @foreach ($categories as $key => $value)
                                <option value="{{$value->id}}" {{$category->parent_id == $value->id ? 'selected' : ''}}>{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Category</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-danger delete-record" data-id="{{$category->id}}}">Delete Category</button>
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
                            url: "".concat(baseUrl, "admin/category/").concat(user_id),
                            dataType: 'JSON',
                            data: {
                                'id': user_id,
                                '_token': '{{ csrf_token() }}',
                            },
                            success: function success() {
                                setTimeout(function() {
                                    window.location.href = "{{route('category.index')}}";
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
                            text: 'The category has been deleted!',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Cancelled',
                            text: 'The category is not deleted!',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    }
                });
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
        jQuery(document).ready(function($) {
            $(".select2").select2({
                placeholder: "Select Parent",
                allowClear: true
            });
        });
    </script>
@endsection