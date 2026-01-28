<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f4f4]">

<div class="flex">
    {{-- SIDEBAR --}}
    @include('partials.sidebarAdmin')

    {{-- CONTENT --}}
    <main class="flex-1 min-h-screen md:ml-64 transition-all duration-300">
        <div class="p-10">
            @yield('content')
        </div>
    </main>
</div>

</body>
</html>