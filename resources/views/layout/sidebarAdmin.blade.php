<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f4f4]">

<div class="app-container">
    {{-- Sidebar --}}
    {{-- @include('partials.sidebar') --}}

    {{-- //sidebar  --}}
    <div class="flex min-h-screen w-65 bg-[#ffff]">
   <ul class="list-none p-10 m-4 gap-30 pt-20"> 
    <li class="mb-2">
        <a href="{{ route ('dashboardadmin')}}" class="flex items-center gap-3 p-2 pb-3 hover:bg-gray-100 rounded-lg" >
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
            <path d="M7.125 2.375H3.167a.792.792 0 0 0-.792.792v5.541c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792V3.167a.792.792 0 0 0-.792-.792Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.833 2.375h-3.958a.792.792 0 0 0-.792.792v2.375c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792V3.167a.792.792 0 0 0-.792-.792Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.833 9.5h-3.958a.792.792 0 0 0-.792.792v5.541c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792v-5.541a.792.792 0 0 0-.792-.792Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7.125 12.667H3.167a.792.792 0 0 0-.792.791v2.375c0 .437.355.792.792.792h3.958a.792.792 0 0 0 .792-.792v-2.375a.792.792 0 0 0-.792-.791Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
    <span>Dashboard</span>
        </a>
    </li>

    <li class="mb-2">
        <a href="{{ route ('produk.kelola')}}" class="flex items-center gap-3 p-2 pb-3 hover:bg-gray-100 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-briefcase-business-icon lucide-briefcase-business"><path d="M12 12h.01"/><path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
            <path d="M22 13a18.15 18.15 0 0 1-20 0"/><rect width="20" height="14" x="2" y="6" rx="2"/>
            </svg>
             <span>Products</span> 
        </a>
    </li>

    <li class="mb-2">
        <a href="{{ route ('Bhome')}}" class="flex items-center gap-3 p-2 pb-3 hover:bg-gray-100 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
            stroke-linejoin="round" class="lucide lucide-book-image-icon lucide-book-image"><path d="m20 13.7-2.1-2.1a2 2 0 0 0-2.8 0L9.7 17"/>
            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/><circle cx="10" cy="8" r="2"/>
            </svg>
            <span>Banners</span>
        </a>
    </li> 

    <li class="mb-2">
        <a href="{{ route ('Lhome')}}" class="flex items-center gap-3 p-2 pb-3 hover:bg-gray-100 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
            stroke-linejoin="round" class="lucide lucide-link2-icon lucide-link-2">
            <path d="M9 17H7A5 5 0 0 1 7 7h2"/><path d="M15 7h2a5 5 0 1 1 0 10h-2"/><line x1="8" x2="16" y1="12" y2="12"/>
            </svg>
            <span>Links</span> 
        </a>
    </li>

    <li class="mb-2">
        <a href="#" class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
        stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/>
        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
       <span>Users</span>
    </a>
    </li>
   </ul>
    </div>

    <main class="main-content">
        @yield('content')
    </main>
</div>

</body>
</html>
