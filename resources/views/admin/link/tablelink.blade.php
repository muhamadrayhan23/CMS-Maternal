<div class="bg-white rounded-md border border-gray-200 mt-5 p-5 overflow-visible">
    <div class="bg-white rounded-md border border-gray-200 overflow-visible">
        <table class="w-full text-sm table-fixed">
            <thead>
                <tr class="text-center text-black font-bold">
                    <th class="p-3 w-24">Status</th>
                    <th class="text-left p-3 w-46 ml-3">Link Name</th>
                    <th class="p-3 w-64">Link</th>
                    <th class=" p-3 w-32">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($links as $link)
                <tr class="hover:bg-gray-50 transition">
                    <td class="text-green-700 bg-green-100/90 text-[10px] rounded-full">
                        Published
                    </td>
                    <td class="text-left text-black ml-6">{{ $link->link_name }}</td>
                    <td class="text-black border-b border-gray-100 p-2">
                        <a href="{{ $link->link_address }}" target="_blank">
                            Visit Link
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-line-icon lucide-pen-line">
                                        <path d="M13 21h8" />
                                        <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                    </svg>
                                    <span>Edit</span>
                                </a>


                                <form id="delete-form-{{ $link->id_link }}" method="POST" action="{{ route('deleteLink', $link) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" data-id="{{ $link->id_link }}" onclick="confirmDeleteL(this)" class="flex items-center gap-3 w-full px-4 py-3 text-sm text-black hover:bg-gray-100 transition-all text-left">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                <td colspan="4">
                    <span class="text-center text-gray-500">
                        No Link Found!
                    </span>

            </tbody>
            @endforelse
        </table>
    </div>
    <div class="mt-3">
        {{ $links->withQueryString()->links() }}
    </div>
</div>

<script>
    window.confirmDeleteL = function(el) {
        const id = el.dataset.id

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will delete your link!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit()
            }
        })
    }
</script>