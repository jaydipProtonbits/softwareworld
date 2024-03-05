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
    <div class="row justify-content-center align-items-center vh-100 register_conta">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <div class="row me-0">
                        <div class="col-md-6 back_inner">
                            <div class="rg_inner text-center">
                                <div class="rg_wrapper">
                                    <h3 class="rg_title">
                                        Why Submit Your<br>
                                        <span>Software & Services ?</span>
                                    </h3>
                                    <div class="r_points">
                                        <div class="point_item">
                                            <img src="{{asset('assets/img/icons/r_item-1.svg')}}" alt="Lifetime Listing" class="img-fluid rg_i_m_big">
                                            <p>Lifetime Listing</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="{{asset('assets/img/icons/r_item-2.svg')}}" alt="Great Exposure" class="img-fluid">
                                            <p>Great Exposure</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="{{asset('assets/img/icons/r_item-3.svg')}}" alt="Brand Recognition" class="img-fluid">
                                            <p>Brand Recognition</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="{{asset('assets/img/icons/r_item-4.svg')}}" alt="Increase in Prospects" class="img-fluid">
                                            <p>Increase in Prospects</p>
                                        </div>
                                        <div class="point_item">
                                            <img src="{{asset('assets/img/icons/r_item-5.svg')}}" alt="Acquire Potential Customers" class="img-fluid">
                                            <p>Acquire Potential Customers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bg-white">
                            <img src="{{asset('assets/img/branding/latest_logo.png')}}" alt="SoftwareWorld logo" class="d-block img-fluid m-auto">
                            <div class="mb-4 base-title">Vendor can sign up here</div>
                            <form id="formAuthentication" class="mb-3" action="{{ route('vendor_register') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id ?? 0 }}">
                                <input type="hidden" name="claim_token" value="{{ $token ?? null }}">
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
                                    <label for="first_name" class="form-label">First Name {{--<span class="text-danger">*</span>--}}</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" autofocus value="{{ $user ? (explode(' ', $user->name)[0] ?? '') : null }}" required>
                                    @error('first_name')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name {{--<span class="text-danger">*</span>--}}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" autofocus required value="{{ $user ? (explode(' ', $user->name)[1] ?? '') : null }}">
                                    @error('last_name')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Business Email Address {{--<span class="text-danger">*</span>--}}</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Business Email" autofocus required value="{{ $user ? $user->email : null }}" {{ $user ? 'readonly' : null }}>
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password {{--<span class="text-danger">*</span>--}}</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        @error('password')
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="confirm_password">Confirm Password {{--<span class="text-danger">*</span>--}}</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        @error('confirm_password')
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 min_captcha">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.google_recaptcha.recaptcha_site_key') }}"></div>
                                    @error('g-recaptcha-response')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid sign-up-btn w-100" type="submit">Register</button>
                                </div>
                            </form>
                            <p class="text-center new-platform mb-1 mt-4">
                                <span class="black_title">Already have an account?</span>
                                <a href="{{ route('login') }}">
                                    <span>
                                        <strong class="register">
                                            Sign in 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M4.50003 14.25L14.25 4.49997M14.25 4.49997V13.86M14.25 4.49997H4.89004" stroke="#38B6FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </strong>
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