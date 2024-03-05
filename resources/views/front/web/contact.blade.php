@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Browse Software Categories')
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
                        <h1 class="top_head">Get in Touch, Let's Talk!</h1>
                        <p class="">We're here, ready to listen.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Heading -->

        <!-- Top Software -->
        <section class="mt-0 py-5 bg-white" id="softH_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 pe-lg-0">
                        <div class="cu-inner-blue">
                            <p>Your ideas hold immense potential, and we're eager to hear them. Let's explore the possibilities and address your queries together.</p>
                            <p>Ready to start the conversation? Please fill out our form or reach out directly at <a href="mailto:info@softwareworld.co">info@softwareworld.co</a></p>
                        </div>
                    </div>
                    <div class="col-lg-8 ps-lg-0">
                        <form method="post" id="contactForm" action="">
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Your Full Name</label>
                                        <input type="text" name="name" placeholder="Enter Your Full Name" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Business Email</label>
                                        <input type="email" name="email" placeholder="Enter Your Business Email" class="form-control">
                                    </div> 
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Your Website</label>
                                        <input type="url" name="website" placeholder="Enter Your Website" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Select Organization Type</label>
                                    <div class="d-flex justify-content-start gap-5">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Services" name="type" id="type">
                                                <label class="form-check-label" for="type">
                                                Services
                                                </label>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Software" name="type" id="type">
                                                <label class="form-check-label" for="type">
                                                Software
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Select Request</label>
                                        <select class="form-control" name="request_type">
                                            <option>Select Your Request</option>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Describe your request in detail </label>
                                        <textarea name="message" class="form-control" rows="8"></textarea>
                                    </div> 
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="recaptcha min_captcha">
                                        <div class="g-recaptcha" data-sitekey="{{ config('services.google_recaptcha.recaptcha_site_key') }}"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button class="btn btn-secondary btn-blue ps-5 pe-5 " type="submit">Submit Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Software -->



    </div>
</div>
@endsection