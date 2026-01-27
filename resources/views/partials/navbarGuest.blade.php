<div class="flex w-[1440px] h-[75px] items-center gap-[225px] px-[87px] py-0 relative">
    <img
        class="relative w-[230px] h-[19px] aspect-[4.57] object-cover"
        alt="Weblogo"
        src="{{ asset('img/logo/logowhite.png') }}" />

    <div class="relative w-[784px] h-[26px] mr-[-13.00px]">
        <div class="absolute top-0 left-0 w-[784px] h-[26px] flex">
            <div class="w-[784px] h-[26px] inline-flex relative items-center gap-[68px]">
                <div class="flex-[0_0_auto] inline-flex relative items-center gap-[68px]">
                    <div class="relative w-fit mt-[-1px] text-white text-base tracking-normal leading-normal font-[Space_Grotesk] font-[300] text-[15px]">
                        Home
                    </div>

                    <div class="relative w-fit mt-[-1.00px] font-sans text-white text-base tracking-[0] leading-[normal] font-[Space_Grotesk] font-[300] text-[15px]">
                        Products
                    </div>

                    <div class="relative w-fit mt-[-1.00px] font-sans text-white text-base tracking-[0] leading-[normal] font-[Space_Grotesk] font-[300] text-[15px]">
                        About Us
                    </div>

                    <div class="relative w-fit mt-[-1.00px] font-sans text-white text-base tracking-[0] leading-[normal] font-[Space_Grotesk] font-[300] text-[15px]">
                        Contact Us
                    </div>

                    <div class="relative w-fit mt-[-1.00px] font-sans text-white text-base tracking-[0] leading-[normal] font-[Space_Grotesk] font-[300] text-[15px]">
                        Links
                    </div>
                </div>

                <div class="font-normal text-white text-base font-[Space_Grotesk]">
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

        <div class="absolute top-px left-[686px] w-6 h-6 bg-[url('{{ asset('icons/lucide-icon.svg') }}')] bg-[100%_100%]"></div>
    </div>
</div>