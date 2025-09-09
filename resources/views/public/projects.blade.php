@extends('layouts.public')

@section('content')
	<section class="page page-projects">
		<div class="container py-5">
			<h1 class="mb-4">Our Projects</h1>
			<p class="mb-4">Explore a curated selection of our finest interior design projects</p>
			<div class="projects-grid">
				@foreach ($projects as $project)
					<a class="project-card" href="{{ route('projects.show', $project->slug) }}">
                        <img src="{{ asset('storage/' . $project->thumbnail_path) }}"
                             alt="{{ $project->title }}"
                             onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=No+Image'">
						<div class="project-info">
							<h3>{{ $project->title }}</h3>
							<p>{{ \Illuminate\Support\Str::limit($project->description, 120) }}</p>
						</div>
					</a>
				@endforeach
			</div>
			<div class="mt-4">
				{{ $projects->links() }}
			</div>
		</div>
	</section>
@endsection
