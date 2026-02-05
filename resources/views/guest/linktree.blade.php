@extends('layout.guest')

@section('content')

<div class="bg-white min-h-screen pb-12">
    <div class="max-w-md mx-auto">

        <div class="px-4 py-6">
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 no-scrollbar scroll-smooth">
                @foreach($banners as $banner)
                <a href="{{ $banner->link }}" class="flex-shrink-0 w-full snap-center">
                    <div class="relative h-48 rounded-3xl overflow-hidden shadow-lg border-4 border-white">
                        <img src="{{ asset('storage/' . $banner->img) }}"
                             class="absolute inset-0 w-full h-full object-cover"
                             alt="{{ $banner->nama }}">

                        <div class="absolute inset-0 bg-black/30 flex flex-col justify-end p-5 text-white">
                            <h2 class="font-bold text-xl uppercase tracking-tight">{{ $banner->nama }}</h2>
                            <p class="text-sm opacity-90">Klik untuk info diskon!</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="flex justify-center gap-1.5 mt-4">
                @foreach($banners as $index => $banner)
                <div class="h-1.5 w-1.5 rounded-full {{ $index == 0 ? 'bg-black w-4' : 'bg-gray-300' }} transition-all"></div>
                @endforeach
            </div>
        </div>

        <div class="px-4 space-y-4">
            @foreach($links as $link)
            <a href="{{ $link->link }}" target="_blank"
               class="group flex items-center justify-between p-4 bg-white border-2 border-transparent rounded-2xl shadow-sm hover:border-black hover:shadow-md transition-all duration-300">

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-black group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">{{ $link->nama }}</span>
                </div>

                <div class="text-gray-400 group-hover:text-black group-hover:translate-x-1 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

@endsection
