@extends('layout.guest')

@section('content')

<section class="w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] mb-12">
    <div class="w-full h-[300px] md:h-[450px] overflow-hidden">
        <img
            src="{{ asset('img/about/about-top.jpg') }}"
            alt="Crafted Goods"
            class="w-full h-full object-cover"
        >
    </div>
</section>

<div class="max-w-7xl mx-auto px-6">

    <section class="pt-12 pb-14 text-center">
        <span class="block text-[20px] tracking-[0.3em] uppercase text-gray-500 mb-3">
            Our Essence
        </span>

        <h2 class="text-4xl md:text-6xl font-normal leading-[1.1] tracking-tight mb-12">
            Elevating the everyday through <br>
            <span class="text-gray-400 italic">intentional design</span> and honest craft.
        </h2>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-20 pb-28">

        <div class="space-y-12">
            <div class="w-full h-[420px] overflow-hidden bg-gray-100">
                <img
                    src="{{ asset('img/about/about-flat.jpeg') }}"
                    alt="Bag Flatlay"
                    class="w-full h-full object-cover"
                >
            </div>

            <div>
                <h3 class="text-3xl font-semibold leading-snug">
                    A Bag Made for Everyday Activities
                </h3>

                <p class="mt-6 text-gray-600 leading-relaxed">
                    Each bag from alttt.craftedgoods is carefully crafted with purpose—balancing function,
                    comfort, and a clean, timeless design. We use durable materials and thoughtful construction
                    to ensure every bag can be relied on for everyday movement without losing its aesthetic value.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Designed to support daily needs, our bags feature a spacious main compartment and
                    well-considered functional pockets to keep essentials organized and easy to access.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    For us, a bag is more than an accessory. It is a crafted good—built to move with the user,
                    support productivity, and adapt to everyday routines with reliability and intention.
                </p>
            </div>
        </div>

        <div class="space-y-12">
            <div>
                <h3 class="text-3xl font-semibold">
                    Crafted for Everyday Life
                </h3>

                <p class="mt-6 text-gray-600 leading-relaxed">
                    alttt.craftedgoods was founded in 2026 with a focus on creating bags that are thoughtfully
                    crafted for modern daily use. We believe a bag should be functional, durable, and visually
                    relevant—designed to support movement without unnecessary complexity.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Every product is developed through careful design exploration, material selection, and
                    functional refinement. We pay attention to details that matter, ensuring each bag delivers
                    reliability and comfort in everyday activities.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Our journey is driven by continuous learning and innovation. alttt.craftedgoods is committed
                    to crafting dependable goods with purpose—made to last, and made to move with you.
                </p>
            </div>

            <div class="w-full h-[420px] overflow-hidden bg-gray-100">
                <img
                    src="{{ asset('img/about/about-wear.jpeg') }}"
                    alt="Bag Usage"
                    class="w-full h-full object-cover"
                >
            </div>
        </div>

    </section>

</div>

@endsection
