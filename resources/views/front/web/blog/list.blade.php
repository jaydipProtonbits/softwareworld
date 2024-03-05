@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Blogs')
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
@endsection
@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <div id="app-home">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="top_head">Blog</h1>
                        <p class="">SoftwareWorld Knowledge Hub</p>
                    </div>
                    <div class="col-12 mt-lg-4 text-center">
                        <form class="" method="get" action="search" id="searchform_categories">
                            <input type="text" name="q" placeholder="Search Blog">
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Heading -->

        <!-- Top Software -->
        <section class="mt-0 py-5 bg-white" id="softH_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_content">
                            <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2 g-3 g-md-3 gx-lg-3 s_r_item">
                                <div class="col">
                                    <div class="blog_item">
                                        <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        <div class="blog_item_content">
                                            <a class="mb-2" href="javascript:void(0);">10 Live Chat Metrics to Track and Improve Customer Satisfaction</a>
                                            <p>Meeting customer needs is a top priority for business leaders. As more and more of us prefer to chat with support agents via live.</p>
                                            <div class="text-end">
                                                <a href="javascript:void(0);" class="btn btn-secondary btn-blue">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="blog_item">
                                        <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        <div class="blog_item_content">
                                            <a class="mb-2" href="javascript:void(0);">10 Live Chat Metrics to Track and Improve Customer Satisfaction</a>
                                            <p>Meeting customer needs is a top priority for business leaders. As more and more of us prefer to chat with support agents via live.</p>
                                            <div class="text-end">
                                                <a href="javascript:void(0);" class="btn btn-secondary btn-blue">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="blog_item">
                                        <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        <div class="blog_item_content">
                                            <a class="mb-2" href="javascript:void(0);">10 Live Chat Metrics to Track and Improve Customer Satisfaction</a>
                                            <p>Meeting customer needs is a top priority for business leaders. As more and more of us prefer to chat with support agents via live.</p>
                                            <div class="text-end">
                                                <a href="javascript:void(0);" class="btn btn-secondary btn-blue">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="blog_item">
                                        <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        <div class="blog_item_content">
                                            <a class="mb-2" href="javascript:void(0);">10 Live Chat Metrics to Track and Improve Customer Satisfaction</a>
                                            <p>Meeting customer needs is a top priority for business leaders. As more and more of us prefer to chat with support agents via live.</p>
                                            <div class="text-end">
                                                <a href="javascript:void(0);" class="btn btn-secondary btn-blue">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_sidebar mt-3">
                            <div class="side_content mb-3">
                                <h5>Join Our Ultimate List</h5>
                                <p>Join Our Ultimate List and stay up-to-date with the latest news, exclusive offers, and insider tips straight to straight your inbox</p>
                                <form id="subscribe-form">
                                    <input type="email" class="form-control" name="email" value="" placeholder="Your Email">
                                    <button class="btn btn-secondary btn-blue w-100 mt-3">Join Now</button>
                                </form>
                            </div>
                            <div class="side_content">
                                <h5>Popular Posts</h5>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub_blog_item mb-3">
                                    <div class="row align-items-start">
                                        <div class="col-3">
                                            <img src="{{asset('assets/img/placeholder/blog.jpg')}}" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <a href="javascript:void(0);">Tips For Boosting Your Computer's Performance</a>
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