@extends('layout.guest')

@section('content')

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

    .link-item {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: scale(0.85);
        opacity: 0.5;

        pointer-events: auto;
        filter: blur(1px);
    }

    .link-item.active {
        transform: scale(1.1);
        opacity: 1;
        z-index: 10;
        filter: blur(0px);
    }

    .link-item .img-container {
        transition : all 0.5s ease;
        border: 1px solis rgba(0,0,0,0.05);
    }

    .dot {
        transition: all 0.3s ease;
    }
    .dot.active {
        background-color: #000;
        width: 24px;
        border-radius: 4px;
    }

    #linktree {
        scroll-behavior: smooth;
        padding-top: 50px;
        padding-bottom: 50px;
    }
/*
    .linktree-section {
  background:
    radial-gradient(1200px 400px at 50% -10%, rgba(0,0,0,0.04), transparent),
    linear-gradient(to bottom, #ffffff, #f9fafb);
} */


</style>

<section class="w-full py-20 bg-white overflow-hidden">
    <h2 class="text-center text-xl font-medium tracking-[0.3em] mb-16 uppercase">
        EXPLORE LINK
    </h2>

    <div
        id="linktree"
        class="flex gap-4 overflow-x-auto px-[30%] items-center snap-x snap-mandatory scrollbar-hide"
    >
        {{-- Tokopedia --}}
        <div data-index="0" onclick="goToLink('https://tokopedia.com')" class="snap-center flex-shrink-0 w-64 cursor-pointer link-item">
            <div class="flex items-center gap-2 mb-3">
                <img src="{{ asset('img/linktree/logo/tokopedia-logo.png') }}" class="w-5 h-5">
                <span class="text-sm font-semibold">Tokopedia</span>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-gray-50">
                <img src="{{ asset('img/linktree/shopee.jpeg') }}" class="w-full object-cover">
            </div>
        </div>

        {{-- Shopee --}}
        <div data-index="1" onclick="goToLink('https://shopee.com')" class="snap-center flex-shrink-0 w-64 cursor-pointer link-item">
            <div class="flex items-center gap-2 mb-3">
                <img src="{{ asset('img/linktree/logo/shopee-logo.png') }}" class="w-5 h-5">
                <span class="text-sm font-semibold">Shopee</span>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-gray-50">
                <img src="{{ asset('img/linktree/shopee.jpeg') }}" class="w-full object-cover">
            </div>
        </div>

        {{-- Instagram --}}
        <div data-index="2" onclick="goToLink('https://instagram.com')" class="snap-center flex-shrink-0 w-64 cursor-pointer link-item active">
            <div class="flex items-center gap-2 mb-3">
                <img src="{{ asset('img/linktree/logo/instagram-logo.png') }}" class="w-5 h-5">
                <span class="text-sm font-semibold">Instagram</span>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-gray-100 bg-gray-50">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full object-cover">
            </div>
        </div>

        {{-- Tiktok --}}
        <div data-index="3" onclick="goToLink('https://tiktok.com')" class="snap-center flex-shrink-0 w-64 cursor-pointer link-item">
            <div class="flex items-center gap-2 mb-3">
                <img src="{{ asset('img/linktree/logo/tiktok-logo.png') }}" class="w-5 h-5">
                <span class="text-sm font-semibold">Tiktok</span>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-gray-50">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full object-cover">
            </div>
        </div>

        {{-- Facebook --}}
        <div data-index="4" onclick="goToLink('https://facebook.com')" class="snap-center flex-shrink-0 w-64 cursor-pointer link-item">
            <div class="flex items-center gap-2 mb-3">
                <img src="{{ asset('img/linktree/logo/facebook-logo.png') }}" class="w-5 h-5">
                <span class="text-sm font-semibold">Facebook</span>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-gray-50">
                <img src="{{ asset('img/linktree/instagram.jpeg') }}" class="w-full object-cover">
            </div>
        </div>
    </div>

    {{-- Pagination nyaa  --}}
    <div id="pagination" class="flex justify-center gap-2 mt-12">
        <div class="dot w-2 h-2 rounded-full bg-gray-300" data-dot="0"></div>
        <div class="dot w-2 h-2 rounded-full bg-gray-300" data-dot="1"></div>
        <div class="dot w-2 h-2 rounded-full bg-gray-300 active" data-dot="2"></div>
        <div class="dot w-2 h-2 rounded-full bg-gray-300" data-dot="3"></div>
        <div class="dot w-2 h-2 rounded-full bg-gray-300" data-dot="4"></div>
    </div>

    <p class="text-center text-l mt-12 text-gray-800 tracking-widest">
        Stay Connected With Us
    </p>
</section>

<script>
    function goToLink(url) {
        window.open(url, '_blank');
    }

    const container = document.getElementById('linktree');
    const items = document.querySelectorAll('.link-item');
    const dots = document.querySelectorAll('.dot');

    // mendeteksi halaman mana yang di lihat user yang paling tengah
    const handleScroll = () => {
        let closestItem = null;
        let minDistance = Infinity;
        const centerX = container.offsetWidth / 2 + container.scrollLeft;

        items.forEach((item, index) => {
            const itemCenter = item.offsetLeft + item.offsetWidth / 2;
            const distance = Math.abs(centerX - itemCenter);

            if (distance < minDistance) {
                minDistance = distance;
                closestItem = item;
            }
        });

        if (closestItem) {
            items.forEach(i => i.classList.remove('active'));
            dots.forEach(d => d.classList.remove('active'));

            // Tambahkan halaman yang di lihat user ke tengah (utama) yaa
            closestItem.classList.add('active');
            const index = closestItem.getAttribute('data-index');
            document.querySelector(`[data-dot="${index}"]`).classList.add('active');
        }
    };

    // Scroll nyaa
    container.addEventListener('scroll', handleScroll);

    // Set posisi ke tengah nyaa
    window.addEventListener('load', () => {
        const target = items[2];
        const scrollPos = target.offsetLeft - (container.offsetWidth / 2) + (target.offsetWidth / 2);
        container.scrollTo({ left: scrollPos, behavior: 'instant' });
    });
</script>

@endsection
