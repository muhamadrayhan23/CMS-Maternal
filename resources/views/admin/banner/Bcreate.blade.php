@extends('layout.admin')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="h-screen" id="wrapp">
        <form action="{{ route('addBanner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <a href="{{ session('banner_back', route('dashboardadmin')) }}" class="text-gray-800 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>
                    <h1 class="text-xs md:text-sm font-bold tracking-wider text-gray-800 uppercase">Add New Banner</h1>
                </div>
                <button type="submit"
                    class="px-5 md:px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
                    Submit
                </button>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-4 md:p-8 shadow-sm">
                <div class="mb-4">
                    <label class="text-xs md:text-sm font-semibold text-gray-800">
                        Banners Overview <span class="text-red-500">*</span>
                    </label>
                </div>

                <div id="banner-container" class="space-y-6">
                    <div class="banner-row space-y-4 md:space-y-6 border border-gray-100 rounded-xl p-4 md:p-6 bg-white relative">
                        <div class="space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="banners[0][name]" placeholder="Banner Name (Title)"
                                class="w-full px-4 py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-800">Image Banner</label>
                            <p class="text-[10px] text-red-600 font-medium italic">* Resolution: 1920 x 1080 px</p>

                            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-2 w-full max-w-md bg-white hover:bg-gray-50 transition-all relative">
                                <div class="preview-container relative">
                                    <div class="w-full aspect-[1920/1080] rounded-xl overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-100">
                                            
                                        <img class="image-preview w-full h-full object-cover hidden" src="">
                                            
                                        <svg class="placeholder-icon w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>

                                    <div class="mt-3 flex flex-col items-center pb-2">
                                        <p class="file-name-display mb-2 text-[10px] text-gray-400 font-medium truncate w-full text-center px-4">No file chosen</p>

                                        <label class="cursor-pointer">
                                            <span class="px-4 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-all">
                                            Choose File
                                            </span>
                                            <input name="banners[0][image]" type="file" class="hidden" accept="image/*" onchange="previewImage(this)">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="AddRow()"
                    class="w-full mt-1.5 py-3 text-xs md:text-sm font-semibold text-white bg-[#8B8B8B] rounded-lg hover:bg-[#373737] transition-colors shadow-sm">
                    Add More Banner
                </button>
            </div>
        </form>
    </div>

    <script>
        let rowCount = 1;

  function AddRow() {
    const container = document.getElementById('banner-container');
    const newRow = document.createElement('div');
    newRow.className = "banner-row mt-6 space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative";

    newRow.innerHTML = `
        <button type="button" onclick="this.parentElement.remove()" class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-sm z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <div class="space-y-2">
            <label class="text-xs md:text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="banners[${rowCount}][name]" placeholder="Banner Name" class="w-full px-4 py-3 text-xs md:text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all" required>
        </div>

        <div class="space-y-2">
            <label class="text-xs md:text-sm font-medium text-gray-800">Image Banner</label>
            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-2 w-full max-w-md bg-white hover:bg-gray-50 transition-all relative">
                <div class="relative">
                    <div class="w-full aspect-[1920/1080] rounded-xl overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-100">
                        <img class="image-preview w-full h-full object-cover hidden">
                        <svg class="placeholder-icon w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="mt-3 flex flex-col items-center pb-2">
                        <p class="file-name-display mb-2 text-[10px] text-gray-400 font-medium truncate w-full text-center px-4">No file chosen</p>
                        <label class="cursor-pointer">
                            <span class="px-4 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-all">Choose File</span>
                            <input name="banners[${rowCount}][image]" type="file" class="hidden" accept="image/*" onchange="previewImage(this)">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.appendChild(newRow);
    rowCount++; // Biar indexnya naik terus
}   


function previewImage(input) {
    const file = input.files[0];
    const row = input.closest('.banner-row'); // Pastikan ini bener-bener dapet parent row-nya

    if (file && row) {
        // PAKE TITIK . UNTUK CLASS
        const previewImg = row.querySelector('.image-preview');
        const placeholderIcon = row.querySelector('.placeholder-icon');
        const fileNameDisplay = row.querySelector('.file-name-display');

        if (fileNameDisplay) fileNameDisplay.textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(e) {
            if (previewImg) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
            }
            if (placeholderIcon) {
                placeholderIcon.classList.add('hidden');
            }
        }
        reader.readAsDataURL(file);
    }
}
    </script>
@endsection
