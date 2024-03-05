@php
	$configData = Helper::appClasses();
	if(Route::currentRouteName() != "userLoginsignup"){
		$configData['navbarType'] = 'static';
	}
	$isFront = true;
	$configData['headerType'] = 'static';
@endphp


@section('layoutContent')
@extends('layouts/web/commonFront' )
@include('layouts/sections/navbar/navbar-front')
<!-- Sections:Start -->
@yield('content')
<!-- / Sections:End -->
@include('layouts/sections/footer/footer-front')
@endsection
