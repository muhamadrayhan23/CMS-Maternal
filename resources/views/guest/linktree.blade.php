@extends('layout.guest')

@section('content')

<section class="w-full py-12">
    <h2 class="text-center text-sm tracking-widest mb-8">
        EXPLORE LINK
    </h2>

    <div
        id="linktree"
        class="flex gap-6 overflow-x-auto px-10 snap-x snap-mandatory scrollbar-hide"
    >

        {{-- Shopee --}}
        <div
            onclick="goToLink('https://shopee.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/tokopedia.svg" class="w-4 h-4">
                <span>Tokopedia</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/shopee.jpeg') }}" class="w-full">
            </div>
        </div>

        {{-- -- Instagram -- --}}
        <div
            onclick="goToLink('https://instagram.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/instagram.svg" class="w-4 h-4">
                <span>Instagram</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full">
            </div>
        </div>

        {{-- -- Tiktok -- --}}
        <div
            onclick="goToLink('https://tiktok.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/tiktok.svg" class="w-4 h-4">
                <span>Tiktok</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full">
            </div>
        </div>

        {{-- -- Facebook -- --}}
        <div
            onclick="goToLink('https://tiktok.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/tiktok.svg" class="w-4 h-4">
                <span>Facebook</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full">
            </div>
        </div>

          {{-- -- Tokopedia -- --}}
        <div
            onclick="goToLink('https://tiktok.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/tiktok.svg" class="w-4 h-4">
                <span>Tokopedia</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full">
            </div>
        </div>

         {{-- -- Telegram -- --}}
        <div
            onclick="goToLink('https://tiktok.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/tiktok.svg" class="w-4 h-4">
                <span>Telegram</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full">
            </div>
        </div>

         {{-- -- Lazada -- --}}
        <div
            onclick="goToLink('https://tiktok.com')"
            class="snap-center flex-shrink-0 w-64 transition-all duration-300 link-item"
        >
            <div class="flex items-center gap-2 text-xs mb-2">
                <img src="/icons/tiktok.svg" class="w-4 h-4">
                <span>Lazada</span>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full">
            </div>
        </div>

    </div>

    <p class="text-center text-xs mt-8 opacity-60">
        Stay Connected With Us
    </p>
</section>

<script>
    function goToLink(url) {
        window.open(url, '_blank');
    }
</script>

@endsection
