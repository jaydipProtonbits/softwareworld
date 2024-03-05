@extends('layouts/layoutMaster')

@section('title', 'Listing')

@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="m_page_title">Listing</h3>
    </div>
</div>
  <div class="row new_listing">
    <div class="col-md-12">
      @if(auth()->user()->type_id == 1)
        @forelse(auth()->user()->services() ?? [] as $service)
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img
                    src="{{ $service->logo ? asset('assets/service/'.$service->logo) : asset('assets/img/placeholder/company-logo.jpg') }}"
                    class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title">{{ $service->name }}</h2>
                  <p class="soft_sub_t mb-0">{{ $service->tagline }}</p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <a href="{{ route('manage_service_step', ['info', $service->id]) }}" class="btn btn btn-primary"> <i
                      class="ti ti-edit"></i> &nbsp; Edit</a>
                </div>
              </div>
              <div class="soft_details">
                <p>{{ $service->getMeta('short_description') ? \Str::limit($service->getMeta('short_description'), 500, '... ') : null }}
                <!-- "Read more" link -->
                  @if ($service->getMeta('short_description') && strlen($service->getMeta('short_description')) > 500)
                    <a href="javascript:void(0)">Read more</a>
                  @endif
                </p>
              </div>
            </div>
          </div>
        @empty
          @if(!auth()->user()->is_admin() && auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 1))->count() == 0)
            <div class="card mb-4">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-md-12 text-center">
                    <p>You dont have any listing yet please create a listing using the below button.</p>
                    <a type="button" class="btn btn-primary" href="{{ route('manage_service.create') }}">
                      <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Listing
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforelse

        {{--// Pending Claimed Service list here--}}
        @forelse(auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 1))->get() ?? [] as $service)
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img src="{{ $service->claim->logo ? asset('assets/service/'.$service->claim->logo) : asset('assets/img/placeholder/company-logo.jpg') }}" class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title">{{ $service->claim->name??'' }}</h2>
                  <p class="soft_sub_t mb-0">{{ $service->claim->tagline??'' }}</p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <span class="btn btn-primary">Pending Approval</span>
                </div>
              </div>
              <div class="soft_details">
                <p>{{ $service->claim->getMeta('short_description') ? \Str::limit($service->claim->getMeta('short_description')??'', 500, '... ') : null }}
                <!-- "Read more" link -->
                  @if ($service->claim->getMeta('short_description') && strlen($service->claim->getMeta('short_description')) > 500)
                    <a href="javascript:void(0)">Read more</a>
                  @endif
                </p>
              </div>
            </div>
          </div>
        @empty
        @endforelse
      @endif

      @if(auth()->user()->type_id == 2)
        @forelse(auth()->user()->software() ?? [] as $software)
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img
                    src="{{ $software->logo ? asset('assets/company/'.$software->logo) : asset('assets/img/placeholder/company-logo.jpg') }}"
                    class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title">{{ $software->name }}</h2>
                  <p class="soft_sub_t mb-0">{{ $software->tagline }}</p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <a href="{{ route('manage_details', ['information', $software->id]) }}" class="btn btn btn-primary">
                    <i class="ti ti-edit"></i> &nbsp; Edit</a>
                </div>
              </div>
              <div class="soft_details">
                <p>{{ $software->getMeta('short_description') ? \Str::limit($software->getMeta('short_description'), 500, '... ') : null }}
                <!-- "Read more" link -->
                  @if ($software->getMeta('short_description') && strlen($software->getMeta('short_description')) > 500)
                    <a href="javascript:void(0)">Read more</a>
                  @endif
                </p>
              </div>
            </div>
          </div>
        @empty
          @if(!auth()->user()->is_admin() && auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 2))->count() == 0)
            <div class="card mb-4">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-md-12 text-center">
                    <p>You dont have any listing yet please create a listing using the below button.</p>
                    <a type="button" class="btn btn-primary" href="{{ route('manage_listing.create') }}">
                      <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Listing
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforelse

        {{--  Pending Claimed Software list here  --}}
        @forelse(auth()->user()->pendingClaimed()->whereHas('claim', fn($q) => $q->where('type_id', 2))->get() ?? [] as $software)
          <div class="card mb-4">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-1">
                  <img
                    src="{{ $software->claim->logo ? asset('assets/company/'.$software->claim->logo) : asset('assets/img/placeholder/company-logo.jpg') }}"
                    class="img-fluid soft_logo">
                </div>
                <div class="col-md-9">
                  <h2 class="soft_title">{{ $software->claim->name??'' }}</h2>
                  <p class="soft_sub_t mb-0">{{ $software->claim->tagline??'' }}</p>
                  <div class="soft_ratings mb-3 mt-2">
                    <ul class="list-group list-group-horizontal list-inline">
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star-filled"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li><i class="ti ti-star"></i></li>
                      <li class="r_count">3.0</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2 text-end">
                  <span class="btn btn-primary">Pending Approval</span>
                </div>
              </div>
              <div class="soft_details">
                <p>{{ $software->claim->getMeta('short_description') ? \Str::limit($software->claim->getMeta('short_description')??'', 500, '... ') : null }}
                <!-- "Read more" link -->
                  @if ($software->claim->getMeta('short_description') && strlen($software->claim->getMeta('short_description')) > 500)
                    <a href="javascript:void(0)">Read more</a>
                  @endif
                </p>
              </div>
            </div>
          </div>
        @empty
        @endforelse
      @endif
    </div>
  </div>
@endsection
