<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="img/logo/logo1.png">
</head>

<body class="bg-white font-sans">
    <div class="flex flex-col md:flex-row min-h-screen items-center justify-center ">
        <div class="w-full md:w-1/2">
            <div class= "hidden md:block overflow-hidden h-screen w-full">
                <img src="{{ asset('img/logo/logo3.jpg') }}" alt="" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="w-full md:w-1/2 max-w-md mx-auto px-8 md:px-0">
            <div class="text-start mb-2 md:mb-12">
                <h1 class="font-semibold text-3xl md:text-5xl tracking-tight text-black uppercase gap-3 md:mb-5">
                    welcome!</h1>
                <p class="text-base md:text-lg mt-5 mb-2">Login to manage website content and data</p>
            </div>

            <form action="{{ route('loginForm') }}" method="POST">
                @csrf
                <div class="space-y-3">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-800">Email :</label>
                        <input type="text" name="email" placeholder="Enter your email..."
                            class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-800">Password :</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Enter your password..."
                                class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400 pr-10">
                            <button type="button" id="togglePassword"
                                class="absolute right-3 top-3 flex items-center justify-center">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                    <path
                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                    </path>
                                    <line x1="1" y1="1" x2="23" y2="23"></line>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <script>
                        document.getElementById('togglePassword').addEventListener('click', function(e) {
                            e.preventDefault();
                            const passwordInput = document.getElementById('password');
                            const eyeIcon = document.getElementById('eyeIcon');

                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                eyeIcon.innerHTML =
                                    '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
                            } else {
                                passwordInput.type = 'password';
                                eyeIcon.innerHTML =
                                    '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
                            }
                        });
                    </script>


                    <button
                        class="w-full px-4 py-3 bg-[#000000] border rounded-lg font-semibold font-2xl text-gray-100 ">Login</button>
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
                text: (error === 'true' || !error) ? validationError : error,
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

                item: 'start'
            });
        }
    });
</script>

</html>
