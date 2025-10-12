<style>
    .min-h-screen.bg-gray-100{
        background-color: #111827 !important;
    }
</style>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Home Video Details</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.home-videos.edit', $homeVideo) }}"
                               class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Edit
                            </a>
                            <a href="{{ route('admin.home-videos.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Video Preview</h3>
                            <video class="w-full h-96 object-cover rounded-lg border border-gray-600" controls>
                                <source src="{{ asset('storage/' . $homeVideo->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Video Title</h3>
                                <p class="text-gray-300">{{ $homeVideo->title }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Status</h3>
                                <span class="px-3 py-1 rounded-full text-sm {{ $homeVideo->is_active ? 'bg-green-600 text-white' : 'bg-red-600 text-white' }}">
                                    {{ $homeVideo->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Sort Order</h3>
                                <p class="text-gray-300">{{ $homeVideo->sort_order }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">File Path</h3>
                                <p class="text-gray-300 text-sm break-all">{{ $homeVideo->video_path }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Created</h3>
                                <p class="text-gray-300">{{ $homeVideo->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Last Updated</h3>
                                <p class="text-gray-300">{{ $homeVideo->updated_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-600">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.home-videos.edit', $homeVideo) }}"
                               class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Edit Home Video
                            </a>
                            <form action="{{ route('admin.home-videos.toggle-active', $homeVideo) }}"
                                  method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="bg-{{ $homeVideo->is_active ? 'orange' : 'green' }}-600 hover:bg-{{ $homeVideo->is_active ? 'orange' : 'green' }}-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                    {{ $homeVideo->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.home-videos.destroy', $homeVideo) }}"
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this home video?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                    Delete Home Video
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
