@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Help Center')
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
                        <h1 class="top_head">Help Center</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Heading -->

        <!-- Top Software -->
        <section class="mt-0 py-5 bg-white" id="page_help">
            <div class="container">
                <div class="row">
                    <div class="cat_tabs">
                        <div class="nav-align-left mb-4">
                            <ul class="nav nav-pills me-lg-3 col-lg-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tab_about" aria-controls="tab_about" aria-selected="true">About SoftwareWorld</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab_vendor" aria-controls="tab_vendor" aria-selected="false" tabindex="-1">For Vendor</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab_user" aria-controls="tab_user" aria-selected="false" tabindex="-1">For Users</button>
                                </li>
                            </ul>
                            <div class="tab-content p-0">
                                <div class="tab-pane fade active show" id="tab_about" role="tabpanel">
                                    <div class="col-md">
                                        <div class="accordion accordion-bordered" id="accordionStyle1">
                                          <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-1" aria-expanded="false">
                                                How accounting software helps businesses?
                                              </button>
                                            </h2>
                                            <div id="accordionStyle1-1" class="accordion-collapse collapse show" data-bs-parent="#accordionStyle1">
                                              <div class="accordion-body">
                                                There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-2" aria-expanded="false">
                                                How accounting software helps businesses?
                                              </button>
                                            </h2>
                                            <div id="accordionStyle1-2" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1">
                                              <div class="accordion-body">
                                                There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-3" aria-expanded="false">
                                                How accounting software helps businesses?
                                              </button>
                                            </h2>
                                            <div id="accordionStyle1-3" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1">
                                              <div class="accordion-body">
                                                There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="tab_vendor" role="tabpanel">
                                    <div class="accordion accordion-bordered" id="accordionStyle2">
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionStyle2-1" aria-expanded="false">
                                                How accounting software helps businesses?
                                                </button>
                                            </h2>
                                            <div id="accordionStyle2-1" class="accordion-collapse collapse show" data-bs-parent="#accordionStyle2">
                                                <div class="accordion-body">
                                                    There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle2-2" aria-expanded="false">
                                                How accounting software helps businesses?
                                                </button>
                                            </h2>
                                            <div id="accordionStyle2-2" class="accordion-collapse collapse" data-bs-parent="#accordionStyle2">
                                                <div class="accordion-body">
                                                    There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle2-3" aria-expanded="false">
                                                How accounting software helps businesses?
                                                </button>
                                            </h2>
                                            <div id="accordionStyle2-3" class="accordion-collapse collapse" data-bs-parent="#accordionStyle2">
                                                <div class="accordion-body">
                                                    There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_user" role="tabpanel">
                                    <div class="accordion accordion-bordered" id="accordionStyle3">
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionStyle3-1" aria-expanded="false">
                                                How accounting software helps businesses?
                                                </button>
                                            </h2>
                                            <div id="accordionStyle3-1" class="accordion-collapse collapse show" data-bs-parent="#accordionStyle3">
                                                <div class="accordion-body">
                                                    There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle3-2" aria-expanded="false">
                                                How accounting software helps businesses?
                                                </button>
                                            </h2>
                                            <div id="accordionStyle3-2" class="accordion-collapse collapse" data-bs-parent="#accordionStyle3">
                                                <div class="accordion-body">
                                                    There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle3-3" aria-expanded="false">
                                                How accounting software helps businesses?
                                                </button>
                                            </h2>
                                            <div id="accordionStyle3-3" class="accordion-collapse collapse" data-bs-parent="#accordionStyle3">
                                                <div class="accordion-body">
                                                    There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Software -->
    </div>
</div>
@endsection