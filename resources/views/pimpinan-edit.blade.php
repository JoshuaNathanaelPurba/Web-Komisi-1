@extends('public')

@section('content')
<div class="bg-white max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8 text-left">
    
    <div class="border-b border-gray-100 pb-4">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Edit Pimpinan</h2>
        <h3 class="text-xl font-semibold text-gray-500">Komisi 1 Pembinaan</h3>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <form action="{{ route('pimpinan.update', $pimpinan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Form Input Foto dengan Preview Foto Lama -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Foto Pimpinan</label>
                <div class="flex flex-col sm:flex-row items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    @if($pimpinan->foto)
                        <img src="{{ asset('storage/' . $pimpinan->foto) }}" alt="Foto Sekarang" class="w-24 h-24 object-cover rounded-full border border-white shadow-sm">
                    @endif
                    <div class="flex-1 w-full text-center sm:text-left">
                        <label for="foto" class="inline-block bg-white border border-gray-300 text-gray-700 text-xs font-semibold py-2 px-3 rounded-lg cursor-pointer hover:bg-gray-50 shadow-sm">
                            Ganti Foto Baru
                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/*">
                        </label>
                        <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti foto profil sekarang.</p>
                        <p id="file-chosen" class="text-xs text-green-600 font-semibold mt-1"></p>
                    </div>
                </div>
                @error('foto')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Isian Jabatan -->
            <div class="space-y-1">
                <label for="jabatan" class="block text-sm font-semibold text-gray-700">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $pimpinan->jabatan) }}" required 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('jabatan')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Isian Nama -->
            <div class="space-y-1">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $pimpinan->nama) }}" required 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('nama')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Isian Jurusan/Angkatan -->
            <div class="space-y-1">
                <label for="jurusan_angkatan" class="block text-sm font-semibold text-gray-700">Jurusan / Angkatan</label>
                <input type="text" id="jurusan_angkatan" name="jurusan_angkatan" value="{{ old('jurusan_angkatan', $pimpinan->jurusan_angkatan) }}" required 
                       class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 border">
                @error('jurusan_angkatan')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Aksi Form -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('struktur') }}" class="bg-gray-100 text-gray-700 text-xs font-bold py-2 px-4 rounded-xl hover:bg-gray-200 transition">Batal</a>
                <button type="submit" class="bg-yellow-500 text-white text-xs font-bold py-2 px-4 rounded-xl shadow hover:bg-yellow-600 transition">Perbarui Data</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('foto').addEventListener('change', function(e){
        var fileName = e.target.files[0].name;
        document.getElementById('file-chosen').innerText = "Terpilih untuk diganti: " + fileName;
    });
</script>
@endsection