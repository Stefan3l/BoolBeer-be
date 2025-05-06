<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8"> 
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Beer Details</h1>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg overflow-hidden hover:shadow-3xl transition-shadow duration-300">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/3 bg-gray-100 dark:bg-gray-700">
                        <img src="{{asset('../images/' . $beer->image)}}" 
                             alt="{{$beer->name}}" 
                             class="w-full h-[400px] object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="w-full md:w-2/3 p-8">
                        <div class="mb-6">
                            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-4 border-b pb-2">{{$beer->name}}</h1>
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    <p class="text-xl text-gray-600 dark:text-gray-400">Quantity: <span class="font-semibold">{{$beer->quantity}}ml</span></p>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <p class="text-xl text-gray-600 dark:text-gray-400">Alcohol Content: <span class="font-semibold">{{number_format($beer->alcohol_content / 10, 1)}}%</span></p>
                                </div>
                                <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xl text-gray-600 dark:text-gray-400"><span class="font-semibold">Description:</span> {{ $beer->description }}</p>
                                </div>
                                <div class="flex items-center"> 
                                    <span class="text-xl text-gray-600 dark:text-gray-400 mr-2">Rating:</span>
                                    <div class="flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $beer->rating)
                                                <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-gray-300 fill-current" viewBox="0 0 24 24">
                                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="flex flex-col p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    @foreach($categories as $category)
                                        @if($category->id == $beer->categorie_id)
                                            <p class="text-xl text-gray-600 dark:text-gray-400"><span class="font-semibold">Category:</span> {{$category->type_name}}</p>
                                            <p class="text-xl text-gray-600 dark:text-gray-400"><span class="font-semibold">Tipo di birra:</span> {{$category->type_color}}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex space-x-4">
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