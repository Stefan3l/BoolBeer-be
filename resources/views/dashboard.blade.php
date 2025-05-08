<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="{ open: true }" x-show="open" class="p-6 text-gray-900 dark:text-gray-100 relative">
                    {{ __("You're logged in!") }}
                    <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-5">
                <a href="{{ route('admin.beers.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative group">
                    <div class="h-96 relative">
                        <img src="{{asset('../images/beers-list.jpg')}}" alt="beer" class="w-full h-full object-cover transition-opacity group-hover:opacity-75">
                        <h1 class="text-white text-center uppercase text-xl absolute bottom-4 left-0 right-0 bg-black bg-opacity-50 py-2">
                            Lista delle birre
                        </h1>
                    </div>
                </a>
                <a href="{{ route('admin.beers.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative group">
                    <div class="h-96 relative">
                        <img src="{{asset('../images/beer-add.jpg')}}" alt="beer" class="w-full h-full object-cover transition-opacity group-hover:opacity-75">
                        <h1 class="text-white text-center uppercase text-xl absolute bottom-4 left-0 right-0 bg-black bg-opacity-50 py-2">
                            Aggiungi una nuova birra
                        </h1>
                    </div>
                </a>
            </div>
            Carosello
        </div>
    </div>
</x-app-layout>
