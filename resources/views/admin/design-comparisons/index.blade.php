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
                        <h2 class="text-2xl font-bold">Design Comparisons</h2>
                        <a href="{{ route('admin.design-comparisons.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Add New Comparison
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                        @foreach($designComparisons as $comparison)
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                                <div class="grid grid-cols-2 gap-0">
                                    <img src="{{ Storage::url($comparison->before_path) }}" alt="Before" class="w-full h-40 object-cover">
                                    <img src="{{ Storage::url($comparison->after_path) }}" alt="After" class="w-full h-40 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white mb-2">{{ $comparison->title ?? 'Untitled' }}</h3>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs px-2 py-1 rounded {{ $comparison->is_active ? 'bg-green-600 text-white' : 'bg-red-600 text-white' }}">
                                            {{ $comparison->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                        <span class="text-xs text-gray-400">Order: {{ $comparison->sort_order }}</span>
                                    </div>
                                    <div class="space-x-2">
                                        <a href="{{ route('admin.design-comparisons.show', $comparison) }}"
                                           class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded transition-colors">View</a>
                                        <a href="{{ route('admin.design-comparisons.edit', $comparison) }}"
                                           class="bg-yellow-600 hover:bg-yellow-700 text-white text-xs px-3 py-1 rounded transition-colors">Edit</a>
                                        <form action="{{ route('admin.design-comparisons.toggle-active', $comparison) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="bg-{{ $comparison->is_active ? 'orange' : 'green' }}-600 hover:bg-{{ $comparison->is_active ? 'orange' : 'green' }}-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                                {{ $comparison->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.design-comparisons.destroy', $comparison) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded transition-colors">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($designComparisons->hasPages())
                        <div class="mt-6">
                            @include('custom-pagination', ['paginator' => $designComparisons])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


