@extends('layout.guest')

@section('content')

<div class="rounded-xl p-10 py-4">
    <form action="{{ route('products') }}" method="GET"
        class="flex flex-col md:flex-row md:items-center gap-3">

        <input type="text"
            name="search"
            placeholder="Search Products Here..."
            value="{{ request('search') }}"
            class="border px-4 py-2 flex-1 rounded-lg">

        <select name="sort"
            onchange="this.form.submit()"
            class="border px-3 py-2 rounded-lg">
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                Price: High to low
            </option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                Price: Low to high
            </option>
        </select>

    </form>
</div>


<div id="product-cards" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-20 m-10">

    @foreach ($products as $product)
    <div class="aspect-square">

        @if ($product->details->count())
        <img
            src="{{ asset('storage/produk' . $product->details->first()->image_product) }}"
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
    <a href="#"
        class="flex px-8 py-3 border rounded-full hover:bg-[#1A1A1A] hover:text-white transition gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
            <path d="M18 8L22 12L18 16" />
            <path d="M2 12H22" />
        </svg>
        See More
    </a>
</div>
@endsection