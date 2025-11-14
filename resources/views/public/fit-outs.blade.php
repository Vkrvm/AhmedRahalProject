@extends('layouts.public')

@section('title', 'Our Fit-Outs | Rahal Designs')
@section('description', 'Explore a curated selection of our finest fit-out projects. Discover elegant, functional, and timeless spaces designed by Rahal Designs.')

@section('content')
	<section class="page page-fit-outs">
		<div class="container py-5">
			<h1 class="mb-4">Our Fit-Outs</h1>
			<p class="mb-4">Explore a curated selection of our finest fit-out projects</p>
			<div class="fit-outs-grid">
				@foreach ($fitOuts as $fitOut)
					<a class="fit-out-card" href="{{ route('fit-outs.show', $fitOut->slug) }}">
                        <img src="{{ asset('storage/' . $fitOut->thumbnail_path) }}"
                             alt="{{ $fitOut->title }}"
                             onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=No+Image'">
						<div class="fit-out-info">
							<h3>{{ $fitOut->title }}</h3>
							<p>{{ \Illuminate\Support\Str::limit($fitOut->description, 120) }}</p>
						</div>
					</a>
				@endforeach
			</div>
			@if($fitOuts->hasPages())
				<div class="mt-4">
					@include('custom-pagination', ['paginator' => $fitOuts])
				</div>
			@endif
		</div>
	</section>
@endsection

