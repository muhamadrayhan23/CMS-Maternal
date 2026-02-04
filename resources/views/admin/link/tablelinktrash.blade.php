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
                            <form method="POST" action="{{ route('trashLink.permanent', $link->id_link) }}">
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
                            <form method="POST" action="{{ route('trashLink.restore', $link->id_link) }}">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin me restore link ini?')"
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
            <td colspan="5">
                <span class="text-center text-gray-500">
                    No Link Found!
                </span>
            </td>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-3">
    {{ $links->withQueryString()->links() }}
</div>