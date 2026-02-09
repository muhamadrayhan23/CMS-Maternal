@extends('layout.guest')

@section('content')

<div class="flex flex-row items-center gap-2 w-full mx-auto px-4 md:px-10 py-5">
    <div class="relative flex-4 md:flex-5">

        <div>
            <input id="liveSearch" type="text" placeholder="Search Products Here..." name="search" value="{{ request('search') }}" class="w-full pl-4 pr-10 py-1 md:py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
        </div>
    </div>

    <div class="relative w-28 md:w-72">
        <select id="filterStatus" name="sort" class="w-full appearance-none pl-4 pr-10 py-1.5 md:py-2 text-xs md:text-sm  text-gray-500 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all bg-white cursor-pointer">
            <option value="">Sort by Price</option>
            <option value="price_desc" @selected(request('sort')=='price_desc' )>
                High to low
            </option>
            <option value="price_asc" @selected(request('sort')=='price_asc' )>
                Low to high
            </option>
        </select>
    </div>
</div>

<div class="hidden md:block md:px-10">
    <img src="{{ asset('img/banner.png') }}" alt="" class="w-full">
</div>


<div class="mx-auto px-4 md:px-10 mt-2 md:mt-10 lg:mt=10" id="card-product">
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