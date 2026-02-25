<div class="w-full bg-black font-sans text-white py-14 px-6 md:px-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-10 mb-16">

        <!-- CONTACT -->
        <div class="flex flex-col gap-6">
            <h3 class="text-xl font-bold">Let us know!</h3>

            <div class="text-base leading-relaxed opacity-90">
                <p class="mb-4">Call :<br>+62 87824157666</p>
                <p class="mb-4">Location :<br>Jl Wira Angun Angun no 4B, Bandung.</p>
                <p>Email :<br>order@maternaldisaster.com</p>
            </div>
        </div>

        <!-- MENU -->
        <div class="flex flex-col gap-6">
            <h3 class="text-xl font-bold">Menu</h3>

            <ul class="flex flex-col gap-4 text-base opacity-90">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('products') }}" class="hover:underline">Products</a></li>
                <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
                <li><a href="{{ route('linktree') }}" class="hover:underline">Links</a></li>
            </ul>
        </div>

        <!-- BRAND + SOSMED -->
        <div class="flex flex-col gap-6 md:items-end">

            <!-- logo + tagline -->
            <div class="flex flex-col items-center gap-2">
                <img src="{{ asset('img/logo/logo4white.png') }}" class="w-20 h-20 object-contain" alt="Logo">

                <p class="text-xl md:text-2xl font-medium leading-tight text-center">
                    Find Us On
                </p>
            </div>

            <!-- social icons -->
            <div class="flex flex-wrap gap-2 md:justify-end">
                <a href="#" class="rounded-full p-2 hover:scale-110 transition-transform">
                    <img src="{{ asset('partials/logo wa.png') }}" class="w-10 h-10 md:w-12 md:h-12" alt="WA">
                </a>
                <a href="https://www.instagram.com/maternal_disaster/"
                    class="rounded-full p-2 hover:scale-110 transition-transform">
                    <img src="{{ asset('partials/logo ig.png') }}" class="w-10 h-10 md:w-12 md:h-12" alt="IG">
                </a>
                <a href="https://shopee.co.id/maternaldisasterofficial"
                    class="rounded-full p-2 hover:scale-110 transition-transform">
                    <img src="{{ asset('partials/logo shopee.png') }}" class="w-10 h-10 md:w-12 md:h-12" alt="Shopee">
                </a>
                <a href="https://www.tiktok.com/@maternaldisasterofficial"
                    class="rounded-full p-2 hover:scale-110 transition-transform">
                    <img src="{{ asset('partials/logo tiktok.png') }}" class="w-10 h-10 md:w-12 md:h-12" alt="TikTok">
                </a>
            </div>

        </div>
    </div>

    <div class="w-full h-px bg-white/20 mb-6"></div>

    <div class="text-center">
        <p class="text-xs md:text-sm opacity-80 leading-relaxed">
            All Rights Reserved ©{{ now()->year }} Maternal Disaster.
        </p>
    </div>
</div>
