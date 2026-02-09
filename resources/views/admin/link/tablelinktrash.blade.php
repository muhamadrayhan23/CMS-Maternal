<div id="linkTableContainer" class="bg-white rounded-md border border-gray-200 mt-5 p-2 md:p-5 overflow-visible">
    <div class="bg-white rounded-md border border-gray-200 p-2 md:p-2 overflow-visible">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="text-center text-black font-bold border-b border-gray-100">
                    <th class="p-2 whitespace-nowrap">Status</th>
                    <th class="p-2 whitespace-nowrap">Link Name</th>
                    <th class="p-2 whitespace-nowrap">Link</th>
                    <th class="p-2 whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody class="text-center divide-y divide-gray-50">
                @forelse ($links as $link)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-2 whitespace-nowrap">
                        <span class="text-green-700 bg-green-100/90 text-[10px] py-1.5 px-3 md:px-5 rounded-full font-medium">
                            Published
                        </span>
                    </td>
                    <td class="p-2 text-black truncate max-w-[150px] md:max-w-none">
                        {{ $link->link_name }}
                    </td>
                    <td class="p-2">
                        <div class="flex justify-center">
                            <a href="{{ $link->link_address }}" target="_blank" class="flex items-center gap-2 text-black bg-white hover:bg-gray-100 border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 transition-all">
                                <span class="hidden md:inline">Visit Link</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 3h6v6" />
                                    <path d="M10 14 21 3" />
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                </svg>
                            </a>
                        </div>
                    </td>
                    <td class="p-2">
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
                                <form id="delete-form-{{ $link->id_link }}" method="POST" action="{{ route('forceDeleteLink', $link) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn-delete flex items-center gap-3 w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-all text-left">

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
                                <form id="restore-form-{{ $link->id_link }}"
                                    method="POST"
                                    action="{{ route('trashLink.restore', $link->id_link) }}">
                                    @csrf

                                    <button type="button" class="btn-restore w-full flex items-center gap-2 px-4 py-3 text-sm hover:bg-green-50 transition-all text-left border-t border-gray-50">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 2a10 10 0 0 1 7.38 16.75" />
                                            <path d="m16 12-4-4-4 4" />
                                            <path d="M12 16V8" />
                                            <path d="M2.5 8.875a10 10 0 0 0-.5 3" />
                                            <path d="M2.83 16a10 10 0 0 0 2.43 3.4" />
                                            <path d="M4.636 5.235a10 10 0 0 1 .891-.857" />
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
                <tr>
                    <td colspan="4" class="p-5 text-center text-gray-500">No Link Found!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleMenu(button) {
        document.querySelectorAll('.action-menu').forEach(menu => {
            if (menu !== button.nextElementSibling) {
                menu.classList.add('hidden');
            }
        });

        const menu = button.nextElementSibling;
        menu.classList.toggle('hidden');
    }

    window.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            document.querySelectorAll('.action-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
    // alert confirm Delete permanent
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Delete Link?',
                text: 'This link will be permanently deleted. Are you sure?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                showCloseButton: true,
                buttonsStyling: false,

                reverseButtons: false,

                customClass: {
                    // Kontainer Utama
                    popup: 'rounded-[8rem] !p-10 shadow-2xl border-none min-w-[90%] md:min-w-[550px] !items-start',
                    title: '!text-left !text-3xl font-bold text-gray-900 w-full !justify-start !flex !p-0 !m-0 !mb-5',
                    htmlContainer: '!text-left !text-gray-500 !text-lg w-full !m-0 !mb-10 !justify-start !flex !p-0',

                    actions: 'flex w-full !justify-between gap-4 px-4 w-full !m-0 !p-0',

                    confirmButton: 'flex-1 !bg-red-600 !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-red-700 transition-all !m-0 !outline-none !shadow-none',
                    cancelButton: 'flex-1 bg-[#111111] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-black transition-all !m-0 !outline-gray-600 !shadow-none',
                    closeButton: 'focus:!outline-none focus:!ring-0 !border-none !text-gray-400'
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });

    // alert confirm restore
    document.querySelectorAll('.btn-restore').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Restore Link?',
                text: 'This link will be restored. Are you sure?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                showCloseButton: true,
                buttonsStyling: false,

                reverseButtons: false,

                customClass: {
                    // Kontainer Utama
                    popup: 'rounded-[8rem] !p-10 shadow-2xl border-none min-w-[90%] md:min-w-[550px] !items-start',
                    title: '!text-left !text-3xl font-bold text-gray-900 w-full !justify-start !flex !p-0 !m-0 !mb-5',
                    htmlContainer: '!text-left !text-gray-500 !text-lg w-full !m-0 !mb-10 !justify-start !flex !p-0',

                    actions: 'flex w-full !justify-between gap-4 px-4 w-full !m-0 !p-0',

                    confirmButton: 'flex-1 !bg-white !text-black !px-6 !py-3 !rounded-lg !font-bold !text-base !border !border-gray-900 hover:!bg-gray-200 transition-all !m-0 !outline-none !shadow-none',
                    cancelButton: 'flex-1 bg-[#111111] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-gray-700 transition-all !m-0 !outline-none !shadow-none',
                    closeButton: 'focus:!outline-none focus:!ring-0 !border-none !text-gray-400'
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });
</script>