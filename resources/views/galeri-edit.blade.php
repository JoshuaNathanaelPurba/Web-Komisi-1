@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Edit Foto Galeri</h1>

    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 border border-gray-200 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')
        
        <div class="flex flex-col space-y-1.5">
            <label for="judul" class="text-sm font-bold text-slate-700 uppercase tracking-wider">Judul / Keterangan Foto</label>
            <input type="text" id="judul" name="judul" required placeholder="Masukkan judul foto..."
                class="w-full text-sm border-gray-300 rounded-xl focus:ring-[#3B4197] focus:border-[#3B4197] px-4 py-2.5" 
                value="{{ old('judul', $galeri->judul) }}">
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Foto Saat Ini</label>
            <div class="w-48 h-32 rounded-xl overflow-hidden bg-gray-100 border">
                <img src="{{ asset('storage/' . $galeri->path_foto) }}" class="w-full h-full object-cover" alt="{{ $galeri->judul }}">
            </div>
        </div>

        <div class="flex flex-col space-y-1.5">
            <label for="foto_komisi" class="text-sm font-bold text-slate-700 uppercase tracking-wider">Ganti Foto (Opsional)</label>
            <input type="file" id="foto_komisi" name="foto_komisi"
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 border border-gray-300 rounded-xl p-2 focus:ring-[#3B4197] focus:border-[#3B4197]">
            <p class="text-xs text-gray-400 font-medium">Kosongkan jika tidak ingin mengganti foto saat ini.</p>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('galeri') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl transition">Batal</a>
            <button type="submit" class="bg-[#3B4197] hover:bg-blue-900 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md transition">SIMPAN PERUBAHAN</button>
        </div>
    </form>
</div>
@endsection