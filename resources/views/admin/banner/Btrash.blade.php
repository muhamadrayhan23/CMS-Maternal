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
            <a href="{{ route('Btrash') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium  text-white bg-[#333333] border border-[#333333] rounded-md transition-al">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                </svg>
                Trash
            </a>
            <a href="{{ route ('Bhome') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/><circle cx="12" cy="19" r="1"/><circle cx="19" cy="19" r="1"/><circle cx="5" cy="19" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="19" cy="5" r="1"/><circle cx="5" cy="5" r="1"/>
                </svg>
                All Banner
            </a>
            <a href="{{ route('addB') }}" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"/><path d="M12 5v14"/>
                </svg>
                Add New Banner
            </a>
        </div>
    </div>

     {{-- SEARCH & FILTER --}}
    <div class="flex items-center gap-3">
        <div class="relative flex-1">
            <div >
            <input id="liveSearch" type="text" placeholder="Search Banners" name="search" value="{{ request('search') }}" class="w-full pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 transition-all placeholder:text-gray-400">
            </div>       
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
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
    function toggleMenu(btn){
        const menu = btn.parentElement.querySelector('.action-menu')

        document.querySelectorAll('.action-menu').forEach(m => {
        if (m !== menu) m.classList.add('hidden')
    })

    menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (e) {
    if (!e.target.closest('.relative')) {
        document.querySelectorAll('.action-menu')
            .forEach(m => m.classList.add('hidden'));
    }
    });
// search 
    const searchInput = document.getElementById('liveSearch');
    const container = document.getElementById('bannerContainer');

    searchInput.addEventListener('input', function() {
        const query = this.value;
        fetch(`{{ route('Btrash') }}?search=${query}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(data => {
            container.innerHTML = data; 
        });
        });


        
        //ALERT RESTORE YA ENIH

            //alert info delete berhasil iyes
            document.addEventListener('DOMContentLoaded', function() {

            const successRestore = "{{ session('success') }}"
            
            if (successRestore) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success !',
                    text: successRestore,
                    showConfirmButton: false,
                    timer: 2000
                });
            } 

                    // alert confirm delete
                    document.querySelectorAll('.btn-hapus-permanent').forEach(button => {
                    button.addEventListener('click', function(e) {
                    e.preventDefault(); 
            
                    Swal.fire({
                        title: 'This banner will be restored. Are you sure?',
                        text: '',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('form').submit();
                        }
                        })
                    });
                });

                    // alert confirm restore
                    document.querySelectorAll('.btn-restore').forEach(button => {
                    button.addEventListener('click', function(e) {
                    e.preventDefault(); 
            
                    Swal.fire({
                        title: 'This banner will be restored. Are you sure?',
                        text: '',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('form').submit();
                        }
                        })
                    });
                }); 

             });

</script>
@endsection