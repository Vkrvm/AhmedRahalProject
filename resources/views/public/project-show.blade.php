@extends('layouts.public')

@section('content')
	<section class="page page-project-show">
		<div class="container py-5">
			<!-- <h1 class="mb-4">{{ $project->title }}</h1>
			@if($project->description)
				<p class="mb-4">{{ $project->description }}</p>
			@endif -->
			
			<div class="imgs-container">
				<div class="project-gallery">
					@foreach ($images as $img)
						<img src="{{ asset('storage/' . $img->image_path) }}"
							 alt="{{ $project->title }} image"
							 onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=Gallery+Image'">
					@endforeach
				</div>
				
				@if($images->hasPages())
					<div class="mt-4">
						@include('custom-pagination', ['paginator' => $images])
					</div>
				@endif
			</div>
		</div>
	</section>
@endsection


