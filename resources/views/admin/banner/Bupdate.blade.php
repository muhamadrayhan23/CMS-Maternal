@extends('layout.admin')

@section('content')
<div class="h-screen font-sans"> 
    <form action="{{ route ('updateBanner', $banner->id_banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <a href="{{ route ('Bhome') }}" class="text-gray-800 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                </a>
                <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Edit Banner</h1>
            </div>
            <button type="submit" class="px-5 md:px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
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
                <div class="banner-row space-y-4 md:space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative">
                    
                    <div class="space-y-2">
                        <label class="text-xs md:text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="banner_name" placeholder="Banner Name (Title)" value="{{ $banner->banner_name }}"
                            class="w-full px-4 py-3 text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs md:text-sm font-medium text-gray-800">Image Banner</label>
                        <p class="text-[10px] text-red-600 font-medium italic">* Resolution: 1920 x 1080 px</p>
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-2 w-full max-w-md bg-white hover:bg-gray-50 transition-all relative">
                            <div class="relative">
                                <div class="w-full aspect-[1920/1080] rounded-xl overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-100">
                                    
                                    <img id="image-preview" 
                                         src="{{ $banner->banner_image ? asset($banner->banner_image) : '' }}" 
                                         class="w-full h-full object-cover {{ $banner->banner_image ? '' : 'hidden' }}">
                                    
                                    <svg id="placeholder-icon" class="w-12 h-12 text-gray-300 {{ $banner->banner_image ? 'hidden' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>

                                <div class="mt-3 flex flex-col items-center pb-2">
                                    <p id="file-name-display" class="mb-2 text-[10px] text-gray-400 font-medium truncate w-full text-center px-4">
                                        {{ $banner->banner_image ? basename($banner->banner_image) : 'No file chosen' }}
                                    </p>
                                    
                                    <label for="file-upload" class="cursor-pointer">
                                        <span class="px-4 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-all">
                                            Change Image
                                        </span>
                                        <input id="file-upload" name="banner_image" type="file" class="hidden" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const file = input.files[0];
        const display = document.getElementById('file-name-display');
        const previewImg = document.getElementById('image-preview');
        const placeholderIcon = document.getElementById('placeholder-icon');

        if (file) {
            display.textContent = file.name;
            const reader = new FileReader();
            
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                
                if (placeholderIcon) {
                    placeholderIcon.classList.add('hidden');
                }
                console.log("Preview updated!");
            }

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection