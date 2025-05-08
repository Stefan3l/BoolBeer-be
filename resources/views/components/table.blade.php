@props(['beers'])

<div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">Image</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Quantity</th>
                <th scope="col" class="px-6 py-3">Alcohol Content</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($beers as $beer)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 flex justify-center items-center">
                        <img src="{{asset('storage/public/images/' . $beer->image)}}" alt="{{$beer->name}}" class="w-24 h-24 object-cover rounded-full">
                    </td>
                    <td class="px-6 py-4 font-bold text-xl text-gray-900 dark:text-white whitespace-nowrap">{{$beer->name}}</td>
                    <td class="px-6 py-4">{{$beer->quantity}}cl</td>
                    <td class="px-6 py-4">{{number_format($beer->alcohol_content / 10, 1)}}%</td>
                    <td>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="{{ route('admin.beers.show', $beer->id) }}" >View</a>
                        </button>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>