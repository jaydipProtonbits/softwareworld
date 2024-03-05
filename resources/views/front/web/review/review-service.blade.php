@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Service Review')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/front-page-landing.js')}}"></script>
<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
<script src="{{asset('assets/vendor/libs/chartjs/chartjs.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
      // Handle step triggers click event
      $(".step-trigger").on("click", function () {
        // Get the target ID from the data-target attribute
        var targetId = $(this).parent().data("target");
        // Hide all steps
        $(".bs-stepper-content > div").hide();
    
        // Show the selected step
        $(targetId).show();
        $(targetId).addClass('active');
    
        // Update the active class on step triggers
        $(".step").removeClass("active");
        $(this).parent().addClass("active");
      });
    });
    $(document).ready(function(){
    
        /* 1. Visualizing things on Hover - See next part for action on click */
        $('.ease_use li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
       
            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }else {
                    $(this).removeClass('hover');
                }
            });
        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });

        /* 2. Action to perform on click */
        $('.ease_use li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');
            for (i = 0; i < stars.length; i++) {
              $(stars[i]).removeClass('selected');
            }
            for (i = 0; i < onStar; i++) {
              $(stars[i]).addClass('selected');
            }
            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('.ease_use li.selected').last().data('value'), 10);
        });
    
    
    });
    
</script>
@endsection
@section('content')
<div data-bs-spy="scroll" class="scrollspy-example review_software">
    <!-- Heading Title -->
    <section id="page_heading" class="mt-3 single_heading">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Heading Title -->
    <section id="review_form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="m_page_title">Write a Review</h3>
                </div>
            </div>
            <div class="bs-stepper wizard-vertical vertical mt-2 settings_page">
                <div class="bs-stepper-header">
                    <div class="step active" data-target="#account-details-1">
                        <button type="button" class="step-trigger" aria-selected="true">
                        <span class="bs-stepper-circle">
                        <i class="ti ti-user"></i>
                        </span>
                        <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Reviewer Details</span>
                        <span class="bs-stepper-subtitle">Enter Your Information</span>
                        </span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step " data-target="#personal-info-1">
                        <button type="button" class="step-trigger" aria-selected="false">
                        <span class="bs-stepper-circle"><i class="ti ti-device-desktop"></i></span>
                        <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Project Details</span>
                        <span class="bs-stepper-subtitle">Describe Project Details</span>
                        </span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#social-links-1">
                        <button type="button" class="step-trigger" aria-selected="false">
                        <span class="bs-stepper-circle"><i class="ti ti-stars"></i></span>
                        <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Reviews and Rating</span>
                        <span class="bs-stepper-subtitle">Rate and Review It</span>
                        </span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <!-- Email Details -->
                    <div id="account-details-1" class="content active dstepper-block">
                        <div class="content-header mb-3">
                            <h6 class="mb-0 setting_heading">Reviewer Details</h6>
                            <span>Enter Your Information</span>
                        </div>
                        <form method="POST" action="#" enctype="multipart/form-data">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{asset('assets/img/placeholder/avatar.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-secondary btn-blue me-2 mb-3 waves-effect waves-light" tabindex="0">
                                    <span class="d-none d-sm-block upload-btn">Upload new photo</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="profile_pic" class="account-file-input" hidden="">
                                    </label>
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect">
                                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block reset-btn">Reset Photo</span>
                                    </button>
                                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" id="name" name="name" autofocus="" placeholder="Doe" value="Mark J">
                                </div>
                                <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Enter Company name" value="Iliana Waters NPO">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="job_title" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter Job Title" value="dev">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="company_site" class="form-label">Company Website</label>
                                    <input type="text" class="form-control" id="company_site" name="company_site" placeholder="Enter Company Website" value="https://dev.com">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="hi@example.com" placeholder="Enter Email Address" readonly="">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="linkedin_url" class="form-label">LinkedIn Profile URL</label>
                                    <input class="form-control" type="text" id="linkedin_url" name="linkedin_url" placeholder="Enter LinkedIn Profile URL" value="linke.com">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="country_id">Country</label>
                                    <select id="country_id" name="country_id" class="select2 form-select">
                                        <option value="" data-select2-id="0">Choose Country</option>
                                        <option value="1" selected="">Afghanistan</option>
                                        <option value="2" selected="">Aland Islands</option>
                                        <option value="3" selected="">Albania</option>
                                        <option value="4" selected="">Algeria</option>
                                        <option value="5" selected="">American Samoa</option>
                                        <option value="6" selected="">Andorra</option>
                                        <option value="7" selected="">Angola</option>
                                        <option value="8" selected="">Anguilla</option>
                                        <option value="9" selected="">Antarctica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2 text-end">
                                <button type="submit" class="btn btn-secondary btn-blue me-2 waves-effect waves-light upload-btn">Next <i class="ti ti-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Personal Info -->
                    <div id="personal-info-1" class="content ">
                        <div class="content-header mb-3">
                            <h6 class="mb-0 setting_heading">Project  Details</h6>
                            <span>Describe Project Details</span>
                        </div>
                        <form method="post" action="#" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">What was the project name you developed with OpenXcell?</label>
                                        <input type="text" name="project_name" value="" placeholder="Enter project Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">What was the budget of the project?</label>
                                        <select name="project_budget"  class="form-control">
                                            <option value="">Select Project Cost</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Project Industry</label>
                                        <select name="project_industry"  class="form-control">
                                            <option value="">Select Project Industry</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">What services were included within the scope of the project?</label>
                                        <select name="project_Service" class="form-control">
                                            <option value="">Select Service</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Current Project Status</label>
                                        <div class="d-flex justify-content-start gap-5">
                                            <div class="">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="On Going" name="project_status" id="project_status1">
                                                    <label class="form-check-label" for="project_status1">
                                                    On Going
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Completed" name="project_status" id="project_status2">
                                                    <label class="form-check-label" for="project_status2">
                                                    Completed
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn btn-secondary btn-blue btn-next waves-effect waves-light">Next <i class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Social Links -->
                    <div id="social-links-1" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0 setting_heading">Reviews </h6>
                            <span>Rate and Review It</span>
                        </div>
                        <form method="post" action="#" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Enter Your Review Title </label>
                                        <input type="text" name="review_title" class="form-control" placeholder="Enter Your Review Title">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Pros: What did you find most appealing in Freshsales?</label>
                                        <textarea rows="8" name="pros" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Cons: What did you find least appealing in Freshsales?</label>
                                        <textarea rows="8" name="cons" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Share your overall experience with Freshsales</label>
                                        <textarea rows="8" name="overall_experience" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h6 class="rating_title">Ratings</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class='d-flex justify-content-between rating-stars'>
                                                <div class="rating_text">
                                                    <p>Quality</p>
                                                </div>
                                                <ul class='ease_use'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class='d-flex justify-content-between rating-stars'>
                                                <div class="rating_text">
                                                    <p>Cost</p>
                                                </div>
                                                <ul class='ease_use'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class='d-flex justify-content-between rating-stars'>
                                                <div class="rating_text">
                                                    <p>Communication</p>
                                                </div>
                                                <ul class='ease_use'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class='d-flex justify-content-between rating-stars'>
                                                <div class="rating_text">
                                                    <p>Overall Rating</p>
                                                </div>
                                                <ul class='ease_use'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Free trial" name="anonymously_review[]" id="anonymously_review">
                                        <label class="form-check-label" for="anonymously_review">
                                        Post Review Anonymously?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn btn-secondary btn-blue waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection