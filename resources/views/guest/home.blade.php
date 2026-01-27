@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alttt Craftedgoods</title>
</head>
@extends('layout.guest')

<body class="font-sans">
    <div class="relative w-full h-[1011px] overflow-hidden">
        <div class="absolute inset-0">

        <a href="{{ route('home') }}">
            <img
                src="{{ asset('img/WithModel.webp') }}"
                alt="Withmodel"
                class="absolute inset-0 w-full h-full object-cover" />
        </a>

            <div class="absolute bottom-[127px] left-1/2 -translate-x-1/2">
                <a href="#"
                    class="flex items-center justify-center px-10 py-3 rounded-full border-2 border-white text-white font-medium text-xl font-[Space_Grotesk] hover:bg-white hover:text-black transition">
                    Shop Now
                </a>
            </div>

            <div class="absolute bottom-[60px] left-1/2 -translate-x-1/2 flex gap-4">
                <div class="w-4 h-4 rounded-full bg-white"></div>
                <div class="w-4 h-4 rounded-full border-2 border-white"></div>
                <div class="w-4 h-4 rounded-full border-2 border-white"></div>
            </div>

            <button class="absolute right-10 top-1/2 -translate-y-1/2 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-chevron-right-icon lucide-circle-chevron-right rounded-full hover:bg-white hover:text-black transition">
                    <circle cx="12" cy="12" r="10" />
                    <path d="m10 8 4 4-4 4" />
                </svg>
            </button>

            <button class="absolute left-10 top-1/2 -translate-y-1/2 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-chevron-left-icon lucide-circle-chevron-left rounded-full hover:bg-white hover:text-black transition">
                    <circle cx="12" cy="12" r="10" />
                    <path d="m14 16-4-4 4-4" />
                </svg>
            </button>

        </div>
    </div>

</body>

</html>