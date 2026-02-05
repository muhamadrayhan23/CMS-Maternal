@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')
@section('title', 'Product Detail')

@section('content')
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <div class="p-10 max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="{{ route('produk.index') }}" class="text-gray-800 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-arrow-left-icon lucide-arrow-left">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>
                    <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Back to Products</h1>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-10 grid grid-cols-1 md:grid-cols-2 gap-12">

                    <div class="max-w-md">

                        @php
                            $mainImage = optional($produk->details->first())->image_product;
                        @endphp

                        <img id="mainImage"
                            src="{{ $mainImage ? asset('storage/' . $mainImage) : 'https://via.placeholder.com/400' }}"
                            class="w-full h-[380px] object-cover rounded-xl border border-gray-300">

                        <div class="flex gap-3 mt-4">
                            @foreach ($produk->details as $detail)
                                @if ($detail->image_product)
                                    <img src="{{ asset('storage/' . $detail->image_product) }}"
                                        data-attribute="{{ $detail->atribute_name }}" onclick="changeImage(this)"
                                        class="thumb w-20 h-20 object-cover rounded-lg cursor-pointer border border-gray-300 hover:ring-2 hover:ring-gray-400 transition">
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <h1 class="text-2xl font-bold mb-2 font-space-grotesk">{{ $produk->product_name }}</h1>
                            <p class="text-xl font-semibold text-gray-800 mb-4">
                                Rp {{ number_format($produk->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <p class="text-gray-600 mb-6">
                            {{ $produk->desc }}
                        </p>

                        <div class="bg-white rounded-xl shadow p-6 gap-8">
                            <h3 class="font-semibold mb-2">Attribute Name:</h3>
                            <p id="attributeText" class="text-gray-700 font-semibold">
                                {{ $produk->details->first()?->atribute_name ?? '-' }}
                            </p>
                        </div>

                        <br>

                        <div class="mb-6">
                            <h3 class="font-semibold mb-3">Product Links</h3>

                            @if ($produk->links->count())
                                <div class="flex flex-row gap-4 flex-wrap">
                                    @foreach ($produk->links as $link)
                                        <a href="{{ $link->link_address }}" target="_blank"
                                            class="flex items-center gap-3 px-6 py-3 bg-black text-white rounded-lg">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                                                <path d="m21 3-9 9" />
                                                <path d="M15 3h6v6" />
                                            </svg>

                                            {{ $link->link_name }}
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-400">Tidak ada link</p>
                            @endif
                        </div>

                        <div class="meta text-gray-800">
                            @if ($produk->updated_by && $produk->updated_at)
                                <div class="grid grid-cols-1 md:grid-cols-2">
                                    <h6>Updated by <strong>{{ $produk->updater?->name ?? '-' }}</strong></h6>
                                    <h6>Updated at <strong>{{ $produk->updated_at }}</strong></h6>
                                </div>
                            @else
                                <div class="grid grid-cols-1 md:grid-cols-2">
                                    <h6>Created by <strong>{{ $produk->creator?->name ?? '-' }}</strong></h6>
                                    <h6>Created at <strong>{{ $produk->created_at }}</strong></h6>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeImage(el) {
            document.getElementById('mainImage').src = el.src;
            document.querySelectorAll('.thumb').forEach(img => {
                img.classList.remove('border-black');
                img.classList.add('border-gray-300');
            });

            el.classList.remove('border-gray-300');
            el.classList.add('border-black');

            const attr = el.dataset.attribute;
            if (attr) {
                document.getElementById('attributeText').textContent = attr;
            }
        }
    </script>

    </div>
@endsection
