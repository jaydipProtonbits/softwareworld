@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Your Search')
@section('meta_description', 'Search Result')
@section('meta_keywords', 'Search,Search All, Search '.$search)
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
<style type="text/css">
    .soft_list_item a {
        min-height: 38px;
    }
    .tab-pane img.img-fluid {
        min-height: 70px;
        object-fit: contain;
    }
</style>
@endsection
@section('vendor-script')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#softH_section > div > div > div > div > ul > li > button').trigger('click');
    });
</script>
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
                        @if(!$not_found)
                        <h1 class="top_head">Your Search: <span>{{$search}}</span> returned <span>{{$service->count() + $software->count() + $page->count()}}</span> results</h1>
                        @else
                        <h1 class="top_head">Your Search: <span>{{$search}}</span> returned <span>0</span> results</h1>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Heading -->

        <!-- Top Software -->
        <section class="mt-0 py-5 bg-white" id="softH_section">
            <div class="container">
                <div class="row">
                    @if(!$not_found)
                    <div class="cat_tabs">
                        <div class="nav-align-left mb-4">
                            <ul class="nav nav-pills me-3 col-lg-4" role="tablist">
                                @if($page->count() > 0)
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tab_accounting_software" aria-controls="tab_accounting_software" aria-selected="true">Categories({{$page->count()}})</button>
                                </li>
                                @endif
                                @if($service->count() > 0)
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab_crm_software" aria-controls="tab_crm_software" aria-selected="false" tabindex="-1">Services({{$service->count()}})</button>
                                </li>
                                @endif
                                @if($software->count() > 0)
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab_erp_software" aria-controls="tab_erp_software" aria-selected="false" tabindex="-1">Software({{$software->count()}})</button>
                                </li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                @if($page->count() > 0)
                                <div class="tab-pane fade active show" id="tab_accounting_software" role="tabpanel">
                                    <div class="row row-cols-1 row-cols-lg-1 row-cols-md-1 g-3 g-md-3 gx-lg-3">
                                        @foreach ($page as $pages)
                                        <div class="col cat_pages">
                                            <a class="text-dark" href="{{ $pages->type_id == 1 ? route('front_service_listing', $pages->slug) : route('front_software_listing', $pages->slug) }}" data-type="{{$pages->type_id == 1 ? 'software' : 'services'}}" title="Customer Engagement Software"><span class="enity-tilte">{{$pages->title}}</span></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if($service->count() > 0)
                                <div class="tab-pane fade" id="tab_crm_software" role="tabpanel">
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        @foreach ($service as $services)
                                        <div class="col">
                                            <div class="soft_list_item">
                                                @if($services->logo)
                                                    <img src="{{asset('assets/service/'.$services->logo)}}" width="70px" class="img-fluid mb-2">
                                                @else
                                                    <img src="https://placehold.co/70x70/fdd400/000000/png?text={{ substr($services->name, 0, 1) }}" height="70px" width="70px" class="img-fluid mb-2">
                                                @endif

                                                <a href="{{ route('listing_details', ['service', str_replace(' ', '-', $services->name)]) }}">{{$services->name}}</a>
                                                <div class="soft_list_rating hide_review_only">
                                                    <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if($software->count() > 0)
                                <div class="tab-pane fade" id="tab_erp_software" role="tabpanel">
                                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-3 gx-lg-3">
                                        @foreach ($software as $soft)
                                        <div class="col">
                                            <div class="soft_list_item">
                                                @if($soft->logo)
                                                    <img src="{{asset('assets/company/'.$soft->logo)}}" width="70px" class="img-fluid mb-2">
                                                @else
                                                    <img src="https://placehold.co/70x70/fdd400/000000/png?text={{ substr($soft->name, 0, 1) }}" height="70px" width="70px" class="img-fluid mb-2">
                                                @endif
                                                <a href="{{ route('listing_details', ['software', str_replace(' ', '-', $soft->name)]) }}">{{$soft->name}}</a>
                                                <div class="soft_list_rating hide_review_only">
                                                    <i class="ti ti-star-filled"></i> 5.0 (4 Reviews)
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    @else
                        <div class="col-12 text-center mt-5 mb-5 pt-5 pb-5">
                            <h2>No result found. Please try different keywords</h2>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- Top Software -->
    </div>
</div>
@endsection
