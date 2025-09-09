<x-app-layout>
	<x-slot name="header">
		<div class="admin-header">
			<h2 class="font-semibold text-xl leading-tight m-0">{{ __('Slider Images') }}</h2>
			<a href="{{ route('admin.slider-images.create') }}" class="button-primary">+ Add Slide</a>
		</div>
	</x-slot>

	<div class="py-6">
		<div class="px-3 px-sm-4 px-lg-5">
			@if (session('status'))
				<div class="mb-4 alert alert-success">{{ session('status') }}</div>
			@endif

			<div id="grid" class="grid-premium">
				@foreach ($items as $item)
					<div class="card-premium" data-id="{{ $item->id }}">
						<img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" style="height:220px;object-fit:cover;width:100%">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-center mb-2">
								<strong class="m-0">{{ $item->title ?? 'Untitled' }}</strong>
								<form action="{{ route('admin.slider-images.toggle', $item) }}" method="POST">
									@csrf
									<button class="btn-ghost" type="submit">{{ $item->is_active ? 'Active' : 'Inactive' }}</button>
								</form>
							</div>
							<div class="d-flex gap-2">
								<a href="{{ route('admin.slider-images.edit', $item) }}" class="btn-ghost w-100 text-center">Edit</a>
								<form action="{{ route('admin.slider-images.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this image?')" class="w-100">
									@csrf
									@method('DELETE')
									<button class="btn-red w-100" type="submit">Delete</button>
								</form>
							</div>
							<div class="d-flex justify-content-between align-items-center mt-2">
								<span class="text-muted small" style="color: #fff !important;">Order: {{ $item->sort_order }}</span>
								<span class="{{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $item->is_active ? 'Visible' : 'Hidden' }}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<form id="reorderForm" action="{{ route('admin.slider-images.reorder') }}" method="POST" class="d-none">
				@csrf
				<input type="hidden" name="order" id="orderInput">
			</form>
		</div>
	</div>

	@push('scripts')
		<script type="module">
			import Sortable from 'https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/modular/sortable.esm.js';
			const grid = document.getElementById('grid');
			if (grid) {
				Sortable.create(grid, {
					animation: 150,
					ghostClass: 'drag-ghost',
					onEnd: () => {
						const ids = [...grid.querySelectorAll('[data-id]')].map(el => el.getAttribute('data-id'));
						document.getElementById('orderInput').value = JSON.stringify(ids);
						document.getElementById('reorderForm').submit();
					}
				});
			}
		</script>
	@endpush
</x-app-layout>


