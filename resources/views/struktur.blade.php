@extends('public')

@section('content')
<div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16 text-left">
    
    {{-- SECTION BAGAN STRUKTUR --}}
    <section class="space-y-6">
        <div class="flex justify-between items-center border-b border-gray-100 pb-4">
            <div class="space-y-1">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Struktur Organisasi</h2>
                <h3 class="text-xl font-semibold text-gray-500">Komisi 1 Pembinaan</h3>
            </div>
            
            @if(Auth::check() && Auth::user()->role === 'admin')
                @if(!$bagan)
                    <a href="{{ route('admin.bagan.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-blue-700 transition">+ Unggah Bagan</a>
                @endif
            @endif
        </div>

        <div class="grid grid-cols-1 gap-6">
            @if($bagan)
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 flex flex-col justify-between">
                    <h3 class="text-lg font-bold text-slate-800 mb-4 border-b border-gray-50 pb-2">Struktur Organisasi Komisi 1 Pembinaan</h3>
                    
                    <div class="w-full h-auto bg-gray-50 rounded-xl overflow-hidden border border-gray-200 mb-4">
                        <img src="{{ asset('storage/' . $bagan->path_foto) }}" alt="Bagan Struktur Organisasi" class="w-full h-auto object-contain mx-auto">
                    </div>
                    
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2 justify-end pt-3 border-t border-gray-100">
                            <a href="{{ route('admin.bagan.edit', $bagan->id) }}" class="bg-yellow-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-yellow-600 transition">Ganti Gambar</a>
                            
                            <form action="{{ route('admin.bagan.destroy', $bagan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar Bagan Struktur ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            @else
                <div class="w-full h-96 bg-gray-50 rounded-2xl border border-dashed border-gray-300 flex flex-col items-center justify-center text-gray-400 font-medium text-sm space-y-2">
                    <span>Gambar bagan struktur organisasi belum ditambahkan.</span>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <span class="text-xs text-gray-500">Silakan klik tombol "+ Unggah Bagan" di atas.</span>
                    @endif
                </div>
            @endif
        </div>
    </section> 

    {{-- SECTION PIMPINAN --}}
    <section class="space-y-6">
        <div class="w-full flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-900">Pimpinan Komisi 1</h2>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="flex gap-2">
                    <a href="{{ route('pimpinan.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-blue-700 transition">+ Tambah</a>
                </div>
            @endif
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl">
            @forelse($pimpinans as $pimpinan)
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 flex flex-col justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $pimpinan->foto) }}" alt="{{ $pimpinan->nama }}" class="w-20 h-20 object-cover rounded-full border border-gray-100 shadow-inner">
                        <div class="space-y-1">
                            <h4 class="text-base font-bold text-gray-900">{{ $pimpinan->nama }}</h4>
                            <p class="text-sm font-semibold text-blue-600">{{ $pimpinan->jabatan }}</p>
                            <p class="text-xs text-gray-500">{{ $pimpinan->jurusan_angkatan }}</p>
                        </div>
                    </div>

                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2 justify-end pt-4 mt-4 border-t border-gray-50">
                            <a href="{{ route('pimpinan.edit', $pimpinan->id) }}" class="bg-yellow-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-yellow-600 transition">Edit</a>
                            
                            <form action="{{ route('pimpinan.destroy', $pimpinan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data Pimpinan ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-2 text-sm text-gray-500 italic bg-gray-50 p-4 rounded-xl border border-dashed text-center">
                    Belum ada data pimpinan komisi 1 yang ditambahkan.
                </div>
            @endforelse
        </div>
    </section>

    {{-- SECTION ANGGOTA --}}
    <section class="space-y-6">
        <div class="w-full flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-900">Anggota Komisi 1</h2>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="flex gap-2">
                    <a href="{{ route('admin.anggota.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1.5 px-3 rounded shadow hover:bg-blue-700 transition">+ Tambah</a>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($anggotas as $anggota)
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-4 flex flex-col justify-between items-center text-center">
                    <div class="space-y-3">
                        <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}" class="w-24 h-24 object-cover rounded-full border border-gray-100 shadow-inner mx-auto">
                        <div class="space-y-0.5">
                            <h4 class="text-sm font-bold text-gray-900">{{ $anggota->nama }}</h4>
                            <p class="text-xs text-gray-500">{{ $anggota->prodi_angkatan }}</p>
                        </div>
                    </div>

                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2 justify-center w-full pt-3 mt-3 border-t border-gray-50">
                            <form action="{{ route('admin.anggota.edit', $anggota->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white text-[10px] font-bold py-1 px-2.5 rounded shadow hover:bg-yellow-600 transition">Edit</button>
                            </form>

                            <form action="{{ route('admin.anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data Anggota ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white text-[10px] font-bold py-1 px-2.5 rounded shadow hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-4 text-sm text-gray-500 italic bg-gray-50 p-4 rounded-xl border border-dashed text-center w-full">
                    Belum ada data anggota komisi 1 yang ditambahkan.
                </div>
            @endforelse
        </div>
    </section>

</div> 
@endsection