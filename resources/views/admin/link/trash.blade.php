@extends('layout.admin')

@section('content')

@php
$type = request()->query('type');
@endphp

@if(!$type || $type == 'link')
<div id="trashLinkSection">
    <div class="space-y-4">
        {{-- NAV MANAGE --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">

                <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
                    Recently deleted Links
                </h2>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('trashLink', ['type' => 'links']) }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-white bg-[#333333] hover:bg-black border border-gray-300  rounded-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trash-icon lucide-trash">
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                        <path d="M3 6h18" />
                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                    Trash
                </a>
                <a href="{{ route('homeLink', ['type' => 'link']) }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-black bg-white border border-gray-300 hover:bg-gray-50  rounded-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="19"
                            cy="12" r="1" />
                        <circle cx="5" cy="12" r="1" />
                        <circle cx="12" cy="19" r="1" />
                        <circle cx="19" cy="19" r="1" />
                        <circle cx="5" cy="19" r="1" />
                        <circle cx="12" cy="5" r="1" />
                        <circle cx="19" cy="5" r="1" />
                        <circle cx="5" cy="5" r="1" />
                    </svg>
                    All Links
                </a>
                <a href="{{ route('createLink') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-black bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    Add New Link
                </a>
            </div>
        </div>

        {{-- search filter --}}
        <div class="relative flex-1">
            <div>
                <input id="linkSearch" type="text" placeholder="Search link name" name="search" value="{{ request('search') }}" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>

    </div>

    <div id="linkTableContainer" class="mt-5">
        @include('admin.link.tablelinktrash')
    </div>
</div>
@endif

@if(!$type || $type == 'announcement')
<div id="trashAnnouncementSection">
    <div class="space-y-4">
        {{-- NAV MANAGE --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">

                <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
                    Recently deleted Announcements
                </h2>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('trashAnnouncement', ['type' => 'announcements']) }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-white bg-[#333333] hover:bg-black border border-gray-300  rounded-md hover:bg-black transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trash-icon lucide-trash">
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                        <path d="M3 6h18" />
                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                    Trash
                </a>
                <a href="{{ route('homeLink', ['type' => 'announcements']) }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-black bg-white border border-gray-300 rounded-md hover:bg-gray-50  rounded-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="19"
                            cy="12" r="1" />
                        <circle cx="5" cy="12" r="1" />
                        <circle cx="12" cy="19" r="1" />
                        <circle cx="19" cy="19" r="1" />
                        <circle cx="5" cy="19" r="1" />
                        <circle cx="12" cy="5" r="1" />
                        <circle cx="19" cy="5" r="1" />
                        <circle cx="5" cy="5" r="1" />
                    </svg>
                    All Announcements
                </a>
                <a href="{{ route('createAnnouncement') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-black bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    Add New Announcement
                </a>
            </div>
        </div>

        {{-- search filter --}}
        <div class="relative flex-1">
            <div>
                <input id="announcementSearch" type="text" placeholder="Search announcement name" name="search" value="{{ request('search') }}" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>

    </div>

    <div id="announcementTableContainer" class="mt-5">
        @include('admin.link.announcementtrash')
    </div>
</div>
@endif

<script>
    // Gunakan fungsi setupLiveSearch yang Anda miliki di index
    function setupLiveSearch(inputId, containerId) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(containerId);

        if (input && container) {
            input.addEventListener('input', function() {
                const url = this.getAttribute('data-url') || window.location.pathname;
                const search = this.value;

                fetch(`${url}?search=${search}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        container.innerHTML = html;
                    });
            });
        }
    }

    // Jalankan search untuk keduanya
    setupLiveSearch('linkSearch', 'linkTableContainer');
    setupLiveSearch('announcementSearch', 'announcementTableContainer');
</script>

@endsection