@extends('layout.guest')

@section('content')
    <div class="mx-auto px-10">

<div class="mx-auto px-4 md:px-10">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-16">

                {{-- NAV (row di dalamnya) --}}
                <nav class="flex items-center justify-between text-sm text-gray-400">
                    <div>
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if (!$loop->last)
                                <a href="{{ $breadcrumb['url'] }}" class="hover:text-black">
                                    {{ $breadcrumb['title'] }}
                                </a>
                                <span class="mx-2">/</span>
                            @else
                                <span class="text-black">{{ $breadcrumb['title'] }}</span>
                            @endif
                        @endforeach
                    </div>

            <nav class="flex items-center justify-between text-xs md:text-sm text-gray-400">
                <div>
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                    <a href="{{ $breadcrumb['url'] }}" class="hover:text-black">
                        {{ $breadcrumb['title'] }}
                    </a>
                    <span class="mx-2">/</span>
                    @else
                    <span class="text-black">{{ $breadcrumb['title'] }}</span>
                    @endif
                    @endforeach
                </div>

                <div
                    id="variant-name"
                    class="hidden md:block text-black text-xs md:text-sm font-medium tracking-wide">
                    {{ $product->details->first()->name ?? '' }}
                </div>
            </nav>

            <div class="flex flex-col md:flex-row gap-4 items-start">
                <div class="order-1 md:block md:order-2 w-full md:flex-1 bg-gray-100 rounded-sm overflow-hidden 
                    aspect-square">
                    <img
                        id="main-image"
                        src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                        class="w-full h-full object-cover">
                </div>
                <div class="order-2 md:order-1 flex flex-row md:flex-col gap-3 w-full md:w-auto shrink-0 md:h-full
                 md:justify-center items-center md:overflow-y-auto md:max-h-full">

                    @foreach ($product->details as $index => $detail)
                    <button
                        type="button"
                        class="thumb w-20 md:w-24 aspect-square rounded-sm overflow-hidden
                        {{ $index === 0 ? 'ring-2 ring-black' : 'hover:ring-2 hover:ring-black' }}"
                                    data-key="{{ $index }}"
                                    data-src="{{ asset('storage/' . $detail->image_product) }}"
                                    data-name="{{ $detail->atribute_name }}">


                                    <img src="{{ asset('storage/' . $detail->image_product) }}"
                                        class="w-full h-full object-cover">
                        </div>
                    </div>

            </div>


            <div class="">
                <h1 class="text-3xl font-semibold uppercase">
                    {{ $product->product_name }}
                </h1>

                <p class="text-2xl font-semibold mt-2">
                    Rp {{ number_format($product->price) }}
                </p>

                <p class="mt-6 text-gray-600 text-md leading-relaxed bg-gray-100 rounded-md p-5">
                    {{ $product->desc }}
                </p>

                <div class="flex flex-col gap-4 mt-8 mb-8">
                    <h2 class="font-sans">Available on :</h2>

                    <div class="flex flex-col gap-5 mt-8 mb-8">
                        <h2 class="font-sans">Variant :</h2>

                        <div class="flex flex-row gap-4 flex-wrap">
                            @foreach ($product->details as $index => $p)
                                <button type="button"
                                    class="variant-item flex items-center gap-3 px-3 py-2 border border-black text-black rounded-lg"
                                    data-key="{{ $index }}" data-src="{{ asset('storage/' . $p->image_product) }}"
                                    data-name="{{ $p->atribute_name }}">


                                    <img src="{{ asset('storage/' . $p->image_product) }}" alt="" class="w-8 h-8">
                                    <span class="text-sm">
                                        {{ $p->atribute_name }}
                                    </span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    @if (!$product->is_active)
                        <div class="flex gap-2 mt-8 mb-8 opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" x2="12" y1="8" y2="12" />
                                <line x1="12" x2="12.01" y1="16" y2="16" />
                            </svg>
                            <h2 class="font-san">Unvailable — Restocking Soon</h2>
                        </div>
                    @else
                        <div class="flex flex-col gap-4 mt-8 mb-8">
                            <h2 class="font-sans">Available on :</h2>

                            <div class="flex flex-row gap-4 flex-wrap">
                                @foreach ($product->links as $link)
                                    <a href="{{ url($link->link_address) }}" target="_blank"
                                        class="flex items-center gap-3 px-6 py-3 bg-black text-white rounded-lg">

                                        {{ $link->link_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                </div>
                @endif


            </div>
        </div>
        <div
            id="variant-name-mobile"
            class="block items-start md:hidden text-xs font-medium text-black tracking-wide">
            {{ $product->details->first()->name ?? '' }}
        </div>

        <div class="flex items-center mx-10 mb-10 mt-10">

        <div class="justify items-center md:mt-10">
            <div class="flex items-start justify-between gap-4 md:block w-full">
                <h1 class="text-xl md:text-3xl font-semibold uppercase">
                    {{ $product->product_name }}
                </h1>

                <p class="text-md md:text-2xl font-semibold mt-0 md:mt-2 whitespace-nowrap">
                    Rp {{ number_format($product->price) }}
                </p>
            </div>


            <p class="mt-2 text-gray-600 text-xs p-3 text-justify md:text-base leading-relaxed bg-gray-100 rounded-md md:p-5">
                {{ $product->desc }}
            </p>

            <div class="flex flex-col gap-5 mt-8 mb-8">
                <h2 class="text-sm md:text-base font-sans">Variant :</h2>

                <div class="flex flex-row gap-4 flex-wrap">
                    @foreach ($product->details as $index => $p)
                    <button
                        type="button"
                        class="variant-item flex items-center gap-2
                        px-2 py-2 text-[11px] rounded-[5px]
                        md:gap-3 md:px-3 md:py-2 md:text-sm
                        border border-black text-black md:rounded-lg"
                        data-key="{{ $index }}"
                        data-src="{{ asset('storage/' . $p->image_product) }}"
                        data-name="{{ $p->atribute_name }}">


                        <img src="{{ asset('storage/' . $p->image_product) }}" alt="" class="w-5 h-5 md:w-8 md:h-8">
                        <span class="text-sm">
                            {{ $p->atribute_name }}
                        </span>
                    </button>
                    @endforeach
                </div>
            </div>

            @if (!$product->is_available)
            <div class="flex gap-2 md:mt-8 mb-8 opacity-40">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" x2="12" y1="8" y2="12" />
                    <line x1="12" x2="12.01" y1="16" y2="16" />
                </svg>
                <h2 class="font-san">Unvailable — Restocking Soon</h2>
            </div>
            @else
            <div class="flex flex-col gap-4 md:mt-8 mb-8">
                <h2 class="font-sans text-sm md:text-base">Available on :</h2>

                <div class="flex flex-row gap-4 flex-wrap">
                    @foreach ($product->links as $link)
                    <a href="{{ url($link->link_address) }}" target="_blank"
                        class="flex items-center gap-3 px-3 py-2.5 text-[11px] md:px-6 md:py-3 bg-black text-white rounded-[5px] md:rounded-lg">

                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                            <path d="m21 3-9 9" />
                            <path d="M15 3h6v6" />
                        </svg>

                        {{ $link->link_name }}
                    </a>


        </div>

    </div>

</div>

<div class="flex items-center mb-5 mt-10 mx-auto px-4 md:px-10">

    <h1 class="font-sans text-lg md:text-2xl tracking-wide whitespace-nowrap">
        RELATED PRODUCTS
    </h1>

    <span class="flex-1 h-px bg-gray-300 mx-5"></span>
</div>
<div class="mx-auto px-4 md:px-10">
    <div id="product-cards" class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-16">
        @foreach ($products as $product)
        <div class="aspect-square transition-all duration-300 ease-out hover:scale-105 relative cursor-pointer">

            <a href="{{ route('detproduct',  $product['id_product']) }}">
                <img src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                    class="w-full h-full object-cover rounded-lg">
            </a>

            @if (!$product->is_available)
            <div class="absolute inset-0 flex items-center justify-center  pointer-events-none">
                <span class="bg-red-700/70 text-white w-90 h-20 flex items-center justify-center
                 text-sm">
                    SOLD OUT
                </span>
            </div>
            @endif

            <h3 class="mt-3 font-semibold text-lg text-center">
                {{ Str::upper($product->product_name) }}
            </h3>

            <p class="mt-2 font-bold text-center">
                Rp {{ number_format($product->price) }}
            </p>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainImage = document.getElementById('main-image');
        const variantName = document.getElementById('variant-name');
        const variantNameMobile = document.getElementById('variant-name-mobile');

                        const thumbs = document.querySelectorAll('.thumb');
                        const variants = document.querySelectorAll('.variant-item');

                        function clearActive() {
                            thumbs.forEach(t => t.classList.remove('ring-2', 'ring-black'));
                            variants.forEach(v => v.classList.remove('border-black', 'bg-black', 'text-white'));
                        }

                        function setActiveByKey(key) {
                            const thumb = document.querySelector(`.thumb[data-key="${key}"]`);
                            const variant = document.querySelector(`.variant-item[data-key="${key}"]`);

                            if (!thumb || !variant) return;

                            clearActive();

            mainImage.src = thumb.dataset.src;

            if (variantName) {
                variantName.innerText = thumb.dataset.name;
            }

            if (variantNameMobile) {
                variantNameMobile.innerText = thumb.dataset.name;
            }


                            thumb.classList.add('ring-2', 'ring-black');
                            variant.classList.add('border-black', 'bg-black', 'text-white');
                        }

                        thumbs.forEach(thumb => {
                            thumb.addEventListener('click', () => {
                                setActiveByKey(thumb.dataset.key);
                            });
                        });

                        variants.forEach(variant => {
                            variant.addEventListener('click', () => {
                                setActiveByKey(variant.dataset.key);
                            });
                        });
                    });
                </script>




            @endsection
