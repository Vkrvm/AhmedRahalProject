@extends('layouts.public')
<style>
.modal.fade.show{
	overflow-y: hidden;
}
.modal-header , .modal-content{
	border: none !important;
}
.carousel-item.active img , .carousel-item img{
	height: auto;
    width: 80% !important;
    margin-inline: auto;
}
</style>
@section('content')
	<section class="page page-project-show">
		<div class="container py-5">
			<div class="imgs-container">
				<div class="project-gallery">
					@foreach ($images as $index => $img)
						<img src="{{ asset('storage/' . $img->image_path) }}"
							 alt="{{ $project->title }} image"
							 data-bs-toggle="modal"
							 data-bs-target="#imageCarousel"
							 data-slide-index="{{ $index }}"
							 class="gallery-image"
							 style="cursor: pointer;"
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

	<!-- Image Carousel Modal -->
	<div class="modal fade" id="imageCarousel" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content bg-transparent">
				<div class="modal-header border-none">
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-0">
					<div id="carouselImages" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
						<div class="carousel-inner">
							@foreach ($images as $index => $img)
								<div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
									<img src="{{ asset('storage/' . $img->image_path) }}"
										 class="d-block w-100"
										 alt="{{ $project->title }} image"
										 onerror="this.src='https://via.placeholder.com/1200x800/333333/ffffff?text=Gallery+Image'">
								</div>
							@endforeach
						</div>
						
						@if(count($images) > 1)
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const modalElement = document.getElementById('imageCarousel');
			const carouselElement = document.getElementById('carouselImages');
			
			modalElement.addEventListener('show.bs.modal', function(event) {
				const button = event.relatedTarget;
				const slideIndex = parseInt(button.getAttribute('data-slide-index'));
				const items = carouselElement.querySelectorAll('.carousel-item');
				
				items.forEach(function(item) {
					item.classList.remove('active');
				});
				
				if (items[slideIndex]) {
					items[slideIndex].classList.add('active');
				}
			});
		});
	</script>
@endsection