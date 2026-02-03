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
            <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-black bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-trash-icon lucide-trash">
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                    <path d="M3 6h18" />
                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                </svg>
                Trash
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
    <div class="flex items-center gap-3">
        <form action="{{ route('homeLink') }}" method="GET" class="relative flex-1">
            <input type="text" id="search" name="search" placeholder="Search links" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </form>
    </div>

</div>

<!-- hiasan -->
<div class="mt-5">
    <img src="{{ asset('pic-link-banner/alt_pages-to-jpg-0001.jpg') }}" alt="banner hiasan" class="w-full rounded-xl">
</div>

<!-- TABLE USER -->
<div class="bg-white rounded-xl border border-gray-200 mt-5 p-5 overflow-visible">
    <div class="bg-white rounded-xl border border-gray-200 overflow-visible">
        <table class="w-full text-sm table-fixed">
            <thead>
                <tr class="text-center text-black font-bold">
                    <th class="p-3 w-24">Status</th>
                    <th class="p-3 w-24">Img</th>
                    <th class="text-left p-3 w-48">Link Name</th>
                    <th class="p-3 w-64">Link</th>
                    <th class=" p-3 w-32">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($links as $link)
                <tr class="hover:bg-gray-50 transition">
                    <td class=" text-black text-center">
                        Published
                    </td>
                    <td class="flex justify-center items-center">
                        <img src="{{ asset($link->link_logo) }}" alt="{{ $link->link_name }}" width="25">
                    </td>
                    <td class="text-left text-black">{{ $link->link_name }}</td>
                    <td class="text-blue-600">
                        <a href="{{ $link->link_address }}" target="_blank">
                            {{ Str::limit($link->link_address, 44) }}
                        </a>
                    </td>
                    <td class=" p-2 relative overflow-visible">
                        <div class="relative inline-block">
                            <button onclick="toggleMenu(this)" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg>
                            </button>

                            {{-- TOOLTIP --}}
                            <div class="action-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg z-50 overflow-hidden">


                                <a href="{{ route('editLink', $link->id_link) }}" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 transition-all border-t border-gray-50">
                                    Edit Link
                                </a>


                                <form method="POST" action="{{ route('deleteLink', $link) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="flex items-center gap-3 w-full px-4 py-3 text-sm text-black
                                        hover:bg-gray-100 transition-all text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-trash-2">
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
                    </td>
                </tr>
                @empty
                <td colspan="5">
                    <span class="col-span-full text-center py-10 text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
                        <strong>No Link Found!</strong>
                    </span>
                </td>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $links->withQueryString()->links() }}
    </div>

</div>


<script>
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
</script>

@endsection