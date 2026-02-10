@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('content')


<div class="row justify-content-center mt-3">
    <form id="edit-form" action="{{ route('updateAnnouncement', $announcement->id_announcement) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="is_active" value="{{ $announcement->is_active }}">

        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <a href="{{ route('homeLink', ['type' => 'announcements']) }}" class="text-gray-800 hover:text-black">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg>
                </a>
                <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Edit Announcement</h1>
            </div>
            <button type="button" class="px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
                Submit
            </button>

        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">

            <div class="mb-4">
                <label class="text-sm font-semibold text-gray-800">
                    Announcement Overview <span class="text-red-500">*</span>
                </label>
            </div>

            <div id="announcement-container" class="space-y-6">
                <div class="space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative">

                    <div class="mb-3 row">
                        <label for="announcement_name" class="text-sm font-medium text-gray-700">Announcement Name</label>
                        <div class="col-md-6">
                            <input type="text" class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" id="announcement_name" name="announcement_name" value="{{ old('announcement_name', $announcement->announcement_name) }}">
                            @error('announcement_name')
                            <span class="text-danger text-sm text-red-500">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row mt-4">
                        <label for="announcement_address" class="text-sm font-medium text-gray-700">Announcement Address</label>
                        <div class="col-md-6">
                            <input type="text" class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" id="announcement_address" name="announcement_address" value="{{ old('announcement_address', $announcement->announcement_address) }}">
                            @error('announcement_address')
                            <span class="text-danger text-sm text-red-500">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row mt-4">
                        <label for="announcement_image" class="text-sm font-medium text-gray-700">
                            Announcement Image
                        </label>

                        {{-- preview logo lama --}}
                        @if ($announcement->announcement_image)
                        <div class="mb-3">
                            <img
                                src="{{ asset($announcement->announcement_image) }}"
                                alt="Current Image"
                                class="h-16 w-16 object-contain rounded border border-gray-200">
                            <p class="text-xs text-gray-500 mt-1 italic">
                                Current image
                            </p>
                        </div>
                        @endif

                        <div class="relative flex items-center">
                            <input type="text" placeholder="Choose new image (optional)" readonly class="file-name-display w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none placeholder:text-gray-400 cursor-default">
                            <label class="absolute right-2 px-3 py-1.5 text-xs font-medium text-gray-600 bg-[#E5E7EB] border border-gray-300 rounded cursor-pointer hover:bg-gray-300 transition-colors italic">
                                Choose File
                                <input type="file" id="announcement_image" name="announcement_image" class="hidden" onchange="updateFileName(this)">
                            </label>
                        </div>

                    </div>

                </div>
            </div>
    </form>
</div>

<script>
    // Fungsi untuk nampilin nama file yang dipilih
    function updateFileName(input) {
        if (input.files && input.files[0]) {
            const row = input.closest('.relative');
            const display = row.querySelector('.file-name-display');
            display.value = input.files[0].name;
        }
    }

    function confirmEdit() {
        if (confirm('Are you sure you want to update this announcement?')) {
            document.getElementById('edit-form').submit();
        }
    }

    function confirmBack() {
        if (confirm('Discard changes and go back?')) {
            window.location.href = "{{ route('homeLink') }}";
        }
    }

    window.routes = {
        homeLink: "{{ route('homeLink') }}"
    }
</script>


@endsection