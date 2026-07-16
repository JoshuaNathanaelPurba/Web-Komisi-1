@extends('public')

@section('content')
    <div class="bg-white text-slate-950 py-20 px-4 text-center border-b border-gray-100 shadow-sm">
        <div class="max-w-3xl mx-auto flex flex-col items-center justify-center">
            <h1 class="text-3xl sm:text-5xl font-extrabold mb-3 tracking-wide text-slate-900">Komisi 1 Pembinaan</h1>
            <p class="text-lg sm:text-2xl text-slate-600 font-light">PMK Daniel</p>
        </div>
    </div>

    <div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20 text-left">

        <section class="max-w-4xl">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Komisi 1 Pembinaan
                </h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <a href="{{ route('admin.penjelasan.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</a>
                        <a href="{{ route('admin.penjelasan.edit') }}" class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</a>
                        <form action="{{ route('admin.penjelasan.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Penjelasan Komisi 1?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>
            <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                @if($penjelasan)
                    {{ $penjelasan->konten }}
                @else
                    Belum ada penjelasan mengenai Komisi 1. Silakan tambahkan melalui menu admin.
                @endif
            </p>
        </section>

        <section class="space-y-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Sambutan Pimpinan
                </h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <a href="{{ route('admin.sambutan.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</a>
                        <a href="{{ route('admin.sambutan.edit') }}" class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</a>
                        <form action="{{ route('admin.sambutan.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sambutan Pimpinan?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 flex flex-col space-y-4">
                    <div class="flex items-center gap-5">
                        <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-400 text-xs font-bold text-center p-2 border border-gray-200 overflow-hidden">
                            @if($sambutanKetua && $sambutanKetua->foto)
                                <img src="{{ asset('storage/' . $sambutanKetua->foto) }}" alt="Foto Ketua class="w-full h-full object-cover rounded-xl">">
                            @else
                                Foto Ketua
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">{{ $sambutanKetua->nama ?? '[Nama Ketua Komisi 1]' }}</h3>
                            <p class="text-sm font-semibold text-pmkBlue uppercase tracking-wider">Ketua Komisi 1</p>
                            <p class="text-xs text-gray-400 font-medium">Periode {{ $sambutanKetua->periode ?? '2026' }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-gray-600 italic text-sm sm:text-base leading-relaxed">
                            @if($sambutanKetua)
                                "{!! $sambutanKetua->kata_sambutan !!}"
                            @else
                                "[Kata sambutan ketua komisi 1 diletakkan di bagian ini.]"
                            @endif
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 flex flex-col space-y-4">
                    <div class="flex items-center gap-5">
                        <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-400 text-xs font-bold text-center p-2 border border-gray-200 overflow-hidden">
                            @if($sambutanWakil && $sambutanWakil->foto)
                                <img src="{{ asset('storage/' . $sambutanWakil->foto) }}" alt="Foto Wakil" class="w-full h-full object-cover rounded-xl">
                            @else
                                Foto Wakil Ketua
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">{{ $sambutanWakil->nama ?? '[Nama Wakil Ketua Komisi 1]' }}</h3>
                            <p class="text-sm font-semibold text-pmkBlue uppercase tracking-wider">Wakil Ketua Komisi 1</p>
                            <p class="text-xs text-gray-400 font-medium">Periode {{ $sambutanWakil->periode ?? '2026' }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-gray-600 italic text-sm sm:text-base leading-relaxed">
                            @if($sambutanWakil)
                                "{!! $sambutanWakil->kata_sambutan !!}"
                            @else
                                "[Kata sambutan wakil ketua komisi 1 diletakkan di bagian ini...]"
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Program Kerja
                </h2>
                {{-- Di atas judul cukup sisakan tombol "+ Tambah" saja karena belum memilih data tertentu --}}
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <a href="{{ route('admin.proker.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</a>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @forelse($prokers as $proker)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 group flex flex-col justify-between">
                        <div>
                            {{-- Menampilkan Gambar Proker Secara Dinamis --}}
                            <div class="h-48 bg-gray-100 flex items-center justify-center border-b border-gray-200 overflow-hidden">
                                @if($proker->foto_proker)
                                    <img src="{{ asset('storage/' . $proker->foto_proker) }}" alt="{{ $proker->nama_proker }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-gray-400 font-bold text-sm">[Tidak Ada Gambar]</span>
                                @endif
                            </div>
                            
                            <div class="p-5">
                                {{-- Menampilkan Nama Proker --}}
                                <h4 class="font-bold text-gray-900 group-hover:text-pmkBlue transition mb-2 text-lg">
                                    {{ $proker->nama_proker }}
                                </h4>
                                {{-- Menampilkan Penjelasan Proker --}}
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $proker->penjelasan_proker }}
                                </p>
                            </div>
                        </div>

                        {{-- PINDAHKAN TOMBOL EDIT & HAPUS KE SINI (DENGAN MENAMBAHKAN PARAMETER ID) --}}
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <div class="px-5 pb-5 pt-2 flex justify-end gap-2 border-t border-gray-50 bg-gray-50/50">
                                {{-- Tombol Edit dengan Parameter ID --}}
                                <a href="{{ route('admin.proker.edit', $proker->id) }}" class="bg-yellow-500 text-white text-xs font-bold py-1.5 px-3 rounded-lg shadow hover:bg-yellow-600 transition">
                                    Edit
                                </a>

                                {{-- Form Hapus dengan Parameter ID --}}
                                <form action="{{ route('admin.proker.destroy', $proker->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Program Kerja ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1.5 px-3 rounded-lg shadow hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full bg-gray-50 border border-dashed border-gray-300 rounded-xl p-8 text-center text-gray-500">
                        Belum ada program kerja yang ditambahkan. Silakan klik tombol "+ Tambah" di atas untuk menambahkan.
                    </div>
                @endforelse

            </div>
        </section>

        <section class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Foto Komisi 1
                </h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <a href="{{ route('admin.foto.create') }}" class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</a>
                    </div>
                @endif
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($fotos ?? [] as $foto)
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-4 flex flex-col justify-between">
                        <div class="w-full h-48 md:h-64 bg-gray-100 rounded-xl overflow-hidden border border-gray-200 mb-3">
                            <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover">
                        </div>
                        <h4 class="text-sm font-bold text-gray-800 mb-2 px-1">{{ $foto->judul }}</h4>
                        
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <div class="flex gap-2 justify-end pt-2 border-t border-gray-50">
                                <a href="{{ route('admin.foto.edit', $foto->id) }}" class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</a>
                                <form action="{{ route('admin.foto.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Foto Komisi 1?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full w-full h-64 bg-gray-100 rounded-2xl border border-gray-200 flex items-center justify-center text-gray-400 font-bold text-sm">
                        Belum ada foto komisi yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </section>

    </div>
@endsection