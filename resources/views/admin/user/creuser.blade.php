@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('content')

<div class="row justify-content-center mt-3">
    <form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <a href="{{ route ('homeUser') }}" class="text-gray-800 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg>
                </a>
                <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Add New User</h1>
            </div>
            <button type="submit" class="px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
                Submit
            </button>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">

            <div class="mb-4">
                <label class="text-sm font-semibold text-gray-800">
                    User Overview <span class="text-red-500">*</span>
                </label>
            </div>

            <div id="user-container" class="space-y-6">
                <div class="space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative">
                    <div class="mb-3 row">
                        <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

            </div>

            <button type="button" onclick="AddRow()" class="w-full mt-8 py-3 text-sm font-semibold text-white bg-[#8B8B8B] rounded-lg hover:bg-[#373737] transition-colors shadow-sm">
                Add More User
            </button>

    </form>
</div>
<script>
    let rowCount = 1;

    function AddRow() {
        const container = document.getElementById('user-container');


        const newRow = document.createElement('div');
        newRow.className = "user-row mt-6 space-y-6 border border-gray-100 rounded-xl p-6 bg-white relative";

        newRow.innerHTML = `
            <button type="button" onclick="this.parentElement.remove()" class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="users[${rowCount}][name]" placeholder="Name" 
                    class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="users[${rowCount}][email]" placeholder="Email" 
                    class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="users[${rowCount}][password]" placeholder="Password" 
                    class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400">
            </div>
        `;

        container.appendChild(newRow);
        rowCount++;
    }

</script>


@endsection