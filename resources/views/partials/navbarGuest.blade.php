<nav id="main-navbar"
    data-product="{{ request()->is('products*') ? '1' : '0' }}"
    data-about="{{ request()->routeIs('about') ? '1' : '0' }}"
    data-home="{{ request()->routeIs('home') ? '1' : '0' }}"
    data-link="{{ request()->routeIs('linktree') ? '1' : '0' }}"
    class="w-full bg-transparent text-white transition-all duration-300">

    <!-- TOP BAR -->
    <div class="flex w-full items-center justify-between px-6 py-4 md:px-10 md:py-6">

        <a href="{{ route('home') }}">
            <img
                id="navbar-logo"
                src="{{ asset('img/logo/logowhite.png') }}"
                data-logo-white="{{ asset('img/logo/logowhite.png') }}"
                data-logo-black="{{ asset('img/logo/logo.png') }}"
                class="w-57.5 h-4.75 aspect-[4.57] object-cover transition-all duration-300"
                alt="Weblogo" />
        </a>

        <!-- HAMBURGER -->
        <button id="mobile-menu-btn"
            class="md:hidden flex items-center justify-center p-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 5h18" />
                <path d="M3 12h18" />
                <path d="M3 19h18" />
            </svg>
        </button>

        <!-- MENU DESKTOP -->
        <div class="hidden sm:hidden md:flex items-center gap-17 text-current mr-3.25 font-sans text-base font-light">

            <a href="{{ route('home') }}" class="group relative inline-block px-1 py-2">
                <span>Home</span>
                <span
                    class="absolute left-0 right-0 -bottom-0.5 h-[2px] transition-all bg-current duration-300
                    {{ request()->routeIs('home') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
                    origin-center">
                </span>
            </a>

            <a href="{{ route('products') }}" class="group relative inline-block px-1 py-2">
                <span>Products</span>
                <span
                    class="absolute left-0 right-0 -bottom-0.5 h-[2px] transition-all bg-current duration-300
                    {{ request()->routeIs('products', 'detproduct') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
                    origin-center">
                </span>
            </a>

            <a href="{{ route('about') }}" class="group relative inline-block px-1 py-2">
                <span>About Us</span>
                <span
                    class="absolute left-0 right-0 -bottom-0.5 h-[2px] transition-all bg-current duration-300
                    {{ request()->routeIs('about*') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
                    origin-center">
                </span>
            </a>

            <a href="{{ route('linktree') }}" class="group relative inline-block px-1 py-2">
                <span>Links</span>
                <span
                    class="absolute left-0 right-0 -bottom-0.5 h-[2px] transition-all bg-current duration-300
                    {{ request()->routeIs('linktree') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
                    origin-center">
                </span>
            </a>

            <!-- <a href="{{ route('login') }}" class="group relative inline-flex items-center gap-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in-icon lucide-log-in">
                    <path d="m10 17 5-5-5-5" />
                    <path d="M15 12H3" />
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                </svg>
                <span>Login</span>
                <span
                    class="absolute left-0 right-0 -bottom-0.5 h-[2px] transition-all bg-current duration-300
                    {{ request()->routeIs('login') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
                    origin-center">
                </span>
            </a> -->
        </div>
    </div>

    <!-- MENU MOBILE (DROP DOWN) -->
    <div id="mobile-menu"
        class="md:hidden overflow-hidden max-h-0 opacity-0 -translate-y-2
        transition-all duration-700 ease-in-out
        bg-white/90 backdrop-blur text-black px-6 pb-4">

        <a href="{{ route('home') }}"
            class="block w-full px-4 py-3 rounded-lg transition
            {{ request()->routeIs('home') ? 'bg-black/10 text-black font-medium' : 'text-black/70 hover:bg-black/5' }}">
            Home
        </a>

        <a href="{{ route('products') }}"
            class="block w-full px-4 py-3 rounded-lg transition
            {{ request()->routeIs('products', 'detproduct') ? 'bg-black/10 text-black font-medium' : 'text-black/70 hover:bg-black/5' }}">
            Products
        </a>

        <a href="{{ route('about') }}"
            class="block w-full px-4 py-3 rounded-lg transition
            {{ request()->routeIs('about') ? 'bg-black/10 text-black font-medium' : 'text-black/70 hover:bg-black/5' }}">
            About Us
        </a>

        <a href="{{ route('linktree') }}"
            class="block w-full px-4 py-3 rounded-lg transition
            {{ request()->routeIs('linktree') ? 'bg-black/10 text-black font-medium' : 'text-black/70 hover:bg-black/5' }}">
            Links
        </a>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navbar = document.getElementById('main-navbar');
        const logo = document.getElementById('navbar-logo');

        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (!navbar || !logo || !mobileBtn || !mobileMenu) return;

        const isProductPage = navbar.dataset.product === '1';
        const isAboutPage = navbar.dataset.about === '1';
        const isLinkPage = navbar.dataset.link === '1';

        const logoWhite = logo.dataset.logoWhite;
        const logoBlack = logo.dataset.logoBlack;

        const updateNavbar = () => {
            const scrolled = window.scrollY > 20;
            const mobileMenuOpen = mobileMenu.classList.contains('max-h-[500px]');

            if (scrolled || isProductPage || isAboutPage || isLinkPage || mobileMenuOpen) {
                navbar.classList.remove('bg-transparent', 'text-white');
                navbar.classList.add('bg-white/80', 'text-black', 'backdrop-blur');
                logo.src = logoBlack;
            } else {
                navbar.classList.remove('bg-white/80', 'text-black', 'backdrop-blur');
                navbar.classList.add('bg-transparent', 'text-white');
                logo.src = logoWhite;
            }

            if (scrolled) navbar.classList.add('shadow-lg');
            else navbar.classList.remove('shadow-lg');
        };

        mobileBtn.addEventListener('click', () => {
            const isClosed = mobileMenu.classList.contains('max-h-0');

            if (isClosed) {
                mobileMenu.classList.remove('max-h-0', 'opacity-0', '-translate-y-2');
                mobileMenu.classList.add('max-h-[500px]', 'opacity-100', 'translate-y-0');
            } else {
                mobileMenu.classList.remove('max-h-[500px]', 'opacity-100', 'translate-y-0');
                mobileMenu.classList.add('max-h-0', 'opacity-0', '-translate-y-2');
            }

            updateNavbar();
        });

        window.addEventListener('scroll', updateNavbar);
        updateNavbar();
    });
</script>