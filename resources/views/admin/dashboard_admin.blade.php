{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <section class="bg-gradient-to-r from-gray-800 to-gray-600 text-white rounded-2xl p-6 md:p-8 mb-8">
        <h3 class="text-xl md:text-2xl font-semibold mb-2">Statistic Overview</h3>
        <p class="text-gray-300 mb-6 text-sm md:text-base">Your store at a glance</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div
                class="bg-white text-gray-800 rounded-xl p-5 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <h4 class="text-lg font-bold mb-1">Total Products</h4>
                <div class="text-3xl md:text-4xl font-bold">
                    {{ $totalProducts }}
                    <span class="block mt-2 text-xs bg-green-100 text-green-700 px-2 py-1 rounded w-fit">
                        Published : {{ $publishedProducts }}
                    </span>
                </div>
                <p class="text-gray-500 text-xs mt-4">Currently listed in the catalog</p>
            </div>

            <div
                class="bg-white text-gray-800 rounded-xl p-5 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <h4 class="text-lg font-bold mb-1">Total Links</h4>
                <div class="text-3xl md:text-4xl font-bold">{{ $totalLinks }}</div>
                <p class="text-gray-500 text-xs mt-4">Links available on the website</p>
            </div>

            <div
                class="bg-white text-gray-800 rounded-xl p-5 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <h4 class="text-lg font-bold mb-1">Total Banners</h4>
                <div class="text-3xl md:text-4xl font-bold">
                    {{ $totalBanners }}
                    <span class="block mt-2 text-xs bg-green-100 text-green-700 px-2 py-1 rounded w-fit">
                        Published : {{ $publishedBanners }}
                    </span>
                </div>
                <p class="text-gray-500 text-xs mt-4">Banners stored in the system</p>
            </div>

            <div
                class="bg-white text-gray-800 rounded-xl p-5 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <h4 class="text-lg font-bold mb-1">Users</h4>
                <div class="text-3xl md:text-4xl font-bold">
                    {{ $totalUsers }}
                </div>
                <p class="text-gray-500 text-xs mt-4">Users registered in the system</p>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl p-5 shadow-md">
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <a href="{{ route('produk.index') }}"
                    class="shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg class="w-6 h-6 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path fill="currentColor"
                            d="M8 1V0v1Zm4 0V0v1Zm2 4v1h1V5h-1ZM6 5H5v1h1V5Zm2-3h4V0H8v2Zm4 0a1 1 0 0 1 .707.293L14.121.879A3 3 0 0 0 12 0v2Zm.707.293A1 1 0 0 1 13 3h2a3 3 0 0 0-.879-2.121l-1.414 1.414ZM13 3v2h2V3h-2Zm1 1H6v2h8V4ZM7 5V3H5v2h2Zm0-2a1 1 0 0 1 .293-.707L5.879.879A3 3 0 0 0 5 3h2Zm.293-.707A1 1 0 0 1 8 2V0a3 3 0 0 0-2.121.879l1.414 1.414ZM2 6h16V4H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v12h2V6h-2Zm0 12v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V6H0v12h2ZM2 6V4a2 2 0 0 0-2 2h2Zm16.293 3.293C16.557 11.029 13.366 12 10 12c-3.366 0-6.557-.97-8.293-2.707L.293 10.707C2.557 12.971 6.366 14 10 14c3.634 0 7.444-1.03 9.707-3.293l-1.414-1.414ZM10 9v2a2 2 0 0 0 2-2h-2Zm0 0H8a2 2 0 0 0 2 2V9Zm0 0V7a2 2 0 0 0-2 2h2Zm0 0h2a2 2 0 0 0-2-2v2Z" />
                    </svg>
                </a>

                <p class="font-semibold text-lg md:text-xl">Latest Products</p>

                <a href="{{ route('produk.create') }}"
                    class="ml-auto shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.41699 13H20.5837M13.0003 5.41666V20.5833" stroke="#282623" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <ul class="space-y-3">
                @foreach ($latestProducts as $p)
                    <li
                        class="flex items-center gap-3 border p-3 rounded-xl shadow-smtransition duration-200 hover:bg-gray-200 hover:shadow-md">
                        <div class="flex-1 min-w-0">
                            <p class="font-bold truncate">{{ $p->product_name }}</p>
                            <span class="text-sm text-gray-500">
                                Rp {{ number_format($p->price, 0, ',', '.') }}
                            </span>
                        </div>

                        @if (optional($p->details->first())->image_product)
                            <img src="{{ asset('storage/' . $p->details->first()->image_product) }}"
                                class="w-10 h-10 rounded-lg object-cover shrink-0">
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-md">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('Bhome') }}"
                    class="shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="21" height="24" viewBox="0 0 21 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.4988 13.7L15.6615 11.6C15.3344 11.2336 14.8946 11.0283 14.4366 11.0283C13.9785 11.0283 13.5388 11.2336 13.2117 11.6L8.48706 17M3.5 19.5V4.5C3.5 3.83696 3.73045 3.20107 4.14065 2.73223C4.55086 2.26339 5.10721 2 5.68732 2H16.6239C16.856 2 17.0785 2.10536 17.2426 2.29289C17.4067 2.48043 17.4989 2.73478 17.4989 3V21C17.4989 21.2652 17.4067 21.5196 17.2426 21.7071C17.0785 21.8946 16.856 22 16.6239 22H5.68732C5.10721 22 4.55086 21.7366 4.14065 21.2678C3.73045 20.7989 3.5 20.163 3.5 19.5ZM3.5 19.5C3.5 18.837 3.73045 18.2011 4.14065 17.7322C4.55086 17.2634 5.10721 17 5.68732 17H17.4989M10.4994 8C10.4994 9.10457 9.716 10 8.74958 10C7.78316 10 6.99972 9.10457 6.99972 8C6.99972 6.89543 7.78316 6 8.74958 6C9.716 6 10.4994 6.89543 10.4994 8Z"
                            stroke="#282623" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <p class="font-semibold text-2xl"> Manage Banners </p>
                <a href="{{ route('addB') }}"
                    class="ml-auto shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.41699 13H20.5837M13.0003 5.41666V20.5833" stroke="#282623" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($latestBanners as $b)
                    <img src="{{ asset($b->banner_image) }}"
                        class="w-full h-full object-cover rounded-2xl transition duration-300 hover:scale-105 hover:shadow-xl">
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('homeLink') }}"
                    class="shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="21" height="24" viewBox="0 0 21 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_211_605)">
                            <path
                                d="M7.87451 17H6.12465C4.96442 17 3.85171 16.4732 3.0313 15.5355C2.2109 14.5979 1.75 13.3261 1.75 12C1.75 10.6739 2.2109 9.40215 3.0313 8.46447C3.85171 7.52678 4.96442 7 6.12465 7H7.87451M13.1241 7H14.8739C16.0342 7 17.1469 7.52678 17.9673 8.46447C18.7877 9.40215 19.2486 10.6739 19.2486 12C19.2486 13.3261 18.7877 14.5979 17.9673 15.5355C17.1469 16.4732 16.0342 17 14.8739 17H13.1241M6.99958 12H13.999"
                                stroke="#282623" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_211_605">
                                <rect width="20.9983" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <p class="font-semibold text-2xl"> See Links </p>
                <a href="{{ route('createLink') }}"
                    class="ml-auto shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.41699 13H20.5837M13.0003 5.41666V20.5833" stroke="#282623" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="space-y-2 text-sm">
                @foreach ($links as $link)
                    <li class="border-b pb-2"> {{ $link->title }} : <span
                            class="text-blue-600">{{ $link->url }}</span> </li>
                @endforeach
            </ul>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('homeUser') }}"
                    class="shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H6C4.93913 15 3.92172 15.4214 3.17157 16.1716C2.42143 16.9217 2 17.9391 2 19V21M22 20.9999V18.9999C21.9993 18.1136 21.7044 17.2527 21.1614 16.5522C20.6184 15.8517 19.8581 15.3515 19 15.1299M16 3.12988C16.8604 3.35018 17.623 3.85058 18.1676 4.55219C18.7122 5.2538 19.0078 6.11671 19.0078 7.00488C19.0078 7.89305 18.7122 8.75596 18.1676 9.45757C17.623 10.1592 16.8604 10.6596 16 10.8799M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z"
                            stroke="#282623" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <p class="font-semibold text-2xl"> Users </p>
                <a href="{{ route('createUser') }}"
                    class="ml-auto shrink-0 transition-transform duration-200 hover:scale-110 hover:rotate-90">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.41699 13H20.5837M13.0003 5.41666V20.5833" stroke="#282623" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="space-y-3 text-sm">
                @foreach ($users as $user)
                    <li
                        class="border p-3 rounded-xl shadow-sm transition duration-200 hover:bg-gray-50 hover:border-gray-400">
                        {{ $user->email }} <span class="block text-xs text-gray-500">Admin</span> </li>
                @endforeach
            </ul>
        </div>
    </section>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            if (!window.Swal) return;

<<<<<<< HEAD
            const succes = "{{ session('success_login') }}";
            const error = "{{ session('error_login') }}";
=======
        const succes = "{{ session('success_login') }}";
        const error = "{{ session('error_login') }}";
        
        const validationError = "{{ $errors->first() }}"; 
        
        let config = null;
        
        if (succes) {
            config = {
                title: 'Login Successfully!',
                text: succes !== 'true' ? succes : '',
                showConfirmButton: false,
                timer: 3000,       
            };
        } else if (error || validationError) { 
            config = { 
                title: 'Login Failed!',
                text: (error ===  'true' || !error ) ? validationError : error,
                showConfirmButton: true,
                confirmButtonColor: '#d33',
            };
        } 
        
        if (config) {
            window.Swal.fire({
                ...config,
                width: '350px',
                padding: '3rem 1rem',
                borderRadius: '20px',
            });
        }
    }); 
</script>
>>>>>>> imadev

            const validationError = "{{ $errors->first() }}";

            let config = null;

            if (succes) {
                config = {
                    icon: 'success',
                    title: 'Login Successfully!',
                    text: succes !== 'true' ? succes : '',
                    showConfirmButton: false,
                    timer: 3000,
                };
            } else if (error || validationError) {
                config = {
                    icon: 'error',
                    title: 'Login Failed!',
                    text: (error === 'true' || !error) ? validationError : error,
                    showConfirmButton: true,
                    confirmButtonColor: '#d33',
                };
            }

            if (config) {
                window.Swal.fire({
                    ...config,
                    width: '350px',
                    padding: '3rem 1rem',
                    borderRadius: '20px',
                });
            }
        });
    </script>
@endsection
