 @vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layout.app') 

@section('title', 'Dashboard Admin')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, Admin!</h1>
        <p class="text-gray-500 mt-2">Dashboard kamu sudah siap digunakan.</p>
        
        {{-- <div class="mt-6">
            <a href="{{ route('produk.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Kelola Produk
            </a>
        </div> --}}
    </div>
@endsection