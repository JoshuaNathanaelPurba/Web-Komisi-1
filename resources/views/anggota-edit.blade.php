@extends('public')

@section('content')
<div class="bg-white max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8 text-left">
    
    <div class="border-b border-gray-100 pb-4">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Edit Anggota</h2>
        <h3 class="text-xl font-semibold text-gray-500">Komisi 1 Pembinaan</h3>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Foto Anggota</label>
                <div class="flex flex-col sm:flex-row items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    @if($anggota->foto)
                        <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto Sekarang" class="w-24 h-24 object-cover rounded-full border border-white shadow-sm">
                    @endif
                    <div class="flex-1 w-full text-center sm:text-left">
                        <input type="file" id="foto" name="foto" accept="image/*"
                               class="block w-full text-sm text-gray-900 p-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti foto.</p>
                    </div>
                </div>
                @error('foto')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" required 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('nama')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <label for="prodi_angkatan" class="block text-sm font-semibold text-gray-700">Program Studi / Angkatan</label>
                <input type="text" id="prodi_angkatan" name="prodi_angkatan" value="{{ old('prodi_angkatan', $anggota->prodi_angkatan) }}" required 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('prodi_angkatan')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('struktur') }}" class="bg-gray-100 text-gray-700 text-xs font-bold py-2 px-4 rounded-xl hover:bg-gray-200 transition">Batal</a>
                <button type="submit" class="bg-yellow-500 text-white text-xs font-bold py-2 px-4 rounded-xl shadow hover:bg-yellow-600 transition">Perbarui Data</button>
            </div>
        </form>
    </div>
</div>
@endsection