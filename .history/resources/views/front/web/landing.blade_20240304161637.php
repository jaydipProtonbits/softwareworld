@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/web/layoutMaster')
@section('title', $page->title)

@section('meta_title', $page->meta_title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keyword ? implode(',', json_decode($page->meta_keyword ?? '', true)) : null)

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/nouislider/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>
    <!-- JavaScript Code -->
    <script>
        function readMore() {
            var moreText = document.getElementById("more");
            var readMoreButton = document.getElementById("read_more");

            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                readMoreButton.style.display = "none";
            } else {
                moreText.style.display = "none";
            }
        }

        function readMoreAbout(id) {
            var _moreText = document.getElementById("more-about-" + id);
            var _readMoreButton = document.getElementById("read-more-about-" + id);

            if (_moreText.style.display === "none") {
                _moreText.style.display = "inline";
                _readMoreButton.style.display = "none";
            } else {
                _moreText.style.display = "none";
            }
        }
    </script>
@endsection

@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">

        <!-- Heading Title -->
        <section id="page_heading" class="mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-3 pb-3">
                                <ul class="list-inline m-0 p-0 m-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="b_link">Home /</a></li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="b_link active">
                                            {{ $page->title ?? null }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body mt-3 pb-0">
                                <h1>{{ $page->heading_one ?? null }}</h1>
                                @php
                                    $description = $page->description;
                                @endphp

                                <div>
                                    {!! substr($description, 0, 500) ?? null !!}
                                    @if (strlen($description) > 500)
                                        <a href="javascript:void(0);" id="read_more" onclick="readMore()">Show More <i
                                                class="fa-solid fa-chevron-down"></i></a>
                                        <div id="more" style="display:none;">
                                            {!! substr($description, 0) ?? null !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="goto_btn mt-3">
                                    <a href="javascript:void(0)" class="btn btn-primary ms-0"><img
                                            src="{{ asset('assets/img/icons/misc/code.svg') }}"> All Software</a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-grey"><img
                                            src="{{ asset('assets/img/icons/misc/Path.svg') }}"> Buyer’s Guide</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Heading Title -->
        <!-- Filter -->
        <section id="filter_bar" class="mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sort_by" class="">Sort By :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Sort By</option>
                                <option value="Most Reviewed">Most Reviewed</option>
                                <option value="Highest Rate">Highest Rate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-none">
                        <div class="form-group">
                            <label for="sort_by" class="">Pricing Model :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Pricing Model</option>
                                <option value="Free">Free</option>
                                <option value="Monthly Payment">Monthly Payment</option>
                                <option value="Annual Subscription">Annual Subscription</option>
                                <option value="Quote Based">Quote Based</option>
                                <option value="One-Time Payment">One-Time Payment</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-none">
                        <div class="form-group">
                            <label for="sort_by" class="">Devices Supported :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Devices Supported :</option>
                                <option value="Web-based">Web-based</option>
                                <option value="iPhone/iPad">iPhone/iPad</option>
                                <option value="Android">Android</option>
                                <option value="Windows">Windows</option>
                                <option value="Mac">Mac</option>
                                <option value="Linux">Linux</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-none">
                        <div class="form-group">
                            <label for="sort_by" class="">Deployment :</label>
                            <select class="form-select-sm" name="sort_by" id="sort_by">
                                <option value="">Select Deployment :</option>
                                <option value="Cloud Hosted">Cloud Hosted</option>
                                <option value="On Premises">On Premises</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <a href="javascript:void(0);" class="filter_btn btn btn-outline-light">Filter</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Filter -->

        <!-- Listings -->
        <section id="listing_sec" class="mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>{{ $page->heading_two ?? null }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="list_wapper">
                            @forelse($listing ?? [] as $list)
                                <div class="list_single_item mb-4 card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 border-bottom border-end">
                                                <div class="branding text-center">
                                                    {{-- If no logo then print first character of the name  --}}
                                                    <a style="color: #000"
                                                        href="{{ route('listing_details', [$page->type_id == 1 ? 'service' : 'software', str_replace(' ', '-', $list->name)]) }}">

                                                        @if ($list->logo)
                                                            <img src="{{ $page->type_id == 1 ? asset('assets/service/' . $list->logo) : asset('assets/company/' . $list->logo) }}"
                                                                class="listing-logo" alt="{{ $list->name }}">
                                                        @else
                                                            <div class="pre_img">
                                                                {{ substr($list->name, 0, 1) }}
                                                            </div>
                                                        @endif

                                                        <h3 class="mb-1 mt-1">
                                                            {{ $list->name }}
                                                        </h3>
                                                    </a>

                                                    <p class="text-center">{{ $list->tagline }}</p>
                                                    <div class="soft_ratings mb-3 mt-2 hide_review_only">
                                                        <ul
                                                            class="list-group list-group-horizontal list-inline gap-1 justify-content-center">
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star-filled"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li><i class="ti ti-star"></i></li>
                                                            <li class="r_count">3.0 <a href="javascript:void(0);">4
                                                                    Reviews</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 border-bottom">
                                                <p class="list_desc">
                                                    {!! nl2br($list->truncatedLongDescription, 0, 100) ?? null !!}
                                                    <a href="{{ route('listing_details', [$page->type_id == 1 ? 'service' : 'software', str_replace(' ', '-', $list->name)]) }}"
                                                        id="read-more-about-{{ $list->id }}">Read More</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12 border-end">
                                                {{-- <div class="compare_list text-center mt-3">
                                      <input type="checkbox" name="add_to_compare" value=":id">
                                      <p class="text-center">Add To Compare</p>
                                    </div> --}}
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-sm-12">
                                                <div class="row item_metas">
                                                    <div
                                                        class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                        <img
                                                            src="{{ asset('assets/img/icons/misc/calendar-clock.svg') }}">
                                                        @foreach (pricingTrail() as $key => $value)
                                                            <p>
                                                                {{ $key == ($list->getMeta('trail_duration') ?? false) ? $value : '' }}
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                    @php $packages = $list->getMeta('package') ?? []; @endphp
                                                    @if (!empty($packages))
                                                        <div
                                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                            <img src="{{ asset('assets/img/icons/misc/dollar.svg') }}">
                                                            @foreach ($packages as $key => $package)
                                                                @if ($loop->first)
                                                                    <p>
                                                                        {{ $package['price'] }} / {{ $package['units'] }}
                                                                        /
                                                                        @foreach (pricingType() as $key => $value)
                                                                            {{ $key == ($list->getMeta('pricing_type') ?? 0) ? $value : '' }}
                                                                        @endforeach
                                                                    </p>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                        <img src="{{ asset('assets/img/icons/misc/map-pin.svg') }}">
                                                        <p>
                                                            @foreach ($countries as $data)
                                                                {{ $data->id == ($list->getMeta('country') ?? 0) ? $data->name : '' }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center">
                                                        <a href="{{ $list->website }}" class="btn btn-primary">VISIT
                                                            WEBSITE <i class="ti ti-external-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No listing found!</p>
                            @endforelse


                            {{ $listing->links('pagination::bootstrap-4') }}

                            {{-- <div class="list_single_item mb-4 card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 border-bottom border-end">
                                            <div class="branding text-center">
                                                <div class="pre_img">B</div>
                                                <h3 class="mb-1 mt-1">Banana Accounting</h3>
                                                <p class="text-center">Simple and Fast Accounting Software</p>
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-center">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0 <a href="javascript:void(0);">4 Reviews</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 border-bottom">
                                            <p class="list_desc">WebTitan is a DNS based web content filter and a cybersecurity software that blocks malware, ransomware, phishing and provides complete control over the web for businesses, educational institutions, and public WIFI providers. With top features like AI/Machine learning, behavioral analytics, IOC verification, vulnerability scanning, granular policy control, comprehensive reporting, incident management, etc., this solution provides advanced web content filtering with the capability to prevent access to <a href="javascript:void(0)">Read More About</a></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-sm-12 border-end">
                                            <div class="compare_list text-center mt-3">
                                                <input type="checkbox" name="add_to_compare" value=":id">
                                                <p class="text-center">Add To Compare</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12">
                                            <div class="row item_metas">
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                    <img src="{{asset('assets/img/icons/misc/calendar-clock.svg')}}">
                                                    <p>30 Days</p>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                    <img src="{{asset('assets/img/icons/misc/dollar.svg')}}">
                                                    <p>$20.00/mo/user</p>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                    <img src="{{asset('assets/img/icons/misc/map-pin.svg')}}">
                                                    <p>United States</p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center">
                                                    <a href="" class="btn btn-primary">VISIT WEBSITE <i class="ti ti-external-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list_single_item mb-4 card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 border-bottom border-end">
                                            <div class="branding text-center">
                                                <div class="pre_img">B</div>
                                                <h3 class="mb-1 mt-1">Banana Accounting</h3>
                                                <p class="text-center">Simple and Fast Accounting Software</p>
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-center">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0 <a href="javascript:void(0);">4 Reviews</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 border-bottom">
                                            <p class="list_desc">WebTitan is a DNS based web content filter and a cybersecurity software that blocks malware, ransomware, phishing and provides complete control over the web for businesses, educational institutions, and public WIFI providers. With top features like AI/Machine learning, behavioral analytics, IOC verification, vulnerability scanning, granular policy control, comprehensive reporting, incident management, etc., this solution provides advanced web content filtering with the capability to prevent access to <a href="javascript:void(0)">Read More About</a></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-sm-12 border-end">
                                            <div class="compare_list text-center mt-3">
                                                <input type="checkbox" name="add_to_compare" value=":id">
                                                <p class="text-center">Add To Compare</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12">
                                            <div class="row item_metas">
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                    <img src="{{asset('assets/img/icons/misc/calendar-clock.svg')}}">
                                                    <p>30 Days</p>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                    <img src="{{asset('assets/img/icons/misc/dollar.svg')}}">
                                                    <p>$20.00/mo/user</p>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 border-end text-center">
                                                    <img src="{{asset('assets/img/icons/misc/map-pin.svg')}}">
                                                    <p>United States</p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center">
                                                    <a href="" class="btn btn-primary">VISIT WEBSITE <i class="ti ti-external-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Listings -->

    </div>
@endsection
