@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/layoutFront')
@section('title', 'Dashboard')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <section id="ChangePassword" class="common-sec change-password">
        <div class="container">
            <div class="backend-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        @include('front.sections.dashboard-sidebar')
                    </div>
                    <div class="col-md-6">
                        Main Content
                    </div>
                    <div class="col-md-3">
                        Right Sidebar
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
