@extends('layout.guest')

@section('title', 'Products')
@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mb-10"
        data-has-more="{{ $products->hasMorePages() ? '1' : '0' }}">

        @forelse ($products as $product)
            <div class="group cursor-pointer">

                @if ($product->details->count())
                    @php
                        $firstDetail = $product->details->first();
                        $imagePath = $firstDetail->image_product;
                    @endphp

                    <a href="{{ route('detproduct', $product->id_product) }}"
                        class="block relative w-full aspect-square overflow-hidden transition-transform duration-300 group-hover:scale-105 rounded-xl">

                        @if ($imagePath && file_exists(public_path($imagePath)))
                            <img src="{{ asset($imagePath) }}"
                                class="w-full h-full object-cover {{ !$product->is_available ? 'grayscale blur-[1px]' : '' }}"
                                alt="{{ $product->product_name }}">
                        @else
                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                                <span class="text-xs">No Image</span>
                            </div>
                        @endif

                        @if (!$product->is_available)
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none bg-black/10">
                                <span
                                    class="bg-red-700/80 text-white px-6 py-2 flex items-center justify-center text-sm font-bold tracking-widest shadow-xl">
                                    SOLD OUT
                                </span>
                            </div>
                        @endif

                    </a>
                @endif

                <h3 class="mt-4 font-semibold text-lg text-center group-hover:text-gray-600 transition-colors">
                    {{ Str::upper($product->product_name) }}
                </h3>

                <p class="mt-1 font-bold text-center text-gray-900">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

            </div>
        @empty
            <div
                class="col-span-full text-center py-20 text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
                @if (request('search'))
                    No results for <span class="font-bold text-black">"{{ request('search') }}"</span>.
                @else
                    Products Not Available.
                @endif
            </div>
        @endforelse

    </div>
@endsection
