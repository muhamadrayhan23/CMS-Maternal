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
            <button type="submit" class="px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
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
                        <input type="text" name="banner_name" placeholder="Banner Name (Title)" value="{{ $banner->banner_name }}"
                            class="w-full px-4 py-3 text-sm mt-1 bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Image</label>
                            <div class="space-y-4"> 
                                <div id="drop-zone" class="relative flex items-stretch mt-1 group transition-all">
        
                                <label class="flex items-center justify-center px-4 py-2 text-xs font-medium text-gray-700 bg-[#E5E7EB] border border-gray-300 border-r-0 rounded-l-md cursor-pointer hover:bg-gray-300 transition-colors">
                                    Choose File
                                    <input type="file" name="banner_image" class="hidden" onchange="previewImage(this)">
                                </label>
                                
                                <input type="text" id="file-name-display" placeholder="No file chosen" readonly
                                    class="flex-1 px-4 py-3 text-sm bg-white border border-gray-300 rounded-r-md focus:outline-none placeholder:text-gray-400 cursor-default">
                                </div>

                                <div id="preview-container" class="{{ $banner->banner_image ? '' : 'hidden' }} border border-gray-200 rounded-lg p-2 bg-gray-50 w-fit">
                                    <p class="text-[10px] font-semibold text-gray-400 mb-2"> <span class="text-red-500">*</span> Preview Image :</p>
                                    
                                    <img id="image-preview" 
                                        src="{{ $banner->banner_image ? asset( $banner->banner_image) : '' }}" 
                                        class="max-h-48 rounded shadow-sm">
                                </div>

                            </div>
                    </div>
                </div>  
            </div>
        </div>
    </form>
</div>

<script >
    function previewImage(input){
        const file = input.files[0]
        const display = document.getElementById('file-name-display')
        const previewContainer = document.getElementById('preview-container')
        const previewImg = document.getElementById('image-preview')

        if(file){
            display.value = file.name
            const reader = new FileReader()
            reader.onload = function (e){
                previewImg.setAttribute ('src', e.target.result)
                previewContainer.classList.remove('hidden')

                console.log("Data Image Berhasil Dimasukkan!");
            }

            reader.readAsDataURL(file) // mengganti previewImage jadi yang baru
        }

    }
</script>
@endsection