@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Filter')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/page.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<!-- Layout Demo -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Filter</h5>
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
            <form method="post" action="{{route('filter.store')}}" class="needs-validation1" id="page_create" novalidate>
              @csrf
              <input type="hidden" name="software_ids" value="">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label required-label" for="type_id">Type</label>
                    <select name="type_id" class="form-control" id="type_id" required>
                        <option></option>
                        @foreach ($type as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                      </select>
                </div>
            </div>
            <div class="mb-3" id="add_filter_inner">

            </div>
            <div class="mb-3 mt-3">
                <a href="javascript:void(0)" class="add_new_filter btn btn-success"><i class="ti ti-plus"></i> Add Filter</a>
            </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light float-end">Add Page</button>
            </form>
          </div>
        </div>
        <div class="card mb-4">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table">
                    <thead class="border-top">
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<!--/ Layout Demo -->
@endsection
@section('page-script')
<script src="{{asset('assets/js/filter.js')}}"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
        var dt_user_table = $('.datatables-users');
        var dt_user = '';

        $(document).on('change', '#type_id', function(event) {
            dt_user = dt_user_table.DataTable({
                    destroy: true,
                    searchable: false,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: baseUrl + 'admin/filter/search',
                        data:function(d) {
                            var formData = $('#page_create').serializeArray();
                            $.each(formData, function(index, element) {
                                d[element.name] = element.value;
                            });
                        }
                    },
                    columns: [
                        { data: 'checkbox' },
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'date' }
                    ],
                    columnDefs:
                    [{
                        // For Responsive
                        className: 'control',
                        searchable: false,
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0,
                        render: function render(data, type, full, meta) {
                          return "<span>".concat(full.checkbox, "</span>");
                        }
                    },
                    {
                        searchable: false,
                        orderable: false,
                        targets: 1,
                        render: function render(data, type, full, meta) {
                            return "<span>".concat(full.id, "</span>");
                        }
                    },
                    {
                    searchable: false,
                    orderable: false,
                    targets: 2,
                        render: function render(data, type, full, meta) {
                            return "<span>".concat(full.name, "</span>");
                        }
                    },
                    {
                        searchable: false,
                        orderable: false,
                        targets: 3,
                        render: function render(data, type, full, meta) {
                            return "<span>".concat(full.date, "</span>");
                        }
                    }]

            });
        });

        $(document).on('change', '#add_filter_inner .filter_values select', function(event) {
            dt_user = dt_user_table.DataTable({
                    destroy: true,
                    searchable: false,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: baseUrl + 'admin/filter/search',
                        data:function(d) {
                                var formData = $('#page_create').serializeArray();
                                $.each(formData, function(index, element) {
                                    d[element.name] = element.value;
                                });
                            }
                    },
                    columns: [
                        { data: 'checkbox' },
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'date' }
                    ],
                    columnDefs:
                    [{
                        // For Responsive
                        className: 'control',
                        searchable: false,
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0,
                        render: function render(data, type, full, meta) {
                          return "<span>".concat(full.checkbox, "</span>");
                        }
                    },
                    {
                        searchable: false,
                        orderable: false,
                        targets: 1,
                        render: function render(data, type, full, meta) {
                            return "<span>".concat(full.id, "</span>");
                        }
                    },
                    {
                    searchable: false,
                    orderable: false,
                    targets: 2,
                        render: function render(data, type, full, meta) {
                            return "<span>".concat(full.name, "</span>");
                        }
                    },
                    {
                        searchable: false,
                        orderable: false,
                        targets: 3,
                        render: function render(data, type, full, meta) {
                            return "<span>".concat(full.date, "</span>");
                        }
                    }]

            });
        });


      $(document).on('click', '.software_id', function() {
        var checkedValues = [];
        $('.datatables-users tbody input[type="checkbox"]:checked').each(function() {
          checkedValues.push($(this).val());
        });
        $('[name="software_ids"]').val(checkedValues);
      });
    });
</script>
@endsection
