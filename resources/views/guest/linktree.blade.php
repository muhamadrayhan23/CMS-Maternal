@extends('layout.guest')

@section('title', 'Links')
@section('content')
    <div class="bg-white overflow-hidden">

        <div id="default-carousel" class="relative w-full mb-8 pt-4 px-4 sm:px-10" data-carousel="slide">
            <div class="relative overflow-hidden rounded-1 shadow-lg bg-white">
                <div class="relative w-full">
                    @foreach ($announcements as $index => $announcement)
                        <div class="{{ $index === 0 ? 'relative' : 'hidden' }} duration-1000 ease-in-out" data-carousel-item>

                            <img src="{{ asset($announcement->announcement_image) }}"
                                class="w-full h-auto md:h-96 md:object-cover block" alt="announcement {{ $index + 1 }}">

                            <div class="absolute inset-x-0 bottom-6 md:bottom-10 flex justify-center z-20">
                                <a href="{{ $announcement->announcement_address ?? '#' }}" target="_blank"
                                    class="px-4 py-1.5 sm:px-8 sm:py-3 rounded-full border-[1.5px] sm:border-2 border-white
                                            bg-black/30 backdrop-blur-sm text-white font-bold
                                            hover:bg-white hover:text-black transition
                                            text-[10px] sm:text-base whitespace-nowrap">
                                    Explore Link
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button"
                    class="absolute top-1/2 -translate-y-1/2 start-0 z-30 px-3 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/20 group-hover:bg-black/40">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-1/2 -translate-y-1/2 end-0 z-30 px-3 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/20 group-hover:bg-black/40">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </span>
                </button>
            </div>

            <div class="absolute z-30 flex -translate-x-1/2 bottom-2 md:bottom-4 left-1/2 space-x-2">
                @foreach ($announcements as $index => $announcement)
                    <button type="button" class="w-2 h-2 rounded-full bg-white/50"
                        data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col items-center mb-6 px-4 text-center">
            <h2 class="text-xl md:text-l font-black text-slate-800 tracking-wider uppercase">
                Stay Connected
            </h2>
            <p class="text-[10px] sm:text-[13px] text-slate-400 font-bold uppercase tracking-[0.1em] mt-1">
                Tap the links below for more info
            </p>
        </div>

        <div class="mx-auto w-full max-w-9xl px-4 sm:px-10 pb-20">
            <div class="space-y-4">
                @foreach ($links as $link)
                    <a href="{{ $link->link_address }}" target="_blank"
                        class="flex items-center justify-between p-4 sm:p-5 bg-white border-2 border-slate-200
                        rounded-2xl hover:-translate-y-0.5
                        hover:shadow-[4px_4px_0px_0px_rgba(51,65,85,1)]
                        active:translate-y-0
                        active:shadow-[1px_1px_0px_0px_rgba(51,65,85,1)]
                        transition-all shadow-[2px_2px_0px_0px_rgba(51,65,85,1)] w-full">

                        <span class="text-sm sm:text-base text-slate-700 font-bold truncate mr-2">
                            {{ $link->link_name }}
                        </span>

                        <svg class="w-5 h-5 text-slate-700 transform -rotate-45 flex-shrink-0" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="h-4"></div>
    </div>
@endsection
