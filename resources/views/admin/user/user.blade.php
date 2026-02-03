@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('content')

@php use Illuminate\Support\Str; @endphp
<div class="bg-white rounded-xl border border-gray-200 p-5 ">
    <div class="space-y-4">
        {{-- NAV MANAGE --}}
        <div class="flex items-center justify-between">
            <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
                MANAGE USERS
            </h2>

            <div class="flex items-center gap-2">
                <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-black bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trash-icon lucide-trash">
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                        <path d="M3 6h18" />
                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                    Trash
                </a>
                <a href="{{ route('homeUser') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-white bg-[#333333] border border-gray-300 rounded-md transition-all">
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
                    All Users
                </a>
                <a href="{{ route('createUser') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-black bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    Add New User
                </a>
            </div>
        </div>

        {{-- search filter --}}

        <div class="flex items-center gap-3">
            <form action="{{ route('homeUser') }}" method="GET" class="relative flex-1">
                <input type="text" id="search" name="search" placeholder="Search users" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </div>
            </form>
        </div>

    </div>

    <!-- TABLE USER -->

    <div class="bg-white rounded-xl border border-gray-200 overflow-visible p-3 mt-5">
        <table class="w-full text-sm table-fixed p-3">
            <thead>
                <tr class="text-left text-black font-bold">
                    <th class="text-center p-2 w-10">No</th>
                    <th class="p-2 pl-4 w-60">Name</th>
                    <th class="p-2 w-35">Email</th>
                    <th class="text-center p-2 w-20">Role</th>
                    <th class="text-center p-2 w-30">Action</th>
                </tr>
            </thead>
            <tbody class="text-left mt-5">
                @forelse ($users as $user)
                <tr class="hover:bg-gray-50 transition mt-5 p-5">
                    <th class="text-center mt-5">{{ $loop->iteration }}.</th>
                    <td class="m-70 mt-5 p-2 pl-4">{{ $user->name }}</td>
                    <td class="mt-5 p-2">{{ $user->email }}</td>
                    <td class="mt-5 p-2 text-center">Admin</td>
                    <td class="text-center relative overflow-visible">
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


                                <a href="{{ route('editUser', $user->id) }}" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 transition-all border-t border-gray-50">
                                    Edit User
                                </a>


                                <form method="POST" action="{{ route('deleteUser', $user) }}">
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
                <td colspan="6">
                    <span class="text-danger">
                        <strong>No User Found!</strong>
                    </span>
                </td>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $users->withQueryString()->links() }}
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
