@php
  $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login or Signup')

@section('vendor-style')
  <!-- Vendor -->
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('page-style')
  <!-- Page -->
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

@section('content')
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Login -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2">
              <a href="{{url('/')}}" class="app-brand-link gap-2">
                <img src="{{asset('assets/img/branding/SoftwareWorld.png')}}">
              </a>
            </div>

            <!-- /Logo -->
            <h4 class=" mb-1">Welcome to {{config('variables.creatorName')}}!</h4>
            <p class="mb-4">You can sign in or sign up using LinkedIn account</p>

            <div class="row">
              <div class="form-group col-md-12">
                <a href="{{ url('/redirect') }}" class="btn btn-primary d-block" id="linkedin-btn">
                  <img src="{{ asset('assets/img/icons/linkedin.svg') }}"> Sign in with LinkedIn</a>
              </div>
            </div>

            <div class="divider my-4">
              <div class="divider-text">or</div>
            </div>

            <p class="text-center new-platform">
                <span>
                  <strong class="black_title">Already have an account ? </strong>
                </span>
              <a href="{{ route('login') }}">
                  <span>
                    <strong class="register">Sign in</strong>
                  </span>
              </a>
            </p>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
@endsection
