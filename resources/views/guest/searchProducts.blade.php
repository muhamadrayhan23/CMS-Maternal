<div id="product-cards" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-20 m-10">

    @foreach ($products as $product)
    <div class="aspect-square">

        @if ($product->details->count())
        <a href="">
            <img
                src="{{ asset('storage/produk' . $product->details->first()->image_product) }}"
                class="w-full h-full object-cover rounded-lg">
        </a>
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

<div class="mt-10 flex justify-center">
    {{ $products->appends(request()->query())->links() }}
</div>