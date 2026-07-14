@extends('public')

@section('content')
    <div class="relative w-full h-[60vh] md:h-[80vh] flex items-center justify-center overflow-hidden">

        <img src="https://marketplace.canva.com/YPVy4/MAGugoYPVy4/1/tl/canva-open-bible-on-wooden-surface-MAGugoYPVy4.jpg" class="absolute inset-0 w-full h-full object-cover" alt="Foto Alkitab">

        <div class="absolute inset-0 bg-slate-950/50 backdrop-blur-[0.5px]"></div>
        
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 text-left">
                <span class="text-sm sm:text-lg lg:text-xl font-bold uppercase tracking-widest text-yellow-300 block mb-1 sm:mb-2">
                    Renungan
                </span>
                <h1 class="text-3xl sm:text-6xl lg:text-7xl font-black tracking-tight text-yellow-400 leading-none mb-2 sm:mb-4 drop-shadow-md">
                    PMK Daniel
                </h1>
                <p class="text-base sm:text-2xl lg:text-3xl text-yellow-100/95 font-light max-w-2xl hidden xs:block tracking-wide">
                    Renungan PMK Daniel
                </p>
            </div>
        </div>
    </div>


    <div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10 text-left">
        
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-slate-800">Daftar Renungan</h2>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="flex gap-2">
                    <button class="bg-blue-600 text-white text-xs font-bold py-1.5 px-3 rounded-lg shadow">+ Tambah</button>
                    <button class="bg-yellow-500 text-white text-xs font-bold py-1.5 px-3 rounded-lg shadow">Edit</button>
                    <button class="bg-red-500 text-white text-xs font-bold py-1.5 px-3 rounded-lg shadow">Hapus</button>
                </div>
            @endif
        </div>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        </section>
    </div>
@endsection