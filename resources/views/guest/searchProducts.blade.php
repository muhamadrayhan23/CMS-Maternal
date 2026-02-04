<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-20 px-10 mb-10" class="products-wrapper" data-has-more="{{ $products->hasMorePages() ? '1' : '0' }}">
    @foreach ($products as $product)
        <div class="aspect-square transition-all duration-400 hover:scale-105">

            @if ($product->details->count())
                <a href="{{ route('detproduct', $product->id_product) }}">
                    <img
                        src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                        class="w-full h-full object-cover rounded-lg">
                </a>
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
