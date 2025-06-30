<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Author Dashboard') }}
                </h2>
            </div>
            <div class="flex items-center space-x-3">
                <button
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors duration-200">
                    <span class="iconify mr-2" data-icon="tabler:plus" data-width="16"></span>
                    {{ __('Add New') }}
                </button>
            </div>
        </div>
    </x-slot>

</x-app-layout>
