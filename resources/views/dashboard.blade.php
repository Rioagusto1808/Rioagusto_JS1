<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
