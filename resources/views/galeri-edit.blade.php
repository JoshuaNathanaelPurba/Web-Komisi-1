@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Edit Foto Galeri</h1>

    <form action="{{ route('admin.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 border border-gray-200 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')
        
        {{-- Input Judul --}}
        <div class="flex flex-col space-y-1.5">
            <label for="judul" class="text-sm font-bold text-slate-700 uppercase tracking-wider">Judul / Keterangan Foto</label>
            <input type="text" id="judul" name="judul" required placeholder="Masukkan judul foto..."
                class="w-full text-sm border-gray-300 rounded-xl focus:ring-[#3B4197] focus:border-[#3B4197] px-4 py-2.5" value="{{ old('judul', $foto->judul) }}">
        </div>

        {{-- Preview Gambar Lama --}}
        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Gambar Saat Ini</label>
            <div class="w-48 h-auto bg-gray-50 rounded-xl overflow-hidden border border-gray-200 p-2">
                <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->judul }}" class="w-full h-auto object-cover rounded-lg">
            </div>
        </div>

        {{-- Input File Gambar Baru --}}
        <div class="flex flex-col space-y-1.5">
            <label for="path_foto" class="text-sm font-bold text-slate-700 uppercase tracking-wider">Ganti Gambar (Opsional)</label>
            <input type="file" id="path_foto" name="path_foto"
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 border border-gray-300 rounded-xl p-2 focus:ring-[#3B4197] focus:border-[#3B4197]">
            <p class="text-xs text-gray-400 font-medium">Kosongkan jika tidak ingin mengubah gambar. Maks. 2MB.</p>
        </div>

        {{-- Aksi --}}
        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('admin.galeri') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl transition">Batal</a>
            <button type="submit" class="bg-[#3B4197] hover:bg-blue-900 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md transition">SIMPAN PERUBAHAN</button>
        </div>
    </form>
</div>
@endsection