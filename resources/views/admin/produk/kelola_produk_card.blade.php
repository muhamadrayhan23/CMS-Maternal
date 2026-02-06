@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')
@section('title', 'Product - Grid View')

@section('content')
    <div class="bg-gray-100 rounded-xl p-5 ">
        <div class="space-y-4 font-sans">
            <div class="flex items-center justify-between">
                <h2 class="text-lg md:text-sm font-bold tracking-wider text-[#0F172A] uppercase">
                    MANAGE
                    PRODUCTS
                </h2>
                <div class="flex items-center gap-2">
                    <a href="{{ route('produk.restore') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.restore') ? 'bg-[#333333] text-white' : 'bg-white text-gray-800' }}">

                        <svg class="w-5 h-5" width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 4.25002H14.875M13.4583 4.25002V14.1667C13.4583 14.875 12.75 15.5834 12.0417 15.5834H4.95833C4.25 15.5834 3.54167 14.875 3.54167 14.1667V4.25002M5.66667 4.25002V2.83335C5.66667 2.12502 6.375 1.41669 7.08333 1.41669H9.91667C10.625 1.41669 11.3333 2.12502 11.3333 2.83335V4.25002"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="hidden md:inline font-sans">Trash</span>
                    </a>
                    <a href="{{ route('produk.index') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.index') ? 'bg-[#333333] text-white' : 'bg-white text-gray-800' }}">
                        <svg class="w-5 h-5" width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.87">
                                <path
                                    d="M9.5 2.375V16.625M2.375 7.125H16.625M2.375 11.875H16.625M3.95833 2.375H15.0417C15.9161 2.375 16.625 3.08388 16.625 3.95833V15.0417C16.625 15.9161 15.9161 16.625 15.0417 16.625H3.95833C3.08388 16.625 2.375 15.9161 2.375 15.0417V3.95833C2.375 3.08388 3.08388 2.375 3.95833 2.375Z"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                        <span class="hidden md:inline font-sans">List View</span>
                    </a>
                    <a href="{{ route('produk.kelola_card') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.kelola_card') ? 'bg-[#333333] text-white' : 'bg-white text-gray-800' }}">
                        <svg class="w-5 h-5" width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.03353 2.28335C7.47075 2.28335 7.8252 1.9289 7.8252 1.49168C7.8252 1.05445 7.47075 0.700012 7.03353 0.700012C6.5963 0.700012 6.24186 1.05445 6.24186 1.49168C6.24186 1.9289 6.5963 2.28335 7.03353 2.28335Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.5752 2.28335C13.0124 2.28335 13.3669 1.9289 13.3669 1.49168C13.3669 1.05445 13.0124 0.700012 12.5752 0.700012C12.138 0.700012 11.7835 1.05445 11.7835 1.49168C11.7835 1.9289 12.138 2.28335 12.5752 2.28335Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M1.49186 2.28335C1.92909 2.28335 2.28353 1.9289 2.28353 1.49168C2.28353 1.05445 1.92909 0.700012 1.49186 0.700012C1.05464 0.700012 0.700195 1.05445 0.700195 1.49168C0.700195 1.9289 1.05464 2.28335 1.49186 2.28335Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M7.03353 7.82501C7.47075 7.82501 7.8252 7.47057 7.8252 7.03335C7.8252 6.59612 7.47075 6.24168 7.03353 6.24168C6.5963 6.24168 6.24186 6.59612 6.24186 7.03335C6.24186 7.47057 6.5963 7.82501 7.03353 7.82501Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.5752 7.82501C13.0124 7.82501 13.3669 7.47057 13.3669 7.03335C13.3669 6.59612 13.0124 6.24168 12.5752 6.24168C12.138 6.24168 11.7835 6.59612 11.7835 7.03335C11.7835 7.47057 12.138 7.82501 12.5752 7.82501Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M1.49186 7.82501C1.92909 7.82501 2.28353 7.47057 2.28353 7.03335C2.28353 6.59612 1.92909 6.24168 1.49186 6.24168C1.05464 6.24168 0.700195 6.59612 0.700195 7.03335C0.700195 7.47057 1.05464 7.82501 1.49186 7.82501Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M7.03353 13.3667C7.47075 13.3667 7.8252 13.0122 7.8252 12.575C7.8252 12.1378 7.47075 11.7833 7.03353 11.7833C6.5963 11.7833 6.24186 12.1378 6.24186 12.575C6.24186 13.0122 6.5963 13.3667 7.03353 13.3667Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.5752 13.3667C13.0124 13.3667 13.3669 13.0122 13.3669 12.575C13.3669 12.1378 13.0124 11.7833 12.5752 11.7833C12.138 11.7833 11.7835 12.1378 11.7835 12.575C11.7835 13.0122 12.138 13.3667 12.5752 13.3667Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M1.49186 13.3667C1.92909 13.3667 2.28353 13.0122 2.28353 12.575C2.28353 12.1378 1.92909 11.7833 1.49186 11.7833C1.05464 11.7833 0.700195 12.1378 0.700195 12.575C0.700195 13.0122 1.05464 13.3667 1.49186 13.3667Z"
                                stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="hidden md:inline font-sans">Grid View</span>
                    </a>
                    <a href="{{ route('produk.create') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.create') ? 'bg-[#333333] text-white' : 'bg-white text-gray-800' }}">
                        <svg class="w-5 h-5" width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.95801 9.49998H15.0413M9.49967 3.95831V15.0416" stroke="#373737" stroke-width="1.7"
                                stroke="currentColor" stroke-linejoin="round" />
                        </svg>
                        <span class="hidden md:inline font-sans">Add New Product</span>
                    </a>
                </div>
            </div>

            <form method="GET" action="{{ route('produk.kelola_card') }}" id="filterForm" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                    <div class="md:col-span-9 relative bg-gray-100">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products"
                            oninput="submitFilter()"
                            class="w-full px-4 py-2 pr-10 rounded bg-white text-gray-800 border border-gray-300 focus:ring-2 focus:ring-gray-400 focus:outline-none font-sans" />
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                    </div>

                    <div class="md:col-span-3 flex gap-2">
                        <div class="relative flex-1">
                            <select name="status" onchange="filterForm.submit()"
                                class="w-full appearance-none px-4 py-2 pr-10 rounded bg-white border border-gray-300 focus:ring-2 focus:ring-gray-400 focus:outline-none font-sans">
                                <option value="">Status</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                    Published
                                </option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                    Unpublished
                                </option>
                            </select>

                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
                                    <path
                                        d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative flex-1">
                            <select name="stok" onchange="this.form.submit()"
                                class="w-full appearance-none px-4 py-2 pr-10 rounded bg-white border border-gray-300 focus:ring-2 focus:ring-gray-400 focus:outline-none font-sans">
                                <option value="">Stok</option>
                                <option value="1" {{ request('stok') === '1' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="0" {{ request('stok') === '0' ? 'selected' : '' }}>
                                    Unavailable
                                </option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
                                    <path
                                        d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const successRestore = "{{ session('success') }}"
                    if (successRestore) {
                        Swal.fire({
                            title: 'Success!',
                            text: successRestore,
                            showConfirmButton: true,

                            customClass: {
                                confirmButton: '!bg-green-800'
                            }
                        });
                    }
                });
            </script>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 font-sans">
            @forelse ($produk as $p)
                <div
                    class="bg-white rounded-xl shadow transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:bg-gray-50 flex flex-col overflow-visible relative group">

                    <span
                        class="absolute top-3 left-3 px-3 py-1 text-xs rounded-full {{ $p->is_active ? 'text-green-700 bg-green-100/90' : 'text-red-700 bg-red-100/90' }}">
                        {{ $p->is_active ? 'Published' : 'Unpublished' }}
                    </span>

                    @if (optional($p->details->first())->image_product)
                        <img src="{{ asset('storage/' . $p->details->first()->image_product) }}"
                            class="w-full h-40 md:h-48 object-cover rounded-2xl transition {{ !$p->is_available ? 'blur-sm scale-100' : 'group-hover:scale-105' }}">
                    @else
                        <div
                            class="h-48 flex items-center justify-center bg-gray-100 text-gray-400 {{ !$p->is_available ? 'blur-sm' : '' }}">
                            No Image
                        </div>
                    @endif

                    @if (!$p->is_available)
                        <div class="absolute inset-0 flex items-center justify-center bg-black/30 rounded-2xl">
                            <span
                                class="px-4 py-2 text-white text-sm font-bold tracking-widest bg-red-600/90 rounded-full">
                                SOLD OUT
                            </span>
                        </div>
                    @endif

                    <div class="p-4 flex flex-col flex-1">
                        <div class="flex items-start justify-between gap-3 mb-2">

                            <h4 class="font-bold text-lg md:text-xl line-clamp-1">
                                {{ $p->product_name }}
                            </h4>

                            <div
                                class="bg-white rounded-xl shadow transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:bg-gray-50 flex flex-col relative group">
                                <button onclick="toggleMenu(this)"
                                    class="w-8 h-8 bg-white rounded flex items-center justify-center hover:bg-gray-100">
                                    &#8942;
                                </button>

                                <div
                                    class="action-menu hidden absolute right-0 mt-2 w-44 bg-white border overflow-visible rounded-lg shadow-lg z-50 text-left">

                                    <form action="{{ route('produk.toggle', $p->id_product) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            class="w-full px-4 py-3 text-sm hover:bg-gray-100 transition-all flex gap-2.5">
                                            @if ($p->is_active)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-circle-minus-icon lucide-circle-minus">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12h8" />
                                                </svg>
                                                <span>Unpublish</span>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-circle-plus-icon lucide-circle-plus">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12h8" />
                                                    <path d="M12 8v8" />
                                                </svg>
                                                <span>Publish</span>
                                            @endif
                                        </button>
                                    </form>

                                    <form action="{{ route('produk.toggleLagi', $p->id_product) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            class="w-full px-4 py-3 text-sm hover:bg-gray-100 transition-all flex gap-2.5 text-left">
                                            @if ($p->is_available)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-x-icon lucide-x">
                                                    <path d="M18 6 6 18" />
                                                    <path d="m6 6 12 12" />
                                                </svg>
                                                <span>Unavailable</span>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-check-icon lucide-check">
                                                    <path d="M20 6 9 17l-5-5" />
                                                </svg>
                                                <span>Available</span>
                                            @endif
                                        </button>
                                    </form>

                                    <button onclick="toggleSubMenu(this)"
                                        class="w-full flex gap-3 px-4 py-3 text-sm hover:bg-gray-200 transition-all text-left border-t border-gray-50">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.99967 11.3334H4.66634C3.78229 11.3334 2.93444 10.9822 2.30932 10.3571C1.6842 9.73198 1.33301 8.88414 1.33301 8.00008C1.33301 7.11603 1.6842 6.26818 2.30932 5.64306C2.93444 5.01794 3.78229 4.66675 4.66634 4.66675H5.99967M9.99967 4.66675H11.333C12.2171 4.66675 13.0649 5.01794 13.69 5.64306C14.3152 6.26818 14.6663 7.11603 14.6663 8.00008C14.6663 8.88414 14.3152 9.73198 13.69 10.3571C13.0649 10.9822 12.2171 11.3334 11.333 11.3334H9.99967M5.33301 8.00008H10.6663"
                                                stroke="#0E0F11" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        View Links
                                    </button>

                                    <div class="sub-menu hidden border-t">
                                        @forelse ($p->links as $link)
                                            <a href="{{ $link->link_address }}" target="_blank"
                                                class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                                                    <path d="m21 3-9 9" />
                                                    <path d="M15 3h6v6" />
                                                </svg>

                                                <span class="break-all text-sm">
                                                    {{ $link->link_name }}
                                                </span>
                                            </a>
                                        @empty
                                            <li class="px-3 py-2 text-gray-400">Tidak ada link</li>
                                        @endforelse
                                    </div>

                                    <a href="{{ route('produk.edit', $p->id_product) }}"
                                        class="flex gap-3 px-4 py-3 text-sm hover:bg-gray-200 transition-all border-t border-gray-50 text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-pen-line-icon lucide-pen-line">
                                            <path d="M13 21h8" />
                                            <path
                                                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                        </svg>
                                        <span>Edit </span>
                                    </a>

                                    <form action="{{ route('produk.destroy', $p->id_product) }}"
                                        id="hapus-{{ $p->id_product }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" name="page" value="{{ request('page') }}">

                                        <button type="button"
                                            class="btn-hapus w-full flex gap-3 px-4 py-3 text-sm hover:bg-gray-200 transition-all text-left border-t border-gray-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trash2-icon lucide-trash-2">
                                                <path d="M10 11v6" />
                                                <path d="M14 11v6" />
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                                <path d="M3 6h18" />
                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <p class="text-sm text-gray-600 line-clamp-2 mb-1" title="{{ $p->desc }}">
                                {{ Str::limit($p->desc, 60) }}
                            </p>

                            <div class="mt-auto">
                                <div class="font-semibold text-lg">
                                    Rp {{ number_format($p->price, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="meta text-gray-800">

                                @if ($p->updated_by && $p->updated_at)
                                    <hr class="my-2 border-gray-200">

                                    <div class="grid grid-cols-1 md:grid-cols-2 text-sm gap-y-1">
                                        <h6>Updated by <strong>{{ $p->updater?->name ?? '-' }}</strong></h6>
                                        <h6>Updated at <strong>{{ $p->updated_at }}</strong></h6>
                                    </div>
                                @else
                                    <hr class="my-2 border-gray-200">

                                    <div class="grid grid-cols-1 md:grid-cols-2 text-sm gap-y-1">
                                        <h6>Created by <strong>{{ $p->creator?->name ?? '-' }}</strong></h6>
                                        <h6>Created at <strong>{{ $p->created_at }}</strong></h6>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex justify-center">
                    <div class="text-center py-10 text-gray-500">
                        @if (request('search'))
                            <span class="font-bold">"{{ request('search') }}"</span> not found
                        @elseif(request()->filled('status'))
                            There is no Product with status
                            <span class="font-bold">
                                {{ request('status') == 1 ? 'Published' : 'Unpublished' }}
                            </span>
                        @else
                            There are no Product available yet
                        @endif
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div class="mt-8 flex justify-end">
        {{ $produk->links() }}
    </div>

    <script>
        let timeout = null;

        function submitFilter() {
            clearTimeout(timeout);
            timeout = setTimeout(() => filterForm.submit(), 500);
        }

        function toggleMenu(btn) {
            const menu = btn.parentElement.querySelector('.action-menu')
            document.querySelectorAll('.action-menu').forEach(m => {
                if (m !== menu) m.classList.add('hidden')
            })
            menu.classList.toggle('hidden')
        }

        function toggleSubMenu(btn) {
            btn.parentElement.querySelector('.sub-menu')
                .classList.toggle('hidden')
        }

        document.addEventListener('click', e => {
            if (!e.target.closest('.relative')) {
                document.querySelectorAll('.action-menu')
                    .forEach(m => m.classList.add('hidden'))
            }
        })

        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Delete Product?',
                    text: 'This product will go into the trash. Are you sure?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                    showCloseButton: true,
                    buttonsStyling: false,

                    reverseButtons: false,

                    customClass: {
                        popup: 'rounded-[8rem] !p-10 shadow-2xl border-none min-w-[90%] md:min-w-[550px] !items-start',
                        title: '!text-left !text-3xl font-bold text-gray-900 w-full !justify-start !flex !p-0 !m-0 !mb-5',
                        htmlContainer: '!text-left !text-gray-500 !text-lg w-full !m-0 !mb-10 !justify-start !flex !p-0',

                        actions: 'flex w-full !justify-between gap-4 px-4 w-full !m-0 !p-0',

                        confirmButton: 'flex-1 !bg-red-600 !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-red-700 transition-all !m-0 !outline-none !shadow-none',
                        cancelButton: 'flex-1 bg-[#111111] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-black transition-all !m-0 !outline-gray-600 !shadow-none',
                        closeButton: 'focus:!outline-none focus:!ring-0 !border-none !text-gray-400'
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endsection
