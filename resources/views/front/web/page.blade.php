@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Pages')
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
    <div id="app-home">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="top_head">About Us</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Heading -->

        <!-- Top Software -->
        <section class="mt-0 py-5 bg-white" id="page_content_de">
            <div class="container">
                <div class="row">
                    <div class="main_page_c">
                        <!-- Add Dynamic Content Here -->
                            <h1>What is SoftwareSuggest?</h1>
                            <h2>What is SoftwareSuggest?</h2>
                            <h3>What is SoftwareSuggest?</h3>
                            <h4>What is SoftwareSuggest?</h4>
                            <h5>What is SoftwareSuggest?</h5>
                            <h6>What is SoftwareSuggest?</h6>
                            <h6>What is SoftwareSuggest?</h6>
                            <p><strong>SoftwareSuggest</strong> helps you discover top business software and service partners. We list, review, compare & offer free consultation of business software and service solutions so that you’re guaranteed to find the best match for your business.</p>
                            <a href="{{url('/')}}">{{url('/')}}</a>
                            <ul>
                                <li>Item 1</li>
                                <li>Item 2</li>
                                <li>Item 3</li>
                            </ul>
                        <!-- Add Dynamic Content Here -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Software -->
    </div>
</div>
@endsection