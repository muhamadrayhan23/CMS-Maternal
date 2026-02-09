@extends('layout.admin')
@section('title', 'Edit Product')

@section('content')
    <div class="h-screen" id="wrapp">
        <div class="p-4 md:p-10">
            <form action="{{ route('produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
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
                        <h1 class="text-sm md:text-base font-bold uppercase">
                            Edit Product
                        </h1>
                    </div>

                    <button type="submit" onclick="confirmSave()"
                        class="px-4 py-2 md:px-8 md:py-2 text-sm md:text-base text-white bg-[#2D2D2A] rounded-lg hover:bg-black">
                        Submit
                    </button>
                </div>

                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 shadow-lg space-y-3 md:space-y-4 mb-6 md:mb-8">
                    <div class="mb-4">
                        <label class="text-sm font-semibold text-gray-800">
                            Product Overview <span class="text-red-500">*</span>
                        </label>
                    </div>
                    <input name="product_name" value="{{ isset($produk) ? $produk->product_name : '' }}"
                        placeholder="Product Name"
                        class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        required>

                    <textarea name="desc"
                        class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        placeholder="Description" required>{{ isset($produk) ? $produk->desc : '' }}</textarea>

                    <input type="text" id="price" name="price"
                        class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        placeholder="Price"
                        value="{{ isset($produk) ? 'Rp ' . number_format($produk->price, 0, ',', '.') : '' }}" required
                        oninput="formatRupiah(this)">

                </div>

                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 shadow-lg space-y-3 md:space-y-4 mb-6 md:mb-8">
                    <h3 class="font-semibold text-gray-800 mb-4">Product Links</h3>
                    <div id="links" class="space-y-4">
                        @foreach ($produk->links ?? [null] as $link)
                            <div class="link-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
                                <br>

                                @if ($link)
                                    <input type="hidden" name="link_id[]" value="{{ $link->id_link_produk }}">
                                @endif

                                <input name="link_name[]" value="{{ $link->link_name ?? '' }}" placeholder="Link Name"
                                    class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                    required>

                                <input name="link_address[]" value="{{ $link->link_address ?? '' }}"
                                    placeholder="Link Address"
                                    class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                    required>

                                <button type="button" onclick="removeLink(this)"
                                    class="absolute top-2 right-2 md:top-3 md:right-3 w-6 h-6 md:w-7 md:h-7 text-xs md:text-sm bg-red-500 text-white rounded-full flex items-center justify-center">
                                    ✖
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addLink()"
                        class="w-full mt-4 md:mt-5 py-2 text-xs md:text-sm bg-gray-400 text-white rounded-lg hover:bg-gray-700">
                        Add More Link
                    </button>
                </div>

                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 shadow-lg space-y-3 md:space-y-4 mb-6 md:mb-8">
                    <h3 class="font-semibold text-gray-800 mb-4">Variants</h3>
                    <div id="detail-wrapper" class="space-y-4">

                        @foreach ($produk->details ?? [null] as $detail)
                            <div class="detail-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
                                <br>

                                <input type="hidden" name="detail_id[]" value="{{ $detail->id ?? '' }}" required>

                                <input type="file" name="image_product[]" accept="image/png,image/jpeg,image/webp"
                                    onchange="previewImage(this)"
                                    class="block w-full text-xs md:text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-500 file:text-white hover:file:bg-gray-600">

                                @if ($detail && $detail->image_product)
                                    <div class="preview-wrapper relative mt-2">
                                        <img src="{{ asset('storage/' . $detail->image_product) }}"
                                            class="preview-image w-14 md:w-20 rounded-lg object-cover">

                                        <button type="button" onclick="removePreview(this)"
                                            class="absolute -top-2 -right-2 w-5 h-5 bg-blue-600 text-white text-xs rounded-full flex items-center justify-center">
                                            ✖
                                        </button>

                                        <input type="hidden" name="remove_image[]" value="0" class="remove-flag">
                                    </div>
                                @endif


                                <input name="atribute_name[]" value="{{ $detail->atribute_name ?? '' }}"
                                    placeholder="Variant Name"
                                    class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                    required>

                                <button type="button" onclick="removeRow(this)"
                                    class="absolute top-2 right-2 md:top-3 md:right-3 w-6 h-6 md:w-7 md:h-7 text-xs md:text-sm bg-red-500 text-white rounded-full flex items-center justify-center"
                                    @required(true)>
                                    ✖
                                </button>
                            </div>
                        @endforeach

                    </div>

                    <button type="button" onclick="addRow()"
                        class="w-full mt-4 md:mt-5 py-2 text-xs md:text-sm bg-gray-400 text-white rounded-lg hover:bg-gray-700">
                        Add More Variant
                    </button>

                </div>
            </form>
        </div>
    </div>
    <script>
        function addLink() {
            document.getElementById('links').insertAdjacentHTML('beforeend', `
            <div class="link-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
            <br>
            <input name="link_name[]" placeholder="Link Name" class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" required>
            <input name="link_address[]" placeholder="Link Address" class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" required>
            <button type="button" onclick="removeLink(this)" class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center">✖</button>
            </div>`)
        }

        function removeLink(btn) {
            btn.parentElement.remove()
        }

        function addRow() {
            document.getElementById('detail-wrapper').insertAdjacentHTML('beforeend', `
            <div class="detail-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
            <br>
            <input type="file" name="image_product[]" accept="image/png,image/jpeg,image/webp" onchange="previewImage(this)" class="block w-full text-xs md:text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-500 file:text-white hover:file:bg-gray-600">
            <div class="preview-wrapper hidden relative mt-2">
            <img class="preview-image w-14 md:w-20 rounded-lg object-cover">
            <button type="button" onclick="removePreview(this)" class="absolute -top-2 -right-2 w-5 h-5 bg-blue-600 text-white text-xs rounded-full flex items-center justify-center">✖</button>
            </div>
            <input name="atribute_name[]" placeholder="Variant Name" class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" required>
            <button type="button" onclick="removeRow(this)" class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center">✖</button>
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

        function previewImage(input) {
            const file = input.files[0];
            if (!file) return;

            const row = input.closest('.detail-row');
            let wrapper = row.querySelector('.preview-wrapper');
            const img = wrapper.querySelector('.preview-image');

            const reader = new FileReader();
            reader.onload = e => {
                img.src = e.target.result;
                wrapper.classList.remove('hidden');

                // reset flag hapus kalau upload ulang
                const removeFlag = wrapper.querySelector('.remove-flag');
                if (removeFlag) removeFlag.value = 0;
            };

            reader.readAsDataURL(file);
        }


        function removePreview(btn) {
            const row = btn.closest('.detail-row');
            const wrapper = btn.closest('.preview-wrapper');
            const img = wrapper.querySelector('.preview-image');
            const inputFile = row.querySelector('input[type="file"]');
            const removeFlag = wrapper.querySelector('.remove-flag');

            // reset input file
            if (inputFile) inputFile.value = '';

            // hapus gambar
            img.src = '';
            wrapper.classList.add('hidden');

            // kalau gambar dari DB → tandai mau dihapus
            if (removeFlag) {
                removeFlag.value = 1;
            }
        }
    </script>
@endsection
