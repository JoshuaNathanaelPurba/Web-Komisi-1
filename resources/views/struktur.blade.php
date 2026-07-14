@extends('public')

@section('content')
    <div class="bg-white border-b border-gray-100 shadow-sm pt-12 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-2">Struktur Organisasi</h1>
            <p class="text-xl sm:text-2xl text-slate-600 font-medium">Komisi 1 Pembinaan</p>
        </div>
    </div>

    <div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">

        <section class="space-y-8 flex flex-col items-center justify-center text-center">
            <div class="w-full flex justify-between items-center">
                <h2 class="text-2xl font-bold text-slate-900">Struktur Organisasi</h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                        <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                        <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                    </div>
                @endif
            </div>
            
            <div class="flex flex-col items-center w-full max-w-sm mt-4">
                <div class="bg-gradient-to-r from-pmkBlue to-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow-md text-sm w-60">Ketua Komisi 1</div>
                <div class="w-0.5 h-8 bg-gradient-to-b from-blue-700 to-amber-500"></div>
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 text-white font-bold px-6 py-3 rounded-xl shadow-md text-sm w-60">Wakil Ketua Komisi 1</div>
                <div class="w-0.5 h-8 bg-gradient-to-b from-orange-500 to-slate-400"></div>
                <div class="bg-slate-800 text-white font-bold px-6 py-3 rounded-xl shadow-md text-sm w-60 border border-slate-700">Anggota</div>
            </div>
        </section>

        <section class="space-y-6 text-left">
            <div class="w-full flex justify-between items-center">
                <h2 class="text-2xl font-bold text-slate-900">Pimpinan Komisi 1</h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                        <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                        <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                    </div>
                @endif
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl">
            </div>
        </section>

        <section class="space-y-6 text-left">
            <div class="w-full flex justify-between items-center">
                <h2 class="text-2xl font-bold text-slate-900">Anggota Komisi 1</h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                        <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                        <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            </div>
        </section>
    </div>
@endsection