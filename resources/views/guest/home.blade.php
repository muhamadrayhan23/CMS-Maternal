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
    <div class="relative w-full h-screen font-sans -mt-19 overflow-hidden">
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

<div class="flex items-center mt-10 mb-14">
    <span class="flex-1 h-px bg-gray-300"></span>

    <h1 class="mx-6 font-sans text-2xl tracking-wide whitespace-nowrap">
        OUR PRODUCTS
    </h1>

    <span class="flex-1 h-px bg-gray-300"></span>
</div>
<div id="product-cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-20 m-10">
    @foreach ($products as $product)
    <div class="aspect-square">

        @if ($product->details->count())
        <img
            src="{{ asset($product->details->first()->image_product) }}"
            class="w-full h-full object-cover rounded-lg">
        @else
        <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
            No Image
        </div>
        @endif

        <h3 class="mt-3 font-semibold text-lg text-center">
            {{ $product->product_name }}
        </h3>

        <p class="mt-2 font-bold text-center">
            Rp {{ number_format($product->price) }}
        </p>
    </div>
    @endforeach
</div>
<div class="flex justify-center mt-10 mb-20">
    <a href="{{ route('products') }}"
        class="flex px-8 py-3 border rounded-full hover:bg-[#1A1A1A] hover:text-white transition gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
            <path d="M18 8L22 12L18 16" />
            <path d="M2 12H22" />
        </svg>
        See More
    </a>
</div>
<div id="about us" class="flex mb-5">
    <img src="{{ asset('img/1769659981_ant wpp.png') }}" alt="About Us"
        class="w-1/2">

    <div class="">
        <div class="flex items-center justify-between">
            <h1 class="ml-5 text-5xl font-bold">THE STORY BEHIND</h1>
            <a href="#"
                class="flex gap-3 mr-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
                    <path d="M18 8L22 12L18 16" />
                    <path d="M2 12H22" />
                </svg>
                See More
            </a>
        </div>

        <p class="m-5 text-justify text-xl">More than just a bag, alttt.craftedgoods is your fashion icon. We present fresh, bold, and youthful designs, specifically designed to set trends, not just follow them. With carefully curated color combinations, our bags are ready to complement your look—from casual to edgy street style. So, are you ready to make your style unforgettable?</p>

        <p class="m-5 text-justify text-xl">Another more than just a bag, alttt.craftedgoods is your fashion icon. We present fresh, bold, and youthful designs, specifically designed to set trends, not just follow them. With carefully curated color combinations, our bags are ready to complement your look—from casual to edgy street style. So, are you ready to make your style unforgettable?</p>
    </div>
</div>
@endsection