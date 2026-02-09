@extends('layout.guest')

@section('content')
<style>
    #thumbs::-webkit-scrollbar {
        display: none;
    }
</style>

<div class="mx-auto px-4 md:px-10">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-16">

        <div class="flex flex-col gap-4">

            <nav class="flex items-center justify-between text-xs md:text-sm text-gray-400 md:mt-10">
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

            <div class="flex flex-col md:flex-row gap-2 items-start">
                <div class="order-1 md:block md:order-2 w-full flex-1 bg-gray-100 rounded-sm overflow-hidden aspect-square">
                    <img
                        id="main-image"
                        src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                        class="w-full h-full object-cover object-center">
                </div>
                <div class="order-2 md:order-1 relative self-center px-4">
                    <button id="thumb-prev-desktop"
                        class="hidden md:flex absolute -top-4 left-1/2 -translate-x-1/2 bg-gray-600/70 shadow rounded-full p-1 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="m18 15-6-6-6 6" />
                        </svg>
                    </button>

                    <button id="thumb-prev-mobile"
                        class="md:hidden mx-3 absolute left-0 top-1/2 -translate-y-1/2 bg-gray-600/70 shadow rounded-full p-1 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                            viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>

                    <div id="thumbs" class="flex flex-row md:flex-col gap-3 max-w-[370px] md:max-w-none
                    max-h-none md:max-h-[520px] overflow-x-auto md:overflow-y-auto items-center md:items-start
                    px-1 py-2">

                        @foreach ($product->details as $index => $detail)
                        <button
                            type="button"
                            class="thumb w-20 md:w-24 aspect-square shrink-0
                            {{ $index === 0 ? 'ring-2 ring-[#ff5e00]' : 'hover:ring-2 hover:ring-[#ff5e00]' }}"
                            data-key="{{ $index }}"
                            data-src="{{ asset('storage/' . $detail->image_product) }}"
                            data-name="{{ $detail->atribute_name }}">

                            <img
                                src="{{ asset('storage/' . $detail->image_product) }}"
                                class="w-full h-full object-cover">
                        </button>
                        @endforeach
                    </div>

                    <button id="thumb-next-mobile"
                        class="md:hidden absolute mx-3 right-0 top-1/2 -translate-y-1/2 bg-gray-600/70 shadow rounded-full p-1 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                            viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>

                    <button id="thumb-next-desktop"
                        class="hidden md:flex absolute -bottom-4 left-1/2 -translate-x-1/2 bg-gray-600/70 shadow rounded-full p-1 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                </div>


            </div>
        </div>
        <div
            id="variant-name-mobile"
            class="block items-start md:hidden text-xs font-medium text-black tracking-wide">
            {{ $product->details->first()->name ?? '' }}
        </div>


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
                        px-2 py-2 text-[11px] rounded-[2px]
                        md:gap-3 md:px-3 md:py-2 md:text-sm 
                        border border-black text-black md:rounded-sm"
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
                        class="flex items-center gap-3 px-3 py-2.5 text-[11px] md:text-base md:px-6 md:py-3 bg-black text-white rounded-[5px] md:rounded-md">

                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                            <path d="m21 3-9 9" />
                            <path d="M15 3h6v6" />
                        </svg>

                        {{ $link->link_name }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

    </div>

</div>

<div class="flex items-center mb-5 mt-10 mx-auto px-4 md:px-10">

    <h1 class="font-sans text-lg md:text-2xl tracking-wide whitespace-nowrap">
        RELATED PRODUCTS
    </h1>

    <span class="flex-1 h-px bg-gray-300 mx-5"></span>
</div>

<div class="mx-auto px-4 md:px-10 mb-10">
    <div id="product-cards"
        class="flex flex-col sm:grid sm:grid-cols-2 lg:flex lg:flex-row lg:flex-wrap gap-10">

        @foreach ($products as $product)
        <div class="w-full sm:w-auto lg:w-[23%] transition-all duration-300 hover:scale-[1.03]">

            <div class="aspect-square transition-all duration-300 ease-out hover:scale-105 relative cursor-pointer">

                <a href="{{ route('detproduct', $product['id_product']) }}">
                    <img src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                        class="w-full h-full object-cover rounded-md">
                </a>

                @if (!$product->is_available)
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <span class="bg-red-700/70 text-white w-90 h-20 flex items-center justify-center text-sm">
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
            thumbs.forEach(t => t.classList.remove('ring-2', 'ring-[#ff5e00]'));
            variants.forEach(v => v.classList.remove('border-black', 'bg-[#dddddd]', 'text-white'));
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


            thumb.classList.add('ring-2', 'ring-[#ff5e00]');
            variant.classList.add('border-black', 'bg-[#dddddd]', 'text-');
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const thumbs = document.getElementById('thumbs');

        const buttons = {
            prevMobile: document.getElementById('thumb-prev-mobile'),
            nextMobile: document.getElementById('thumb-next-mobile'),
            prevDesktop: document.getElementById('thumb-prev-desktop'),
            nextDesktop: document.getElementById('thumb-next-desktop'),
        };

        const scrollAmount = 120;

        buttons.prevMobile?.addEventListener('click', () => {
            thumbs.scrollLeft -= scrollAmount;
        });

        buttons.nextMobile?.addEventListener('click', () => {
            thumbs.scrollLeft += scrollAmount;
        });

        buttons.prevDesktop?.addEventListener('click', () => {
            thumbs.scrollTop -= scrollAmount;
        });

        buttons.nextDesktop?.addEventListener('click', () => {
            thumbs.scrollTop += scrollAmount;
        });
    });
</script>







@endsection