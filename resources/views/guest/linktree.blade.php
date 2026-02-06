@extends('layout.guest')

@section('content')
<div class="bg-white min-h-screen">

    <div id="default-carousel" class="relative w-full mb-10" data-carousel="slide">
        <div class="relative h-56 overflow-hidden md:h-90 mx-10 rounded-s"> @foreach($announcements as $index => $announcement)
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="{{ asset($announcement->announcement_image) }}"
                         class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                         alt="announcement {{ $index + 1 }}">

                    <div class="absolute inset-x-0 bottom-10 flex justify-center z-20">
                        <a href="{{ $announcement->announcement_address ?? '#' }}"
                           target="_blank"
                           class="px-8 py-2 rounded-full border-2 border-white
                                  bg-black/30 backdrop-blur-sm text-white font-bold
                                  hover:bg-white hover:text-black transition">
                            Explore Link
                        </a>
                    </div>
                </div>
            @endforeach

            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/20 group-hover:bg-black/40 group-focus:ring-4 group-focus:ring-white">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/20 group-hover:bg-black/40 group-focus:ring-4 group-focus:ring-white">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach($announcements as $index => $announcement)
                <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
    </div>

    <div class="mx-10 px-4 pb-10 max-w-full">
        <div class="space-y-4">
            @foreach($links as $link)
            <a href="{{ $link->link_address }}" target="_blank"
               class="flex items-center justify-between p-4 bg-white border-2 border-slate-200
                      rounded-2xl hover:-translate-y-0.5
                      hover:shadow-[6px_6px_0px_0px_rgba(51,65,85,1)]
                      transition-all shadow-[4px_4px_0px_0px_rgba(51,65,85,1)]">

                <span class="text-s text-slate-500 font-medium">
                    {{ $link->link_name }}
                </span>

                <svg class="w-6 h-6 text-slate-700 transform -rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
