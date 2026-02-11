@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')
@section('title', 'Product Detail')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <div class="p-4 md:p-10 space-y-6">
            <div class="flex items-center gap-3">
                <a href="{{ session('produk_back', route('dashboardadmin')) }}" class="text-gray-800 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg>
                </a>
                <h1 class="text-xs md:text-sm font-bold uppercase">
                    Product Detail
                </h1>
            </div>

            <div
                class="bg-white rounded-2xl shadow-lg p-5 md:p-10 max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
                <div class="max-w-md mx-auto w-full">
                    @php
                        $mainImage = optional($produk->details->first())->image_product;
                    @endphp

                    <div class="w-full h-[400px] rounded-xl shadow-lg overflow-hidden bg-gray-100">
                        <img id="mainImage"
                            src="{{ $mainImage ? asset('storage/' . $mainImage) : 'https://via.placeholder.com/400' }}"
                            class="w-full h-full object-contain">
                    </div>

                    <div class="flex gap-3 mt-4 overflow-x-auto">
                        @foreach ($produk->details as $detail)
                            @if ($detail->image_product)
                                <img src="{{ asset('storage/' . $detail->image_product) }}"
                                    data-attribute="{{ $detail->atribute_name }}" data-price="{{ $detail->price }}"
                                    onclick="changeImage(this)"
                                    class="thumb w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg cursor-pointer border border-gray-300 hover:ring-2 hover:ring-gray-400 transition">
                            @endif
                        @endforeach
                    </div>
                </div>


                <div class="space-y-6">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2">
                        <h1 class="text-xl md:text-2xl font-bold">
                            {{ $produk->product_name }}
                        </h1>
                        <p id="priceText" class="text-lg md:text-xl font-semibold text-gray-800">
                            Rp {{ number_format($produk->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <p
                        class="text-gray-600 text-sm md:text-md leading-relaxed bg-gray-100 rounded-md p-4 md:p-5 max-w-xl break-words">
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
                            <div class="flex flex-wrap gap-3">
                                @foreach ($produk->links as $link)
                                    <a href="{{ $link->link_address }}" target="_blank"
                                        class="flex items-center gap-2 px-4 py-2 bg-black text-white rounded-lg text-sm">
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
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }

        function changeImage(el) {
            document.getElementById('mainImage').src = el.src;
            document.querySelectorAll('.thumb').forEach(img => {
                img.classList.remove('border-black');
                img.classList.add('border-gray-300');
            });

            el.classList.remove('border-gray-300');
            el.classList.add('border-black');

            if (el.dataset.attribute) {
                document.getElementById('attributeText').textContent = el.dataset.attribute;
            }

            if (el.dataset.price) {
                document.getElementById('priceText').textContent =
                    'Rp ' + formatRupiah(el.dataset.price);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const mainImg = document.getElementById('mainImage');
            const thumbs = document.querySelectorAll('.thumb');

            thumbs.forEach(img => {
                if (img.src === mainImg.src) {
                    img.classList.remove('border-gray-300');
                    img.classList.add('border-black');

                    if (img.dataset.attribute) {
                        document.getElementById('attributeText').textContent = img.dataset.attribute;
                    }

                    if (img.dataset.price) {
                        document.getElementById('priceText').textContent =
                            'Rp ' + formatRupiah(img.dataset.price);
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const mainImg = document.getElementById('mainImage');
            const thumbs = document.querySelectorAll('.thumb');

            thumbs.forEach(img => {
                if (img.src === mainImg.src) {
                    img.classList.remove('border-gray-300');
                    img.classList.add('border-black');
                }
            });
        });
    </script>

    </div>
@endsection
