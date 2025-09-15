@extends('layouts.public')

@section('content')
	<section class="page page-home">
		<div class="hero">
			<video class="hero-video" autoplay muted loop playsinline>
				@if($homeVideo)
					<source src="{{ asset('storage/' . $homeVideo->video_path) }}" type="video/mp4">
				@endif
				<source src="{{ asset('videos/home-video.mp4') }}" type="video/mp4">
			</video>
			<div class="hero-overlay">
				<h1>Designing Your Space, Defining Your Style</h1>
				<p>Elegant. Timeless. Functional.</p>
				<a href="{{ route('projects') }}" class="btn btn-expolre">Explore Our Projects</a>
			</div>
		</div>

		<div class="imgs-slider">
			<div class="mySwiper swiper">
				<div class="swiper-wrapper">
					@foreach ($sliderImages as $img)
						<div class="swiper-slide">
							<img src="{{ asset($img->image_path) }}" alt="{{ $img->title }}" class="img-fluid w-100" />
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endsection
