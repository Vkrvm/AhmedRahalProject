<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Edit Project: {{ $project->title }}</h2>
                        <a href="{{ route('admin.projects.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Back to Projects
                        </a>
                    </div>

                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Project Title</label>
                            <input type="text"
                                   name="title"
                                   id="title"
                                   value="{{ old('title', $project->title) }}"
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
                                      class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-300 mb-2">Thumbnail Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $project->thumbnail_path) }}"
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
                            <label for="gallery_images" class="block text-sm font-medium text-gray-300 mb-2">Gallery Images (1-9 images)</label>
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-300 mb-2">Current Gallery ({{ $project->images->count() }} images)</h4>
                                <div class="grid grid-cols-3 gap-2">
                                    @foreach($project->images as $image)
                                        <div class="bg-gray-700 rounded-lg overflow-hidden">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                 alt="Gallery image {{ $image->sort_order }}"
                                                 class="w-full h-20 object-cover"
                                                 onerror="this.src='https://via.placeholder.com/100x80/333333/ffffff?text=Gallery'">
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
                            <p class="mt-1 text-sm text-gray-400">Select new images to replace current gallery (unlimited images)</p>
                            @error('gallery_images')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('admin.projects.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
