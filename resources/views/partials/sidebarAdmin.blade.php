<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="bg-[#f4f4f4] font-sans ">

    @php
        $active = 'bg-[#373737] text-white shadow-sm border-l-4 border-gray-800';
        $default =
            'text-gray-600 border-l-4 border-transparent hover:bg-gray-100 hover:text-black transition-all duration-200';
    @endphp
    <div class="md:hidden flex items-center justify-between p-4 bg-white border-b border-gray-200 sticky top-0 z-[60]">
        <button id="openSidebar" class="p-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-text-align-justify-icon lucide-text-align-justify">
                <path d="M3 5h18" />
                <path d="M3 12h18" />
                <path d="M3 19h18" />
            </svg>
        </button>
        <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="h-6 w-auto">
        <div class="w-10"></div>
    </div>
    {{-- buat responsive yah --}}



    {{-- Sidebar Container Atas --}}
    <div id="sidebar"
        class="fixed inset-y-0 left-0 z-50 h-screen w-64 bg-white flex flex-col -translate-x-full md:translate-x-0 transition-transform duration-300 border-r border-gray-200">

        {{-- 1. BAGIAN LOGO --}}
        <div class="flex items-center justify-center px-6 h-16">
            <img src="{{ asset('img/logo/logoblack.png') }}" alt="Logo" class="mt-4 h-8 w-auto">
            <button id="closeSidebar" class="md:hidden p-2 text-gray-400 hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>

        {{-- Fitur --}}
        <ul class="list-none px-6 m-4 space-y-1 flex-1 overflow-y-auto">
            {{-- Dashboard --}}
            <li class="mb-2">
                <a href="{{ route('dashboardadmin') }}"
                    class="flex items-center gap-3 p-2 pb-3 rounded-lg {{ Route::is('dashboardadmin') ? $active : $default }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                        fill="none">
                        <path
                            d="M7.125 2.375H3.167a.792.792 0 0 0-.792.792v5.541c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792V3.167a.792.792 0 0 0-.792-.792Z"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M15.833 2.375h-3.958a.792.792 0 0 0-.792.792v2.375c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792V3.167a.792.792 0 0 0-.792-.792Z"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M15.833 9.5h-3.958a.792.792 0 0 0-.792.792v5.541c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792v-5.541a.792.792 0 0 0-.792-.792Z"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M7.125 12.667H3.167a.792.792 0 0 0-.792.791v2.375c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792v-2.375a.792.792 0 0 0-.792-.791Z"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Product --}}
            <li class="mb-2">
                <a href="{{ route('produk.index') }}"
<<<<<<< HEAD
                    class="flex items-center gap-3 p-2 pb-3 rounded-lg {{ Route::is('produk.index') ? $active : $default }}">
=======
                    class="flex items-center gap-3 p-2 pb-3 rounded-lg {{ Route::is ('produk.index', 'produk.create','produk.edit','produk.show', 'produk_restore', 'produk_detail_trash') ? $active : $default }}">
>>>>>>> 31472ad2068f5aca7fc0f6b2382023749ae921ed
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 12h.01" />
                        <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                        <path d="M22 13a18.15 18.15 0 0 1-20 0" />
                        <rect width="20" height="14" x="2" y="6" rx="2" />
                    </svg>
                    <span>Products</span>
                </a>
            </li>

            {{-- Banner --}}
            <li class="mb-2">
<<<<<<< HEAD
                <a href="{{ route('Bhome') }}"
                    class="flex items-center gap-3 p-2 pb-3 rounded-lg {{ Route::is('Bhome') ? $active : $default }}">
=======
                <a href="{{ route('Bhome') }}" class="flex items-center gap-3 p-2 pb-3 rounded-lg {{ Route::is ('Bhome', 'addB', 'editB', 'dBanner', 'Btrash') ? $active : $default }}">
>>>>>>> 31472ad2068f5aca7fc0f6b2382023749ae921ed
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m20 13.7-2.1-2.1a2 2 0 0 0-2.8 0L9.7 17" />
                        <path
                            d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                        <circle cx="10" cy="8" r="2" />
                    </svg>
                    <span>Banners</span>
                </a>
            </li>

            {{-- Link --}}
            <li class="mb-2">
<<<<<<< HEAD
                <a href="{{ route('homeLink') }}"
                    class="flex items-center gap-3 p-2 pb-3  rounded-lg {{ Route::is('homeLink') ? $active : $default }}">
=======
                <a href="{{ route('homeLink') }}" class="flex items-center gap-3 p-2 pb-3  rounded-lg {{ Route::is('homeLink', 'createLink', 'editLink', 'deleteLink') ? $active : $default }}">
>>>>>>> 31472ad2068f5aca7fc0f6b2382023749ae921ed
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 17H7A5 5 0 0 1 7 7h2" />
                        <path d="M15 7h2a5 5 0 1 1 0 10h-2" />
                        <line x1="8" x2="16" y1="12" y2="12" />
                    </svg>
                    <span>Links</span>
                </a>
            </li>

            {{-- User --}}
            <li class="mb-2">
<<<<<<< HEAD
                <a href="{{ route('homeUser') }}"
                    class="flex items-center gap-3 p-2  rounded-lg {{ Route::is('homeUser') ? $active : $default }}">
=======
                <a href="{{ route('homeUser') }}" class="flex items-center gap-3 p-2  rounded-lg {{  Route::is ('homeUser', 'createUser', 'editUser', 'deleteUser') ? $active: $default }}">
>>>>>>> 31472ad2068f5aca7fc0f6b2382023749ae921ed
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                    <span>Users</span>
                </a>
            </li>
        </ul>

        {{-- bagian bawah kecilin yah kata sipa --}}
        <div class="p-6 space-y-4">
            {{-- Quick Access Card --}}
            <div class="border border-[#D9DEE3] rounded-xl p-3 bg-gray-50">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-semibold text-sm">Quick access</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                    </svg>
                </div>
                <p class="text-xs text-gray-500 mb-3">View the live version of the website.</p>
                <a href="{{ route('home') }}" target="_blank"
                    class="block text-center bg-[#373737] text-white text-xs py-2 rounded-lg hover:bg-gray-900 transition-colors">
                    Visit Landing page
                </a>
            </div>

            {{-- User & Logout --}}
            <div
                class="border border-[#D9DEE3] rounded-xl p-2 flex items-center justify-between hover:text-red-400 transition-all duration-300 group">
                <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                    @csrf
<<<<<<< HEAD
                    <button type="submit" onclick="return confirm('Yakin anda ingin log out?')"
                        class="w-full text-gray-900 flex items-center justify-between transition-colors p-1 group ">
                        <p
                            class="font-semibold text-sm px-2 py-2 truncate group-hover:text-red-600 transition-colors duration-300 ">
                            {{ auth()->user()->email }}</p>
=======
                    <button type="submit"
                        class="btn-logout w-full text-gray-900 flex items-center justify-between transition-colors p-1 group ">
                        <p class="font-semibold text-sm px-2 py-2 truncate group-hover:text-red-600 transition-colors duration-300 ">{{ auth()->user()->email }}</p>
>>>>>>> 31472ad2068f5aca7fc0f6b2382023749ae921ed
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            class="text-gray-900 group-hover:text-red-600 transition-colors duration-300 mt-1"
                            stroke-linejoin="round">
                            <path d="m16 17 5-5-5-5" />
                            <path d="M21 12H9" />
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
