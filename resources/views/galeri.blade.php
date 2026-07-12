@extends('public')

@section('content')
<div class="w-full min-h-screen bg-white font-sans">

    <div class="w-full bg-gradient-to-r from-blue-950 via-blue-900 to-indigo-950 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-12 md:py-20 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            
            <div class="space-y-2 order-2 md:order-1">
                <span class="text-sm md:text-base font-bold tracking-wider text-yellow-400 uppercase">GALERI</span>
                <h1 class="text-3xl md:text-5xl font-bold tracking-tight">Komisi 1 Pembinaan</h1>
                <p class="text-xl md:text-2xl font-medium text-gray-300">PMK Daniel</p>
            </div>

            <div class="order-1 md:order-2 flex justify-center md:justify-end">
                <div class="relative w-72 h-48 md:w-96 md:h-60 rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10 rotate-2 hover:rotate-0 transition duration-300">
                    <img src="{{ asset('images/cover-album-galeri.jpg') }}" class="w-full h-full object-cover" alt="Gambar Album Komisi 1">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-12 md:py-16 space-y-8">

            <h2 class="text-2xl font-bold text-gray-800">Galeri Foto Kegiatan Komisi 1</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white overflow-hidden group">
                    <div class="w-full h-64 overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                        <img src="{{ asset('images/kegiatan-1.jpg') }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Foto Kegiatan 1">
                    </div>
                    <div class="pt-3 text-center">
                        <p class="text-sm font-bold text-black-700 group"> Nama Foto Kegiatan 1</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden group">
                    <div class="w-full h-64 overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                        <img src="{{ asset('images/kegiatan-2.jpg') }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Foto Kegiatan 2">
                    </div>
                    <div class="pt-3 text-center">
                        <p class="text-sm font-bold text-black-700 group">Nama Foto Kegiatan 2</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden group">
                    <div class="w-full h-64 overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                        <img src="{{ asset('images/kegiatan-3.jpg') }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Foto Kegiatan 3">
                    </div>
                    <div class="pt-3 text-center">
                        <p class="text-sm font-bold text-black-700 group">Nama Foto Kegiatan 3</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden group">
                    <div class="w-full h-64 overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                        <img src="{{ asset('images/kegiatan-4.jpg') }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Foto Kegiatan 4">
                    </div>
                    <div class="pt-3 text-center">
                        <p class="text-sm font-bold text-black-700 group">Nama Foto Kegiatan 4</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden group">
                    <div class="w-full h-64 overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                        <img src="{{ asset('images/kegiatan-5.jpg') }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Foto Kegiatan 5">
                    </div>
                    <div class="pt-3 text-center">
                        <p class="text-sm font-bold text-black-700 group">Nama Foto Kegiatan 5</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden group">
                    <div class="w-full h-64 overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                        <img src="{{ asset('images/kegiatan-6.jpg') }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Foto Kegiatan 6">
                    </div>
                    <div class="pt-3 text-center">
                        <p class="text-sm font-bold text-black-700 group">Nama Foto Kegiatan 6</p>
                    </div>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection