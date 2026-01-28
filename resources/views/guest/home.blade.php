@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.guest')

@section('content')
<!-- <div class="relative w-full h-screen font-sans -mt-20">
    <img src="{{ asset('img/WithModel.webp') }}" alt="Withmodel"
        class="absolute inset-0 w-full h-full object-cover" />

    <div class="absolute bottom-32 left-1/2 -translate-x-1/2">
        <a href="#"
            class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
            Shop Now
        </a>
    </div>

    <div class="absolute bottom-16 left-1/2 -translate-x-1/2 flex gap-4">
        <div class="w-4 h-4 rounded-full bg-white"></div>
        <div class="w-4 h-4 rounded-full border-2 border-white"></div>
        <div class="w-4 h-4 rounded-full border-2 border-white"></div>
    </div>

    <button class="absolute right-10 top-1/2 -translate-y-1/2 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-chevron-right-icon lucide-circle-chevron-right rounded-full hover:bg-white hover:text-black transition">
            <circle cx="12" cy="12" r="10" />
            <path d="m10 8 4 4-4 4" />
        </svg>
    </button>

    <button class="absolute left-10 top-1/2 -translate-y-1/2 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-chevron-left-icon lucide-circle-chevron-left rounded-full hover:bg-white hover:text-black transition">
            <circle cx="12" cy="12" r="10" />
            <path d="m14 16-4-4 4-4" />
        </svg>
    </button>
</div> -->


<div id="default-carousel" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative w-full h-screen font-sans -mt-20 overflow-hidden">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/WithModel.webp') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="gambar 1">
            <div class="absolute bottom-20 left-1/2 -translate-x-1/2">
                <a href="#"
                    class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/flowers ground.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="gambar 1">
            <div class="absolute bottom-20 left-1/2 -translate-x-1/2">
                <a href="#"
                    class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        
        
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/1769148555_irvin-aloise-fVUyUjGxE3A-unsplash.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="gambar 1">
            <div class="absolute bottom-20 left-1/2 -translate-x-1/2">
                <a href="#"
                    class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        
        
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/logo/logo.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="gambar 1">
            <div class="absolute bottom-20 left-1/2 -translate-x-1/2">
                <a href="#"
                    class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        
        
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/greeny.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="gambar 1">
            <div class="absolute bottom-20 left-1/2 -translate-x-1/2">
                <a href="#"
                    class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/60" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/60" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/60" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/60" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-/30 group-hover:bg-white/50 dark:group-hover:bg-black/60">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800-/30 group-hover:bg-white/50 dark:group-hover:bg-black/60">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
@endsection