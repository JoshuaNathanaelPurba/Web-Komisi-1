@extends('public')

@section('content')
<div class="w-full min-h-screen bg-white font-sans">
    <!-- Hero Section (Tetap Dipertahankan Sesuai Aslinya) -->
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

            <!-- ================= SECTION PENJELASAN KOMISI 1 ================= -->
            <section class="space-y-4 max-w-3xl"> 
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Penjelasan Komisi 1</h2>
                    
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2">
                            @if(!$penjelasan)
                                <!-- Jika data penjelasan belum ada di DB -->
                                <a href="{{ route('admin.penjelasan.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow hover:bg-blue-700 transition">
                                    + Tambah
                                </a>
                            @else
                                <!-- Jika data penjelasan sudah ada, tampilkan Edit & Hapus -->
                                <a href="{{ route('admin.penjelasan.edit') }}" class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.penjelasan.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penjelasan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
                </div>
                
                <div class="text-gray-600 leading-relaxed space-y-4 text-justify whitespace-pre-line">
                    @if($penjelasan)
                        <p>{{ $penjelasan->konten }}</p>
                    @else
                        <p class="text-gray-400 italic">Belum ada penjelasan mengenai Komisi 1.</p>
                    @endif
                </div>
            </section>

            <!-- ================= SECTION PROGRAM KERJA KOMISI 1 ================= -->
            <section class="space-y-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Program Kerja Komisi 1</h2>
                    
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex gap-2">
                            <a href="{{ route('admin.proker.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow hover:bg-blue-700 transition">
                                + Tambah
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Grid Data Proker Dinamis -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($prokers as $proker)
                    <div class="bg-white overflow-hidden group flex flex-col justify-between h-full">
                        <div>
                            <!-- Foto Proker -->
                            <div class="w-full h-48 overflow-hidden rounded-xl bg-gray-200 border border-gray-100 shadow-sm">
                                @if($proker->foto_proker)
                                    <img src="{{ asset('storage/' . $proker->foto_proker) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" alt="{{ $proker->nama_proker }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">Tidak ada foto proker</div>
                                @endif
                            </div>
                            <!-- Detail Info Konten -->
                            <div class="pt-4">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $proker->nama_proker }}</h3>
                                <p class="text-sm text-gray-600 leading-relaxed text-justify">
                                    {{ $proker->penjelasan_proker }}
                                </p>
                            </div>
                        </div>

                        <!-- Aksi Edit & Hapus khusus Admin ditaruh per item proker di bagian bawah kartu -->
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <div class="flex gap-2 border-t border-gray-100 pt-3 mt-4">
                                <a href="{{ route('admin.proker.edit', $proker->id) }}" class="bg-yellow-500 text-white text-[10px] font-bold py-1 px-2.5 rounded shadow hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.proker.destroy', $proker->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program kerja ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white text-[10px] font-bold py-1 px-2.5 rounded shadow hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    @empty
                        <div class="col-span-full text-center py-6 text-gray-400 italic bg-gray-50 rounded-xl border border-dashed">
                            Belum ada program kerja yang ditambahkan.
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </div>
</div>
@endsection