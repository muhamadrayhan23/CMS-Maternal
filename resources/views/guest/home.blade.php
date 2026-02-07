@extends('layout.guest')

@vite(['resources/css/app.css', 'resources/js/app.js'])

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

<div id="default-carousel" data-carousel="slide" class="group relative">

    <div class="relative w-full h-screen md:h-screen font-sans -mt-22 overflow-hidden">
        @foreach($banners as $index => $banner)
        <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out"
            data-carousel-item="{{ $index === 0 ? 'active' : '' }}">

            <img src="{{ asset($banner->banner_image) }}"
                class="absolute inset-0 w-full h-full object-cover"
                alt="Banner {{ $index + 1 }}">

            {{-- Button --}}
            <div class="absolute inset-x-0 bottom-10 md:bottom-15 flex justify-center">
                <a href="{{ route('products')}}"
                    class="px-7 py-2 rounded-full border-2 border-white text-white font-medium text-md font-sans hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Dots --}}
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

    {{-- Arrow Left --}}
    <button id="leftArrow" type="button" data-carousel-prev
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-3 md:px-4
        cursor-pointer focus:outline-none opacity-0 group-hover:opacity-100 transition-opacity duration-400">

        <span class="inline-flex items-center justify-center w-9 h-9 md:w-10 md:h-10 rounded-full border border-white transition
            hover:bg-white/5 dark:hover:bg-black/70 hover:border-gray-800/50">
            <svg class="w-5 h-5 text-white rtl:rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </span>
    </button>

    {{-- Arrow Right --}}
    <button id="rightArrow" type="button" data-carousel-next
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-3 md:px-4
        cursor-pointer focus:outline-none opacity-0 group-hover:opacity-100 transition-opacity duration-400">

        <span class="inline-flex items-center justify-center w-9 h-9 md:w-10 md:h-10 rounded-full border border-white transition
            hover:bg-white/50 dark:hover:bg-black/70 hover:border-gray-800/50">
            <svg class="w-5 h-5 text-white rtl:rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    d="m9 5 7 7-7 7" />
            </svg>
        </span>
    </button>
</div>


{{-- =========================
    PRODUCT SECTION
========================= --}}
<div id="product-cards"
    class="relative flex flex-col md:flex-row gap-10 md:gap-20
    px-5 md:px-10 py-14">

    {{-- LEFT CONTENT --}}
    <div class="flex flex-col justify-center w-full md:w-[420px] shrink-0">
        <h1 class="font-sans text-3xl md:text-4xl tracking-wide font-bold">
            INTRODUCING, <br> OUR PRODUCTS
        </h1>

        <p class="my-5 text-justify text-sm md:text-base leading-relaxed">
            Timeless daily wear designed for comfort and sensory connection. Each piece is crafted to feel natural on your skin, offering ease you can return to every day.
            <br><br>
            Through tactile paracord details, our creations become a quiet sanctuary helping you slow down, reconnect with nature, and find calm in a crowded world.
        </p>

        <a href="{{ route('products') }}"
            class="inline-flex items-center px-8 py-3 bg-black text-white rounded-full gap-2 w-fit">
            → View More
        </a>
    </div>

    {{-- SLIDER WRAPPER --}}
    <div class="relative flex items-center w-full">

        {{-- ARROW LEFT --}}
        <button id="prevBtn"
            class="absolute left-0 md:-left-10 top-1/2 -translate-y-1/2 z-40
            bg-black w-9 h-9 md:w-10 md:h-10 rounded-full shadow
            hidden flex items-center justify-center">
            <svg class="w-5 h-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </button>

        {{-- VIEWPORT --}}
        <div class="relative w-full md:w-[920px] overflow-hidden py-10 md:py-14">

            {{-- TRACK --}}
            <div id="cardTrack"
                class="flex gap-6 md:gap-15 transition-transform duration-500 ease-out mx-2 md:mx-3 items-center">

                @foreach ($products as $product)
                <div class="w-[300px] items-center sm:w-[300px] md:w-[420px] shrink-0">

                    <div class="relative aspect-square rounded-xl transition-transform duration-300 hover:scale-105 will-change-transform">

                        <a href="{{ route('detproduct', $product->id_product) }}">
                            <img
                                src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                                class="w-full h-full object-cover rounded-xl">
                        </a>

                        @if (!$product->is_available)
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <span class="bg-red-700/70 text-white w-full h-16 flex items-center justify-center text-sm font-semibold">
                                SOLD OUT
                            </span>
                        </div>
                        @endif

                    </div>

                    <h3 class="mt-4 font-semibold text-base md:text-lg text-center">
                        {{ Str::upper($product->product_name) }}
                    </h3>

                    <p class="mt-1 font-bold text-center text-sm md:text-base">
                        Rp {{ number_format($product->price) }}
                    </p>
                </div>
                @endforeach

            </div>
        </div>

        {{-- ARROW RIGHT --}}
        <button id="nextBtn"
            class="absolute right-0 md:-right-10 top-1/2 -translate-y-1/2 z-40
            bg-black w-9 h-9 md:w-10 md:h-10 rounded-full shadow
            flex items-center justify-center">
            <svg class="w-5 h-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                    d="m9 5 7 7-7 7" />
            </svg>
        </button>
    </div>
</div>


{{-- =========================
    ABOUT BANNER
========================= --}}
<div class="transition-all duration-700 hover:scale-105">
    <div class="relative w-full overflow-hidden">
        <img src="{{ asset('img/bg_about.png') }}" alt=""
            class="w-full h-[520px] md:h-auto object-cover">

        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center px-5 md:px-10 max-w-5xl">

                <span class="block text-[10px] tracking-[0.3em] uppercase text-gray-200 mb-3">
                    About Us
                </span>

                <h2 class="text-2xl sm:text-4xl md:text-6xl font-normal leading-[1.15] tracking-tight text-white">
                    <span class="text-gray-200 italic font-bold">Born from Curiosity,</span> crafted with Care.
                </h2>

                <div class="font-sans text-sm sm:text-base md:text-xl text-white mt-5 leading-relaxed">
                    We craft timeless daily wear that prioritizes comfort and sensory connection. Our paracord creations are a tactile sanctuary, a way to reconnect with nature and find calm in a crowded world.
                </div>

                <div class="flex justify-center mt-8 md:mt-10">
                    <a href="{{ route('about') }}"
                        class="flex px-7 md:px-8 py-3 border rounded-full border-white text-white hover:bg-white hover:text-black transition gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8L22 12L18 16" />
                            <path d="M2 12H22" />
                        </svg>
                        Explore Our Journey
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>


{{-- =========================
    SLIDER SCRIPT (same logic)
========================= --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.getElementById('cardTrack');
        const viewport = track.parentElement;
        const next = document.getElementById('nextBtn');
        const prev = document.getElementById('prevBtn');

        const cards = track.children;

        const cardRect = cards[0].getBoundingClientRect();
        const cardWidth = cardRect.width;

        const gap = parseFloat(getComputedStyle(track).gap) || 0;
        const step = cardWidth + gap;

        const viewportWidth = viewport.getBoundingClientRect().width;
        const visibleCards = Math.floor(viewportWidth / step);

        let index = 0;
        const totalCards = cards.length;
        const maxIndex = totalCards - visibleCards;

        function update() {
            track.style.transform = `translateX(-${index * step}px)`;
            prev.classList.toggle('hidden', index === 0);
            next.classList.toggle('hidden', index >= maxIndex);
        }

        next.onclick = () => {
            if (index < maxIndex) {
                index++;
                update();
            }
        };

        prev.onclick = () => {
            if (index > 0) {
                index--;
                update();
            }
        };

        update();
        window.addEventListener('resize', () => location.reload());
    });
</script>

@endsection
