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
            <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-white bg-[#333333] border border-[#333333] rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-trash-icon lucide-trash">
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                    <path d="M3 6h18" />
                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                </svg>
                Trash
            </a>
            <a href="{{ route('homeLink') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-gray-600 bg-white border border-gray-300 rounded-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="19"
                        cy="12" r="1" />
                    <circle cx="5" cy="12" r="1" />
                    <circle cx="12" cy="19" r="1" />
                    <circle cx="19" cy="19" r="1" />
                    <circle cx="5" cy="19" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="19" cy="5" r="1" />
                    <circle cx="5" cy="5" r="1" />
                </svg>
                All Links
            </a>
            <a href="{{ route('createLink') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
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

        <!-- <div class="relative w-72">
            <select class="w-full appearance-none pl-4 pr-10 py-2 text-sm text-gray-500 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all bg-white cursor-pointer">
                <option>Sort by status</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    <path d="m9 12 2 2 4-4" />
                </svg>
            </div>
        </div> -->
    </div>

</div>

<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <table class="table-auto">
            <thead>
                <tr>
                    <th scope="col">Img</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($links as $link)
                <tr>
                    <td><img src="{{ asset($link->link_logo) }}" alt="{{ $link->link_name }}" width="50"></td>
                    <td>{{ $link->link_name }}</td>
                    <td>
                        <a href="{{ $link->link_address }}" target="_blank">
                            {{ Str::limit($link->link_address, 40) }}
                        </a>
                    </td>

                    <td>
                        <div class="relative">
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

                                    <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="flex items-center gap-3 w-full px-4 py-3 text-sm text-red-600
                                        hover:bg-red-50 transition-all text-left">
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
                        <!-- <form action="{{ route('deleteLink', $link) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('editLink', $link->id_link) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>


                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this link?');"><i class="bi bi-trash"></i> Delete</button>
                        </form> -->
                    </td>
                </tr>
                @empty
                <td colspan="6">
                    <span class="text-danger">
                        <strong>No Link Found!</strong>
                    </span>
                </td>
                @endforelse
            </tbody>
        </table>
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

<!-- @session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession -->