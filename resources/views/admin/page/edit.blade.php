@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Page')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/page.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
{{--<script src="{{asset('assets/vendor/libs/ckeditor/ckeditor.js')}}"></script>--}}
<script src="https://cdn.tiny.cloud/1/v1yreane5bk0fymyb220jta7r6l1tm8cm6yfa0ohp2rq2ejh/tinymce/5-stable/tinymce.min.js"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
@endsection

@section('content')
<!-- Layout Demo -->
<nav aria-label="breadcrumb" class="me-auto">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('page.index')}}">Page</a>
    </li>
    <li class="breadcrumb-item active">Update Page</li>
  </ol>
</nav>
    <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Page</h5>
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
                    <form method="post" action="{{route('page.update',[$page->id])}}" class="needs-validation1" id="page_create" novalidate>
                        @csrf
                        @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="type_id">Type</label>
                            <select name="type_id" class="form-control" id="type_id" required>
                                <option></option>
                                @foreach ($type as $value)
                                    <option {{$page->type_id == $value->id ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                  @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$page->title}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-label" for="slug">Page Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{$page->slug}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="heading_one">Title H1</label>
                            <input type="text" name="heading_one" id="heading_one" class="form-control" value="{{$page->heading_one}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-label" for="heading_two">Title H2</label>
                            <input type="text" name="heading_two" id="heading_two" class="form-control" value="{{$page->heading_two}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label required-label" for="description">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="12" id="description" required>{{$page->description}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required-label" for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{$page->meta_title}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-label" for="TagifyBasic">Meta Keywords</label>
                            <input type="text" name="meta_keyword" id="TagifyBasic" class="form-control" value="{{$page->meta_keyword}}" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label required-label" for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="6" id="meta_description" required>{{$page->meta_description}}</textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                          <label class="form-label" for="buyer_guide">Buyers’ Guide</label>
                          <textarea class="form-control ckeditor" name="buyer_guide" rows="12" id="buyer_guide">{{$page->buyer_guide}}</textarea>
                        </div>
                    </div>

                    @if( !empty($page) && $items )
                      <hr>
                      <h5>{{ $page->type_id == 2 ? 'Software:' : 'Service' }}</h5>
                      <hr>

                      <div class="card mb-4">
                        <div class="card-datatable table-responsive">
                          <table class="table table-striped table-bordered">
                            <thead class="border-top">
                            <tr>
                              <th>Sr No.</th>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( count($items) )
                              @foreach($items as $index => $item)
                                <tr>
                                  <td>{{ ++$index }}</td>
                                  <td>{{ $item->id }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i A') }}</td>
                                </tr>
                              @endforeach
                            @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    @endif

                    <hr>
                    <h5>Filters:</h5>
                    <hr>
                    <div class="mb-3" id="add_filter_inner">
                        @if ($page->type_id == 2 && !empty($page->filter))
                            @php
                                $filter_type = $page->filter_val->filter_type ?? [];
                                $filter_val = $page->filter_val->filter_val ?? [];
                            @endphp
                            @foreach ($filter_type as $key => $filter)
                                <div class="row filter_list mb-3" data-id="{{$key}}">
                                    <div class="col-md-4">
                                        <label class="form-label required-label">Select Filter Type</label>
                                        <select class="form-control change_f_type f_added" name="filter_type[{{$key}}]" class="filter_type" data-id="{{$key}}">
                                            <option value="">Select filter type</option>
                                            @foreach (softwareFilterVal() as $k => $v)
                                                <option {{$filter == $k ? 'selected' : ''}} value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8 filter_values" id="filter-{{$key}}" data-val="{{$filter_val->$key}}"></div>
                                </div>

                            @endforeach
                        @endif
                        @if ($page->type_id == 1 && !empty($page->filter))
                            @php
                                $filter_type = $page->filter_val->filter_type ?? [];
                                $filter_val = $page->filter_val->filter_val ?? [];
                            @endphp
                            @foreach ($filter_type as $key => $filter)
                                <div class="row filter_list mb-3" data-id="{{$key}}">
                                    <div class="col-md-4">
                                        <label class="form-label required-label">Select Filter Type</label>
                                        <select class="form-control change_f_type f_added" name="filter_type[{{$key}}]" class="filter_type" data-id="{{$key}}">
                                            <option value="">Select filter type</option>
                                            @foreach (serviceFilterVal() as $k => $v)
                                                <option {{$filter == $k ? 'selected' : ''}} value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8 filter_values" id="filter-{{$key}}" data-val="{{$filter_val->$key}}"></div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="mb-3 mt-3">
                        <a href="javascript:void(0)" class="add_new_filter text-decoration-underline"><i class="ti ti-plus"></i> Add Filter</a>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label required-label" for="status">Publish Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option {{$page->status == 1 ? 'selected' : ''}} value="1">Publish</option>
                                <option {{$page->status == 0 ? 'selected' : ''}} value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Page</button>
                    </form>
                  </div>
                </div>
          </div>
    </div>


<!--/ Layout Demo -->
@endsection
@section('page-script')
<script src="{{asset('assets/js/page.js')}}"></script>
@endsection
