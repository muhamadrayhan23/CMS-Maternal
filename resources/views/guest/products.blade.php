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


<div id="card-product" class="mt-10">
    @include('guest.searchProducts')
</div>

<!-- <div class="flex justify-center mt-10 mb-20 ">
    <button
        id="load-more"
        data-page="2"
        class="flex items-center gap-2 px-8 py-3 border rounded-full hover:bg-black">
        See More
    </button>
</div> -->


@if ($products->hasMorePages())
<div class="flex justify-center mt-10 mb-20">
    <button
        id="load-more"
        data-page="2"
        class="flex items-center gap-2 px-8 py-3 border rounded-full
               hover:bg-[#1A1A1A] hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
            <path d="M18 8L22 12L18 16" />
            <path d="M2 12H22" />
        </svg>
        See More
    </button>
</div>
@endif

<script>
    const searchInput = document.getElementById('liveSearch');
    const sortSelect = document.getElementById('filterStatus');
    const container = document.getElementById('card-product');
    const loadMoreBtn = document.getElementById('load-more');

    function fetchProducts(reset = false) {
        const search = searchInput.value;
        const sort = sortSelect.value;
        const page = reset ? 1 : loadMoreBtn?.dataset.page ?? 1;

        fetch(`{{ route('products') }}?search=${search}&sort=${sort}&page=${page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {
                if (reset) {
                    container.innerHTML = html;
                    if (loadMoreBtn) loadMoreBtn.dataset.page = 2;
                } else {
                    container.insertAdjacentHTML('beforeend', html);
                    loadMoreBtn.dataset.page = parseInt(page) + 1;
                }

                if (!html.trim() && loadMoreBtn) {
                    loadMoreBtn.remove();
                }
            });
    }

    // searchInput.addEventListener('input', () => fetchProducts(true));
    // sortSelect.addEventListener('change', () => fetchProducts(true));

    loadMoreBtn?.addEventListener('click', () => fetchProducts());
</script>

@endsection