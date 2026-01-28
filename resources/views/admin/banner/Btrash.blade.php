@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')


@section('content')

    
<div class="space-y-4">
    {{-- NAV MANAGE --}}
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
            Manage Banners
        </h2>
        
        <div class="flex items-center gap-2">
            <a href="{{ route ('Btrash') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-white bg-[#333333] border border-[#333333] rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-trash-icon lucide-trash"><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                Trash
            </a>
            <a href="{{ route ('Bhome') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-gray-600 bg-white border border-gray-300 rounded-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" 
                cy="12" r="1"/><circle cx="5" cy="12" r="1"/><circle cx="12" cy="19" r="1"/><circle cx="19" cy="19" r="1"/><circle cx="5" cy="19" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="19" cy="5" r="1"/><circle cx="5" cy="5" r="1"/></svg>
                All Banner
            </a>
            <a href="{{ route ('addB') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Add New Banner
            </a>
        </div>
    </div>

     {{-- SEARCG & FILTER --}}
    <div class="flex items-center gap-3">
        <div class="relative flex-1">
            <input 
                type="text" 
                placeholder="Search Banners" 
                class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400 "
            >
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </div>
        
        <div class="relative w-72">
            <select class="w-full appearance-none pl-4 pr-10 py-2 text-sm text-gray-500 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all bg-white cursor-pointer">
                <option>Sort by status</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
        </div>
    </div>

</div>


{{-- CARD BANNER --}}

{{-- <div class="mt-5 min-h-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($banner as $b)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="relative h-48 bg-gray-200">
                <img src="{{ asset($b->banner_image) }}" class="w-full h-full object-cover" alt="Banner">
                
               <div class="absolute top-3 left-3">
                @if($b->is_active)
                    <span class="px-3 py-1 text-[10px] font-bold uppercase text-green-700 bg-green-100/90 rounded-full">
                        Published
                    </span>
                @else
                    <span class="px-3 py-1 text-[10px] font-bold uppercase text-red-700 bg-red-100/90 rounded-full">
                        Unpublished
                    </span>
                @endif
            </div>
            </div>

            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-bold text-gray-800 text-base leading-tight">{{ $b->banner_name }}</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                    </button>
                </div>
                
                <div class="flex justify-between items-center mt-4">
                    <div class="text-xs text-gray-500">
                        By <span class="font-semibold text-gray-700">{{ $b->user->name ?? 'Admin' }}</span>
                    </div>
                    <div class="text-[10px] text-gray-400">
                        Created At {{ $b->created_at->format('Y-m-d H:i') }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}

    
</div>

</div>
@endsection
 