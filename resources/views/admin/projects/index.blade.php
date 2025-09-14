<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Projects Management</h2>
                        <a href="{{ route('admin.projects.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Add New Project
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($projects as $project)
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                                <img src="{{ asset('storage/' . $project->thumbnail_path) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-48 object-cover"
                                     onerror="this.src='https://via.placeholder.com/400x300/333333/ffffff?text=No+Thumbnail'">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white mb-2">{{ $project->title }}</h3>
                                    <p class="text-gray-300 text-sm mb-4">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.projects.show', $project) }}"
                                           class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            View
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}"
                                           class="bg-yellow-600 hover:bg-yellow-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}"
                                              method="POST" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this project?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($projects->hasPages())
                        <div class="mt-6">
                            @include('custom-pagination', ['paginator' => $projects])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
