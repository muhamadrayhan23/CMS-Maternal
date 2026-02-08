<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 font-sans mt-5">
        @forelse($announcements as $announcement)
        <div class="bg-white rounded-2xl border border-gray-300 overflow-visible">
            <div class="relative h-48 rounded-t-2xl overflow-hidden">
                <img src="{{ asset($announcement->announcement_image) }}" class="w-full h-full object-cover" alt="Banner">
                <div class="absolute top-3 left-3">
                    <span class="px-3 py-1 text-[10px] uppercase {{ $announcement->is_active ? 'text-green-700 bg-green-100/90' : 'text-red-700 bg-red-100/90' }} rounded-full">
                        {{ $announcement->is_active ? 'Published' : 'Unpublished' }}
                    </span>
                </div>
            </div>

            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-bold text-gray-800 text-base leading-tight">{{ $announcement->announcement_name }}</h3>
                    <div class="relative">
                        <button onclick="toggleMenu(this)" class="text-gray-600 hover:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>
                        <div class="action-menu hidden absolute right-0 mt-2 w-30 bg-white border border-gray-200 rounded-xl shadow-lg z-50 overflow-hidden text-left">
                            <form method="POST" action="{{ route('statusAnnouncement', $announcement->id_announcement) }}">
                                @csrf
                                @method('PATCH')
                                <button class="w-full px-4 py-3 text-sm hover:bg-gray-200 transition-all flex gap-2.5 text-left">
                                    @if($announcement->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-minus-icon lucide-circle-minus">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M8 12h8" />
                                    </svg>
                                    <span>Unpublish</span>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-plus-icon lucide-circle-plus">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M8 12h8" />
                                        <path d="M12 8v8" />
                                    </svg>
                                    <span>Publish</span>
                                    @endif
                                </button>
                            </form>
                            <a href="{{ route('editAnnouncement', $announcement->id_announcement) }}" class="flex gap-3 px-4 py-3 text-sm hover:bg-gray-200 transition-all border-t border-gray-50 text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-line-icon lucide-pen-line">
                                    <path d="M13 21h8" />
                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                </svg>
                                <span>Edit </span>
                            </a>
                            <form method="POST" action="{{ route('deleteAnnouncement', $announcement->id_announcement) }}">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="w-full flex gap-3 px-4 py-3 text-sm hover:bg-gray-200 transition-all text-left border-t border-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                        <path d="M3 6h18" />
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ $announcement->announcement_address }}" target="_blank" class="px-4 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
                        Visit Announcement
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10 text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
            <p>No announcements</p>
        </div>
        @endforelse
    </div>
</div>
<div class="mt-6">

</div>