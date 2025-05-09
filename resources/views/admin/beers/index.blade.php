<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <form action="{{ route('admin.beers.index') }}" method="GET" class="flex gap-4">
                    <input type="text" name="search" placeholder="Cerca la birra per nome..." value="{{ request('search')}}" class="flex-1 shadow apperance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                        Cerca
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.beers.index')}}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Reset 
                        </a>
                    @endif
                </form>
            </div>
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 text-white text-center"> 
                    <h1 class="font-bold text-2xl"> Lista delle birre </h1>
                </div>
                <div id="table-section" class="overflow-x-auto h-[calc(100vh-300px)] overflow-y-auto">
                    <x-table :beers="$beers"></x-table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('table-section').scrollIntoView({ behavior: 'smooth' });
        });
    </script>
</x-app-layout>