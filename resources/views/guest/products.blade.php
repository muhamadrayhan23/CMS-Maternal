@extends('layout.guest')

@section('content')
<div class="rounded-xl p-10 py-4">
    <form action="{{ route('products') }}" method="GET"
        class="flex flex-col md:flex-row md:items-center gap-3">

        <input type="text"
            id="liveSearch"
            name="search"
            placeholder="Search Products Here..."
            value="{{ request('search') }}"
            class="w-full appearance-none px-4 py-3 flex-1 text-sm text-gray-500 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all bg-white cursor-pointer">

        <div class="relative w-fit">
            <select
                name="sort"
                id="filterStatus"
                class="w-full appearance-none pl-4 pr-10 py-3 text-sm text-gray-500 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all bg-white cursor-pointer">
                <option value="">Sort by Price</option>
                <option value="price_desc">High to low</option>
                <option value="price_asc">Low to high</option>
            </select>
        </div>
    </form>
</div>

<img src="{{ asset('img/banner.png') }}" alt="" class="w-full">

<div class="flex items-center mt-10 mb-14">

    <h1 class="mx-6 font-sans text-2xl tracking-wide whitespace-nowrap ml-10">
        WE PRESENT
    </h1>

    <span class="flex-1 h-px bg-gray-300"></span>
</div>

<div id="card-product" class="mt-10">
    @include('guest.searchProducts')
</div>

<div class="flex justify-center mt-10 mb-20">
    <a href="#"
        class="flex px-8 py-3 border rounded-full hover:bg-[#1A1A1A] hover:text-white transition gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
            <path d="M18 8L22 12L18 16" />
            <path d="M2 12H22" />
        </svg>
        See More
    </a>
</div>

<script>
    const searchInput = document.getElementById('liveSearch');
    const container = document.getElementById('card-product');
    const sortSelect = document.getElementById('filterStatus');

    function fetchProducts() {
        const search = searchInput.value;
        const sort = sortSelect.value;

        fetch(`{{ route('products') }}?search=${search}&sort=${sort}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                container.innerHTML = data;
            });
    }

    searchInput.addEventListener('input', fetchProducts);

    sortSelect.addEventListener('change', fetchProducts);
</script>
@endsection