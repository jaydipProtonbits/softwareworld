@extends('layouts/layoutMaster')
@section('title', 'Listing Type')
@section('content')
  <div class="row listing_type">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <h1 class="listing_title">Grow your business with SoftwareWorld</h1>
            <h1 class="listing_subtitle mb-4">We help people get to know you</h1>
            <div class="box">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <img src="{{asset('assets/img/placeholder/service.png')}}" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h2 class="listing_top_title">Company Listing</h2>
                        <p class="listing_top_sub_t">If you are an entrepreneur looking to gain a notable presence of your business and unlock the potential of your offerings, then it is essential to list your company in this most prestigious listing of companies by GoodFirms.</p>
                        <div class="text-end">
                            <a class="btn btn-primary" href="{{ route('save_type', ['type_id' => 1]) }}">List Company</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <img src="{{asset('assets/img/placeholder/software.png')}}" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h2 class="listing_top_title">Software Listing</h2>
                        <p class="listing_top_sub_t">Reach out to more potential customers. Drive your brand engagement and reputation and get discovered by millions of customers looking to invest in the right product. list your products with GoodFirms, and get them in front of the customers.</p>
                        <div class="text-end">
                            <a class="btn btn-primary" href="{{ route('save_type', ['type_id' => 2]) }}">List Software</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
