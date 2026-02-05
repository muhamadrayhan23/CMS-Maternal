@extends('layout.admin')
@section('title', isset($produk) ? 'Edit Product' : 'Add New Product')

@section('content')
    <div class="h-screen" id="wrapp">
        <div class="p-10">
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: @json(session('success')),
                            timer: 2000,
                            showConfirmButton: true
                        })
                    })
                </script>
            @endif
            <form action="{{ isset($produk) ? route('produk.update', $produk->id_product) : route('produk.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($produk))
                    @method('PUT')
                @endif

                <input type="hidden" name="redirect_to" id="redirect_to" value="index">

                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-3">
                        <a href="{{ session('produk_back', route('dashboardadmin')) }}"
                            class="text-gray-800 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left">
                                <path d="m12 19-7-7 7-7" />
                                <path d="M19 12H5" />
                            </svg>
                        </a>
                        <h1 class="text-sm font-bold uppercase">
                            {{ isset($produk) ? 'Edit Product' : 'Add New Product' }}
                        </h1>
                    </div>

                    <button type="submit" onclick="confirmSave()"
                        class="px-8 py-2 text-white bg-[#2D2D2A] rounded-lg hover:bg-black">
                        {{ isset($produk) ? 'Update' : 'Save' }}
                    </button>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg space-y-4 mb-8">
                    <div class="mb-4">
                        <label class="text-sm font-semibold text-gray-800">
                            Product Overview <span class="text-red-500">*</span>
                        </label>
                    </div>
                    <input name="product_name" value="{{ isset($produk) ? $produk->product_name : '' }}"
                        placeholder="Product Name"
                        class="w-full px-4 py-3 text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        required>

                    <textarea name="desc" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg" placeholder="Description"
                        required>{{ isset($produk) ? $produk->desc : '' }}</textarea>

                    <input type="text" id="price" name="price"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg" placeholder="Price"
                        value="{{ isset($produk) ? 'Rp ' . number_format($produk->price, 0, ',', '.') : '' }}" required
                        oninput="formatRupiah(this)">

                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm mb-8">
                    <h3 class="font-semibold text-gray-800 mb-4">Product Links</h3>
                    <div id="links" class="space-y-4">
                        @foreach ($produk->links ?? [null] as $link)
                            <div class="link-row border border-gray-200 rounded-xl p-5 space-y-3 relative">

                                <br>
                                <hr class="border-gray-200">
                                @if ($link)
                                    <input type="hidden" name="link_id[]" value="{{ $link->id_link_produk }}">
                                @endif

                                <input name="link_name[]" value="{{ $link->link_name ?? '' }}" placeholder="Link Name"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg" required>

                                <input name="link_address[]" value="{{ $link->link_address ?? '' }}"
                                    placeholder="Link Address" class="w-full px-4 py-2 border border-gray-200 rounded-lg"
                                    required>

                                <button type="button" onclick="removeLink(this)"
                                    class="absolute top-3 right-3 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center">
                                    ✖
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addLink()"
                        class="w-full mt-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-700">
                        Add More Link
                    </button>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <h3 class="font-semibold text-gray-800 mb-4">Variants</h3>
                    <div id="detail-wrapper" class="space-y-4">

                        @foreach ($produk->details ?? [null] as $detail)
                            <div class="detail-row border border-gray-200 rounded-xl p-5 space-y-3 relative">

                                <input type="hidden" name="detail_id[]" value="{{ $detail->id ?? '' }}" required>

                                <input type="file" name="image_product[]" accept="image/png,image/jpeg,image/webp"
                                    class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-500 file:text-white hover:file:bg-gray-600">

                                @if ($detail && $detail->image_product)
                                    <img src="{{ asset('storage/' . $detail->image_product) }}" class="w-20">
                                @endif

                                <input name="atribute_name[]" value="{{ $detail->atribute_name ?? '' }}"
                                    placeholder="Variant Name" class="w-full px-4 py-2 border border-gray-200 rounded-lg"
                                    required>

                                <button type="button" onclick="removeRow(this)"
                                    class="absolute top-3 right-3 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center"
                                    @required(true)>
                                    ✖
                                </button>
                            </div>
                        @endforeach

                    </div>

                    <button type="button" onclick="addRow()"
                        class="w-full mt-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-700">
                        Add More Attribute
                    </button>

                </div>
            </form>
        </div>
    </div>
    <script>
        function addLink() {
            document.getElementById('links').insertAdjacentHTML('beforeend', `
                <div class="link-row border rounded-xl p-5 space-y-3 relative">
                <input name="link_name[]" placeholder="Link Name" class="w-full px-4 py-2 border border-gray-200 rounded-lg" required>
                <input name="link_address[]" placeholder="Link Address" class="w-full px-4 py-2 border border-gray-200 rounded-lg" required>
                <button type="button" onclick="removeLink(this)"
                class="absolute top-3 right-3 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center">✖</button>
                </div>`)
        }

        function removeLink(btn) {
            btn.parentElement.remove()
        }

        function addRow() {
            document.getElementById('detail-wrapper').insertAdjacentHTML('beforeend', `
                <div class="detail-row border rounded-xl p-5 space-y-3 relative">
                <input type="file" name="image_product[]" required class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-500 file:text-white hover:file:bg-gray-600">
                <input name="atribute_name[]" placeholder="Attribute Name" class="w-full px-4 py-2 border border-gray-200 rounded-lg" required>
                <button type="button" onclick="removeRow(this)"
                class="absolute top-3 right-3 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center">✖</button>
                </div>`)
        }

        function removeRow(btn) {
            btn.parentElement.remove()
        }

        function formatRupiah(el) {
            let angka = el.value.replace(/[^0-9]/g, '');
            let format = new Intl.NumberFormat('id-ID').format(angka);

            el.value = angka ? 'Rp ' + format : '';
        }

        // function confirmSave() {
        //     Swal.fire({
        //         title: 'Produk berhasil disimpan?',
        //         text: 'Pilih Back untuk melanjutkan menambah produk',
        //         icon: 'question',
        //         showCancelButton: true,
        //         confirmButtonText: 'Back',
        //         cancelButtonText: 'Ke List',
        //         reverseButtons: true
        //     }).then((result) => {
        //         document.getElementById('redirect_to').value =
        //             result.isConfirmed ? 'back' : 'index'

        //         document.querySelector('form').submit()
        //     })
        // }
    </script>
@endsection
