<nav class="flex w-full h-18.75 items-center gap-56.25 px-21.75">
    <img
        class="w-57.5 h-4.75 aspect-[4.57] object-cover"
        alt="Weblogo"
        src="{{ asset('img/logo/logowhite.png') }}" />

    <div class="w-196 h-6.5 flex items-center gap-17 text-white mr-3.25 font-sans text-base font-light">

        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('products') }}">Products</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="#">Links</a>

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
