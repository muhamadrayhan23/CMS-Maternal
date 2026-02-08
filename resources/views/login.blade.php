<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="img/logo/Craft_Logo White.png">
</head>
<body class="bg-white font-sans">
    <div class="flex flex-col md:flex-row min-h-screen items-center justify-center ">
        <div class="w-full md:w-1/2">
                <div class= "hidden md:block overflow-hidden h-screen w-full">
                    <img src="{{ asset('img/logo/WithModel.webp') }}" alt="" class="w-full h-full object-cover">
                </div>
        </div>

        <div class="w-full md:w-1/2 max-w-md mx-auto px-8 md:px-0">
            <div class="text-start mb-8 md:mb-12">
                <h1 class="font-semibold text-3xl md:text-5xl tracking-tight text-black uppercase gap-3 md:mb-5">welcome!</h1>
                <p class="text-base md:text-lg mt-5 mb-7">Login to manage website content and data</p>
            </div>
        
                <form action="{{ route ('loginForm')}}" method="POST">
                    @csrf
                    <div class="space-y-3">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-800">Email :</label>
                        <input type="text" name="email" placeholder="Enter your email addres" 
                        class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-800 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-800">Password :</label>
                        <input type="password" name="password" placeholder="Enter password" 
                        class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-800 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400 mb-4">
                    </div>
                    

                    <button class="w-full px-4 py-3 bg-[#000000] border rounded-lg font-semibold font-2xl text-gray-100 ">Log in</button>
                    </div>
                </form>
        </div>
    </div>
</body>
 <script type="module">
    document.addEventListener('DOMContentLoaded', function() {
        if (!window.Swal) return;

        const succes = "{{ session('success_login') }}";
        const error = "{{ session('error_login') }}";
        
        const validationError = "{{ $errors->first() }}"; 
        
        let config = null;
        
        if (succes) {
            config = {
                title: 'Login Successfully!',
                text: succes !== 'true' ? succes : '',
                showConfirmButton: false,
                timer: 3000,       
            };
        } else if (error || validationError) { 
            config = { 
                title: 'Login Failed!',
                text: (error ===  'true' || !error ) ? validationError : error,
                showConfirmButton: true,
                confirmButtonColor: '#d33',
            };
        } 
        
        if (config) {
            window.Swal.fire({
                ...config,
                width: '500px',
                padding: '3rem 1rem',
                borderRadius: '20px',
            });
        }
    }); 
</script>
</html>