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
                <a href="{{ route('admin.beers.create') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative group">
                    <div class="h-96 relative">
                        <img src="{{asset('../images/beer-add.jpg')}}" alt="beer" class="w-full h-full object-cover transition-opacity group-hover:opacity-75">
                        <h1 class="text-white text-center uppercase text-xl absolute bottom-4 left-0 right-0 bg-black bg-opacity-50 py-2">
                            Aggiungi una nuova birra
                        </h1>
                    </div>
                </a>
            </div>
            <div class="mt-8" x-data="{ 
                currentIndex: 0,
                sliding: false,
                isMobile: window.innerWidth < 768,
                init() {
                    window.addEventListener('resize', () => {
                        this.isMobile = window.innerWidth < 768;
                    });
                },
                images: [
                    '{{asset('../images/birra1.jpg')}}',
                    '{{asset('../images/birra2.jpg')}}',
                    '{{asset('../images/beers-list.jpg')}}',
                    '{{asset('../images/birra3.jpg')}}',
                    '{{asset('../images/birra4.jpg')}}',
                    '{{asset('../images/beer-add.jpg')}}',
                    '{{asset('../images/birra5.jpg')}}',                    
                ],
                next() {
                    if (this.sliding) return;
                    this.sliding = true;
                    const step = this.isMobile ? 1 : 3;
                    this.currentIndex = this.currentIndex + step;
                    if (this.currentIndex >= this.images.length) {
                        this.currentIndex = 0;
                    }
                    setTimeout(() => this.sliding = false, 500);
                },
                prev() {
                    if (this.sliding) return;
                    this.sliding = true;
                    const step = this.isMobile ? 1 : 3;
                    this.currentIndex = this.currentIndex - step;
                    if (this.currentIndex < 0) {
                        this.currentIndex = Math.floor((this.images.length - 1) / step) * step;
                    }
                    setTimeout(() => this.sliding = false, 500);
                }
            }">
                <div class="relative overflow-hidden">
                    <div class="flex transition-all duration-500 ease-in-out" 
                         :style="{ transform: `translateX(-${(currentIndex * (isMobile ? 100 : 33.333)) % (100 * images.length)}%)` }">
                        <template x-for="(image, index) in [...images, ...images.slice(0, 3)]" :key="index">
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2" :style="{ 'flex-basis': isMobile ? '100%' : '33.333%' }">
                                <img :src="image" class="w-full h-64 object-cover rounded-lg" alt="Beer image">
                            </div>
                        </template>
                    </div>
                    <button @click="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-r z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-l z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
