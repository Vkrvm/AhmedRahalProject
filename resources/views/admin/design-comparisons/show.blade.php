<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Design Comparison Details</h2>
                        <a href="{{ route('admin.design-comparisons.edit', $designComparison) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">Edit</a>
                    </div>

                    <p class="mb-2"><strong>Title:</strong> {{ $designComparison->title ?? 'Untitled' }}</p>
                    <p class="mb-2"><strong>Status:</strong> {{ $designComparison->is_active ? 'Active' : 'Inactive' }}</p>
                    <p class="mb-6"><strong>Order:</strong> {{ $designComparison->sort_order }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-semibold mb-2">Before</h3>
                            <img src="{{ Storage::url($designComparison->before_path) }}" class="w-full rounded object-cover" />
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">After</h3>
                            <img src="{{ Storage::url($designComparison->after_path) }}" class="w-full rounded object-cover" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.design-comparisons.index') }}" class="px-4 py-2 rounded bg-gray-600 text-white">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


