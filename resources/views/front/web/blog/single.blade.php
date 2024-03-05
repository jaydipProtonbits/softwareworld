@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/web/layoutMaster')

@section('title', 'Single Service Page')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/front-page-landing.js')}}"></script>
<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
<script src="{{asset('assets/vendor/libs/chartjs/chartjs.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

    });
</script>
@endsection

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example blog_single">

    <!-- Heading Title -->
    <section id="page_heading" class="mt-3 single_heading blog_single">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pt-3 pb-3">
                            <ul class="list-inline m-0 p-0 m-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="b_link">Home</a> <i class="ti ti-chevron-right"></i></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="b_link">Blog</a> <i class="ti ti-chevron-right"></i></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="b_link active">Single Blog</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Heading Title -->

    <section id="blogs_content" class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog_m_content pt-5 mb-5 ">
                        <h1 class="b_title text-center">Who Uses CRM Systems?</h1>
                        <img src="{{asset('assets/img/placeholder/single-blog.jpg')}}" class="img-fluid mt-3">
                        <div class="s_main_content mt-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="tab_headers">
                                        <p class="text-center">Table of Content</p>
                                        <ul>
                                            <li>
                                                <a href="#title-one">What is the CRM Software?</a>
                                            </li>
                                            <li>
                                                <a href="#title-two">What is the CRM Software?</a>
                                            </li>
                                            <li>
                                                <a href="#title-three">What is the CRM Software?</a>
                                            </li>
                                            <li>
                                                <a href="#title-four">What is the CRM Software?</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9 mt-2 mt-lg-0">
                                    <div class="tab_content_main">
                                        <p>There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. </p>
                                        <p>But what is actually a CRM system? Why do companies need them? What benefits it brings to the companies? Most importantly, How much does CRM software cost? You might have these types of questions in your mind.</p>
                                        <p>Don't worry. We are here to help you.</p>
                                        <p>Continue reading this article, and you will find all the answers you seek. In addition to that, you will find some examples of well-known companies that use CRM solutions.</p>

                                        <h2 class="sp-blog-heading" id="title-one">
                                            What is CRM Software?
                                        </h2>

                                        <p>There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. </p>
                                        <p>But what is actually a CRM system? Why do companies need them? What benefits it brings to the companies? Most importantly, How much does CRM software cost? You might have these types of questions in your mind.</p>
                                        <p>Don't worry. We are here to help you.</p>
                                        <p>Continue reading this article, and you will find all the answers you seek. In addition to that, you will find some examples of well-known companies that use CRM solutions.</p>

                                        <h2 class="sp-blog-heading" id="title-two">
                                            What is CRM Software?
                                        </h2>

                                        <p>There are hundreds and thousands of companies, from SMBs to enterprise-level, who use CRM software. 40,097, to be precise. They are all leveraging CRM systems to take their businesses to new heights. </p>
                                        <p>But what is actually a CRM system? Why do companies need them? What benefits it brings to the companies? Most importantly, How much does CRM software cost? You might have these types of questions in your mind.</p>
                                        <p>Don't worry. We are here to help you.</p>
                                        <p>Continue reading this article, and you will find all the answers you seek. In addition to that, you will find some examples of well-known companies that use CRM solutions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog_auth">
                            <div class="d-flex gap-5 align-items-center">
                                <div class="img">
                                    <img src="{{asset('assets/img/placeholder/blog-auth.png')}}">
                                </div>
                                <div class="auth_details">
                                    <h4>Javonte Berge</h4>
                                    <p>But what is actually a CRM system? Why do companies need them? What benefits it brings to the companies? Most importantly, How much does CRM software cost? You might have these types of questions in your mind.Don’t worry. We are here to help you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <div class="blog_content realted_blogs">
                <h3 class="text-center">Read Similar Blogs</h3>
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-3 g-md-3 gx-lg-3 s_r_item mt-2">
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
    </section>

</div>
@endsection
