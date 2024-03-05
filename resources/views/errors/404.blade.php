@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', '404 Not Found')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
@endsection
@section('vendor-script')
@endsection
@section('page-script')
<script src="{{asset('assets/js/front-page-landing.js')}}"></script>
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <div id="not-found-404">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="top_head">404</h1>
                        <p class="">PAGE NOT FOUND</p>
                        <a class="btn btn-secondary btn-blue bth" href="{{url('/')}}">Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>
@endsection