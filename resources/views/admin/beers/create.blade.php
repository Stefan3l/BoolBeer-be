<x-app-layout>
    <x-slot name="header">
    </x-slot>

    
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 text-white text-center"> 
                <h1 class="font-bold text-2xl"> Aggiungi una nuova birra </h1>
            </div>
            <div class="px-6 py-4"> 
                <form action="{{ route('admin.beers.store')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf 
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Nome della birra</label>
                                <input type="text" name="name" id="name"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                            </div>
                            <div>
                                <label for="quantity" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Quantity (ml)</label>
                                <input type="number" name="quantity" id="quantity"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                            </div>
                            <div>
                                <label for="alcohol_content" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Alcohol Content (%)</label>
                                <input type="number" step="0.1" name="alcohol_content" id="alcohol_content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="image" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Immagine della birra</label>
                                <input type="file" name="image" id="image"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline cursor-pointer dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" >
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
                            Aggiungi la birra
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>