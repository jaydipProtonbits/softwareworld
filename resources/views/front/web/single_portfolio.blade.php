<h6>{{ $portfolio->name ?? null }}</h6>
<div class="pf_inner">
	<span class="close_portoflio"><i class="ti ti-x"></i></span>
	<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
      @foreach(json_decode($portfolio->screenshots) ?? [] as $key => $screenshot)
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $key }}" class="active" aria-current="true" aria-label="Slide {{ $key }}"></button>
      @endforeach
		</div>
		<div class="carousel-inner">
      @foreach(json_decode($portfolio->screenshots) ?? [] as $key => $screenshot)
        <div class="carousel-item @if($loop->first) active @endif">
          <img class="d-block w-100" src="{{ asset('assets/service/'.$screenshot) }}?text={{ $portfolio->name ?? null }}" alt="{{ $key }} slide" />
        </div>
      @endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</a>
	</div>
	<div class="row pf_proprty mt-3">
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="pf_icon">
				<img src="{{asset('assets/img/icons/misc/coin.svg')}}">
				<p>{{ $portfolio->project_cost ?? null }}</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="pf_icon">
				<img src="{{asset('assets/img/icons/misc/calendar-plain.svg')}}">
				<p>{{ $portfolio->timeline ?? 0 }} Weeks</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="pf_icon">
				<img src="{{asset('assets/img/icons/misc/home-alt.svg')}}">
				<p>{{ $portfolio->industry->name ?? 'industry name here' }}</p>
			</div>
		</div>
    <?php
      $links = $portfolio->links ? json_decode($portfolio->links, true) : null;
    ?>
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="pf_icon">
				<img src="{{asset('assets/img/icons/misc/play-store.svg')}}">
				<p><a href="{{ $links['Android'] ?? 'javascript:void(0);' }}">Play Store</a></p>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="pf_icon">
				<img src="{{asset('assets/img/icons/misc/apple-store.svg')}}">
				<p><a href="{{ $links['iPhone'] ?? 'javascript:void(0);' }}">App Store</a></p>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="pf_icon">
				<img src="{{asset('assets/img/icons/misc/web-store.svg')}}">
				<p><a href="{{ $links['Website'] ?? 'javascript:void(0);' }}">Website</a></p>
			</div>
		</div>
	</div>
	<div class="mt-3 pf_desc">
    {!! $portfolio->description !!}
	</div>

</div>
<hr class="pr_line">
