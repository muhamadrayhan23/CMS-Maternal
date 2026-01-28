@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <a href="{{ 'produk/kelola_produk' }}">Kelola Produk</a>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">

        <main class="flex-1 min-h-screen md:ml-64 transition-all duration-300">
            <div class="p-10">
                @yield('content')
            </div>

            <section class="bg-linear-to-r from-gray-800 to-gray-600 text-white rounded-2xl p-8">
                <h3 class="text-2xl font-semibold">Statistic Overview</h3>
                <p class="text-gray-300 mb-6">Your store at a glance</p>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-white text-gray-800 rounded-xl p-5">
                        <h4 class="text-sm font-medium">Total Products</h4>
                        <div class="text-4xl font-bold mt-2">{{ $totalProducts }}</div>
                        <span class="inline-block mt-2 text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                            Published : {{ $publishedProducts }}
                        </span>
                    </div>

                    <div class="bg-white text-gray-800 rounded-xl p-5">
                        <h4 class="text-sm font-medium">Total Links</h4>
                        <div class="text-4xl font-bold mt-2">{{ $totalLinks }}</div>
                    </div>

                    <div class="bg-white text-gray-800 rounded-xl p-5">
                        <h4 class="text-sm font-medium">Total Banners</h4>
                        <div class="text-4xl font-bold mt-2">{{ $totalBanners }}</div>
                        <span class="inline-block mt-2 text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                            Published : {{ $publishedBanners }}
                        </span>
                    </div>

                    <div class="bg-white text-gray-800 rounded-xl p-5">
                        <h4 class="text-sm font-medium">Users</h4>
                        <div class="text-4xl font-bold mt-2">{{ $totalUsers }}</div>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-6">
                    <h4 class="font-semibold text-lg mb-4">Latest Products</h4>
                    <ul class="space-y-4">
                        @foreach ($latestProducts as $p)
                            <li class="flex justify-between items-center border p-3 rounded-xl">
                                <div>
                                    <p class="font-medium">{{ $p->product_name }}</p>
                                    <span class="text-sm text-gray-500">
                                        Rp {{ number_format($p->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6">
                    <h4 class="font-semibold text-lg mb-4">Manage Banners</h4>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($latestBanners as $banner)
                            <img src="{{ asset('storage/' . $banner->image) }}"
                                class="rounded-xl object-cover h-40 w-full">
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6">
                    <h4 class="font-semibold text-lg mb-4">See Links</h4>
                    <ul class="space-y-2 text-sm">
                        @foreach ($links as $link)
                            <li class="border-b pb-2">
                                {{ $link->title }} :
                                <span class="text-blue-600">{{ $link->url }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-6">
                    <h4 class="font-semibold text-lg mb-4">Users</h4>
                    <ul class="space-y-3 text-sm">
                        @foreach ($users as $user)
                            <li class="border p-3 rounded-xl">
                                {{ $user->email }}
                                <span class="block text-xs text-gray-500">Admin</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
=======
 @vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.app') 

@section('title', 'Dashboard Admin')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, Admin!</h1>
        <p class="text-gray-500 mt-2">Dashboard kamu sudah siap digunakan.</p>
        
        {{-- <div class="mt-6">
            <a href="{{ route('produk.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Kelola Produk
            </a>
        </div> --}}
    </div>
@endsection
>>>>>>> imadev
