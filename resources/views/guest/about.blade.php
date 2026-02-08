@extends('layout.guest')

@section('content')

<section class="w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] mb-10">
    <div class="relative w-full h-[300px] md:h-[500px] overflow-hidden">
        <img
            src="{{ asset('img/about/about us-4.jpg') }}"
            alt="Crafted Goods"
            class="w-full h-full object-cover animate-heroZoom"
        >

        <div class="absolute inset-0 bg-black/20"></div>

        <div class="absolute bottom-8 left-8 text-white">
            <p class="tracking-[0.35em] uppercase text-xs opacity-80">
                alttt.craftedgoods
            </p>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-6">

    <section class="pt-6 pb-16 text-center max-w-4xl mx-auto">
        <span class="block text-[14px] tracking-[0.35em] uppercase text-gray-500 mb-4">
            Our Essence
        </span>

        <h2 class="text-4xl md:text-6xl font-normal leading-[1.15] tracking-tight">
            Elevating the everyday through <br>
            <span class="text-gray-400 italic">intentional design</span> and honest craft.
        </h2>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-20 items-start pb-32">

        <div class="space-y-12">

            <div class="w-full h-[420px] overflow-hidden bg-gray-100 rounded-2xl shadow-sm group">
                <img
                    src="{{ asset('img/about/about-flat.jpeg') }}"
                    alt="Bag Flatlay"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                >
            </div>

            <div>
                <h3 class="text-3xl font-medium leading-snug tracking-tight">
                    A Bag Made for Everyday Activities
                </h3>

                <p class="mt-6 text-gray-600 leading-relaxed text-[15.5px] text-justify">
                    Each bag from alttt.craftedgoods is carefully crafted with purpose—balancing function,
                    comfort, and a clean, timeless design. We use durable materials and thoughtful construction
                    to ensure every bag can be relied on for everyday movement without losing its aesthetic value.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed text-[15.5px] text-justify">
                    Designed to support daily needs, our bags feature a spacious main compartment and
                    well-considered functional pockets to keep essentials organized and easy to access.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed text-[15.5px] text-justify">
                    For us, a bag is more than an accessory. It is a crafted good—built to move with the user,
                    support productivity, and adapt to everyday routines with reliability and intention.
                </p>
            </div>
        </div>

        <div class="space-y-12">

            <div>
                <h3 class="text-3xl font-medium tracking-tight">
                    Crafted for Everyday Life
                </h3>

                <p class="mt-6 text-gray-600 leading-relaxed text-[15.5px]">
                    alttt.craftedgoods was founded in 2026 with a focus on creating thoughtfully crafted bags for modern daily use.
                    We believe a bag should be functional, durable, and visually relevant—designed to support movement without
                    unnecessary complexity. alttt.craftedgoods is committed to crafting dependable goods with purpose—made to last,
                    and made to move with you.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed text-[15.5px]">
                    Every product is shaped through careful design exploration, material selection,
                    and functional refinement. We pay close attention to the details that matter,
                    ensuring each piece delivers reliability and comfort in everyday activities.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed text-[15.5px]">
                        We craft timeless daily wear that prioritizes comfort and sensory connection.
                        Our paracord creations are a tactile sanctuary, a way to reconnect with nature and find calm in a crowded world.
                        Be an Artist, Be You..
                 </p>
            </div>

            <div class="w-full h-[420px] overflow-hidden bg-gray-100 rounded-2xl shadow-sm group">
                <img
                    src="{{ asset('img/about/about-wear.jpeg') }}"
                    alt="Bag Usage"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                >
            </div>
        </div>

    </section>

</div>

<style>
@keyframes heroZoom {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.12);
    }
}

.animate-heroZoom {
    animation: heroZoom 18s ease-in-out forwards;
}
</style>

@endsection
