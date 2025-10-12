<style>
    .min-h-screen.bg-gray-100{
        background-color: #111827 !important;
    }
</style>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Client Stories Management</h2>
                        <a href="{{ route('admin.client-stories.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Add New Client Story
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                        @foreach($clientStories as $clientStory)
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                                <img src="{{ asset('storage/' . $clientStory->photo_path) }}"
                                     alt="{{ $clientStory->name }}"
                                     class="w-full h-48 object-cover"
                                     onerror="this.src='https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?ga=GA1.1.102849408.1757898813&semt=ais_incoming&w=740&q=80'">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white mb-2">{{ $clientStory->name }}</h3>
                                    <p class="text-gray-300 text-sm mb-2">{{ \Illuminate\Support\Str::limit($clientStory->description, 100) }}</p>
                                    
                                    @if($clientStory->project_link)
                                        <p class="text-blue-300 text-xs mb-2">
                                            <a href="{{ $clientStory->project_link }}" target="_blank" class="hover:underline">
                                                View Project →
                                            </a>
                                        </p>
                                    @endif
                                    
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs px-2 py-1 rounded {{ $clientStory->is_active ? 'bg-green-600 text-white' : 'bg-red-600 text-white' }}">
                                            {{ $clientStory->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                        <span class="text-xs text-gray-400">Order: {{ $clientStory->sort_order }}</span>
                                    </div>
                                    
                                    <div class="space-x-2">
                                        <a href="{{ route('admin.client-stories.show', $clientStory) }}"
                                           class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            View
                                        </a>
                                        <a href="{{ route('admin.client-stories.edit', $clientStory) }}"
                                           class="bg-yellow-600 hover:bg-yellow-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.client-stories.toggle-active', $clientStory) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-{{ $clientStory->is_active ? 'orange' : 'green' }}-600 hover:bg-{{ $clientStory->is_active ? 'orange' : 'green' }}-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                                {{ $clientStory->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.client-stories.destroy', $clientStory) }}"
                                              method="POST" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this client story?')">
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

                    @if($clientStories->hasPages())
                        <div class="mt-6">
                            @include('custom-pagination', ['paginator' => $clientStories])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
