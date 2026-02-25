@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.admin')

@section('title' . 'Edit Users')
@section('content')
    <div class="row justify-content-center mt-3">
        <form id="edit-form" action="{{ route('updateUser', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <a href="{{ route('homeUser') }}" class="text-gray-800 hover:text-black">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>
                    <h1 class="text-sm font-bold tracking-wider text-gray-800 uppercase">Edit User</h1>
                </div>
                <button type="submit"
                    class="px-8 py-2 text-sm font-medium text-white bg-[#2D2D2A] rounded-lg hover:bg-black transition-colors">
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
                            <label for="name" class="text-sm font-medium text-gray-700"> Name</label>
                            <div class="col-md-6">
                                <input type="text"
                                    class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                    id="name" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row mt-4">
                            <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                            <div class="col-md-6">
                                <input type="text"
                                    class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                    id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row mt-4">
                            <label for="password" class="text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                placeholder="New Password">
                            @error('password')
                                <span class="text-red-500
                                text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row mt-4">
                            <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm New
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full px-4 py-3 text-sm bg-[#F9FAFB] border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300 transition-all placeholder:text-gray-400"
                                placeholder="Confirm New Password">
                        </div>

                    </div>
                </div>
        </form>
    </div>

    <script>
        window.routes = {
            homeLink: "{{ route('homeUser') }}"
        }
    </script>
@endsection
