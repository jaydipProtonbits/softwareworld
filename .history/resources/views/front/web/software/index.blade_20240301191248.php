@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/web/layoutMaster')

@section('title', $listing->name ?? 'Single Software Page')

@section('meta_title', $listing->name ?? '')
@section('meta_description', $listing->getMeta('short_description') ?? '')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}"/>
@endsection

@section('page-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}"/>
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
    jQuery(document).ready(function ($) {

      /*review Open Close*/
      $('button.expand-btn').click(function () {
        $(this).parent().parent().find('.hiiden_item').toggle();
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
          $(this).html('Hide Full Review <i class="ti ti-chevron-up"></i>');
        } else {
          $(this).html('Read Full Review <i class="ti ti-chevron-down"></i>');
        }
      });


      // single page tab changes
      jQuery('#inner_menu .menu_items li a').click(function (event) {
        jQuery('#inner_menu .menu_items li a').removeClass('active');
        jQuery(this).addClass('active');
      });

      $(document).ready(function () {
        var fixedSection = $("#inner_menu");
        var offset = fixedSection.offset().top;
        $(window).scroll(function () {
          if ($(window).scrollTop() > offset) {
            fixedSection.addClass("fixed");
          } else {
            fixedSection.removeClass("fixed");
          }
        });
      });
    });

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
  </script>
@endsection

@section('content')
  <div data-bs-spy="scroll" class="scrollspy-example service_single">

    <!-- Heading Title -->
    <section id="page_heading" class="mt-3 single_heading">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header pt-3 pb-3">
                <ul class="list-inline m-0 p-0 m-0">
                  <li class="list-inline-item">
                    <a href="javascript:void(0)" class="b_link">Home /</a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void(0)" class="b_link active">
                      {{ $listing->name }}
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body mt-3 pb-0 ">
                <div class="row branding">
                  <div class="col-lg-8">
                    <div class="row mb-1">
                      <div class="col-lg-2">
                          @if($listing->logo)
                            <img src="{{ asset('assets/company/'.$listing->logo) }}" width="auto" height="100px" alt="{{ $listing->name }}">
                          @else
                          <div class="pre_img text-center">
                              {{ substr($listing->name, 0, 1) }}
                          </div>
                          @endif
                      </div>
                      <div class="col-lg-10">
                        <h1>{{ $listing->name }}</h1>
                        <p>{{ $listing->tagline }}</p>
                        <div class="soft_ratings mb-3 mt-2">
                          <ul class="list-group list-group-horizontal list-inline gap-1">
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
                  </div>
                  <div class="col-lg-4 text-end">
                    <a href="{{ $listing->website }}" class="btn btn-primary" id="visit_website" target="_blank">VISIT WEBSITE &nbsp;<i
                        class="ti ti-external-link"></i></a>
                    <p class="verified_btn">
                      @if($listing->claimed_by)
                        <i class="ti ti-circle-check"></i> Verified Profile
                      @else
                        <i class="ti ti-info-circle text-gray"></i> Unclaimed Profile
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Heading Title -->

    <!-- Menu -->
    <section id="inner_menu" class="mt-0 mb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="align-items-baseline d-flex justify-content-between menu_inner">
              <div class="menu_items">
                <ul class="list-inline mb-1">
                  <li class="list-inline-item logo-item">
                    @if($listing->logo)
                      <img src="{{ asset('assets/company/'.$listing->logo) }}" height="48px" width="48px" class="img-fluid" alt="{{ $listing->name }}">
                    @else
                      <img src="https://placehold.co/48x48/fdd400/000000/png?text={{ substr($listing->name, 0, 1) }}" height="48px" width="48px" class="img-fluid">
                    @endif
                    <span>{{ $listing->name }}</span>
                  </li>

                  <li class="list-inline-item"><a href="#overview" class="active">Overview</a></li>
                  <li class="list-inline-item"><a href="#features">Features</a></li>
                  <li class="list-inline-item"><a href="#pricing">Pricing</a></li>
                  <li class="list-inline-item hide_review_only"><a href="#reviews">Reviews</a></li>
                </ul>
              </div>
              <div class="menu_btns">
                <a href="{{ route('front_write_review', ['software', $listing->name]) }}" class="review_link"><i class="ti ti-edit"></i> &nbsp; Write a Review</a>
                <a href="{{ $listing->website }}" target="_blank" class="website_link">VISIT WEBSITE &nbsp;
                  <i class="ti ti-external-link"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Menu -->

    <!-- Overview -->
    <section id="overview" class="section_service mb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="box_inner pb-4">
              <h2>About {{ $listing->name }}</h2>
              <div class="row single_meta mb-md-5">

                <div class="col-lg-{{ $listing->getMeta('screenshots') ?? false && !empty($listing->getMeta('screenshots')) ? '6' : '12' }}">
                  <div class="text-justify">
                    {!! nl2br($listing->getMeta('long_description')) ?? '' !!}
                    {{--{{ substr($listing->getMeta('short_description'), 0, 500) ?? null }}
                    @if(strlen($listing->getMeta('short_description') ?? null) > 500)
                      <a href="javascript:void(0);" id="read_more" onclick="readMore()">Read More</a>
                      <span id="more" style="display:none;">{!! substr($listing->getMeta('short_description'), 500) !!}</span>
                    @endif--}}
                  </div>
                </div>

                @if($listing->getMeta('screenshots') ?? false && !empty($listing->getMeta('screenshots')))
                  <div class="col-lg-6 soft_slider">
                    <div class="card">
                      <div class="card-body">
                        <div id="swiper-gallery">
                          <div class="swiper gallery-top">
                            <div class="swiper-wrapper">
                              @foreach($listing->getMeta('screenshots') ?? [] as $media)
                                <div class="swiper-slide" style="background-image:url({{ asset('assets/software/media/'.$media) }})"></div>
                              @endforeach
                            </div>
                          </div>
                          <div class="swiper gallery-thumbs">
                            <div class="swiper-wrapper">
                              @foreach($listing->getMeta('screenshots') ?? [] as $media)
                                <div class="swiper-slide" style="background-image:url({{ asset('assets/software/media/'.$media) }})"></div>
                              @endforeach
                            </div>
                            <!-- Add Arrows -->
                          </div>
                          <div class="swiper-button-next swiper-button-black"></div>
                          <div class="swiper-button-prev swiper-button-black"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>

              <div class="soft_details row mt-4 pt-4 border-top">
                <div class="col-lg-3 mb-4">
                  <h4>Contact Details</h4>
                  <ul class="list-group list-inline gap-3">
                    <li class="s-fonts">
                      <img src="{{asset('assets/img/icons/misc/user-blue-pri.svg')}}"> {{ $listing->name }}
                    </li>
                    <li class="s-fonts">
                      <img src="{{asset('assets/img/icons/misc/calendar-plain-pri.svg')}}"> {{ $listing->getMeta('year_founded') }}
                    </li>
                    <li class="s-fonts">
                      <img src="{{asset('assets/img/icons/misc/location-pri.svg')}}">
                      @foreach ($countries as $data)
                        {{ $data->id == $listing->getMeta('country') ? $data->name : '' }}
                      @endforeach
                    </li>
                    <li class="s-fonts">
                      <img src="{{asset('assets/img/icons/misc/users.svg')}}">
                      @foreach (companySize() as $data)
                      @if (!empty($data))
                        {{ $data == $listing->getMeta('target_company_size') ? $data : '' }}
                      @endif
                      @endforeach
                    </li>
                    <li>
                      <ul class="list-group list-group-horizontal list-inline gap-3">
                        @foreach (socialMedia() as $value)
                          @if($listing->getMeta('social_profile')[$value] ?? false)
                            <li>
                              <a href="{{ $listing->getMeta('social_profile')[$value] }}">
                                @if(strtolower($value) == 'linkedin')
                                  <img src="{{asset('assets/img/icons/'.strtolower($value).'-web.svg')}}" width="24px" height="24px" class="img-fluid">
                                @elseif($value != 'Twitter')
                                  <img src="{{asset('assets/img/icons/'.lcfirst($value).'-web.svg')}}" width="24px" height="24px" class="img-fluid">
                                @else
                                  <img src="{{asset('assets/img/icons/x-web.svg')}}" width="24px" height="24px"
                                       class="img-fluid">
                                @endif
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-3 mb-4">
                  <h4>Support</h4>
                  <ul class="list-group list-inline gap-3">
                    @if($listing->getMeta('customer_support') ?? false)
                      @foreach($listing->getMeta('customer_support') ?? [] as $support)
                        <li class="s-fonts">
                          <img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{ $support }}
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
                <div class="col-lg-3 mb-4">
                  <h4>Training </h4>
                  <ul class="list-group list-inline gap-3">
                    @if($listing->getMeta('provide_training') ?? false)
                      @foreach($listing->getMeta('provide_training') ?? [] as $training)
                        <li class="s-fonts">
                          <img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{ $training }}
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
                <div class="col-lg-3 mb-4">
                  <h4>Licensing & Deployment</h4>
                  <ul class="list-group list-inline gap-3">
                    @if($listing->getMeta('licensing_model') ?? false)
                      <li class="s-fonts">
                        <img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{ $listing->getMeta('licensing_model') }}
                      </li>
                    @endif
                    @if($listing->getMeta('software_development_type') ?? false)
                      @foreach($listing->getMeta('software_development_type') ?? [] as $development_type)
                        <li class="s-fonts">
                          <img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{ $development_type }}
                        </li>
                      @endforeach
                    @endif
                    @foreach (deviceSupported() as $value)
                      @if(in_array($value,$listing->getMeta('device_supported') ?? []))
                          <li class="s-fonts">
                            @if (!in_array($value, ['Windows','Mac','Linux']))
                              <img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{ $value }}
                              @if($listing->getMeta('device_supported_url')[$value] ?? false)
                                <a href="{{$listing->getMeta('device_supported_url')[$value] ?? ''}}" target="_blank"><i class="ti ti-external-link"></i></a>
                              @endif
                            @else
                              <img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{ $value }}
                            @endif
                          </li>
                      @endif
                      @endforeach
                  </ul>
                </div>
              </div>
              <div class="soft_details row mt-4 pt-4 border-top">
                <div class="col-lg-3 mb-4">
                  <h4>Typical Customers</h4>
                  <ul class="list-group list-inline gap-3">
                    @foreach(targetCompanySize() as $key => $value)
                      @if(in_array($value,$listing->getMeta('company_size')??[]))
                        <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> {{$value}}</li>
                      @endif
                    @endforeach
                  </ul>
                </div>
                <div class="col-lg-4 mb-4">
                  <h4>Language Supported</h4>
                  <p class="s-fonts">
                    @foreach (languagesSupported() as $key => $value)
                      @if(in_array($key, $listing->getMeta('languages_supported', [])))
                          {{ $value }}
                      @endif
                    @endforeach
                  </p>
                </div>
                <div class="col-lg-5 mb-4">
                  <h4>Industries</h4>
                  <p class="s-fonts">
                    @if(!empty($getIndustry = getIndustry($listing->getMeta('target_industry', []))))
                        {{implode(', ', $getIndustry->toArray())}}
                    @endif
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Overview -->

    <!-- Features -->
    <section id="features" class="section_service mb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="box_inner pb-4">
              <h2 class="border-0">Features</h2>
              <div class="accordion accordion-bordered pointer-event" id="accordionStyle1">
              @if(!empty($allCat = getCategory($listing->categories)))
                @foreach ($allCat as $key => $value)
                @php
                    $feature = $value->feature;
                    $CatUrl = !empty($listing->getMeta('features_cat_page_url')[$value->id]) ? $listing->getMeta('features_cat_page_url')[$value->id] : '';
                @endphp
                @if(!empty($listing->getMeta('features')[$value->id]))

                    <div class="accordion-item card mb-2">
                        <h2 class="accordion-header p-0 m-0 accordion-button cursor-pointer" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-{{$key}}" aria-expanded="false">
                            {{ $value->name }}
                            @if(!empty($CatUrl))
                            &nbsp;<a class="c-b" href="{{getPageUrl($CatUrl)}}" target="_blank"><i class="ti ti-external-link"></i></a>
                            @endif
                        </h2>
                        <div id="accordionStyle1-{{$key}}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : ''}}" data-bs-parent="#accordionStyle1">
                            <div class="accordion-body">
                                <div class="soft_details row mb-5">
                                  <ul class="g-3 row list-inline">
                                    @foreach ($feature as $feat)
                                      @if( !empty($listing->getMeta('features')[$value->id]) && in_array($feat->id, $listing->getMeta('features')[$value->id]))
                                        <li class="s-fonts col-md-4 col-sm-6 col-12 col-lg-3">
                                          <img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> {{ $feat->name }}
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                            </div>
                        </div>

                </div>





                @endif
                @endforeach
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features -->

    <!-- Pricing -->
    <section id="pricing" class="section_service mb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="box_inner pb-4">
              <h2>Pricing</h2>
              <div class="soft_details row mb-5">
                @if(!empty($listing->getMeta('pricing_type')))
                <div class="col-lg-3">
                  <h4>Pricing Type</h4>
                  <ul class="list-group list-inline gap-3">
                    <li class="s-fonts">
                      <img src="{{asset('assets/img/icons/misc/check-round.svg')}}">
                      @foreach (pricingType() as $key => $value)
                        @if($key == $listing->getMeta('pricing_type'))
                          {{ $value }}
                        @endif
                      @endforeach
                    </li>
                  </ul>
                </div>
                @endif
                @if(!empty($listing->getMeta('pricing_currency')))
                <div class="col-lg-3">
                  <h4>Preferred Currency</h4>
                  <ul class="list-group list-inline gap-3">
                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}">
                      @foreach (pricingCurrency() as $key => $value)
                        @if($key == $listing->getMeta('pricing_currency'))
                          {{ $value }}
                        @endif
                      @endforeach
                    </li>
                  </ul>
                </div>
                @endif
                @if(!empty($listing->getMeta('trail_duration')))
                <div class="col-lg-3">
                  <h4>Free Trial</h4>
                  <ul class="list-group list-inline gap-3">
                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}">
                      @foreach (pricingTrail() as $key => $value)
                        @if($key == $listing->getMeta('trail_duration'))
                          {{ $value }}
                        @endif
                      @endforeach
                    </li>
                  </ul>
                </div>
                @endif
                @if(!empty($listing->getMeta('is_free_version')))
                <div class="col-lg-3">
                  <h4>Free Version</h4>
                  <ul class="list-group list-inline gap-3">
                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}">
                      @if($listing->getMeta('is_free_version'))
                        Yes
                      @else
                        No
                      @endif
                    </li>
                  </ul>
                </div>
                @endif
              </div>

              <div class="d-flex gap-2 justify-content-start pt-3 pricing_btn">
                @if(!empty($listing->getMeta('pricing_url')))
                <a href="{{$listing->getMeta('pricing_url')}}" class="btn btn-secondary" target="_blank">Pricing Page &nbsp;<i
                    class="ti ti-external-link"></i></a>
                @endif
                @if(!empty($listing->getMeta('trail_url')))
                <a href="{{$listing->getMeta('trail_url')}}" class="btn btn-secondary" target="_blank">Trail Page &nbsp;<i
                    class="ti ti-external-link"></i></a>
                @endif
                @if(!empty($listing->getMeta('demo_url')))
                <a href="{{$listing->getMeta('demo_url')}}" class="btn btn-secondary" target="_blank">Demo Page &nbsp;<i
                    class="ti ti-external-link"></i></a>
                @endif
              </div>

              <h4 class="border-top mt-4 pt-4">Plans & Packages</h4>
              @if ($listing->getMeta('is_price_plan') == 1)
                @php $packages = $listing->getMeta('package') @endphp
                @if (!empty($packages))
                  <div class="row packages_list row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-4 gx-lg-5">
                    @foreach ($packages as $key => $package)
                      @if(!empty($package['name']))
                        <div class="col">
                          <div class="pack_list border p-3 text-center pb-0">
                            <p class="p-2 pt-0 package_title border-bottom">{{ $package['name'] }}</p>
                            <p class="package_pack">
                              {{ $package['price'] ?? 0 }}
                              @switch($package['units'])
                                @case('one') One-time @break
                                @case('year') Per Year @break
                                @case('month') Per Month @break
                                @case('day') Per Day @break
                                @case('hour') Per Hour @break
                                @case('user') Per User @break
                                @case('feautre') Per Feature @break
                                @default Per Plan
                              @endswitch
                            </p>
                          </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                @endif
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Pricing -->

    <!-- focus -->
    <section id="reviews" class="section_service hide_review_only mb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="box_inner pb-4">
              <h2>Zoho CRM Reviews</h2>
              <div class="review_sort mb-4">
                <div class="row">
                  <div class="align-items-center review_top_row row">
                    <div class="col-lg-3">
                      <div class="align-items-center d-flex gap-2">
                        <label>Services: </label>
                        <select class="form-control">
                          <option value="">All Services</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="align-items-center d-flex gap-2">
                        <label>Sort By:</label>
                        <select id="ss_sort_review" class="form-control">
                          <option value="">Relevance</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-start">
                        <li><i class="ti ti-star-filled"></i></li>
                        <li><i class="ti ti-star-filled"></i></li>
                        <li><i class="ti ti-star-filled"></i></li>
                        <li><i class="ti ti-star"></i></li>
                        <li><i class="ti ti-star"></i></li>
                        <li class="r_count">3.0</li>
                        <li class="r_link"><a href="javascript:void(0);">19 Reviews</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-2">
                      <a href="{{ route('front_write_review', ['software', $listing->name]) }}" class="btn btn-secondary" id="add_review">Write a Review</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-4 review_card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-5 col-xs-12 col-sm-12 border-end">
                      <div class="row mb-4">
                        <div class="col-sm-2">
                          <img src="{{asset('assets/img/placeholder/review-man.png')}}" width="100px" height="100px"
                               class="img-fluid rounded-1">
                        </div>
                        <div class="col-sm-10">
                          <div class="name_details mb-2">
                            <h3 class="d-inline">Ross E</h3>
                            <p class="time_leap d-inline">Posted 1 day ago</p>
                          </div>
                          <p class="r_role">General Manager</p>
                          <p class="r_role">Events Services, 51 - 200 Employess</p>
                        </div>
                      </div>
                      <h4>Rating</h4>
                      <div class="row o-rating align-items-center mb-4 pe-4">
                        <div class="col-sm-6">
                          <p class="m-0">Overall Rating</p>
                        </div>
                        <div class="col-sm-6 text-end">
                          <div class="soft_ratings mb-3 mt-2">
                            <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li class="r_count">3.0</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <p class="m-0">Quality </p>
                        </div>
                        <div class="col-sm-6 text-end">
                          <div class="soft_ratings mb-3 mt-2">
                            <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li class="r_count">3.0</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <p class="m-0">Communication</p>
                        </div>
                        <div class="col-sm-6 text-end">
                          <div class="soft_ratings mb-3 mt-2">
                            <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li class="r_count">3.0</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <p class="m-0">Cost</p>
                        </div>
                        <div class="col-sm-6 text-end">
                          <div class="soft_ratings mb-3 mt-2">
                            <ul class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star-filled"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li><i class="ti ti-star"></i></li>
                              <li class="r_count">3.0</li>
                            </ul>
                          </div>
                        </div>


                      </div>
                      <div class="row pro_details border-top me-0">
                        <div class="col-md-8 border-end pt-3 pb-2">
                          <h4>Project Details</h4>
                          <p>Project Cost :- <span>$100000 to $500000</span></p>
                          <p>Project Status :- <span>On Going</span></p>
                        </div>
                        <div class="col-md-4 text-center pt-3">
                          <h4 class="text-center">Share it on</h4>
                          <ul class="list-group list-group-horizontal list-inline gap-3 justify-content-center">
                            <li><img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px"
                                     class="img-fluid"></li>
                            <li><img src="{{asset('assets/img/icons/facebook-web.svg')}}" width="24px" height="24px"
                                     class="img-fluid"></li>
                            <li><img src="{{asset('assets/img/icons/x-web.svg')}}" width="24px" height="24px"
                                     class="img-fluid"></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-7 col-xs-12 col-sm-12 r_content">
                      <h2>“Zoho CRM is one of the best products”</h2>
                      <ul>
                        <li>
                          <p class="r_ques">What was the project name that you have worked with OpenXcell?</p>
                          <p class="r_ans">Goodfirms</p>
                        </li>
                        <li>
                          <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                          <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.</p>
                        </li>
                        <li class="hiiden_item">
                          <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                          <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.</p>
                        </li>
                        <li class="hiiden_item">
                          <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                          <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.</p>
                        </li>
                      </ul>
                      <div class="text-end">
                        <button class="expand-btn btn btn-primary">Read Full Review <i class="ti ti-chevron-down"></i>
                        </button>
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
    <!-- focus -->

  </div>
@endsection
