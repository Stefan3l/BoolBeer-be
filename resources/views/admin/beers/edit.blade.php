<x-app-layout>
    {{-- Aggiungi questi link nel head --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8"> 
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Beer Details</h1>
            </div>
            <div class="my-5">
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300 flex items-center" >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <a href="{{ route('admin.beers.index') }}" >
                        Torna alla pagina principale
                    </a>
                </button>
            </div>
               <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg overflow-hidden hover:shadow-3xl transition-shadow duration-300 opacity-0" data-aos="fade" data-aos-duration="1500" data-aos-delay="200">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/3 bg-gray-100 dark:bg-gray-700 relative flex items-center justify-center">
                        <div class="img-magnifier-container w-full h-[400px] flex items-center justify-center">
                            <img id="beerImage" 
                                 src="{{asset('/storage/public/images/' . $beer->image)}}" 
                                 alt="{{$beer->name}}" 
                                 class="w-full h-full object-contain">
                        </div>
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
                            <button type="button" 
                                    class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-semibold py-2 px-4 rounded"
                                    onclick="document.getElementById('deleteModal').classList.remove('hidden')">
                                Elimina
                            </button>
                        </div>


                        <!-- Delete Modal -->
                        <div id="deleteModal" class=" fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center hidden">
                            <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                                <div class="mt-3 text-center">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">Conferma eliminazione</h3>
                                    <div class="mt-2 px-7 py-3">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Sei sicuro di voler eliminare questa birra? Questa azione non può essere annullata.
                                        </p>
                                    </div>
                                    <div class="flex justify-center gap-4 mt-4">
                                        <button type="button" 
                                                class="border border-gray-400 text-gray-600 hover:bg-gray-100 px-4 py-2 rounded"
                                                onclick="document.getElementById('deleteModal').classList.add('hidden')">
                                            Annulla
                                        </button>
                                        <form action="{{ route('admin.beers.destroy', $beer) }}" method="POST" class="inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" 
                                                    class="bg-red-500 text-white hover:bg-red-600 px-4 py-2 rounded">
                                                Conferma eliminazione
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 <h1 class="text-center font-bold text-white my-8 text-2xl">Modifica il tuo prodotto</h1>
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg overflow-hidden hover:shadow-3xl transition-shadow duration-300 p-8 opacity-0" data-aos="fade" data-aos-duration="1500" data-aos-delay="500"> 
                <form action="{{ route('admin.beers.update', $beer->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf 
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Nome della birra</label>
                                <input type="text" name="name" id="name" value="{{ $beer->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                            </div>
                            <div>
                                <label for="quantity" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Quantity (ml)</label>
                                <input type="number" name="quantity" id="quantity" value="{{ $beer->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                            </div>
                            <div>
                                <label for="alcohol_content" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Alcohol Content (%)</label>
                                <input type="number" step="0.1" name="alcohol_content" id="alcohol_content" value="{{ $beer->alcohol_content }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="image" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Immagine della birra</label>
                                <input type="file" name="image" id="image"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline cursor-pointer dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Immagine attuale: {{ $beer->image }}</p>
                            </div>
                            
                            <div>
                                <label for="categorie_id" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Categoria</label>
                                <select name="categorie_id" id="categorie_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $beer->categorie_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->type_name }} - {{ $category->type_color }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">{{ $beer->description }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-4 mt-8"> 
                        <a href="{{ route('admin.beers.index') }}" class="border border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-white font-semibold py-2 px-6 rounded transition-colors duration-200">
                            Annulla
                        </a>
                        <button type="submit" class="border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white font-semibold py-2 px-6 rounded transition-colors duration-200">
                            Salva Modifiche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Aggiungi questo script prima della chiusura di </x-app-layout> --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</x-app-layout>