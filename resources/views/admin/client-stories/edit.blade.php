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
                        <h2 class="text-2xl font-bold">Edit Client Story</h2>
                        <a href="{{ route('admin.client-stories.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Back to List
                        </a>
                    </div>

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.client-stories.update', $clientStory) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Client Name *</label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $clientStory->name) }}"
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       required>
                            </div>
                            
                            <div>
                                <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-2">Sort Order</label>
                                <input type="number" 
                                       id="sort_order" 
                                       name="sort_order" 
                                       value="{{ old('sort_order', $clientStory->sort_order) }}"
                                       min="0"
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description *</label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="4"
                                      class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      required>{{ old('description', $clientStory->description) }}</textarea>
                        </div>

                        <div>
                            <label for="project_link" class="block text-sm font-medium text-gray-300 mb-2">Project Link (Optional)</label>
                            <input type="url" 
                                   id="project_link" 
                                   name="project_link" 
                                   value="{{ old('project_link', $clientStory->project_link) }}"
                                   placeholder="https://example.com"
                                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-300 mb-2">Client Photo</label>
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $clientStory->photo_path) }}" 
                                     alt="{{ $clientStory->name }}"
                                     class="w-32 h-32 object-cover rounded-lg border border-gray-600"
                                     onerror="this.src='https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?ga=GA1.1.102849408.1757898813&semt=ais_incoming&w=740&q=80'">
                                <p class="text-xs text-gray-400 mt-1">Current photo</p>
                            </div>
                            <input type="file" 
                                   id="photo" 
                                   name="photo" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-xs text-gray-400 mt-1">Leave empty to keep current photo. Accepted formats: JPEG, PNG, JPG, GIF. Max size: 10MB</p>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1"
                                   {{ old('is_active', $clientStory->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-300">
                                Active (visible on website)
                            </label>
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Update Client Story
                            </button>
                            <a href="{{ route('admin.client-stories.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
