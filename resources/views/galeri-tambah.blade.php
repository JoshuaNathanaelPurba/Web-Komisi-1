@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Tambah Foto Galeri</h1>

    {{-- 1. PERBAIKAN: Ubah route action menjadi route simpan galeri --}}
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 border border-gray-200 rounded-2xl shadow-sm">
        @csrf
        
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-xl">
                <p class="font-bold mb-2">Terjadi kesalahan saat menyimpan data:</p>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-xl">
                {{ session('error') }}
            </div>
        @endif

        {{-- Input Judul --}}
        <div class="flex flex-col space-y-1.5">
            <label for="judul" class="text-sm font-bold text-slate-700 uppercase tracking-wider">Judul / Keterangan Foto</label>
            <input type="text" id="judul" name="judul" required placeholder="Masukkan judul foto..."
                class="w-full text-sm border-gray-300 rounded-xl focus:ring-[#3B4197] focus:border-[#3B4197] px-4 py-2.5" value="{{ old('judul') }}">
        </div>

        {{-- Input File Gambar --}}
        <div class="flex flex-col space-y-1.5">
            <label for="foto_komisi" class="text-sm font-bold text-slate-700 uppercase tracking-wider">File Gambar</label>
            {{-- 2. PERBAIKAN: Ubah name="path_foto" menjadi name="foto_komisi" agar cocok dengan controller --}}
            <input type="file" id="foto_komisi" name="foto_komisi" required
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 border border-gray-300 rounded-xl p-2 focus:ring-[#3B4197] focus:border-[#3B4197]">
            <p class="text-xs text-gray-400 font-medium">Format: JPG, JPEG, PNG, GIF (Maks. 2MB)</p>
        </div>

        {{-- Aksi --}}
        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('galeri') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl transition">Batal</a>
            <button type="submit" class="bg-[#3B4197] hover:bg-blue-900 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md transition">KIRIM</button>
        </div>
    </form>
</div>
@endsection