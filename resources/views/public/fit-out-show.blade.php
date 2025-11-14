@extends('layouts.public')

@section('content')
	<section class="page page-fit-out-show">
		<div class="container py-5">
			<div class="imgs-container">
				<div class="fit-out-gallery">
					@foreach ($images as $img)
						<img src="{{ asset('storage/' . $img->image_path) }}"
							 alt="{{ $fitOut->title }} image"
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

