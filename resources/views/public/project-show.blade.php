@extends('layouts.public')

@section('content')
	<section class="page page-project-show">
		<div class="imgs-container">
			<div class="project-gallery">
				@foreach ($project->images as $img)
                        <img src="{{ asset('storage/' . $img->image_path) }}"
                             alt="{{ $project->title }} image"
                             onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=Gallery+Image'">
				@endforeach
			</div>
		</div>
	</section>
@endsection


