@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('content')


@php use Illuminate\Support\Str; @endphp

<div class="space-y-4">
    {{-- NAV MANAGE --}}
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
            MANAGE LINKS
        </h2>

        <div class="flex items-center gap-2">
            <a href="{{ route('trashLink') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-black bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-trash-icon lucide-trash">
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                    <path d="M3 6h18" />
                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                </svg>
                Trash
            </a>
            <a href="{{ route('createAnnouncement') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-white bg-[#333333] border border-gray-300 rounded-md hover:bg-black transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Add New Announcement
            </a>
            <a href="{{ route('createLink') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-white bg-[#333333] border border-gray-300 rounded-md hover:bg-black transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Add New Link
            </a>
        </div>
    </div>

    {{-- search filter --}}
    <div class="relative flex-1">
        <div>
            <input id="liveSearch" type="text" placeholder="Search link name" name="search" value="{{ request('search') }}" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
        </div>
    </div>

</div>

<div id="managementCards">
    <!-- Banner Discount -->
    <div id="managementBannerDiscount"
        class="group cursor-pointer bg-white p-8 py-15 rounded-2xl border border-blue-100 shadow-sm
           hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex justify-between items-center mt-5">

        <div class="space-y-2">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600 transition">
                Management Banner Discount
            </h3>
            <p class="text-sm text-gray-500">
                Create and manage promotional discount banners
            </p>
        </div>

        <div
            class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 text-blue-600
               group-hover:bg-blue-600 group-hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
            </svg>
        </div>
    </div>

    <!-- Management Links -->

    <div id="managementLinks"
        class="group cursor-pointer bg-white p-8 py-15 rounded-2xl border border-emerald-100 shadow-sm
           hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex justify-between items-center mt-5">

        <div class="space-y-2">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-emerald-600 transition">
                Management Links
            </h3>
            <p class="text-sm text-gray-500">
                Organize and update all website links
            </p>
        </div>

        <div
            class="flex items-center justify-center w-12 h-12 rounded-full bg-emerald-100 text-emerald-600
               group-hover:bg-emerald-600 group-hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
            </svg>
        </div>
    </div>

</div>




<!-- Links Section -->
<div id="linkContainer" class="hidden mt-5">
    @include('admin.link.tablelink')
</div>
<!-- Announcement Section -->
<div id="announcementContainer" class="hidden mt-5">
    @include('admin.link.announcement')
</div>



<script>
    const cards = document.getElementById('managementCards')
    const bannerCard = document.getElementById('managementBannerDiscount')
    const linkCard = document.getElementById('managementLinks')
    const header = document.getElementById('header')

    const announcementContainer = document.getElementById('announcementContainer')
    const linkContainer = document.getElementById('linkContainer')


    linkCard.addEventListener('click', () => {
        cards.classList.add('hidden')
        linkContainer.classList.remove('hidden')
    })
    bannerCard.addEventListener('click', () => {
        cards.classList.add('hidden')
        announcementContainer.classList.remove('hidden')
    })

    function toggleMenu(btn) {
        const menu = btn.parentElement.querySelector('.action-menu')

        document.querySelectorAll('.action-menu').forEach(m => {
            if (m !== menu) m.classList.add('hidden')
        })

        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            document.querySelectorAll('.action-menu')
                .forEach(m => m.classList.add('hidden'));
        }
    });


    const searchInput = document.getElementById('liveSearch');
    const container = document.getElementById('linkContainer');

    function fetchFilter() {
        const search = searchInput.value

        fetch(`{{ route('homeLink') }}?search=${search}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {
                container.innerHTML = html
            })
    }

    searchInput.addEventListener('input', fetchFilter)

    document.addEventListener('DOMContentLoaded', function() {

        const successMessage = "{{ session('success') }}";

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
                showConfirmButton: false,
                timer: 3000
            });
        }
    });
</script>


@endsection