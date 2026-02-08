<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="img/logo/Craft_Logo White.png">
</head>

<body class="bg-[#f4f4f4]">

    {{-- SIDEBAR --}}
    @include('partials.sidebarAdmin')

    {{-- CONTENT --}}
    <main class="flex-1 min-h-screen md:ml-64  transition-all duration-300 ">
        <div class="p-10">
            @yield('content')
        </div>
    </main>
</div>
<script>
            document.addEventListener('DOMContentLoaded', function() {
            const success = "{{ session('success') }}";

            if (success) {
                Swal.fire({
                    title: 'Success!',
                    text: success,
                    showConfirmButton: true,
                    

                    customClass:{
                        popup: 'rounded-[2rem] !p-6 md:!p-10 shadow-2xl border-none w-[250px] md:min-w-[550px]',
                        title: 'text-2xl md:text-3xl font-bold text-gray-900',
                        confirmButton: 'w-full md:w-auto !bg-green-800 !text-white !px-10 !py-2 !rounded-xl !font-bold hover:!bg-green-900 transition-all' 
                    }
                });
            }
                    // alert confirm Logout
                        document.querySelectorAll('.btn-logout').forEach(button => {
                        button.addEventListener('click', function(e) {
                        e.preventDefault(); 
                
                                Swal.fire({
                                title: 'Logout',
                                text: 'Are you sure, you want to Logout?',
                                showCancelButton: true,
                                confirmButtonText: 'Yes',
                                cancelButtonText: 'Cancel',
                                showCloseButton: true,
                                buttonsStyling: false,
                        
                                reverseButtons: false, 

                                customClass: {
                                    // Kontainer Utama
                                    popup: 'rounded-[8rem] !p-10 shadow-2xl border-none w-[90%] md:min-w-[550px] !items-start',
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

                });
</script>
</body>

</html>
