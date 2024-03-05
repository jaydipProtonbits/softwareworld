@extends('layouts/layoutMaster')
@section('title', 'Settings')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script>
    $(document).ready(function () {
        $('button.expand-btn').click(function(){
            $(this).parent().parent().find('.hiiden_item').toggle();
            $(this).toggleClass('active');
            if($(this).hasClass('active')){
               $(this).html('Hide Full Review <i class="ti ti-chevron-up"></i>');
            }else {
               $(this).html('Read Full Review <i class="ti ti-chevron-down"></i>');  
            }
        });
    })
</script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="m_page_title">Reviews</h3>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="nav-align-top mb-4" id="review_tabs">
            <ul class="nav nav-pills mb-3 justify-content-center" role="tablist">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#approved" aria-controls="approved" aria-selected="false" tabindex="-1">Approved (2)</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#pending" aria-controls="pending" aria-selected="false" tabindex="-1">Pending (2)</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#rejected" aria-controls="rejected" aria-selected="true">Rejected (2)</button>
                </li>
              </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="approved" role="tabpanel">
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
                                                <img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid d-inline">
                                                <p class="time_leap d-inline">Posted 1 day ago</p>
                                            </div>
                                            <p class="r_role">General Manager</p>
                                            <p class="r_role">Events Services, 51 - 200 Employess</p>
                                        </div>
                                    </div>
                                    <h4>Rating</h4>
                                    <div class="row align-items-center mb-4 pe-4">
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
                                            <h4>Share it on</h4>
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
                                                <img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid d-inline">
                                                <p class="time_leap d-inline">Posted 1 day ago</p>
                                            </div>
                                            <p class="r_role">General Manager</p>
                                            <p class="r_role">Events Services, 51 - 200 Employess</p>
                                        </div>
                                    </div>
                                    <h4>Rating</h4>
                                    <div class="row align-items-center mb-4 pe-4">
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
                                            <h4>Share it on</h4>
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
                <div class="tab-pane fade" id="pending" role="tabpanel">
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
                                                <img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid d-inline">
                                                <p class="time_leap d-inline">Posted 1 day ago</p>
                                            </div>
                                            <p class="r_role">General Manager</p>
                                            <p class="r_role">Events Services, 51 - 200 Employess</p>
                                        </div>
                                    </div>
                                    <h4>Rating</h4>
                                    <div class="row align-items-center mb-4 pe-4">
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
                                            <h4>Share it on</h4>
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
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                    </ul>
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
                                                <img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid d-inline">
                                                <p class="time_leap d-inline">Posted 1 day ago</p>
                                            </div>
                                            <p class="r_role">General Manager</p>
                                            <p class="r_role">Events Services, 51 - 200 Employess</p>
                                        </div>
                                    </div>
                                    <h4>Rating</h4>
                                    <div class="row align-items-center mb-4 pe-4">
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
                                            <h4>Share it on</h4>
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
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="rejected" role="tabpanel">
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
                                                <img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid d-inline">
                                                <p class="time_leap d-inline">Posted 1 day ago</p>
                                            </div>
                                            <p class="r_role">General Manager</p>
                                            <p class="r_role">Events Services, 51 - 200 Employess</p>
                                        </div>
                                    </div>
                                    <h4>Rating</h4>
                                    <div class="row align-items-center mb-4 pe-4">
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
                                            <h4>Share it on</h4>
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
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                    </ul>
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
                                                <img src="{{asset('assets/img/icons/linkedin-web.svg')}}" width="24px" height="24px" class="img-fluid d-inline">
                                                <p class="time_leap d-inline">Posted 1 day ago</p>
                                            </div>
                                            <p class="r_role">General Manager</p>
                                            <p class="r_role">Events Services, 51 - 200 Employess</p>
                                        </div>
                                    </div>
                                    <h4>Rating</h4>
                                    <div class="row align-items-center mb-4 pe-4">
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
                                            <h4>Share it on</h4>
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
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
                                        <li>
                                            <p class="r_ques">What did you find most impressive about Hashthink Technologies Inc</p>
                                            <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </li>
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
@endsection