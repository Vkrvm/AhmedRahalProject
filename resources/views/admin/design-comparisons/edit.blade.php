<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6">Edit Design Comparison</h2>

                    @if ($errors->any())
                        <div class="mb-4 text-red-500">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.design-comparisons.update', $designComparison) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="block text-sm font-medium mb-1">Title (optional)</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $designComparison->title) }}" class="w-full rounded border-gray-300 dark:bg-gray-700" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium mb-1">Current Before</label>
                                <img src="{{ Storage::url($designComparison->before_path) }}" class="w-full h-40 object-cover rounded mb-2" />
                                <input type="file" id="before" name="before" accept="image/*" class="w-full text-sm" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Current After</label>
                                <img src="{{ Storage::url($designComparison->after_path) }}" class="w-full h-40 object-cover rounded mb-2" />
                                <input type="file" id="after" name="after" accept="image/*" class="w-full text-sm" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="sort_order" class="block text-sm font-medium mb-1">Sort Order</label>
                                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $designComparison->sort_order) }}" class="w-full rounded border-gray-300 dark:bg-gray-700" />
                            </div>
                            <div class="flex items-center mt-6">
                                <input type="checkbox" id="is_active" name="is_active" value="1" class="mr-2" {{ old('is_active', $designComparison->is_active) ? 'checked' : '' }} />
                                <label for="is_active" class="text-sm">Active</label>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.design-comparisons.index') }}" class="px-4 py-2 rounded bg-gray-600 text-white">Cancel</a>
                            <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


