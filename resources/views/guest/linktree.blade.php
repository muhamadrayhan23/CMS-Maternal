@extends('layout.guest')

@section('content')
<div class="bg-white min-h-screen">
    
    <div id="default-carousel" data-carousel="slide" class="relative w-full mb-10">

        @foreach($announcements as $index => $announcement)
        <div class="{{ $index === 0 ? 'block' : 'hidden' }} relative"
             data-carousel-item="{{ $index === 0 ? 'active' : '' }}">


            <img src="{{ asset($announcement->announcement_image) }}"
                 class="w-full h-auto block"
                 alt="announcement {{ $index + 1 }}">

            <div class="absolute inset-x-0 bottom-6 flex justify-center">
                <a href="{{ $announcement->link_url ?? '#' }}"
                   target="_blank"
                   class="px-8 py-2 rounded-full border-2 border-white
                          bg-black/30 backdrop-blur-sm text-white font-bold
                          hover:bg-white hover:text-black transition">
                    Explore Link
                </a>
            </div>

        </div>
        @endforeach

    </div>
}
    <div class="mx-auto px-4 pb-10 max-w-2xl">

        <div class="space-y-4">
            @foreach($links as $link)
            <a href="{{ $link->link }}" target="_blank"
               class="flex items-center justify-between p-5 bg-white border-2 border-black
                      rounded-2xl hover:-translate-y-0.5
                      hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)]
                      transition-all shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                <span class="font-black text-lg uppercase">
                    {{ $link->nama }}
                </span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            @endforeach
        </div>

    </div>
</div>
@endsection
