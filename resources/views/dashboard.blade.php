<style>
    .min-h-screen.bg-gray-100{
        background-color: #111111 !important;
    }
    .p-6.text-gray-900{
        color: #e9ecee;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg" style="background-color:#1f2937;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#1f2937;">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
