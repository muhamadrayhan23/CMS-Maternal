@extends('layout.guest')

@section('content')


<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-2xl font-bold tracking-[0.2em] mb-12 uppercase">
            Explore Link
        </h2>

        <div class="flex overflow-x-auto gap-8 pb-10 hide-scroll-bar snap-x snap-mandatory">
{{-- --- instagram --- --}}
            <a href="https://instagram.com/akun_kamu" target="_blank" class="flex-none w-[300px] snap-center group">
    <div class="flex items-center gap-3 mb-4">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" class="w-6 h-6" alt="IG">
        <span class="font-semibold text-lg group-hover:text-blue-600 transition">Instagram</span>
    </div>

    <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-md group-hover:shadow-xl transition-all duration-300">
        <img src="{{ asset('img/linktree/instagram.jpeg') }}" alt="Preview" class="w-full h-auto object-cover">
    </div>
</a>

{{-- --- Shopee --- --}}
<a href="https://shopee.co.id/nama_tokomu" target="_blank" class="flex-none w-[300px] snap-center group">

    <div class="flex items-center gap-3 mb-4">
      <div class="flex items-center gap-3 mb-4">
          <img src="{{ asset('img/linktree/logo/shopee-logo.png') }}" class="w-8 h-8 object-contain" alt="Logo">
     </div>
        <span class="font-bold text-lg group-hover:text-[#EE4D2D] transition-colors duration-300">Shopee</span>
    </div>

    <div class="rounded-2xl overflow-hidden border-2 border-transparent shadow-md group-hover:border-[#EE4D2D] group-hover:shadow-orange-100 transition-all duration-300">
        <img src="{{ asset('img/linktree/instagram.jpeg') }}"
             alt="Shopee Preview"
             class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500">
    </div>

</a>
            </div>
    </div>
</section>

@endsection
