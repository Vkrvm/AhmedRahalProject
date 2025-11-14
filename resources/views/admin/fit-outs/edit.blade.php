<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Edit Fit-Out: {{ $fitOut->title }}</h2>
                        <a href="{{ route('admin.fit-outs.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Back to Fit-Outs
                        </a>
                    </div>

                    <form action="{{ route('admin.fit-outs.update.post', $fitOut) }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="updateForm">
                        @csrf

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Fit-Out Title</label>
                            <input type="text"
                                   name="title"
                                   id="title"
                                   value="{{ old('title', $fitOut->title) }}"
                                   class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                            <textarea name="description"
                                      id="description"
                                      rows="4"
                                      class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $fitOut->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-300 mb-2">Thumbnail Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $fitOut->thumbnail_path) }}"
                                     alt="Current thumbnail"
                                     class="w-32 h-32 object-cover rounded-lg"
                                     onerror="this.src='https://via.placeholder.com/200x200/333333/ffffff?text=No+Thumbnail'">
                                <p class="text-sm text-gray-400 mt-1">Current thumbnail</p>
                            </div>
                            <input type="file"
                                   name="thumbnail"
                                   id="thumbnail"
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-1 text-sm text-gray-400">Leave empty to keep current thumbnail</p>
                            @error('thumbnail')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="gallery_images" class="block text-sm font-medium text-gray-300 mb-2">Add More Gallery Images</label>
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-sm font-medium text-gray-300">Current Gallery ({{ $fitOut->images->count() }} images)</h4>
                                    <div class="flex gap-2">
                                        <button type="button"
                                                id="selectAllImages"
                                                class="bg-gray-600 hover:bg-gray-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            Select All
                                        </button>
                                        <button type="button"
                                                id="deselectAllImages"
                                                class="bg-gray-600 hover:bg-gray-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            Deselect All
                                        </button>
                                        <button type="button"
                                                id="deleteSelectedImages"
                                                class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded transition-colors"
                                                disabled>
                                            Delete Selected (<span id="selectedCount">0</span>)
                                        </button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-2" id="galleryImagesContainer">
                                    @foreach($fitOut->images as $image)
                                        <div class="bg-gray-700 rounded-lg overflow-hidden relative group image-item" data-image-id="{{ $image->id }}">
                                            <input type="checkbox"
                                                   name="selected_images[]"
                                                   value="{{ $image->id }}"
                                                   class="image-checkbox absolute top-2 left-2 z-10 w-5 h-5 cursor-pointer"
                                                   onchange="updateSelectedCount()">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                 alt="Gallery image {{ $image->sort_order }}"
                                                 class="w-full h-20 object-cover"
                                                 onerror="this.src='https://via.placeholder.com/100x80/333333/ffffff?text=Gallery'">
                                            <div class="absolute top-1 right-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <form action="{{ route('admin.fit-outs.image.delete', $image->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this image?')"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded-full">
                                                        ×
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="absolute bottom-1 left-1 bg-black bg-opacity-50 text-white text-xs px-1 rounded">
                                                {{ $image->sort_order }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="file"
                                   name="gallery_images[]"
                                   id="gallery_images"
                                   accept="image/*"
                                   multiple
                                   class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-1 text-sm text-gray-400">Select new images to add to current gallery (max 10MB per image, unlimited images)</p>
                            @error('gallery_images')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('admin.fit-outs.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Cancel
                            </a>
                            <button type="button"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors"
                                    onclick="testForm();">
                                Update Fit-Out
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateSelectedCount() {
            const checkboxes = document.querySelectorAll('.image-checkbox:checked');
            const count = checkboxes.length;
            document.getElementById('selectedCount').textContent = count;
            document.getElementById('deleteSelectedImages').disabled = count === 0;
        }

        function testForm() {
            console.log('=== TEST FORM FUNCTION ===');
            const form = document.getElementById('updateForm');
            if (form) {
                console.log('Form found:', form);
                console.log('Form action:', form.action);
                console.log('Form method:', form.method);
                console.log('Title value:', document.getElementById('title').value);
                console.log('Description value:', document.getElementById('description').value);

                // Remove ALL _method fields before submitting
                const allMethodFields = form.querySelectorAll('input[name="_method"]');
                console.log('Found _method fields:', allMethodFields.length);
                allMethodFields.forEach(field => {
                    console.log('Removing _method field with value:', field.value);
                    field.remove();
                });

                // Also check for any hidden fields that might be interfering
                const allHiddenFields = form.querySelectorAll('input[type="hidden"]');
                console.log('All hidden fields:');
                allHiddenFields.forEach(field => {
                    console.log(field.name, ':', field.value);
                });

                // Try to submit the form programmatically
                console.log('Attempting to submit form...');
                form.submit();
            } else {
                console.error('Form not found!');
            }
        }

        // Image selection and deletion handlers
        document.addEventListener('DOMContentLoaded', function() {
            // Select All
            document.getElementById('selectAllImages')?.addEventListener('click', function() {
                document.querySelectorAll('.image-checkbox').forEach(checkbox => {
                    checkbox.checked = true;
                });
                updateSelectedCount();
            });

            // Deselect All
            document.getElementById('deselectAllImages')?.addEventListener('click', function() {
                document.querySelectorAll('.image-checkbox').forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateSelectedCount();
            });

            // Delete Selected
            document.getElementById('deleteSelectedImages')?.addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('.image-checkbox:checked');
                if (checkboxes.length === 0) {
                    alert('Please select at least one image to delete.');
                    return;
                }

                if (!confirm(`Are you sure you want to delete ${checkboxes.length} image(s)?`)) {
                    return;
                }

                const imageIds = Array.from(checkboxes).map(cb => cb.value);

                // Create a form to submit the deletion request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("admin.fit-outs.images.delete-multiple") }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                imageIds.forEach(id => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'image_ids[]';
                    input.value = id;
                    form.appendChild(input);
                });

                document.body.appendChild(form);
                form.submit();
            });

            // Form submission handler
            const form = document.getElementById('updateForm');
            if (form) {
                console.log('Form loaded successfully');

                form.addEventListener('submit', function(e) {
                    console.log('Form submit event triggered');

                    // Remove ALL _method fields that might interfere
                    const methodFields = form.querySelectorAll('input[name="_method"]');
                    console.log('Found _method fields:', methodFields.length);
                    methodFields.forEach(field => {
                        console.log('Removing _method field with value:', field.value);
                        field.remove();
                    });

                    // Force the form method to be POST
                    form.method = 'POST';
                    console.log('Form method set to:', form.method);

                    // Also check for any other hidden fields that might be causing issues
                    const allHiddenFields = form.querySelectorAll('input[type="hidden"]');
                    console.log('All hidden fields after cleanup:');
                    allHiddenFields.forEach(field => {
                        console.log(field.name, ':', field.value);
                    });

                    console.log('Form submitting...');
                });
            } else {
                console.error('Form not found!');
            }
        });
    </script>

</x-app-layout>

