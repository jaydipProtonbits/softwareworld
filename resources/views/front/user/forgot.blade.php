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
  <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/js/pages-auth.js')}}"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
  <div class="container" id="forgot-page">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-4"></div>
      <div class="col-md-4 mx-auto d-flex align-items-center justify-content-center">
          <!-- Login -->
        <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <img src="{{asset('assets/img/branding/latest_logo.png')}}">
            </a>
          </div>

          <div class="title-here mb-2">Forgot Your Password</div>
          <div class="mb-4 base-title">Please enter the email address you’d like your password reset information sent to</div>

          <form class="mb-3" id="formAuthentication" action="{{ route('forgot-email') }}" method="POST">
            @csrf
            <div class="mb-3">
              @if(session('success'))
                <div class="alert alert-success"> {{ session('success') }}</div>
              @endif

              @if(session('error'))
                <div class="alert alert-danger"> {{ session('error') }}</div>
              @endif
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Enter Email Address {{--<span class="text-danger">*</span>--}}</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email" autofocus required value="">
              @error('email')
              <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100 sign-up-btn" type="submit">Request Reset Link</button>
            </div>
          </form>

          <p class="text-center">
            <a href="{{ route('login') }}" class="btl">Back to Login</a>
          </p>
        </div>
      </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
@endsection