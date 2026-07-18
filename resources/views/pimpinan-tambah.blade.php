@extends('public')

@section('content')
<div class="bg-white max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8 text-left">
    
    <div class="border-b border-gray-100 pb-4">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Tambah Pimpinan</h2>
        <h3 class="text-xl font-semibold text-gray-500">Komisi 1 Pembinaan</h3>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <form action="{{ route('pimpinan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Form Input Foto (Standard Choose File) -->
            <div class="space-y-1">
                <label for="foto" class="block text-sm font-semibold text-gray-700">Foto Pimpinan</label>
                <input type="file" id="foto" name="foto" required accept="image/*"
                       class="block w-full text-sm text-gray-500 mt-1
                              file:mr-4 file:py-2.5 file:px-4
                              file:rounded-xl file:border-0
                              file:text-xs file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              file:cursor-pointer hover:file:bg-blue-100
                              border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <p class="text-xs text-gray-400 mt-1">Format: PNG, JPG, JPEG (Maks. 2MB)</p>
                @error('foto')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Isian Jabatan -->
            <div class="space-y-1">
                <label for="jabatan" class="block text-sm font-semibold text-gray-700">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Contoh: Ketua Komisi 1" 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('jabatan')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Isian Nama -->
            <div class="space-y-1">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap pimpinan" 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('nama')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Isian Jurusan/Angkatan -->
            <div class="space-y-1">
                <label for="jurusan_angkatan" class="block text-sm font-semibold text-gray-700">Jurusan / Angkatan</label>
                <input type="text" id="jurusan_angkatan" name="jurusan_angkatan" value="{{ old('jurusan_angkatan') }}" required placeholder="Contoh: Teknik Informatika / 2024" 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('jurusan_angkatan')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Aksi Form -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('struktur') }}" class="bg-gray-100 text-gray-700 text-xs font-bold py-2 px-4 rounded-xl hover:bg-gray-200 transition">Batal</a>
                <button type="submit" class="bg-blue-600 text-white text-xs font-bold py-2 px-4 rounded-xl shadow hover:bg-blue-700 transition">Simpan Pimpinan</button>
            </div>
        </form>
    </div>
</div>
@endsection