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

        <div id="overlay" class="fixed inset-0 bg-black/50 z-[65] hidden md:hidden"></div>
        {{-- CONTENT --}}
        <main class="md:ml-64 min-h-screen p-4">
            <div class="p-10">
                @yield('content')
            </div>
        </main>
    </div>  
<script>
    const 
</script>
</body>
</html>