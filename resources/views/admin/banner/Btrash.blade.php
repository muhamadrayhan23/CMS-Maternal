@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('content')
{{-- NAV MANAGE --}}
<div class="space-y-4 font-sans">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold tracking-wider text-[#0F172A] uppercase">
            Recently deleted
        </h2>

        <div class="flex items-center gap-2">
            <a href="{{ route('Btrash') }}" class="flex items-center gap-2 px-2 md:px-3 py-2 text-sm font-medium text-white bg-[#333333] border border-[#333333] rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-4 md:h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                    <path d="M3 6h18" />
                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                </svg>
                <span class="hidden md:inline">Trash</span>
            </a>
            <a href="{{ route ('Bhome') }}" class="flex items-center gap-2 px-2 md:px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-4 md:h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="19" cy="12" r="1" />
                    <circle cx="5" cy="12" r="1" />
                    <circle cx="12" cy="19" r="1" />
                    <circle cx="19" cy="19" r="1" />
                    <circle cx="5" cy="19" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="19" cy="5" r="1" />
                    <circle cx="5" cy="5" r="1" />
                </svg>
                <span class="hidden md:inline">All Banner</span>
            </a>
            <a href="{{ route('addB') }}" class="flex items-center gap-2 px-2 md:px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-4 md:h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                <span class="hidden md:inline">Add New Banner</span>
            </a>
        </div>
    </div>

    {{-- SEARCH & FILTER --}}
    <div class="flex items-center gap-3">
        <div class="relative flex-1">
            <div>
                <input id="liveSearch" type="text" placeholder="Search Banners" name="search" value="{{ request('search') }}" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>
    </div>
</div>


{{-- CARD BANNER --}}
<div id="bannerContainer" class="mt-5">
    @include('admin.banner.search_cardT')
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
            })


    // search 
    const searchInput = document.getElementById('liveSearch');
    const container = document.getElementById('bannerContainer');

    searchInput.addEventListener('input', function() {
        const query = this.value;
        // fetch fungsi js request HTTP versi ajax 
        fetch(`{{ route('Btrash') }}?search=${query}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                container.innerHTML = data;
            });
    });



        //ALERT RESTORE YA ENIH

        //alert info delete berhasil iyes
        document.addEventListener('DOMContentLoaded', function() {

        const success = "{{ session('success') }}"

        if (success) {
            Swal.fire({
                title: 'Success!',
                text: success,
                showConfirmButton: true,
                confirmButtonText: 'Close',
                customClass: {
                    popup: 'rounded-3xl p-4 shadow-lg',
                    title: 'text-xl font-bold',
                    confirmButton: '!bg-green-800'
                }
            });
        }


        // alert confirm Delete permanent
        document.querySelectorAll('.btn-hapus-permanent').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Delete Banner?',
                    text: 'This banner will be permanently deleted. Are you sure?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                    showCloseButton: false,
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
                })
            })
        })

    })

    // alert confirm restore
    document.querySelectorAll('.btn-restore').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Restore Banner?',
                text: 'This banner will be restored. Are you sure?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                showCloseButton: false,
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
            })
        })
    })
</script>
@endsection