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
@endsection
@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <div id="app-home">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="top_head">Write a Review</h1>
                        <p class="">Find Company / Software For Reviewing</p>
                    </div>
                    <div class="col-12 mt-lg-4 text-center">
                        <form class="" method="get" action="search" id="searchform_categories">
                            <input type="text" name="q" placeholder="Search by Software / Services">
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
                <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3 s_r_item row-cols-cu-2">
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="" href="javascript:void(0);">
                            <div class="soft_list_item px-4 py-3">
                                <div class="s_img">
                                    <img src="https://placehold.co/72x72/blue/FFFFFF/png?text=Mad" height="72px" width="72px" class="img-fluid mb-2">
                                </div>
                                <div class="s-cont">
                                    <p class="p_tit">Cake Pos</p>
                                    <p class="p_auth">By Mad mobile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Software -->



    </div>
</div>
@endsection