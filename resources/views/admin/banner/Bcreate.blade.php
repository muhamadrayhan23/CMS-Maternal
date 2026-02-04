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
                    <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Add New Banner</h1>
                </div>
                <button type="submit"
                    class="px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
                    Submit
                </button>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
                <div class="mb-4">
                    <label class="text-sm font-semibold text-gray-800">
                        Banners Overview <span class="text-red-500">*</span>
                    </label>
                </div>

                <div id="banner-container" class="space-y-6">
                    <div class="banner-row space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="banners[0][name]" placeholder="Banner Name (Title)"
                                class="w-full px-4 py-3 text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">Image</label>
                            <div class="space-y-4"> 
                                <div id="drop-zone" class="relative flex items-stretch mt-1 group transition-all">
        
                                <label class="flex items-center justify-center px-4 py-2 text-xs font-medium text-gray-700 bg-[#E5E7EB] border border-gray-300 border-r-0 rounded-l-md cursor-pointer hover:bg-gray-300 transition-colors">
                                    Choose File
                                    <input type="file" name="banners[0][image]" class="hidden" onchange="previewImage(this)">
                                </label>
                                
                                <input type="text" placeholder="No file chosen" readonly
                                    class="file-name-display flex-1 px-4 py-3 text-sm bg-white border border-gray-300 rounded-r-md focus:outline-none placeholder:text-gray-400 cursor-default">
                                </div>
                                <div  class=" preview-container hidden border border-gray-200 rounded-lg p-2 bg-gray-50 w-fit">
                                    <p class="text-[10px] font-semibold text-gray-400 mb-2"><span class="text-red-500">*</span>Preview Image :</p>
                                    <img src="" class="image-preview max-h-48 rounded shadow-sm">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="AddRow()"
                    class="w-full mt-1.5 py-3 text-sm font-semibold text-white bg-[#8B8B8B] rounded-lg hover:bg-[#373737] transition-colors shadow-sm">
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
            <label class="text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="banners[${rowCount}][name]" placeholder="Banner Name" class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none">
        </div>
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Image</label>
            <div class="space-y-4">
                <div class="relative flex items-stretch mt-1">
                    <label class="flex items-center justify-center px-4 py-2 text-xs font-medium text-gray-700 bg-[#E5E7EB] border border-gray-300 border-r-0 rounded-l-md cursor-pointer hover:bg-gray-300">
                        Choose File
                        <input type="file" name="banners[${rowCount}][image]" class="hidden" onchange="previewImage(this)">
                    </label>
                    <input type="text" placeholder="No file chosen" readonly class="file-name-display flex-1 px-4 py-3 text-sm bg-white border border-gray-300 rounded-r-md">
                </div>
                <div class="preview-container hidden border border-gray-200 rounded-lg p-2 bg-gray-50 w-fit">
                    <p class="text-[10px] font-bold text-gray-400 uppercase mb-2">Preview:</p>
                    <img src="" class="image-preview max-h-48 rounded shadow-sm">
                </div>
            </div>
        </div>
    `;
    container.appendChild(newRow);
    rowCount++;
}

        // Fungsi untuk nampilin nama file yang dipilih
        // function updateFileName(input) {
        //     if (input.files && input.files[0]) {
        //         const row = input.closest('.relative');
        //         const display = row.querySelector('.file-name-display');
        //         display.value = input.files[0].name;
        //     }
        // }

        function previewImage(input){
        // nampilin nama banner iyak yak
        const file = input.files[0]
        //nyari baris input ini 
        const row = input.closest('.banner-row')
        const display = row.querySelector('.file-name-display')
        const previewContainer = row.querySelector('.preview-container')
        const previewImg = row.querySelector('.image-preview')

        if(file && row ){
            // nampilin nama file 
            display.value = file.name


            const reader = new FileReader()
            reader.onload = function (e){
                previewImg.setAttribute ('src', e.target.result)
                previewContainer.classList.remove('hidden') // munculin Preview

                console.log("Preview muncul di baris ini bray!");
            }

            reader.readAsDataURL(file)
        }

    }
    </script>
@endsection
