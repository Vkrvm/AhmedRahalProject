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
                        <h2 class="text-2xl font-bold">Fit-Outs Management</h2>
                        <a href="{{ route('admin.fit-outs.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                            Add New Fit-Out
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                        @foreach($fitOuts as $fitOut)
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                                <img src="{{ asset('storage/' . $fitOut->thumbnail_path) }}"
                                     alt="{{ $fitOut->title }}"
                                     class="w-full h-48 object-cover"
                                     onerror="this.src='https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?ga=GA1.1.102849408.1757898813&semt=ais_incoming&w=740&q=80'">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white mb-2">{{ $fitOut->title }}</h3>
                                    <p class="text-gray-300 text-sm mb-4">{{ \Illuminate\Support\Str::limit($fitOut->description, 100) }}</p>
                                    <div class="space-x-2">
                                        <a href="{{ route('admin.fit-outs.show', $fitOut) }}"
                                           class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            View
                                        </a>
                                        <a href="{{ route('admin.fit-outs.edit', $fitOut) }}"
                                           class="bg-yellow-600 hover:bg-yellow-700 text-white text-xs px-3 py-1 rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.fit-outs.destroy', $fitOut) }}"
                                              method="POST" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this fit-out?')">
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

                    @if($fitOuts->hasPages())
                        <div class="mt-6">
                            @include('custom-pagination', ['paginator' => $fitOuts])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

