@extends('layout.guest')

@section('content')
<div class="flex justify-start mx-10 my-5 text-gray-400">
    Breadcrumbs / Products / Tas Baru
</div>
<div class="mx-auto px-10">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

        <div class="flex gap-6">
            <div class="flex flex-col gap-4">
                @foreach ($product->details as $index => $detail)
                <button
                    type="button"
                    class="thumb w-30 h-30 rounded-lg overflow-hidden
                    {{ $index === 0 ? 'ring-2 ring-black' : 'hover:ring-2 hover:ring-black' }}"
                    data-src="{{ asset('storage/' . $detail->image_product) }}">

                    <img
                        src="{{ asset('storage/' . $detail->image_product) }}"
                        class="w-full h-full object-cover">
                </button>
                @endforeach
            </div>

            <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden">
                <img
                    id="main-image"
                    src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                    class="w-full h-full object-cover">
            </div>

        </div>

        <div class="">
            <h1 class="text-5xl font-semibold uppercase">
                {{ $product->product_name }}
            </h1>

            <p class="text-4xl font-semibold mt-5">
                Rp {{ number_format($product->price) }}
            </p>

            <p class="mt-6 text-gray-600 text-xl leading-relaxed bg-gray-200 rounded-md p-5">
                {{ $product->desc }}
            </p>

            <div class="flex-col gap-4 mt-8 mb-8">
                <h2 class="font-sans">Available on : </h2>
                @foreach ($product->links as $link)
                <a href="{{ $link->link_address }}" target="_blank"
                    class="p-3 bg-black text-white rounded-lg flex-row gap-3 px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right-icon lucide-square-arrow-out-up-right">
                        <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                        <path d="m21 3-9 9" />
                        <path d="M15 3h6v6" />
                    </svg>
                    {{ $link->link_name }}
                </a>
                @endforeach
            </div>
        </div>

    </div>

</div>

<div class="flex items-center mx-10 mb-10 mt-10">

    <h1 class="font-sans text-2xl tracking-wide whitespace-nowrap">
        MAY WE SUGGEST
    </h1>

    <span class="flex-1 h-px bg-gray-300 mx-5"></span>
</div>

<div id="product-cards" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-20 m-10">

    @foreach ($products as $product)
    <div class="aspect-square transition-all duration-300 ease-out hover:-translate-y-2">

        <a href="{{ route('detproduct',  $product['id_product']) }}">
            <img src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                class="w-full h-full object-cover rounded-lg hover:shadow-xl">
        </a>

        <h3 class="mt-3 font-semibold text-lg text-center">
            {{ $product->product_name }}
        </h3>

        <p class="mt-2 font-bold text-center">
            Rp {{ number_format($product->price) }}
        </p>
    </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainImage = document.getElementById('main-image');
        const thumbs = document.querySelectorAll('.thumb');

        thumbs.forEach(thumb => {
            thumb.addEventListener('click', () => {
                mainImage.src = thumb.dataset.src;

                thumbs.forEach(t => {
                    t.classList.remove('ring-2', 'ring-black');
                });

                thumb.classList.add('ring-2', 'ring-black');
            });
        });
    });
</script>


@endsection