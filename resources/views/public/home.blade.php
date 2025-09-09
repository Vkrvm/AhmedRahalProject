@extends('layouts.public')

@section('content')
	<section class="page page-home">
		<div class="hero">
			<video class="hero-video" autoplay muted loop playsinline>
				<source src="{{ Vite::asset('resources/videos/home-video.mp4') }}" type="video/mp4">
			</video>
			<div class="hero-overlay">
				<h1>Designing Your Space, Defining Your Style</h1>
				<p>Elegant. Timeless. Functional.</p>
                <a href="{{ route('projects') }}" class="btn btn-expolre">Explore Our Projects</a>
			</div>
		</div>
	</section>
@endsection
