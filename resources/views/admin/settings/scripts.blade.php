@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Scripts')
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
    <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Scripts</h5>
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
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                    <form method="post" action="{{route('saveScripts')}}">
                        @csrf
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Script</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="script_in_header">Script in head tag</label>
                            <textarea id="script_in_header" rows="15" name="meta[script_in_header]" class="form-control">{{$values['script_in_header'] ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="script_in_body">Script in body tag</label>
                            <textarea id="script_in_body"  rows="15" name="meta[script_in_body]" class="form-control">{{$values['script_in_body'] ?? ''}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="script_before_body">Script before body tag close</label>
                            <textarea id="script_before_body" rows="15" name="meta[script_before_body]" class="form-control">{{$values['script_before_body'] ?? ''}}</textarea>
                        </div>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Save Script</button>
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
