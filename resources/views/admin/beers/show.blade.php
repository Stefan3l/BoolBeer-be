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
                    <div class="w-full md:w-1/3 bg-gray-100 dark:bg-gray-700 relative">
                        <div class="img-magnifier-container">
                            <img id="beerImage" 
                                 src="{{asset('../images/' . $beer->image)}}" 
                                 alt="{{$beer->name}}" 
                                 class="w-full h-[400px] object-cover">
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

    <style>
        .img-magnifier-container {
            position: relative;
        }
        .img-magnifier-glass {
            position: absolute;
            border: 3px solid #000;
            border-radius: 50%;
            cursor: none;
            width: 100px;
            height: 100px;
            display: none;
        }
    </style>

    <script>
        function magnify(imgID, zoom) {
            var img, glass, w, h, bw;
            img = document.getElementById(imgID);
            
            glass = document.createElement("DIV");
            glass.setAttribute("class", "img-magnifier-glass");
            img.parentElement.insertBefore(glass, img);

            glass.style.backgroundImage = "url('" + img.src + "')";
            glass.style.backgroundRepeat = "no-repeat";
            glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
            bw = 3;
            w = glass.offsetWidth / 2;
            h = glass.offsetHeight / 2;

            img.addEventListener("mousemove", moveMagnifier);
            glass.addEventListener("mousemove", moveMagnifier);
            
            img.addEventListener("mouseenter", function() {
                glass.style.display = "block";
            });
            
            img.addEventListener("mouseleave", function() {
                glass.style.display = "none";
            });

            function moveMagnifier(e) {
                var pos, x, y;
                e.preventDefault();
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;

                if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
                if (x < w / zoom) {x = w / zoom;}
                if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
                if (y < h / zoom) {y = h / zoom;}

                glass.style.left = (x - w) + "px";
                glass.style.top = (y - h) + "px";
                glass.style.backgroundPosition = "-" + ((x * zoom) - w) + "px -" + ((y * zoom) - h) + "px";
            }

            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                a = img.getBoundingClientRect();
                x = e.pageX - a.left - window.pageXOffset;
                y = e.pageY - a.top - window.pageYOffset;
                return {x : x, y : y};
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            magnify("beerImage", 3);
        });
    </script>
</x-app-layout>