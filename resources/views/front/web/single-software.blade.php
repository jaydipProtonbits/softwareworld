@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/web/layoutMaster')

@section('title', 'Single Software Page')

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

        /*review Open Close*/
        $('button.expand-btn').click(function(){
            $(this).parent().parent().find('.hiiden_item').toggle();
            $(this).toggleClass('active');
            if($(this).hasClass('active')){
             $(this).html('Hide Full Review <i class="ti ti-chevron-up"></i>');
         }else {
             $(this).html('Read Full Review <i class="ti ti-chevron-down"></i>');  
         }
     });
        

        // single page tab changes
        jQuery('#inner_menu .menu_items li a').click(function(event) {
            jQuery('#inner_menu .menu_items li a').removeClass('active');
            jQuery(this).addClass('active');
        });
        var data = {
            labels: ["Data1", "Data2", "Data3", "Data4", "Data5"],
            datasets: [{
              data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
              backgroundColor: ['#164F6F','#22719F','#2D94CF','#38B6FF','#60C5FF','#88D3FF','#AFE2FF','#C3E9FF','#D7F0FF','#EBF8FF'],
          }]
        };
        var data2 = {
            labels: ["Data1", "Data2", "Data3"],
            datasets: [{
              data: [25,50,25],
              backgroundColor: ['#164F6F','#22719F','#2D94CF'],
          }]
        };
        

          // Configuration options for the Pie Chart
        var options = {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
              legend: {
                display: false,
                fullSize : true,
                position : 'bottom'
            },

        }

    };

          // Get the context of the canvas element
    var service_focus = document.getElementById('service_focus').getContext('2d');
    var client_focus = document.getElementById('client_focus').getContext('2d');
    var industry_focus = document.getElementById('industry_focus').getContext('2d');

          // Create the Pie Chart
    var myPieChart1 = new Chart(service_focus, {
        type: 'pie',
        data: data,
        options: options
    });
    var myPieChart2 = new Chart(client_focus, {
        type: 'pie',
        data: data2,
        options: options
    });

    var myPieChart3 = new Chart(industry_focus, {
        type: 'pie',
        data: data,
        options: options
    });
    var legendHtml = generateLegend(myPieChart1);
    $('.service_focus_l').html(legendHtml);

    var legendHtml = generateLegend(myPieChart2);
    $('.client_focus_l').html(legendHtml);

    var legendHtml = generateLegend(myPieChart3);
    $('.industry_focus_l').html(legendHtml);

    function generateLegend(chart) {
        var legendItems = chart.legend.legendItems;
        var legendHtml = '<ul>';
        legendItems.forEach(function(item) {
          legendHtml += '<li><span class="bg_legend" style="background-color:' + item.fillStyle + '"></span>';
          legendHtml += '<span class="bg_label">' + item.text + '</span></li>';
      });
        legendHtml += '</ul>';
        return legendHtml;
    }

    $(document).ready(function() {
        var fixedSection = $("#inner_menu");
        var offset = fixedSection.offset().top;
        $(window).scroll(function() {
            if ($(window).scrollTop() > offset) {
                fixedSection.addClass("fixed");
            } else {
                fixedSection.removeClass("fixed");
            }
        });
    });
});
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
                                <li class="list-inline-item"><a href="javascript:void(0)" class="b_link">Home /</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="b_link active">Zoho CRM</a></li>
                            </ul>
                        </div>
                        <div class="card-body mt-3 pb-0 ">
                            <div class="row branding">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="pre_img text-center">Z</div>        
                                        </div>
                                        <div class="col-lg-10">
                                            <h1>Zoho CRM</h1>
                                            <p>IT Outsourcing & Staff Augmentation since 2007</p>
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
                                    <a href="" class="btn btn-primary" id="visit_website" target="_blank">VISIT WEBSITE &nbsp;<i class="ti ti-external-link"></i></a>
                                    <p class="verified_btn"><i class="ti ti-circle-check"></i> Verified Profile</p>
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
                                    <img src="https://placehold.co/48x48/fdd400/000000/png?text=B" height="48px" width="48px" class="img-fluid"> <span>Zoho CRM</span>
                                </li>
                                <li class="list-inline-item"><a href="#overview" class="active">Overview</a></li>
                                <li class="list-inline-item"><a href="#features">Features</a></li>
                                <li class="list-inline-item"><a href="#pricing">Pricing</a></li>
                                <li class="list-inline-item"><a href="#reviews">Reviews</a></li>
                            </ul>
                        </div>
                        <div class="menu_btns">
                            <a href="javascript:void(0)" class="review_link"><i class="ti ti-edit"></i> &nbsp; Write a Review</a>
                            <a href="javascript:void(0)" target="_blank" class="website_link">VISIT WEBSITE &nbsp; <i class="ti ti-external-link"></i></a>

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
                        <h2>About Zoho CRM</h2>
                        <div class="row single_meta mb-md-5">
                            <div class="col-lg-6">
                                <div class="text-justify">
                                    <p>Zoho CRM is a cloud-based business management platform that caters to businesses of all sizes. It offers sales and marketing automation tools with helpdesk, analytics and customz</p>
                                    <p>Zoho CRM helps users respond to customers across channels in real-time. Zia, Zoho CRM's AI-powered sales assistant, can predict an appropriate time to contact customers. It scans emails for urgency and can display relevant statistics or documents when performing searches. Users can integrate with G Suite, WordPress, MailChimp, Evernote, Unbounce and other third-party systems. Zoho CRM's software development kits provide tools to build custom functions to add to the CRM.</p>
                                    <p>Zoho CRM is available on monthly or annual subscriptions and support is extended via phone, emai <a href="javascript:void(0);">Read More</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6 soft_slider">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="swiper-gallery">
                                            <div class="swiper gallery-top">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho1)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho2)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho3)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho4)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho5)"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="swiper gallery-thumbs">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho1)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho2)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho3)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho4)"></div>
                                                    <div class="swiper-slide" style="background-image:url(https://placehold.co/660x400/blue/FFFFFF/png?text=Zoho5)"></div>
                                                </div>
                                                <!-- Add Arrows -->
                                            </div>
                                                <div class="swiper-button-next swiper-button-black"></div>
                                                <div class="swiper-button-prev swiper-button-black"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="soft_details row mt-4 pt-4 border-top">
                            <div class="col-lg-3 mb-4">
                                <h4>Contact Details</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/user-blue-pri.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/calendar-plain-pri.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/location-pri.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/users.svg')}}"> 101 - 500</li>
                                    <li>
                                        <ul class="list-group list-group-horizontal list-inline gap-3">
                                            <li><img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid"></li>
                                            <li><img src="{{asset('assets/img/icons/facebook-web.svg')}}" width="24px" height="24px" class="img-fluid"></li>
                                            <li><img src="{{asset('assets/img/icons/x-web.svg')}}" width="24px" height="24px" class="img-fluid"></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-lg-3 mb-4">
                                <h4>Support</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <h4>Training </h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <h4>Licensing & Deployment</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                        </div>
                        <div class="soft_details row mt-4 pt-4 border-top">
                            <div class="col-lg-3 mb-4">
                                <h4>Typical Customers</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/checkbox.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <h4>Language Supported</h4>
                                <p class="s-fonts">Arabic, Bulgarian, Czech, Danish, German, English, French, Hebrew, Hindi, Croatian, Hungarian, Italian, Japanese, Korean, Dutch, Polish, Portuguese, Russian, Spanish, Swedish, Turkish, Vietnamese, Chinese (Simplified)</p>
                            </div>
                            <div class="col-lg-5 mb-4">
                                <h4>Industries</h4>
                                <p class="s-fonts">Aerospace, Transport, Computer, Telecommunication, Agriculture, Construction, Construction, Pharmaceutical Aerospace, Transport, Computer, Telecommunication, Agriculture, Construction, Construction, Pharmaceutical</p>
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
                        <h2>Features</h2>
                        <h4>CRM Software &nbsp;<a class="c-b" href="javascript:void(0)" target="_blank"><i class="ti ti-external-link"></i></a></h4>
                        <div class="soft_details row mb-5">
                            <div class="col-lg-3">
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Zoho</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 2010</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Toronto, USA</li>
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 101 - 500</li>
                                </ul>
                            </div>
                        </div>
                        <h4 class="border-top mt-4 pt-4">Contact Management Software &nbsp;<a class="c-b" href="javascript:void(0)" target="_blank"><i class="ti ti-external-link"></i></a></h4>
                        <h4 class="border-top mt-4 pt-4">Contact Management Software &nbsp;<a class="c-b" href="javascript:void(0)" target="_blank"><i class="ti ti-external-link"></i></a></h4>
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
                            <div class="col-lg-3">
                                <h4>Pricing Type</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> Contact Vendor</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h4>Preferred Currency</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> USD($)</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h4>Free Trial</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> 30 Days Trial</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h4>Free Version</h4>
                                <ul class="list-group list-inline gap-3">
                                    <li class="s-fonts"><img src="{{asset('assets/img/icons/misc/check-round.svg')}}"> No</li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex gap-2 justify-content-start pt-3 pricing_btn">
                            <a href="javascript:void(0)" class="btn btn-secondary" target="_blank">Pricing Page &nbsp;<i class="ti ti-external-link"></i></a>
                            <a href="javascript:void(0)" class="btn btn-secondary" target="_blank">Trail Page &nbsp;<i class="ti ti-external-link"></i></a>
                            <a href="javascript:void(0)" class="btn btn-secondary" target="_blank">Demo Page &nbsp;<i class="ti ti-external-link"></i></a>
                        </div>

                        <h4 class="border-top mt-4 pt-4">Plans & Packages</h4>
                        
                        <div class="row packages_list row-cols-1 row-cols-lg-4 row-cols-md-2 g-3 g-md-4 gx-lg-5">
                            <div class="col">
                                <div class="pack_list border p-3 text-center pb-0">
                                    <p class="p-2 pt-0 package_title border-bottom">Standard</p>
                                    <p class="package_pack">$29.00 Per Month</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pack_list border p-3 text-center pb-0">
                                    <p class="p-2 pt-0 package_title border-bottom">Premium</p>
                                    <p class="package_pack">$49.00 Per Month</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pack_list border p-3 text-center pb-0">
                                    <p class="p-2 pt-0 package_title border-bottom">Gold</p>
                                    <p class="package_pack">$79.00 Per Month</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pack_list border p-3 text-center pb-0">
                                    <p class="p-2 pt-0 package_title border-bottom">Platinum</p>
                                    <p class="package_pack">$99.00 Per Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing -->

   

   

    <!-- focus -->
    <section id="reviews" class="section_service mb-4">
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
                                        <a href="javascript:void(0);" class="btn btn-secondary" id="add_review">Write a Review</a>
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
                                            <img src="{{asset('assets/img/placeholder/review-man.png')}}" width="100px" height="100px" class="img-fluid rounded-1">
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
                                                <li><img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid"></li>
                                                <li><img src="{{asset('assets/img/icons/facebook-web.svg')}}" width="24px" height="24px" class="img-fluid"></li>
                                                <li><img src="{{asset('assets/img/icons/x-web.svg')}}" width="24px" height="24px" class="img-fluid"></li>
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
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                        <li class="hiiden_item">
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                        <li class="hiiden_item">
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                    </ul>
                                    <div class="text-end">
                                        <button class="expand-btn btn btn-primary">Read Full Review <i class="ti ti-chevron-down"></i></button>
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
