@extends('public')

@section('content')
    <!-- Banner Utama -->
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

    <!-- Konten Utama -->
    <div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10 text-left">
        
        <div class="flex justify-between items-center border-b pb-4">
            <h2 class="text-xl font-bold text-slate-800">Daftar Renungan</h2>
            
            <!-- Tombol Tambah (Hanya untuk Admin) -->
            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.renungan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-2 px-4 rounded-lg shadow transition duration-200">
                    + Tambah Renungan
                </a>
            @endif
        </div>

        <!-- Grid Cards Renungan -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($allRenungan as $renungan)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-slate-100 flex flex-col h-full justify-between">
                    <div>
                        <!-- Foto Renungan -->
                        <div class="h-48 w-full bg-slate-100 relative">
                            @if($renungan->foto)
                                <img src="{{ asset('storage/' . $renungan->foto) }}" class="w-full h-full object-cover" alt="{{ $renungan->judul }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs bg-slate-200">Tidak ada foto</div>
                            @endif
                        </div>

                        <!-- Info Teks -->
                        <div class="p-5 space-y-2">
                            <span class="text-xs font-semibold text-slate-400 block">{{ $renungan->created_at->format('d M Y') }}</span>
                            @if($renungan->ayat_alkitab)
                                <span class="text-xs bg-yellow-100 text-yellow-800 font-medium px-2 py-0.5 rounded">{{ $renungan->ayat_alkitab }}</span>
                            @endif
                            <h3 class="text-lg font-bold text-slate-800 leading-snug">
                                <a href="{{ route('detail-renungan', $renungan->id) }}" class="hover:text-blue-600 transition">
                                    {{ $renungan->judul }}
                                </a>
                            </h3>
                            <p class="text-slate-600 text-sm line-clamp-3">
                                {{ Str::limit(strip_tags($renungan->isi), 120) }}
                            </p>
                        </div>
                    </div>

                    <!-- Tombol Aksi Admin ditaruh di bawah card -->
                    <div class="p-5 pt-0 border-t border-slate-50 mt-4">
                        <div class="flex justify-between items-center gap-2 pt-3">
                            <a href="{{ route('detail-renungan', $renungan->id) }}" class="text-xs font-bold text-blue-600 hover:underline">
                                Baca Selengkapnya &rarr;
                            </a>

                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <div class="flex gap-1.5">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.renungan.edit', $renungan->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-[10px] font-bold py-1 px-2.5 rounded shadow transition">
                                        Edit
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.renungan.destroy', $renungan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus renungan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-[10px] font-bold py-1 px-2.5 rounded shadow transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-400 bg-slate-50 rounded-xl">
                    Belum ada renungan yang diterbitkan.
                </div>
            @endforelse
        </section>
    </div>
@endsection