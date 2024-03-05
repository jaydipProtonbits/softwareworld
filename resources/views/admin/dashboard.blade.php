@extends('layouts/layoutMaster')
@section('title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-12">
    <h3>Dashboard</h3>
  </div>
</div>
<div class="row">
    <div class="col-lg-4 ">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Software Listings</h5>
                <a href="{{ route('listing.index') }}" class="btn btn-primary waves-effect waves-light">View Listings</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1">{{ $listing }}</h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Service Listings</h5>
                <a href="{{ route('service.index') }}" class="btn btn-primary waves-effect waves-light">View Service</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1">{{ $service_listing ?? 0 }}</h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 ">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Categories</h5>
                <a href="{{route('category.index')}}" class="btn btn-primary waves-effect waves-light">View Category</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1">{{ $category }}</h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Industries</h5>
                <a href="{{route('industries.index')}}" class="btn btn-primary waves-effect waves-light">View Industries</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1">{{$industries}}</h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 ">
        <div class="card">
          <div class="d-flex align-items-center row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-4">Total Feature</h5>
                <a href="{{route('features.index')}}" class="btn btn-primary waves-effect waves-light">View Feature</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="">
                <h1 class="text-primary mb-1">{{$feature}}</h1>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
@endsection
