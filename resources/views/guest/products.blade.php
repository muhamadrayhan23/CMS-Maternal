@extends('layout.guest')

@section('content')

<div class="rounded-xl p-10 py-4">
    <form action="{{ route('products') }}" method="GET"
        class="flex flex-col md:flex-row md:items-center gap-3">

        <input
            type="text"
            id="liveSearch"
            name="search"
            placeholder="Search Products Here..."
            value="{{ request('search') }}"
            class="w-full appearance-none px-4 py-3 flex-1 text-sm text-gray-500 border border-gray-300 rounded-md bg-[#F9F9FB]">

        <select
            name="sort"
            id="filterStatus"
            class="pl-4 pr-10 py-3 text-sm text-gray-500 border border-gray-300 rounded-md bg-[#F9F9FB]">
            <option value="">Sort by Price</option>
            <option value="price_desc" @selected(request('sort')=='price_desc' )>
                High to low
            </option>
            <option value="price_asc" @selected(request('sort')=='price_asc' )>
                Low to high
            </option>
        </select>
    </form>
</div>

<div class="px-10">
    <img src="{{ asset('img/banner.png') }}" alt="" class="w-full rounded-md">
</div>


<div class="mt-10" id="card-product">
    @include('guest.searchProducts', ['products' => $products])
</div>

@if ($products->hasMorePages())
<div class="flex justify-center mt-10 mb-20" id="load-more-wrapper">
    <button
        id="load-more"
        data-page="2"
        class="flex items-center gap-2 px-8 py-3 border rounded-full
               hover:bg-[#1A1A1A] hover:text-white transition">
        → View More
    </button>
</div>
@endif



<script>
    const searchInput = document.getElementById('liveSearch');
    const sortSelect = document.getElementById('filterStatus');
    const container = document.getElementById('card-product');

    function fetchProducts(reset = false) {
        const search = searchInput.value;
        const sort = sortSelect.value;
        const loadMoreBtn = document.getElementById('load-more');
        const page = reset ? 1 : (loadMoreBtn?.dataset.page ?? 1);

        fetch(`{{ route('products') }}?search=${search}&sort=${sort}&page=${page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {
                if (reset) {
                    container.innerHTML = html;
                } else {
                    container.insertAdjacentHTML('beforeend', html);
                }

                const wrapper = document.getElementById('load-more-wrapper');
                if (!html.includes('id="load-more"')) {
                    wrapper.innerHTML = '';
                }
            });

    }

    document.addEventListener('click', e => {
        const btn = e.target.closest('#load-more');
        if (!btn) return;

        e.preventDefault();
        fetchProducts(false);
    });

    searchInput.addEventListener('input', () => fetchProducts(true));
    sortSelect.addEventListener('change', () => fetchProducts(true));
</script>

@endsection