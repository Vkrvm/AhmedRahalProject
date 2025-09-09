<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">{{ $project->title }}</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Edit Project
                            </a>
                            <a href="{{ route('admin.projects.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Back to Projects
                            </a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-300 mb-2">Description</h3>
                        <p class="text-gray-400">{{ $project->description ?: 'No description provided.' }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-300 mb-4">Thumbnail</h3>
                        <img src="{{ asset('storage/' . $project->thumbnail_path) }}"
                             alt="{{ $project->title }}"
                             class="w-full max-w-md h-64 object-cover rounded-lg"
                             onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=No+Thumbnail'">
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-300 mb-4">Gallery Images ({{ $project->images->count() }} images)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($project->images as $image)
                                <div class="bg-gray-700 rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                         alt="Gallery image {{ $image->sort_order }}"
                                         class="w-full h-48 object-cover"
                                         onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=Gallery+Image'">
                                    <div class="p-2 text-center">
                                        <span class="text-sm text-gray-400">Order: {{ $image->sort_order }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
