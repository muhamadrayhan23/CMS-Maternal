@extends('layout.admin')
@section('title', 'Add New Product')

@section('content')
    <div class="h-screen" id="wrapp">
        <div class="p-4 md:p-10">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                            Add New Product
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
                    <input name="product_name" placeholder="Product Name"
                        class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        required>

                    <textarea name="desc"
                        class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        placeholder="Description" required></textarea>

                    <input type="text" id="price" name="price"
                        class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                        placeholder="Price" required oninput="formatRupiah(this)">

                </div>

                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 shadow-lg space-y-3 md:space-y-4 mb-6 md:mb-8">
                    <h3 class="font-semibold text-gray-800 mb-4">Product Links</h3>
                    <div id="links" class="space-y-4">
                        <div class="link-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
                            <hr class="border-gray-200">

                            <input name="link_name[]" placeholder="Link Name"
                                class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg"
                                required>

                            <input name="link_address[]" placeholder="Link Address"
                                class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg"
                                required>

                            <button type="button" onclick="removeLink(this)"
                                class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center">
                                ✖
                            </button>
                        </div>

                    </div>

                    <button type="button" onclick="addLink()"
                        class="mt-3 px-4 py-2 bg-gray-700 text-white rounded-lg text-xs md:text-sm">
                        + Add Link
                    </button>
                </div>

                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 shadow-lg space-y-3 md:space-y-4 mb-6 md:mb-8">
                    <h3 class="font-semibold text-gray-800 mb-4">Variants</h3>
                    <div id="detail-wrapper" class="space-y-4">
                        <div class="detail-row border border-gray-200 rounded-xl p-5 space-y-3 relative">

                            <hr class="border-gray-200">

                            <input type="file" name="image_product[]" accept="image/png,image/jpeg,image/webp"
                                onchange="previewImage(this)"
                                class="block w-full text-xs md:text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-500 file:text-white hover:file:bg-gray-600">

                            <div class="preview-wrapper hidden">
                                <img class="preview-image w-14 md:w-20 rounded-lg object-cover">
                            </div>

                            <input name="atribute_name[]" placeholder="Variant Name"
                                class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300"
                                required>

                            <button type="button" onclick="removeRow(this)"
                                class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center">
                                ✖
                            </button>
                        </div>

                    </div>

                    <button type="button" onclick="addRow()"
                        class="mt-3 px-4 py-2 bg-gray-700 text-white rounded-lg text-xs md:text-sm">
                        + Add Variant
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function addLink() {
            document.getElementById('links').insertAdjacentHTML('beforeend', `
                <div class="link-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
            <hr class="border-gray-200">

            <input name="link_name[]" placeholder="Link Name"
                class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm bg-[#F9FAFB] border rounded-lg" required>

            <input name="link_address[]" placeholder="Link Address"
                class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm bg-[#F9FAFB] border rounded-lg" required>

            <button type="button" onclick="removeLink(this)"
                class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center">
                ✖
            </button>
        </div>`)
        }

        function removeLink(btn) {
            btn.parentElement.remove()
        }

        function addRow() {
            document.getElementById('detail-wrapper').insertAdjacentHTML('beforeend', `
                <div class="detail-row border border-gray-200 rounded-xl p-5 space-y-3 relative">
            <hr class="border-gray-200">

            <input type="file" name="image_product[]" accept="image/*"
                onchange="previewImage(this)"
                class="block w-full text-xs md:text-sm">

            <div class="preview-wrapper hidden mt-2">
                <img class="preview-image w-14 md:w-20 rounded-lg object-cover">
            </div>

            <input name="atribute_name[]" placeholder="Variant Name"
                class="w-full px-3 py-2 md:px-4 md:py-3 text-xs md:text-sm bg-[#F9FAFB] border rounded-lg" required>

            <button type="button" onclick="removeRow(this)"
                class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center">
                ✖
            </button>
        </div>`)
        }

        function previewImage(input) {
            const file = input.files[0];
            if (!file) return;

            const wrapper = input.closest('.detail-row')
                .querySelector('.preview-wrapper');
            const img = wrapper.querySelector('.preview-image');

            const reader = new FileReader();
            reader.onload = e => {
                img.src = e.target.result;
                wrapper.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        function removeRow(btn) {
            btn.parentElement.remove()
        }

        function formatRupiah(el) {
            let angka = el.value.replace(/[^0-9]/g, '');
            let format = new Intl.NumberFormat('id-ID').format(angka);

            el.value = angka ? 'Rp ' + format : '';
        }
    </script>
@endsection
