<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- MAIN --}}
    <main class="content">

        {{-- STATISTIC --}}
        <section class="statistic">
            <h3>Statistic Overview</h3>
            <p>Your store at a glance</p>

            <div class="stats">
                <div class="card">
                    <h4>Total Products</h4>
                    <span class="number">{{ $totalProducts }}</span>
                    <small class="badge">Published : {{ $publishedProducts }}</small>
                </div>

                <div class="card">
                    <h4>Total Links</h4>
                    <span class="number">{{ $totalLinks }}</span>
                </div>

                <div class="card">
                    <h4>Total Banners</h4>
                    <span class="number">{{ $totalBanners }}</span>
                    <small class="badge">Published : {{ $publishedBanners }}</small>
                </div>

                <div class="card">
                    <h4>Users</h4>
                    <span class="number">{{ $totalUsers }}</span>
                    {{-- <small class="badge">Active : {{ $activeUsers }}</small> --}}
                </div>
            </div>
        </section>

        {{-- GRID CONTENT --}}
        <section class="grid">

            {{-- Latest Products --}}
            <div class="box">
                <h4>Latest Products</h4>
                <ul>
                    @foreach ($latestProducts as $p)
                        <li>
                            {{ $p->product_name }}
                            <span>Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Banners --}}
            <div class="box">
                <h4>Manage Banners</h4>
                <div class="banners">
                    @foreach ($latestBanners as $banner)
                        <div class="banner">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Links --}}
            <div class="box">
                <h4>See Links</h4>
                @foreach ($links as $link)
                    <p>{{ $link->title }} : {{ $link->url }}</p>
                @endforeach
            </div>

            {{-- Users --}}
            <div class="box">
                <h4>Users</h4>
                @foreach ($users as $user)
                    <p>{{ $user->email }}</p>
                @endforeach
            </div>

        </section>

    </main>
</body>

</html>
