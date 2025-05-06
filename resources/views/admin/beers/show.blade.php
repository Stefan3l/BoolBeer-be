
@dd($beer)
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8"> 
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Beer Details</h1>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/3 bg-gray-100 dark:bg-gray-700">
                        <img src="{{asset('../images/' . $beer->image)}}" 
                             alt="{{$beer->name}}" 
                             class="w-full h-[400px] object-cover">
                    </div>
                    <div class="w-full md:w-2/3 p-8">
                        <div class="mb-6">
                            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{$beer->name}}</h1>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    <p class="text-xl text-gray-600 dark:text-gray-400">Quantity: {{$beer->quantity}}ml</p>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <p class="text-xl text-gray-600 dark:text-gray-400">Alcohol Content: {{number_format($beer->alcohol_content / 10, 1)}}%</p>
                                    <p> {{ $beer->description }}</p>
                                    <div> 
                                        <span> {{ $beer->rating}} </span>
                                    </div>
                                    <p>{{$beer->categories->type_name}}</p>
                                    <p>{{$beer->categories->type_color}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex space-x-4">
                            {{-- <a href="{{ route('admin.beers.edit', $beer->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200">
                                Edit Beer
                            </a> --}}
                            <a href="{{ route('admin.beers.index') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>