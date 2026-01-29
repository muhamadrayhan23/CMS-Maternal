<nav class="flex w-full h-18.75 items-center gap-56.25 px-21.75 py-0">
    <img
        class="relative w-57.5 h-4.75 aspect-[4.57] object-cover"
        alt="Weblogo"
        src="{{ asset('img/logo/logowhite.png') }}" />

    <div class="relative w-196 h-6.5 mr-3.25">
        <div class="absolute top-0 left-0 w-196 h-6.5 flex">
            <div class="w-196 h-6.5 inline-flex relative items-center gap-17">
                <div class="flex-[0_0_auto] inline-flex relative items-center gap-17">
                    <div class="relative w-fit mt-px text-base tracking-normal leading-normal font-[Space_Grotesk] font-light text-[15px]">
                        Home
                    </div>

                    <div class="relative w-fit mt-px font-sans text-base tracking-[0] leading-[normal] font-light text-[15px]">
                        Products
                    </div>

                    <a href="{{ route('about') }}" class="relative w-fit mt-px font-sans text-base tracking-[0] leading-[normal] font-light text-[15px] hover:text-gray-300 transition">
                        About Us
                    </a>

                    <div class="relative w-fit mt-px font-sans text-base tracking-[0] leading-[normal] font-light text-[15px]">
                        Contact Us
                    </div>

                    <div class="relative w-fit mt-px font-sans text-base tracking-[0] leading-[normal] font-light text-[15px]">
                        Links
                    </div>
                </div>

                <div class="font-normal text-base font-[Space_Grotesk]">
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-md cursor-pointer hover:text-gray-100 transition w-full">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20" height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.3"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="pointer-events-none">
                            <path d="m10 17 5-5-5-5" />
                            <path d="M15 12H3" />
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        </svg>
                        <span>Login</span>
                    </a>
                </div>

            </div>
        </div>

        <div class="absolute top-px left-171.5 w-6 h-6 bg-[url('{{ asset('icons/lucide-icon.svg') }}')] bg-[100%_100%]"></div>
    </div>
</nav>
