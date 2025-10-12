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
                        <h2 class="text-2xl font-bold">Client Story Details</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.client-stories.edit', $clientStory) }}"
                               class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Edit
                            </a>
                            <a href="{{ route('admin.client-stories.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <img src="{{ asset('storage/' . $clientStory->photo_path) }}" 
                                 alt="{{ $clientStory->name }}"
                                 class="w-full h-64 object-cover rounded-lg border border-gray-600"
                                 onerror="this.src='https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?ga=GA1.1.102849408.1757898813&semt=ais_incoming&w=740&q=80'">
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Client Name</h3>
                                <p class="text-gray-300">{{ $clientStory->name }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Description</h3>
                                <p class="text-gray-300">{{ $clientStory->description }}</p>
                            </div>
                            
                            @if($clientStory->project_link)
                                <div>
                                    <h3 class="text-xl font-semibold text-white mb-2">Project Link</h3>
                                    <a href="{{ $clientStory->project_link }}" 
                                       target="_blank"
                                       class="text-blue-400 hover:text-blue-300 underline">
                                        {{ $clientStory->project_link }}
                                    </a>
                                </div>
                            @endif
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-white mb-2">Status</h3>
                                    <span class="px-3 py-1 rounded-full text-sm {{ $clientStory->is_active ? 'bg-green-600 text-white' : 'bg-red-600 text-white' }}">
                                        {{ $clientStory->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                                
                                <div>
                                    <h3 class="text-xl font-semibold text-white mb-2">Sort Order</h3>
                                    <p class="text-gray-300">{{ $clientStory->sort_order }}</p>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Created</h3>
                                <p class="text-gray-300">{{ $clientStory->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Last Updated</h3>
                                <p class="text-gray-300">{{ $clientStory->updated_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-600">
                        <div class="space-x-4">
                            <a href="{{ route('admin.client-stories.edit', $clientStory) }}"
                               class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Edit Client Story
                            </a>
                            <form action="{{ route('admin.client-stories.toggle-active', $clientStory) }}"
                                  method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="bg-{{ $clientStory->is_active ? 'orange' : 'green' }}-600 hover:bg-{{ $clientStory->is_active ? 'orange' : 'green' }}-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                    {{ $clientStory->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.client-stories.destroy', $clientStory) }}"
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this client story?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                    Delete Client Story
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
