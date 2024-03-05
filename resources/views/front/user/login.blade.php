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
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
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
<div class="container" id="login-page">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <div class="row me-0">
                        <div class="col-md-6 back_inner">
                            <div class="login_inner text-center">
                                <div>
                                    <img src="{{asset('assets/img/branding/nav_logo.svg')}}" alt="SoftwareWorld Login" class="img-fluid white_logo">
                                    <div class="mt-5">
                                        <h5>For Reviewer</h5>
                                        <p>Want To Review a Software Or Service?</p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <a href="{{ url('/redirect') }}" class="btn btn-primary" id="linkedin-login">
                                          <img src="{{ asset('assets/img/icons/linkedin-web.svg') }}"> Sign in with LinkedIn
                                      </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="title-here mb-2">Welcome to SoftwareWorld! 👋</div>
                            <div class="mb-4 base-title">Vendor can sign in here</div>
                            <form id="formAuthentication" class="mb-3" action="{{ route('vendor_login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                    @endif
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        <strong>{{ session('error') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-password-toggle clearfix">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" aria-describedby="password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <a href="{{route('forgot-password')}}" class="f-password float-end">Forgot Password?</a>
                                </div>
                                <div class="mb-3 recaptcha min_captcha">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.google_recaptcha.recaptcha_site_key') }}"></div>
                                    @error('g-recaptcha-response')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 m-1">
                                    <button class="btn btn-primary d-grid w-100 sign-up-btn" type="submit">Sign in</button>
                                </div>
                            </form>
                            <p class="text-center new-platform mb-1 mt-4">
                                <span class="black_title">New Vendor on our platform?</span>
                                <a href="{{ route('auth-register-basic') }}">
                                <span>
                                <strong class="register">Register <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M4.50003 14.25L14.25 4.49997M14.25 4.49997V13.86M14.25 4.49997H4.89004" stroke="#38B6FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></strong>
                                </span>
                                </a>
                            </p>
                            <p class="terms">
                                By signing in aggrege to our <a href="javascript:void(0)" class="primary-color">Terms of Use</a> and <a href="javascript:void(0)" class="primary-color">Privacy Policy</a>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection