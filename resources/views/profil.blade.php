@extends('public')

@section('content')
<div class="w-full min-h-screen bg-white font-sans">
    <div class="relative w-full h-[60vh] md:h-[70vh] flex items-center justify-start overflow-hidden">
        <img src="{{ asset('images/foto-komisi.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="Foto Komisi 1 Pembinaan">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/80 via-blue-900/60 to-transparent"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 text-white w-full">
            <span class="text-sm md:text-base font-semibold tracking-wider text-yellow-400 uppercase">TENTANG KAMI</span>
            <h1 class="text-3xl md:text-5xl font-bold mt-2 tracking-tight">Komisi 1 Pembinaan</h1>
            <p class="text-xl md:text-2xl font-medium mt-1 text-gray-200">PMK Daniel</p>
        </div>
    </div>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-12 md:py-16 space-y-16">


            <section class="space-y-4 max-w-3xl"> 
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Penjelasan Komisi 1</h2>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2">
                            <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                            <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                            <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                        </div>
                    @endif
                </div>
                <div class="text-gray-600 leading-relaxed space-y-4 text-justify">
                    <p>Komisi 1 Pembinaan PMK Daniel berfokus pada pengembangan kerohanian...</p>
                </div>
            </section>

            <section class="space-y-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Program Kerja Komisi 1</h2>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2">
                            <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                            <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                            <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="bg-white overflow-hidden group">
                        <div class="w-full h-48 overflow-hidden rounded-xl bg-gray-200">
                            <img src="{{ asset('images/proker-'.$i.'.jpg') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="pt-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Nama Program Kerja {{$i}}</h3>
                            <p class="text-sm text-gray-600 leading-relaxed text-justify">
                                Ini adalah penjelasan mengenai program kerja...
                            </p>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>

        </div>
    </div>
</div>
@endsection