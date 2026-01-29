@extends('layout.guest')


@section('content')

<div class="max-w-full mx-auto px-6">

   <section class="py-24 text-center">
    <h1 class="mt-4 text-4xl md:text-5xl font-bold">
        About Us
    </h1>

    <p class="text-xs tracking-[0.3em] text-gray-500">
        GET TO KNOW US
    </p>
</section>


 <section class="grid grid-cols-1 md:grid-cols-2 gap-20 pb-24">

    <div class="space-y-12">

        <div class="w-full h-[420px] bg-gray-100 overflow-hidden">
            <img src="{{ asset('img/about/about-flat.jpeg') }}" alt="Bag Flatlay" class="w-full h-full object-cover">
        </div>

            <div>
                <h2 class="text-3xl font-semibold leading-snug">
                   A Bag Made for <br> Everyday Activitie
                </h2>

                <p class="mt-6 text-gray-600 leading-relaxed">
                     Each bag from alttt.craftedgoods is carefully crafted with purpose—balancing function,
                     comfort, and a clean, timeless design. We use durable materials and thoughtful construction to
                      ensure every bag can be relied on for everyday movement without losing its aesthetic value.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                  Designed to support daily needs, our bags feature a spacious main compartment and well-considered functional
                   pockets to keep essentials organized and easy to access. Every detail is refined to provide practicality while maintaining a simple,
                   modern look that fits various activities.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    For us, a bag is more than an accessory. It is a crafted good—built to move with the user, support productivity, and adapt to everyday
                    routines with reliability and intention.
                </p>


                </div>
    </div>

        <div class="space-y-12">
            <div>
                <h2 class="text-3xl font-semibold">
                     Crafted for <br> Everyday Life
                </h2>

                 <p class="mt-6 text-gray-600 leading-relaxed">
                     alttt.craftedgoods was founded in 2026 with a focus on creating bags that are
                      thoughtfully crafted for modern daily use. We believe a bag should be functional, durable,
                      and visually relevant—designed to support movement without unnecessary complexity
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                   Every product is developed through careful design exploration, material selection, and functional refinement.
                   We pay attention to details that matter, ensuring each bag delivers reliability and comfort in everyday activities.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Our journey is driven by continuous learning and innovation. alttt.craftedgoods is committed to crafting
                    dependable goods with purpose—made to last, and made to move with you.
                </p>
            </div>

            <div class="w-full h-[420px] bg-gray-100 overflow-hidden">
                <img
                    src="{{ asset('img/about/about-wear.jpeg') }}"alt="Bag Usage"  class="w-full h-full object-cover" >
            </div>
    </div>
    </section>

</div>
    @endsection

