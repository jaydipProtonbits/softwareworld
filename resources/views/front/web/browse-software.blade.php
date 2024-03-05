@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Browse Software Categories')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
@endsection
@section('vendor-script')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on("keyup",'.hunt',function(){
            let val = $(this).val().toLowerCase();
            $('#cate_list .tab-content').children().addClass('show active');
            $("#cate_list .tab-pane").each(function(r, ele) {
                return $(ele).find("li").each(function(r, ele) {
                    $(ele).text().search(new RegExp(val, "i")) < 0 ? ($(ele).addClass("hide"), $(ele).removeClass("show")) : ($(ele).addClass("show"), $(ele).removeClass("hide"))
                }),
                    $(ele).find("li.show").length > 0 ? ($(ele).addClass("show"), $(ele).removeClass("hide")) : ($(ele).addClass("hide"), $(ele).removeClass("show"));
            });
            $("#cate_list .tab-pane").hasClass("show") ? ($(".software-explore-list .result-not-found").removeClass("show"), $(".software-explore-list .result-not-found").addClass("hide")):($(".software-explore-list .result-not-found").removeClass("hide"), $(".software-explore-list .result-not-found").addClass("show"))
        });
        $('#cate_list .nav-item button').on('click', function(e){
            e.preventDefault();

            console.log($(this).attr('data-bs-target'));
            
                
                // Hide all tab content
                $('#cate_list .tab-content').children().removeClass('show active');
                // Show the clicked tab content
                $('.tab-content '+ $(this).attr('data-bs-target')).addClass('show active');
            
        });
    });
</script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/front-page-landing.js')}}"></script>
@endsection
@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <div id="app-home">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="top_head">Browse Software Categories</h1>
                        <p class="">Find the right Software providers</p>
                    </div>
                    <div class="col-12 mt-lg-4 text-center">
                        <form class="" method="get" onsubmit="return false;" id="searchform_categories">
                            <input type="text" name="q" placeholder="Search Company / Software" class="hunt">
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-3" id="cate_list">
            <div class="container">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <!-- Generate A-Z tabs -->
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-A" aria-controls="navs-tab-A" aria-selected="true">A</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-B" aria-controls="navs-tab-B" aria-selected="false">B</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-C" aria-controls="navs-tab-C" aria-selected="false">C</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-D" aria-controls="navs-tab-D" aria-selected="false">D</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-E" aria-controls="navs-tab-E" aria-selected="false">E</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-F" aria-controls="navs-tab-F" aria-selected="false">F</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-G" aria-controls="navs-tab-G" aria-selected="false">G</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-H" aria-controls="navs-tab-H" aria-selected="false">H</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-I" aria-controls="navs-tab-I" aria-selected="false">I</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-J" aria-controls="navs-tab-J" aria-selected="false">J</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-K" aria-controls="navs-tab-K" aria-selected="false">K</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-L" aria-controls="navs-tab-L" aria-selected="false">L</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-M" aria-controls="navs-tab-M" aria-selected="false">M</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-N" aria-controls="navs-tab-N" aria-selected="false">N</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-O" aria-controls="navs-tab-O" aria-selected="false">O</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-P" aria-controls="navs-tab-P" aria-selected="false">P</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-Q" aria-controls="navs-tab-Q" aria-selected="false">Q</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-R" aria-controls="navs-tab-R" aria-selected="false">R</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-S" aria-controls="navs-tab-S" aria-selected="false">S</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-T" aria-controls="navs-tab-T" aria-selected="false">T</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-U" aria-controls="navs-tab-U" aria-selected="false">U</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-V" aria-controls="navs-tab-V" aria-selected="false">V</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-W" aria-controls="navs-tab-W" aria-selected="false">W</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-X" aria-controls="navs-tab-X" aria-selected="false">X</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-Y" aria-controls="navs-tab-Y" aria-selected="false">Y</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-Z" aria-controls="navs-tab-Z" aria-selected="false">Z</button>
                        </li>
                    </ul>
                    <div class="tab-content px-0">
                        <!-- Generate content for each tab -->
                                                @php 
                        $Alisting = clone $listing; 
                        $Alisting = $Alisting->where('title', 'like', 'A%')->get();
                        @endphp
                        @if($Alisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-A" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">A</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Alisting as $key => $CharA): ?>
                                            <li><a href="{{route('front_software_listing',$CharA->slug)}}">{{$CharA->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Blisting = clone $listing; 
                        $Blisting = $Blisting->where('title', 'like', 'B%')->get();
                        @endphp
                        @if($Blisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-B" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">B</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Blisting as $key => $CharB): ?>
                                            <li><a href="{{route('front_software_listing',$CharB->slug)}}">{{$CharB->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Clisting = clone $listing; 
                        $Clisting = $Clisting->where('title', 'like', 'C%')->get();
                        @endphp
                        @if($Clisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-C" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">C</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Clisting as $key => $CharC): ?>
                                            <li><a href="{{route('front_software_listing',$CharC->slug)}}">{{$CharC->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Dlisting = clone $listing; 
                        $Dlisting = $Dlisting->where('title', 'like', 'D%')->get();
                        @endphp
                        @if($Dlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-D" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">D</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Dlisting as $key => $CharD): ?>
                                            <li><a href="{{route('front_software_listing',$CharD->slug)}}">{{$CharD->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Elisting = clone $listing; 
                        $Elisting = $Elisting->where('title', 'like', 'E%')->get();
                        @endphp
                        @if($Elisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-E" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">E</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Elisting as $key => $CharE): ?>
                                            <li><a href="{{route('front_software_listing',$CharE->slug)}}">{{$CharE->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Flisting = clone $listing; 
                        $Flisting = $Flisting->where('title', 'like', 'F%')->get();
                        @endphp
                        @if($Flisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-F" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">F</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Flisting as $key => $CharF): ?>
                                            <li><a href="{{route('front_software_listing',$CharF->slug)}}">{{$CharF->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Glisting = clone $listing; 
                        $Glisting = $Glisting->where('title', 'like', 'G%')->get();
                        @endphp
                        @if($Glisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-G" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">G</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Glisting as $key => $CharG): ?>
                                            <li><a href="{{route('front_software_listing',$CharG->slug)}}">{{$CharG->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Hlisting = clone $listing; 
                        $Hlisting = $Hlisting->where('title', 'like', 'H%')->get();
                        @endphp
                        @if($Hlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-H" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">H</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Hlisting as $key => $CharH): ?>
                                            <li><a href="{{route('front_software_listing',$CharH->slug)}}">{{$CharH->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Ilisting = clone $listing; 
                        $Ilisting = $Ilisting->where('title', 'like', 'I%')->get();
                        @endphp
                        @if($Ilisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-I" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">I</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Ilisting as $key => $CharI): ?>
                                            <li><a href="{{route('front_software_listing',$CharI->slug)}}">{{$CharI->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Jlisting = clone $listing; 
                        $Jlisting = $Jlisting->where('title', 'like', 'J%')->get();
                        @endphp
                        @if($Jlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-J" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">J</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Jlisting as $key => $CharJ): ?>
                                            <li><a href="{{route('front_software_listing',$CharJ->slug)}}">{{$CharJ->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Klisting = clone $listing; 
                        $Klisting = $Klisting->where('title', 'like', 'K%')->get();
                        @endphp
                        @if($Klisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-K" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">K</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Klisting as $key => $CharK): ?>
                                            <li><a href="{{route('front_software_listing',$CharK->slug)}}">{{$CharK->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Llisting = clone $listing; 
                        $Llisting = $Llisting->where('title', 'like', 'L%')->get();
                        @endphp
                        @if($Llisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-L" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">L</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Llisting as $key => $CharL): ?>
                                            <li><a href="{{route('front_software_listing',$CharL->slug)}}">{{$CharL->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Mlisting = clone $listing; 
                        $Mlisting = $Mlisting->where('title', 'like', 'M%')->get();
                        @endphp
                        @if($Mlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-M" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">M</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Mlisting as $key => $CharM): ?>
                                            <li><a href="{{route('front_software_listing',$CharM->slug)}}">{{$CharM->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Nlisting = clone $listing; 
                        $Nlisting = $Nlisting->where('title', 'like', 'N%')->get();
                        @endphp
                        @if($Nlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-N" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">N</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Nlisting as $key => $CharN): ?>
                                            <li><a href="{{route('front_software_listing',$CharN->slug)}}">{{$CharN->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Olisting = clone $listing; 
                        $Olisting = $Olisting->where('title', 'like', 'O%')->get();
                        @endphp
                        @if($Olisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-O" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">O</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Olisting as $key => $CharO): ?>
                                            <li><a href="{{route('front_software_listing',$CharO->slug)}}">{{$CharO->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Plisting = clone $listing; 
                        $Plisting = $Plisting->where('title', 'like', 'P%')->get();
                        @endphp
                        @if($Plisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-P" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">P</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Plisting as $key => $CharP): ?>
                                            <li><a href="{{route('front_software_listing',$CharP->slug)}}">{{$CharP->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Qlisting = clone $listing; 
                        $Qlisting = $Qlisting->where('title', 'like', 'Q%')->get();
                        @endphp
                        @if($Qlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-Q" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">Q</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Qlisting as $key => $CharQ): ?>
                                            <li><a href="{{route('front_software_listing',$CharQ->slug)}}">{{$CharQ->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Rlisting = clone $listing; 
                        $Rlisting = $Rlisting->where('title', 'like', 'R%')->get();
                        @endphp
                        @if($Rlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-R" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">R</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Rlisting as $key => $CharR): ?>
                                            <li><a href="{{route('front_software_listing',$CharR->slug)}}">{{$CharR->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Slisting = clone $listing; 
                        $Slisting = $Slisting->where('title', 'like', 'S%')->get();
                        @endphp
                        @if($Slisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-S" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">S</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Slisting as $key => $CharS): ?>
                                            <li><a href="{{route('front_software_listing',$CharS->slug)}}">{{$CharS->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Tlisting = clone $listing; 
                        $Tlisting = $Tlisting->where('title', 'like', 'T%')->get();
                        @endphp
                        @if($Tlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-T" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">T</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Tlisting as $key => $CharT): ?>
                                            <li><a href="{{route('front_software_listing',$CharT->slug)}}">{{$CharT->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Ulisting = clone $listing; 
                        $Ulisting = $Ulisting->where('title', 'like', 'U%')->get();
                        @endphp
                        @if($Ulisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-U" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">U</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Ulisting as $key => $CharU): ?>
                                            <li><a href="{{route('front_software_listing',$CharU->slug)}}">{{$CharU->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Vlisting = clone $listing; 
                        $Vlisting = $Vlisting->where('title', 'like', 'V%')->get();
                        @endphp
                        @if($Vlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-V" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">V</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Vlisting as $key => $CharV): ?>
                                            <li><a href="{{route('front_software_listing',$CharV->slug)}}">{{$CharV->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Wlisting = clone $listing; 
                        $Wlisting = $Wlisting->where('title', 'like', 'W%')->get();
                        @endphp
                        @if($Wlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-W" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">W</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Wlisting as $key => $CharW): ?>
                                            <li><a href="{{route('front_software_listing',$CharW->slug)}}">{{$CharW->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Xlisting = clone $listing; 
                        $Xlisting = $Xlisting->where('title', 'like', 'X%')->get();
                        @endphp
                        @if($Xlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-X" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">X</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Xlisting as $key => $CharX): ?>
                                            <li><a href="{{route('front_software_listing',$CharX->slug)}}">{{$CharX->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Ylisting = clone $listing; 
                        $Ylisting = $Ylisting->where('title', 'like', 'Y%')->get();
                        @endphp
                        @if($Ylisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-Y" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">Y</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Ylisting as $key => $CharY): ?>
                                            <li><a href="{{route('front_software_listing',$CharY->slug)}}">{{$CharY->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php 
                        $Zlisting = clone $listing; 
                        $Zlisting = $Zlisting->where('title', 'like', 'Z%')->get();
                        @endphp
                        @if($Zlisting->count() > 0)
                        <div class="tab-pane fade show active" id="navs-tab-Z" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">Z</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Zlisting as $key => $CharZ): ?>
                                            <li><a href="{{route('front_software_listing',$CharZ->slug)}}">{{$CharZ->title}}</a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection