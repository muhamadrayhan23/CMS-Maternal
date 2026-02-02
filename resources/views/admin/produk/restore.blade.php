@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')
@section('title', 'Product - Trash')

@section('content')
    <div class="space-y-4">
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="max-w-7xl mx-auto w-full">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
                        <h3 class="text-xl font-bold font-[Space_Grotesk]">TRASH</h3>

                        <div class="flex flex-wrap gap-2 font-[Space_Grotesk]">
                            <a href="{{ route('produk.restore') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded {{ request()->routeIs('produk.restore') ? 'bg-gray-700 text-white' : 'bg-white text-gray-800' }}">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.125 4.25002H14.875M13.4583 4.25002V14.1667C13.4583 14.875 12.75 15.5834 12.0417 15.5834H4.95833C4.25 15.5834 3.54167 14.875 3.54167 14.1667V4.25002M5.66667 4.25002V2.83335C5.66667 2.12502 6.375 1.41669 7.08333 1.41669H9.91667C10.625 1.41669 11.3333 2.12502 11.3333 2.83335V4.25002"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>Trash</span>
                            </a>

                            <a href="{{ route('produk.index') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded {{ request()->routeIs('produk.index') ? 'bg-gray-700 text-white' : 'bg-white text-gray-800' }}">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.87">
                                        <path
                                            d="M9.5 2.375V16.625M2.375 7.125H16.625M2.375 11.875H16.625M3.95833 2.375H15.0417C15.9161 2.375 16.625 3.08388 16.625 3.95833V15.0417C16.625 15.9161 15.9161 16.625 15.0417 16.625H3.95833C3.08388 16.625 2.375 15.9161 2.375 15.0417V3.95833C2.375 3.08388 3.08388 2.375 3.95833 2.375Z"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>
                                <span>List View</span>
                            </a>

                            <a href="{{ route('produk.kelola_card') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded {{ request()->routeIs('produk.kelola_card') ? 'bg-gray-700 text-white' : 'bg-white text-gray-800' }}">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">...</svg>
                                <span>Grid View</span>
                            </a>

                            <a href="{{ route('produk.create') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded {{ request()->routeIs('produk.create') ? 'bg-gray-700 text-white' : 'bg-white text-gray-800' }}">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.95801 9.49998H15.0413M9.49967 3.95831V15.0416" stroke="currentColor"
                                        stroke-width="1.7" stroke-linejoin="round" />
                                </svg>
                                <span>Add New Product</span>
                            </a>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('produk.restore') }}" class="mb-6" id="filterForm">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 font-[Space_Grotesk]">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search Products"
                                class="md:col-span-9 px-4 py-2 rounded bg-white border border-gray-300 focus:ring-2 focus:ring-gray-400"
                                oninput="submitFilter()">

                            <div class="md:col-span-3 flex gap-2">
                                <select name="status"
                                    class="flex-1 px-4 py-2 rounded bg-white border border-gray-300 focus:ring-2 focus:ring-gray-400"
                                    onchange="filterForm.submit()">
                                    <option value="">Show All</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Unpublished
                                    </option>
                                </select>

                                <a href="{{ route('produk.restore') }}"
                                    class="flex items-center justify-center px-4 py-2 rounded bg-white border border-gray-300 hover:bg-gray-100">
                                    All Product
                                </a>
                            </div>
                        </div>
                    </form>

                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-white rounded-xl shadow overflow-visible">
                        <table class="w-full text-sm table-fixed">
                            <thead class="text-gray-600 font-bold font-[Space_Grotesk]">
                                <tr>
                                    <th class="p-4 w-40">Deleted At</th>
                                    <th class="p-4 w-40">Deleted By</th>
                                    <th class="p-4 w-40">Product</th>
                                    <th class="p-4 w-56">Description</th>
                                    <th class="p-4 w-32">Price</th>
                                    <th class="p-4 w-28 text-center">Image</th>
                                    <th class="p-4 w-32 text-center">Status</th>
                                    <th class="p-4 w-20 text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-700 font-[Space_Grotesk]">
                                @foreach ($produk as $p)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-4">{{ $p->deleted_at }}</td>
                                        <td class="p-4">{{ $p->deleter?->name ?? '-' }}</td>
                                        <td class="p-4 font-medium">{{ $p->product_name }}</td>
                                        <td class="p-4">{{ Str::limit($p->desc, 80) }}</td>
                                        <td class="p-4">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                                        <td class="p-4 text-center">
                                            @if (optional($p->details->first())->image_product)
                                                <img src="{{ asset('storage/' . $p->details->first()->image_product) }}"
                                                    class="w-10 h-10 object-cover rounded-lg mx-auto">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="p-4 text-center">{{ $p->is_active ? 'Published' : 'Unpublished' }}</td>
                                        <td class="p-4 text-center relative">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 flex justify-end">
                        {{ $produk->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            let timeout = null;

            function submitFilter() {
                clearTimeout(timeout);
                timeout = setTimeout(() => filterForm.submit(), 500);
            }

            function toggleMenu(btn) {
                const menu = btn.parentElement.querySelector('.action-menu');
                document.querySelectorAll('.action-menu').forEach(m => {
                    if (m !== menu) m.classList.add('hidden');
                });
                menu.classList.toggle('hidden');
            }

            document.addEventListener('click', e => {
                if (!e.target.closest('.relative')) {
                    document.querySelectorAll('.action-menu')
                        .forEach(m => m.classList.add('hidden'));
                }
            });
        </script>
    @endsection
