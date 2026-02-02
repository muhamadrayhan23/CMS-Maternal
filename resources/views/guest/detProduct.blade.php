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

            <div class="mt-6">
                <p class="font-semibold mb-2">Colors</p>
                <div class="flex gap-3">
                    <span class="w-6 h-6 bg-black rounded-full"></span>
                    <span class="w-6 h-6 bg-gray-500 rounded-full"></span>
                    <span class="w-6 h-6 border rounded-full"></span>
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                @foreach ($product->links as $link)
                    <a href="{{ $link->url }}" target="_blank"
                        class="px-6 py-3 bg-black text-white rounded-lg">
                        {{ ucfirst($link->platform) }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection
