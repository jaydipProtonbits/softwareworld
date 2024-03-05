@php
$customizerHidden = 'customizer-hide';
@endphp
@extends('layouts/layoutMaster')
@section('title', 'Reset Password')
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
                    <div class="title-here mb-2">Reset Your Password</div>
                    <div class="mb-4 base-title">Please reset the password.</div>
                    <form class="mb-3" id="formAuthentication" action="{{ route('resetPassword') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password" required>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input id="confirm-password" type="password" class="form-control" name="password_confirmation" placeholder="********"  required>
                            @error('confirm_password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100 sign-up-btn" type="submit">Reset Password</button>
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