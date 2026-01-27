<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-[#f4f4f4]">
    <div class="flex">
        @include('partials.sidebar-admin')

        <main class="flex-1 min-h-screen md:ml-64 p-10">
            @yield('content')
        </main>
    </div>
</body>

</html>