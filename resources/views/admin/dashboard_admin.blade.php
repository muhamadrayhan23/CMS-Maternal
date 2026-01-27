@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="id">

<head>
    {{-- @include('admin.produk.layout.header') --}}
</head>
@include('partials.sidebarAdmin')
{{-- <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <a href="{{ 'produk/kelola_produk' }}">Kelola Produk</a>

        @include('admin.produk.layout.navbar')
        @include('admin.produk.layout.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

    </div> --}}
</body>

</html>
