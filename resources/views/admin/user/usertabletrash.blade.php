<div class="bg-white rounded-xl border border-gray-200 overflow-visible p-3 mt-5">
    <table class="w-full text-sm table-fixed p-3">
        <thead>
            <tr class="text-left text-black font-bold">
                <th class="text-center p-2 w-10">No</th>
                <th class="p-2 pl-4 w-45">Name</th>
                <th class="p-2 w-60">Email</th>
                <th class="text-center p-2 w-20">Role</th>
                <th class="text-center p-2 w-30">Action</th>
            </tr>
        </thead>
        <tbody class="text-left mt-5">
            @forelse ($users as $user)
            <tr class="hover:bg-gray-50 transition mt-5 p-5">
                <td class="text-center mt-5">{{ $loop->iteration }}.</td>
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
                            <form method="POST" action="{{ route('trashUser.permanent', $user->id) }}">
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
                            <form method="POST" action="{{ route('trashUser.restore', $user->id) }}">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin me restore user ini?')"
                                    class="w-full flex items-center gap-2 px-4 py-3 text-sm hover:bg-green-50 transition-all text-left border-t border-gray-50 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-fading-arrow-up-icon lucide-circle-fading-arrow-up">
                                        <path d="M12 2a10 10 0 0 1 7.38 16.75" />
                                        <path d="m16 12-4-4-4 4" />
                                        <path d="M12 16V8" />
                                        <path d="M2.5 8.875a10 10 0 0 0-.5 3" />
                                        <path d="M2.83 16a10 10 0 0 0 2.43 3.4" />
                                        <path d="M4.636 5.235a10 10 0 0 1 .891-.857">
                                            <path d="M8.644 21.42a10 10 0 0 0 7.631-.38" />
                                    </svg>
                                    <span>Restore</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <td colspan="6">
                <span class="text-center text-gray-500">No User Found!
                </span>
            </td>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-3">
    {{ $users->withQueryString()->links() }}
</div>