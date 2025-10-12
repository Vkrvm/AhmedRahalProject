<style>
    .min-h-screen.bg-gray-100{
        background-color: #111827 !important;
    }
</style>
<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Edit Slider Image') }}
		</h2>
	</x-slot>

	<div class="py-6">
		<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">
					<form action="{{ route('admin.slider-images.update', $item) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label class="form-label">Title</label>
							<input type="text" name="title" class="form-control" value="{{ old('title', $item->title) }}">
							@error('title')<div class="text-danger small">{{ $message }}</div>@enderror
						</div>
						<div class="mb-3">
							<label class="form-label">Image</label>
							<input type="file" name="image" class="form-control">
							@if($item->image_path)
								<img src="{{ asset($item->image_path) }}" alt="" style="height:80px" class="mt-2">
							@endif
							@error('image')<div class="text-danger small">{{ $message }}</div>@enderror
						</div>
						<div class="row g-3">
							<div class="col-sm-6">
								<label class="form-label">Sort Order</label>
								<input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order) }}">
								@error('sort_order')<div class="text-danger small">{{ $message }}</div>@enderror
							</div>
							<div class="col-sm-6 d-flex align-items-center gap-2">
								<input type="hidden" name="is_active" value="0">
								<div class="form-check mt-3">
									<input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
									<label class="form-check-label" for="is_active">Active</label>
								</div>
							</div>
						</div>
						<div class="mt-3 d-flex gap-2">
							<button class="btn btn-primary" type="submit">Save</button>
							<a href="{{ route('admin.slider-images.index') }}" class="btn btn-secondary">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>


