@php
$configData = Helper::appClasses();
$configData['navbarType'] = 'static';
@endphp

@extends('layouts/layoutFront')

@section('title', 'Home Page')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/front-page-landing.js')}}"></script>
@endsection

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
  <!-- Hero: Start -->
  <section id="">
      <h1 class="text-center">Coming Soon</h1>
  </section>
</div>
@endsection
