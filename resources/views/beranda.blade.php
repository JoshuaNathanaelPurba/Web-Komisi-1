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
                        <form action="#" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Penjelasan Komisi 1?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>
            <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                [Penjelasan komisi 1 berada di sini. Bagian ini menjelaskan fokus utama komisi dalam melakukan pembinaan rohani, pengembangan karakter, serta program spiritualitas yang dirancang untuk mendukung seluruh fungsionaris maupun jemaat.]
            </p>
        </section>

        <section class="space-y-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Sambutan Pimpinan
                </h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                        <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                        <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 flex flex-col space-y-4">
                    <div class="flex items-center gap-5">
                        <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-400 text-xs font-bold text-center p-2 border border-gray-200">
                            Foto Ketua
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">[Nama Ketua Komisi 1]</h3>
                            <p class="text-sm font-semibold text-pmkBlue uppercase tracking-wider">Ketua Komisi 1</p>
                            <p class="text-xs text-gray-400 font-medium">Periode 2026</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-gray-600 italic text-sm sm:text-base leading-relaxed">
                            "[Kata sambutan ketua komisi 1 diletakkan di bagian ini. Berisi pesan, visi pelayanan, serta kalimat hangat penyambutan.]"
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 flex flex-col space-y-4">
                    <div class="flex items-center gap-5">
                        <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-400 text-xs font-bold text-center p-2 border border-gray-200">
                            Foto Wakil Ketua
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">[Nama Wakil Ketua Komisi 1]</h3>
                            <p class="text-sm font-semibold text-pmkBlue uppercase tracking-wider">Wakil Ketua Komisi 1</p>
                            <p class="text-xs text-gray-400 font-medium">Periode 2026</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-gray-600 italic text-sm sm:text-base leading-relaxed">
                            "[Kata sambutan wakil ketua komisi 1 diletakkan di bagian ini...]"
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
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                        <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                        <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 group">
                    <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400 font-bold text-sm border-b border-gray-200">
                        [Gambar Proker]
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-gray-900 group-hover:text-pmkBlue transition mb-2 text-lg">
                            [Nama Proker]
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            [Penjelasan mengenai program kerja. Berisi rincian agenda, esensi, dan tujuan utama diadakannya kegiatan pembinaan tersebut.]
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Foto Komisi 1
                </h2>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white text-xs font-bold py-1 px-2.5 rounded shadow">+ Tambah</button>
                        <button class="bg-yellow-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Edit</button>
                        <button class="bg-red-500 text-white text-xs font-bold py-1 px-2.5 rounded shadow">Hapus</button>
                    </div>
                @endif
            </div>
            <div class="w-full h-64 md:h-96 bg-gray-100 rounded-2xl border border-gray-200 flex items-center justify-center text-gray-400 font-bold text-sm">
                [Gambar Foto Komisi 1]
            </div>
        </section>

    </div>
@endsection