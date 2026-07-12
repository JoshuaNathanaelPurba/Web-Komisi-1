@extends('public')

@section('content')
    <div class="bg-white border-b border-gray-100 shadow-sm pt-12 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-2">
                Struktur Organisasi
            </h1>
            <p class="text-xl sm:text-2xl text-slate-600 font-medium">
                Komisi 1 Pembinaan
            </p>
        </div>
    </div>

    <div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">
        
        <section class="space-y-8 flex flex-col items-center justify-center text-center">
            <h2 class="text-2xl font-bold text-slate-900 self-start">Struktur Organisasi</h2>
            
            <div class="flex flex-col items-center w-full max-w-sm mt-4">
                
                <div class="bg-gradient-to-r from-pmkBlue to-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow-md text-sm w-60 transform hover:scale-105 transition duration-200">
                    Ketua Komisi 1
                </div>
                
                <div class="w-0.5 h-8 bg-gradient-to-b from-blue-700 to-amber-500"></div>
                
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 text-white font-bold px-6 py-3 rounded-xl shadow-md text-sm w-60 transform hover:scale-105 transition duration-200">
                    Wakil Ketua Komisi 1
                </div>

                <div class="w-0.5 h-8 bg-gradient-to-b from-orange-500 to-slate-400"></div>
                
                <div class="bg-slate-800 text-white font-bold px-6 py-3 rounded-xl shadow-md text-sm w-60 transform hover:scale-105 transition duration-200 border border-slate-700">
                    Anggota
                </div>
            </div>
        </section>

        <section class="space-y-6 text-left">
            <h2 class="text-2xl font-bold text-slate-900">Pimpinan Komisi 1</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 flex items-center gap-5">
                    <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-400 text-xs font-bold text-center border border-gray-200">
                        Gambar Ketua
                    </div>
                    <div class="space-y-0.5">
                        <p class="text-xs font-semibold text-pmkBlue uppercase tracking-wider">Ketua Komisi 1</p>
                        <h3 class="text-lg font-bold text-slate-900">[Nama Ketua Komisi 1]</h3>
                        <p class="text-sm text-gray-500">[Jurusan]'[Angkatan]</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 flex items-center gap-5">
                    <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-400 text-xs font-bold text-center border border-gray-200">
                        Gambar Wakil
                    </div>
                    <div class="space-y-0.5">
                        <p class="text-xs font-semibold text-pmkBlue uppercase tracking-wider">Wakil Ketua Komisi 1</p>
                        <h3 class="text-lg font-bold text-slate-900">[Nama Wakil Ketua Komisi 1]</h3>
                        <p class="text-sm text-gray-500">[Jurusan]'[Angkatan]</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-6 text-left">
            <h2 class="text-2xl font-bold text-slate-900">Anggota Komisi 1</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 flex flex-col space-y-3">
                    <div class="w-full h-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 font-medium text-xs border border-gray-200">
                        Foto Anggota Komisi 1
                    </div>
                    <div class="space-y-0.5">
                        <h4 class="font-bold text-sm text-slate-900">Nama Anggota {{$i}}</h4>
                        <p class="text-xs text-gray-500">[Jurusan]'[Angkatan]</p>
                    </div>
                </div>
                @endfor
            </div>
        </section>

    </div>
@endsection