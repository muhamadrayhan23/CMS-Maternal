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

<div class="flex">
    {{-- SIDEBAR --}}
    @include('partials.sidebarAdmin')

    {{-- CONTENT --}}
    <main class="flex-1 min-h-screen md:ml-64 transition-all duration-300">
        <div class="p-10">
            @yield('content')
        </div>
    </main>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function (){

        const success = "{{session ('success')}}"
        if(success){
            Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: successMessage,
                    showConfirmButton: false,
                    timer: 3000
                });
        }
    // alert confirm Logout
        document.querySelectorAll('.btn-logout').forEach(button => {
            button.addEventListener('click', function(e) {
            e.preventDefault(); 
                        
            Swal.fire({
            title: 'Confirm Logout',
            text: 'Are you sure you want to Logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                this.closest('form').submit()
                }
                })
            })
         })
    })
</script>
</body>
</html>