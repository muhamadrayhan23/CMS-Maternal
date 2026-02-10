<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mb-10"
    data-has-more="{{ $products->hasMorePages() ? '1' : '0' }}">

    @forelse ($products as $product)
    <div class="relative aspect-square transition-all duration-300 hover:scale-105 cursor-pointer">

        @if ($product->details->count())
        <div class="relative">

            <a href="{{ route('detproduct', $product->id_product) }}">
                <img
                    src="{{ asset('storage/' . $product->details->first()->image_product) }}"
                    class="w-full h-full object-cover">
            </a>


            @if (!$product->is_available)
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <span class="bg-red-700/70 text-white w-90 h-20 flex items-center justify-center
                 text-sm">
                    SOLD OUT
                </span>
            </div>
            @endif


        </div>
        @endif

        <h3 class="mt-3 font-semibold text-lg text-center">
            {{ Str::upper($product->product_name) }}
        </h3>

        <p class="mt-2 font-bold text-center">
            Rp {{ number_format($product->price) }}
        </p>
    </div>
    @empty
    <div class="col-span-full text-center py-10 text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
        @if ($request->search)
        <span class="font-bold">"{{ $request->search }}"</span> not found.
        @else
        Crafted pieces are coming soon
        @endif
    </div>
    @endforelse
</div>