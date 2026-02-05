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
    <div class="relative w-full h-screen font-sans -mt-30 overflow-hidden">
        @foreach($banners as $index => $banner)
        <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
            <img src="{{ asset($banner->banner_image) }}"
                class="absolute inset-0 w-full h-full object-cover"
                alt="Banner {{ $index + 1 }}">

            <div class="absolute inset-x-0 bottom-15 flex justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                <a href="{{ route('products')}}"
                    class="px-7 py-2 rounded-full border-2 border-white text-white font-medium text-md font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse opacity-0 group-hover:opacity-100 transition-opacity duration-400">
        @foreach($banners as $index => $banner)
        <button type="button"
            class="w-3 h-3 rounded-full transition-colors {{ $index == 0 ? 'bg-white' : 'bg-white/50 hover:bg-white/80' }}"
            aria-current="{{ $index == 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $index + 1 }}"
            data-carousel-slide-to="{{ $index }}">
        </button>
        @endforeach
    </div>

    <button
        id="leftArrow"
        type="button"
        data-carousel-prev
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4
           cursor-pointer focus:outline-none
           opacity-0 group-hover:opacity-100
           transition-opacity duration-400">

        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full border border-white transition
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

    <button
        id="rightArrow"
        type="button"
        data-carousel-next
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer focus:outline-none
        opacity-0 group-hover:opacity-100 transition-opacity duration-400">

        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full
               border border-white
               transition
               hover:bg-white/50
               dark:hover:bg-black/70
               hover:border-gray-800/50">

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

<div id="product-cards" class="relative flex gap-20 m-10">

    {{-- LEFT CONTENT --}}
    <div class="flex flex-col justify-center w-105 shrink-0">
        <h1 class="mx-6 font-sans text-4xl tracking-wide font-bold">
            INTRODUCING, <br> OUR PRODUCTS
        </h1>

        <p class="mx-6 my-5 text-justify">
            Timeless daily wear designed for comfort and sensory connection. Each piece is crafted to feel natural on your skin, offering ease you can return to every day. <br><br> Through tactile paracord details, our creations become a quiet sanctuary helping you slow down, reconnect with nature, and find calm in a crowded world.
        </p>

        <a href="{{ route('products') }}"
            class="mx-6 inline-flex items-center px-8 py-3 bg-black text-white rounded-full gap-2 w-fit">
            → View More
        </a>
    </div>

    {{-- SLIDER WRAPPER --}}
    <div class="relative w-[920px] items-center">

        {{-- ARROW LEFT --}}
        <button id="prevBtn"
            class="absolute -left-5 top-1/2 -translate-y-1/2 z-30
                   bg-black w-10 h-10 rounded-full shadow hidden items-center">
            <svg class="w-5 h-5 text-white ml-2"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </button>

        {{-- ARROW RIGHT --}}
        <button id="nextBtn"
            class="absolute -right-5 top-1/2 -translate-y-1/2 z-30
                   bg-black w-10 h-10 rounded-full shadow items-center">
            <svg class="w-5 h-5 text-white ml-3"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                    d="m9 5 7 7-7 7" />
            </svg>
        </button>

        {{-- VIEWPORT --}}
        <div class="overflow-hidden py-14">

            {{-- TRACK --}}
            <div id="cardTrack"
                class="flex gap-15 transition-transform duration-500 ease-out mx-3">

                @foreach ($products as $product)
                <div class="w-[420px] shrink-0">

                    <div
                        class="aspect-square rounded-xl
                               transition-transform duration-300
                               hover:scale-105 will-change-transform">

                        <a href="{{ route('detproduct', $product->id_product) }}">
                            <img
                                src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                                class="w-full h-full object-cover rounded-xl">
                        </a>

                    </div>

                    <h3 class="mt-4 font-semibold text-lg text-center">
                        {{ Str::upper($product->product_name) }}
                    </h3>

                    <p class="mt-1 font-bold text-center">
                        Rp {{ number_format($product->price) }}
                    </p>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<div class="transition-all duration-700 hover:scale-105">
    <div class="relative w-full overflow-hidden ">
        <img src="{{ asset('img/bg_about.png') }}" alt=""
            class="w-full h-auto object-cover">

        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
            <span class="block text-[10px] tracking-[0.3em] uppercase text-gray-200 mb-3">
                About Us
            </span>
            <h2 class="text-4xl md:text-6xl font-normal leading-[1.1] tracking-tight text-white">
                <span class="text-gray-200 italic font-bold">Born from Curiosity,</span> crafted with Care.
            </h2>
            <div class="font-sans text-xl text-white mt-5">We craft timeless daily wear that prioritizes comfort and sensory connection. Our paracord creations are a tactile sanctuary, a way to reconnect with nature and find calm in a crowded world.</div>
            <div class="flex justify-center mt-10 mb-5">
                <a href="{{ route('about') }}"
                    class="flex px-8 py-3 border rounded-full border-white text-white hover:bg-white hover:text-black transition gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
                        <path d="M18 8L22 12L18 16" />
                        <path d="M2 12H22" />
                    </svg>
                    Explore Our Journey
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.getElementById('cardTrack');
        const next = document.getElementById('nextBtn');
        const prev = document.getElementById('prevBtn');

        const cardWidth = 420 + 40; // card + gap
        const visibleCards = 2;

        let index = 0;
        const totalCards = track.children.length;
        const maxIndex = totalCards - visibleCards;

        function update() {
            track.style.transform = `translateX(-${index * cardWidth}px)`;
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
    });
</script>


@endsection