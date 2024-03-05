@php
  $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Registration')

@section('vendor-style')
  <!-- Vendor -->
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('page-style')
  <!-- Page -->
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
  <style>
    .cursor-pointer {
      cursor: pointer;
    }

    .selected-col .card.border.rounded {
      border-color: #38b6ff !important;
      background-color: #013870 !important;
    }
    body .type-box {
      background-color: #38b6ff !important;
    }

    body .type-box h3 {
      color : #ffffff !important;
    }
  </style>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/js/pages-auth.js')}}"></script>
  <script>
    // Add click event handling
    $(document).ready(function () {
      $(".col-md-3").click(function () {
        $(".col-md-3").removeClass("selected-col");
        $(this).addClass("selected-col");
        let type_id = $(this).data('id');
        window.location.href = '{{ route('save_type') }}'+'?type_id='+type_id;

        /*$.get('{{-- route('save_type') --}}'+'?type_id='+type_id, function (response) {
          console.log(response);
        });*/

      });
    });
  </script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100 cursor-pointer">
      @foreach($types as $type)
        <div class="col-md-3" data-id="{{ $type->id }}">
          <div class="col-lg mb-md-0">
            <div class="card border rounded p-5 type-box">
              <div class="card-body">
                <h3 class="card-title text-center text-capitalize mb-1">{{ $type->name }}</h3>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
