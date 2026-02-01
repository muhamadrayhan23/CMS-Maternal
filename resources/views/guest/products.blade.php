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
            class="border px-4 py-2 flex-1 rounded-lg">

        <select name="sort"
            id="filterStatus"
            class="border px-3 py-2 rounded-lg"
            placeholder="Sort by Price">
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                High to low
            </option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                Low to high
            </option>
        </select>

    </form>
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
            headers: { 'X-Requested-With': 'XMLHttpRequest'}
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