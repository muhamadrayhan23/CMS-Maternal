@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('content')
{{-- NAV MANAGE --}}
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
            Manage Banners
        </h2>

        <div class="flex items-center gap-2">
            <a href="{{ route('Btrash') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                </svg>
                Trash
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-white bg-[#333333] border border-[#333333] rounded-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/><circle cx="12" cy="19" r="1"/><circle cx="19" cy="19" r="1"/><circle cx="5" cy="19" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="19" cy="5" r="1"/><circle cx="5" cy="5" r="1"/>
                </svg>
                All Banner
            </a>
            <a href="{{ route('addB') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"/><path d="M12 5v14"/>
                </svg>
                Add New Banner
            </a>
        </div>
    </div>

    {{-- SEARCH & FILTER --}}
    <div class="flex items-center gap-3">
        <div class="relative flex-1">
            <input type="text" placeholder="Search Banners" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                </svg>
            </div>
        </div>

        <div class="relative w-72">
            <select class="w-full appearance-none pl-4 pr-10 py-2 text-sm text-gray-500 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all bg-white cursor-pointer">
                <option>Sort by status</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>
                </svg>
            </div>
        </div>
    </div>
</div>

{{-- CARD BANNER --}}
<div class="mt-5 min-h-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($banner as $b)
            <div class="bg-white rounded-2xl border border-gray-300 overflow-visible">
                {{-- image & status --}}
                <div class="relative h-48 bg-gray-200">
                    <img src="{{ asset($b->banner_image) }}" class="w-full rounded-lg h-full object-cover" alt="Banner">
                    <div class="absolute top-3 left-3">
                        @if($b->is_active)
                            <span class="px-3 py-1 text-[10px] font-sm-bold uppercase text-green-700 bg-green-100/90 rounded-full">Published</span>
                        @else
                            <span class="px-3 py-1 text-[10px] font-sm-bold uppercase text-red-700 bg-red-100/90 rounded-full">Unpublished</span>
                        @endif
                    </div>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-gray-800 text-base leading-tight">{{ $b->banner_name }}</h3>
                        
                        <div class="relative">
                            <button onclick="toggleMenu(this)" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/>
                                </svg>
                            </button>

                            {{-- TOOLTIP --}}
                            <div class="action-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg z-50 overflow-hidden">
                                
                                <form method="POST" action="{{ route('banner.toggle', $b->id_banner) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-100 transition-all text-left">
                                        @if($b->is_active)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/></svg>
                                            Unpublish
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-icon lucide-circle-check"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                            Publish
                                        @endif
                                    </button>
                                </form>

                                
                                <a href="{{ route('editB', $b->id_banner) }}" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 transition-all border-t border-gray-50">
                                    Edit Banner
                                </a>

                                
                                <form method="POST" action="{{ route('dBanner', $b->id_banner) }}">
                                    @csrf
                                    @method('DELETE')

                                        <button type="submit" onclick="return confirm('Yakin mau hapus?') class="flex items-center gap-3 w-full px-4 py-3 text-sm text-red-600
                                        hover:bg-red-50 transition-all text-lef >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-trash-2">
                                        <path d="M10 11v6"/>
                                        <path d="M14 11v6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                        <path d="M3 6h18"/>
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                        </svg>

                                        <span>Delete</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-[#919191]">
                        <div class="text-xs text-gray-500">
                            By <span class="font-semibold text-gray-700">{{ $b->user->name ?? 'Admin' }}</span>
                        </div>
                        <div class="text-[10px] text-gray-400">
                            {{ $b->created_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  
</div>

    {{-- TOOLTIP BIAR BISA DI TUTUP BUKA --}}
<script>
    function toggleMenu(btn){
        const menu = btn.parentElement.querySelector('.action-menu')

        document.querySelectorAll('.action-menu').forEach(m => {
        if (m !== menu) m.classList.add('hidden')
    })

    menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (e) {
    if (!e.target.closest('.relative')) {
        document.querySelectorAll('.action-menu')
            .forEach(m => m.classList.add('hidden'));
    }
});
</script>
@endsection