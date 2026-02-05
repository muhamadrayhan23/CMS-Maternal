@extends('layout.admin')
@section('title', 'Product - Trash')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-5 ">
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
                    TRASH
                </h2>
                <div class="flex items-center gap-2">
                    <a href="{{ route('produk.restore') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.restore') ? 'bg-gray-700 text-white' : 'bg-gray-100 text-gray-800' }}">

                        <svg class="w-5 h-5" width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 4.25002H14.875M13.4583 4.25002V14.1667C13.4583 14.875 12.75 15.5834 12.0417 15.5834H4.95833C4.25 15.5834 3.54167 14.875 3.54167 14.1667V4.25002M5.66667 4.25002V2.83335C5.66667 2.12502 6.375 1.41669 7.08333 1.41669H9.91667C10.625 1.41669 11.3333 2.12502 11.3333 2.83335V4.25002"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="hidden md:inline font-sans">Trash</span>
                    </a>
                    <a href="{{ route('produk.index') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.index') ? 'bg-gray-700 text-white' : 'bg-gray-100 text-gray-800' }}">
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
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.kelola_card') ? 'bg-gray-700 text-white' : 'bg-gray-100 text-gray-800' }}">
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
                        class="inline-flex items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('produk.create') ? 'bg-gray-300 text-white' : 'bg-gray-100 text-gray-800' }}">
                        <svg class="w-5 h-5" width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.95801 9.49998H15.0413M9.49967 3.95831V15.0416" stroke="#373737" stroke-width="1.7"
                                stroke="currentColor" stroke-linejoin="round" />
                        </svg>
                        <span class="hidden md:inline font-sans">Add New Product</span>
                    </a>
                </div>
            </div>

            <form method="GET" action="{{ route('produk.restore') }}" id="filterForm" class="mb-6">
                <div class="relative flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products"
                        oninput="submitFilter()"
                        class="w-full px-4 py-2 pr-10 rounded bg-gray-100 text-gray-800 border border-gray-300 focus:ring-2 focus:ring-gray-400 focus:outline-none font-sans" />
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                </div>
            </form>

            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: @json(session('success')),
                            timer: 2000,
                            showConfirmButton: true
                        })
                    })
                </script>
            @endif

            <div class="bg-white rounded-xl border border-gray-200 overflow-visible p-3 mt-5">
                <table class="w-full text-sm table-fixed p-3">
                    <thead class="text-gray-600 font-bold font-sans text-center bg-gray-100">
                        <tr>
                            <th class="p-4 w-40">Deleted At</th>
                            <th class="p-4 w-40">Deleted By</th>
                            <th class="p-4 w-40">Product</th>
                            <th class="p-4 w-56">Description</th>
                            <th class="p-4 w-32">Price</th>
                            <th class="p-4 w-28">Image</th>
                            <th class="p-4 w-15 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700 font-sans text-center">
                        @forelse ($produk as $p)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4">{{ $p->deleted_at }}</td>
                                <td class="p-4">{{ $p->deleter?->name ?? '-' }}</td>
                                <td class="p-4 font-medium">{{ $p->product_name }}</td>
                                <td class="p-4">
                                    <p class="line-clamp-2" title="{{ $p->desc }}">
                                        {{ Str::limit($p->desc, 60) }}
                                    </p>
                                </td>
                                <td class="p-4">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                                <td class="p-4 text-center">
                                    @if (optional($p->details->first())->image_product)
                                        <img src="{{ asset('storage/' . $p->details->first()->image_product) }}"
                                            class="w-10 h-10 object-cover rounded-lg mx-auto">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="p-4 relative overflow-visible text-center">
                                    <button type="button" onclick="toggleMenu(this)"
                                        class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 rounded">
                                        &#8942;
                                    </button>

                                    <ul
                                        class="action-menu hidden absolute z-50 right-0 top-full mt-2 w-44 bg-white border rounded-lg shadow-xl text-left">

                                        <li>
                                            <form id="restore-{{ $p->id_product }}"
                                                action="{{ route('produk.restore.process', $p->id_product) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="page" value="{{ request('page') }}">
                                                <button onclick="confirmRestore('restore-{{ $p->id_product }}')"
                                                    class="w-full px-4 py-3 text-sm hover:bg-gray-100 transition-all flex gap-2.5 text-left">
                                                    <svg width="15" height="15" viewBox="0 0 15 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.5 1.25C8.71259 1.24978 9.89906 1.6023 10.9148 2.2646C11.9305 2.9269 12.7317 3.87037 13.2206 4.98002C13.7095 6.08968 13.8651 7.3176 13.6683 8.51411C13.4716 9.71063 12.931 10.8241 12.1125 11.7188M10 7.5L7.5 5M7.5 5L5 7.5M7.5 5V10M1.5625 5.54688C1.36334 6.15229 1.25796 6.7846 1.25 7.42188M1.7688 10C2.11974 10.8074 2.63729 11.5315 3.28755 12.125M2.89749 3.27183C3.07189 3.08198 3.25787 2.90309 3.45437 2.73621M5.40253 13.3875C6.96109 13.9428 8.67621 13.8573 10.1719 13.15"
                                                            stroke="#282623" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <span>Restore</span>
                                                </button>
                                            </form>
                                        </li>

                                        <li>
                                            <form id="hapus-{{ $p->id_product }}"
                                                action="{{ route('produk.force.delete', $p->id_product) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="page" value="{{ request('page') }}">
                                                <button type="button"
                                                    onclick="confirmDelete('hapus-{{ $p->id_product }}')"
                                                    class="w-full px-4 py-3 text-sm hover:bg-gray-100 transition-all flex gap-2.5 text-left">
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
                                                    <span>Delete Permanen</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center py-10 text-gray-500 bg-white border border-dashed border-gray-300">
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
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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

        window.confirmDelete = (formId) => {
            Swal.fire({
                text: 'This product will be permanently removed. Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Permanent deletion',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit()
                }
            })
        }

        window.confirmRestore = (formId) => {
            Swal.fire({
                text: 'This product will be restored. Are you sure?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Restore',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit()
                }
            })
        }
    </script>
@endsection
