@extends('layout.admin')


@section('content')
<div class="h-screen  " id="wrapp"> 
    <form action="{{ route ('addBanner') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <a href="{{ route ('Bhome') }}" class="text-gray-800 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                </a>
                <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Add New Banner</h1>
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
                        <input type="text" name="banners[0][name]" placeholder="Banner Name (Title)" 
                            class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Image</label>
                        <div class="relative flex items-center">
                            <input type="text" placeholder="Banner Image" readonly
                                class="file-name-display w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none placeholder:text-gray-400 cursor-default">
                            <label class="absolute right-2 px-3 py-1.5 text-xs font-medium text-gray-600 bg-[#E5E7EB] border border-gray-300 rounded cursor-pointer hover:bg-gray-300 transition-colors italic">
                                Choose File
                                <input type="file" name="banners[0][image]" class="hidden" onchange="updateFileName(this)">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" onclick="AddRow()" class="w-full mt-8 py-3 text-sm font-semibold text-white bg-[#9CA3AF] rounded-xl hover:bg-gray-900 transition-colors shadow-sm">
                Add More Banner
            </button>
        </div>
    </form>
</div>

<script>
    let rowCount = 1; 

    function AddRow() {
        const container = document.getElementById('banner-container');
        
        // Buat div baru untuk baris banner
        const newRow = document.createElement('div');
        newRow.className = "banner-row mt-6 space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative";
        
        // Isi HTML baris baru (pake template literal agar rapi)
        newRow.innerHTML = `
            <button type="button" onclick="this.parentElement.remove()" class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="banners[${rowCount}][name]" placeholder="Banner Name (Title)" 
                    class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Image</label>
                <div class="relative flex items-center">
                    <input type="text" placeholder="Banner Image" readonly
                        class="file-name-display w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none placeholder:text-gray-400 cursor-default">
                    <label class="absolute right-2 px-3 py-1.5 text-xs font-medium text-gray-600 bg-[#E5E7EB] border border-gray-300 rounded cursor-pointer hover:bg-gray-300 transition-colors italic">
                        Choose File
                        <input type="file" name="banners[${rowCount}][image]" class="hidden" onchange="updateFileName(this)">
                    </label>
                </div>
            </div>
        `;
        
        container.appendChild(newRow);
        rowCount++;
    }

    // Fungsi untuk nampilin nama file yang dipilih
    function updateFileName(input) {
        if (input.files && input.files[0]) {
            const row = input.closest('.relative');
            const display = row.querySelector('.file-name-display');
            display.value = input.files[0].name;
        }
    }
</script>
@endsection