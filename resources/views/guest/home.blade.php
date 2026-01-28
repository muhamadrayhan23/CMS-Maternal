@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.guest')

@section('content')

<style>
    #default-carousel button[aria-current="true"] {
        background-color: #FFFFFF !important;
        --tw-bg-opacity: 1 !important;
    }

    #default-carousel button[aria-current="false"] {
        background-color: rgba(255, 255, 255, 0.4) !important;
    }
</style>

<div id="default-carousel" data-carousel="slide">
    <div class="relative w-full h-screen font-sans -mt-20 overflow-hidden">
        @foreach($banners as $index => $banner)
        <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
            <img src="{{ asset($banner->banner_image) }}"
                class="absolute inset-0 w-full h-full object-cover"
                alt="Banner {{ $index + 1 }}">

            <div class="absolute inset-x-0 bottom-20 flex justify-center">
                <a href="{{ $banner->link ?? '#' }}"
                    class="px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach($banners as $index => $banner)
        <button type="button"
            class="w-3 h-3 rounded-full transition-colors {{ $index == 0 ? 'bg-white' : 'bg-white/50 hover:bg-white/80' }}"
            aria-current="{{ $index == 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $index + 1 }}"
            data-carousel-slide-to="{{ $index }}">
        </button>
        @endforeach
    </div>

    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full border border-white group-hover:bg-white/50 dark:group-hover:bg-black/70 group-hover:border-gray-800/50">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full border border-white group-hover:bg-white/50 dark:group-hover:bg-black/70 group-hover:border-gray-800/50">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<div class="">
    
</div>
@endsection