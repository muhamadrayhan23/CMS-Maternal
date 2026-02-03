@extends('layout.guest')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

        <div>
            <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden">
                <img
                    src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                    class="w-full h-full object-cover">
            </div>

            <div class="flex gap-3 mt-4">
                @foreach ($product->details as $detail)
                <div class="w-20 h-20 border rounded-lg overflow-hidden">
                    <img
                        src="{{ asset('storage/' . $detail->image_product) }}"
                        class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <h1 class="text-3xl font-bold uppercase">
                {{ $product->product_name }}
            </h1>

            <p class="text-xl font-semibold mt-2">
                Rp {{ number_format($product->price) }}
            </p>

            <p class="mt-6 text-gray-600 leading-relaxed">
                {{ $product->desc }}
            </p>

            <!-- <div class="mt-6">
                <p class="font-semibold mb-2">Colors</p>
                <div class="flex gap-3">
                    <span class="w-6 h-6 bg-black rounded-full"></span>
                    <span class="w-6 h-6 bg-gray-500 rounded-full"></span>
                    <span class="w-6 h-6 border rounded-full"></span>
                </div>
            </div> -->

            <div class="flex gap-4 mt-8">
                <h2 class="font-sans">Available on : </h2>
                @foreach ($product->links as $link)
                <a href="{{ $link->link_address }}" target="_blank"
                    class="p-3 bg-black text-white rounded-lg flex gap-3">
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

<div class="flex items-center ml-25 mb-10">

    <h1 class="mx-6 font-sans text-2xl tracking-wide whitespace-nowrap ml-10">
        WE PRESENT
    </h1>

    <span class="flex-1 h-px bg-gray-300"></span>
</div>

<div id="product-cards" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-20 m-10">

    @foreach ($products as $product)
    <div class="aspect-square">

        <a href="{{ route('detproduct',  $product['id_product']) }}">
            <img src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                class="w-full h-full object-cover rounded-lg">
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

@endsection