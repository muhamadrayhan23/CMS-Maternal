<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($banner as $b)
        <div class="bg-white rounded-2xl  border border-gray-300 overflow-visible">
            <div class="relative h-52 md:h-60 rounded-t-2xl overflow-hidden">
                <img src="{{ asset($b->banner_image) }}" class="w-full h-full object-cover" alt="Banner">
            </div>

            <div class="p-3 md:p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-bold text-gray-800 text-base leading-tight">{{ $b->banner_name }}</h3>
                    {{-- //ToolTip --}}
                    <div class="relative">
                        <button onclick="toggleMenu(this)" class="text-gray-600 hover:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/>
                            </svg>
                        </button>
                        <div class="action-menu hidden absolute right-0 mt-2 w-30 bg-white border border-gray-200 rounded-xl shadow-lg z-30 overflow-hidden text-left">
                            <form method="POST" action="{{ route('Btrash.permanent', $b->id_banner) }}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn-hapus-permanent w-full flex items-center gap-2 px-4 py-3 text-sm hover:bg-gray-200 transition-all text-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                        <path d="M10 11v6"/><path d="M14 11v6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                        <path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form> 
                            <form method="POST" action="{{ route('Btrash.restore', $b->id_banner) }}" >
                                @csrf 
                                <button type="submit" 
                                         
                                    class="btn-restore w-full flex items-center gap-2 px-4 py-3 text-sm hover:bg-gray-200 transition-all text-left border-t border-gray-50 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-fading-arrow-up-icon lucide-circle-fading-arrow-up">
                                        <path d="M12 2a10 10 0 0 1 7.38 16.75"/>
                                        <path d="m16 12-4-4-4 4"/><path d="M12 16V8"/>
                                        <path d="M2.5 8.875a10 10 0 0 0-.5 3"/>
                                        <path d="M2.83 16a10 10 0 0 0 2.43 3.4"/>
                                        <path d="M4.636 5.235a10 10 0 0 1 .891-.857">
                                        <path d="M8.644 21.42a10 10 0 0 0 7.631-.38"/></svg>
                                    <span>Restore</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-3 text-gray-600">
                    <div class="text-xs">By <span class="font-semibold text-gray-700">{{ $b->deleter->name ?? 'User tidak di temukan' }}</span></div>
                    <div class="text-xs">Deleted At {{ $b->deleted_at->format('Y-m-d') }}</div>
                </div>
            </div>
        </div>
        
        @empty
        <div class="col-span-full text-center py-10 text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
            @if ($search)
            <span class="font-bold">"{{ $search }}"</span> not found.
            @else
            Empty trash
            @endif
        </div>

     
    @endforelse
</div>

<div class="mt-6">
    {{ $banner->links() }}
</div>
