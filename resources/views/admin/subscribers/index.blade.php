<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Subscribers</h2>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr class="text-left text-gray-300">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Subscribed At</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td class="px-4 py-2">{{ $subscriber->id }}</td>
                                        <td class="px-4 py-2">{{ $subscriber->email }}</td>
                                        <td class="px-4 py-2">{{ $subscriber->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="px-4 py-2">
                                            <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" onsubmit="return confirm('Delete this subscriber?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($subscribers->hasPages())
                        <div class="mt-6">
                            @include('custom-pagination', ['paginator' => $subscribers])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
