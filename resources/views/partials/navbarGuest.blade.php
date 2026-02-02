@php
$route = Route::currentRouteName();
@endphp

<nav class="flex w-full h-18.75 items-center gap-56.25 px-21.75">
    <img
        class="w-57.5 h-4.75 aspect-[4.57] object-cover"
        alt="Weblogo"
        src="{{ asset('img/logo/logowhite.png') }}" />

    <div class="w-196 h-6.5 flex items-center gap-17 text-white mr-3.25 font-sans text-base font-light">

        <a href="{{ route('home') }}"
            class="group relative inline-block px-1 py-2 {{ request()->routeIs('products*') ? 'font-semibold' : '' }}">

            <span>Home</span>

            <span
            class="absolute left-0 right-0 -bottom-0.5 h-[2px] bg-[#373737] transition-all duration-300
            {{ request()->routeIs('home*') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
            origin-center">
            </span>
        </a>

        <a href="{{ route('products') }}"
            class="group relative inline-block px-1 py-2 {{ request()->routeIs('products*') ? 'font-semibold' : '' }}">

            <span>Products</span>

            <span
            class="absolute left-0 right-0 -bottom-0.5 h-[2px] bg-[#373737] transition-all duration-300
            {{ request()->routeIs('products*') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
            origin-center">
            </span>
        </a>


        <a href="{{ route('about') }}"
            class="group relative inline-block px-1 py-2 {{ request()->routeIs('products*') ? 'font-semibold' : '' }}">

            <span>About Us</span>

            <span
            class="absolute left-0 right-0 -bottom-0.5 h-[2px] bg-[#373737] transition-all duration-300
            {{ request()->routeIs('about*') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
            origin-center">
            </span>
        </a>

        <a href="#"
            class="group relative inline-block px-1 py-2 {{ request()->routeIs('products*') ? 'font-semibold' : '' }}">

            <span>Links</span>

            <span
            class="absolute left-0 right-0 -bottom-0.5 h-[2px] bg-[#373737] transition-all duration-300
            {{ request()->routeIs('#') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}
            origin-center">
            </span>
        </a>

        <a href="{{ route('login') }}"
            class="flex items-center gap-2 px-4 py-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="20" height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.3"
                stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m10 17 5-5-5-5" />
                <path d="M15 12H3" />
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
            </svg>
            <span>Login</span>
        </a>

    </div>
</nav>