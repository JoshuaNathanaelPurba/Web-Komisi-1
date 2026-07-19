@extends('public')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb / Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('renungan') }}" class="text-sm font-semibold text-blue-600 hover:underline flex items-center gap-1">
                &larr; Kembali ke Daftar Renungan
            </a>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-slate-200 p-6 sm:p-10 text-left">
            <div class="border-b pb-4 mb-6">
                <h2 class="text-2xl font-black text-slate-800">Tambah Renungan Baru</h2>
                <p class="text-slate-500 text-sm mt-1">Tuliskan renungan firman Tuhan hari ini untuk jemaat PMK Daniel.</p>
            </div>

            <!-- Form Mulai -->
            <form action="{{ route('admin.renungan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Input Judul -->
                <div class="space-y-1">
                    <label for="judul" class="text-sm font-bold text-slate-700 block">Judul Renungan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none @error('judul') border-red-500 @enderror"
                        placeholder="Contoh: Menjadi Garam dan Terang Dunia">
                    @error('judul')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Ayat Alkitab -->
                <div class="space-y-1">
                    <label for="ayat_alkitab" class="text-sm font-bold text-slate-700 block">Ayat Alkitab <span class="text-slate-400 font-normal">(Opsional)</span></label>
                    <input type="text" name="ayat_alkitab" id="ayat_alkitab" value="{{ old('ayat_alkitab') }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                        placeholder="Contoh: Matius 5:13-16">
                </div>

                <!-- Input Isi Renungan -->
                <div class="space-y-1">
                    <label for="isi" class="text-sm font-bold text-slate-700 block">Isi Renungan <span class="text-red-500">*</span></label>
                    <textarea name="isi" id="isi" rows="8" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none @error('isi') border-red-500 @enderror"
                        placeholder="Tuliskan isi renungan secara lengkap di sini...">{{ old('isi') }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Foto/Gambar -->
                <div class="space-y-2">
                    <label for="foto" class="text-sm font-bold text-slate-700 block">Foto Utama <span class="text-slate-400 font-normal">(Opsional, Maks 2MB)</span></label>
                    <div class="flex items-center justify-center w-full">
                        <label for="foto" class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-1 text-sm text-slate-500 font-semibold">Klik untuk unggah foto</p>
                                <p class="text-xs text-slate-400">PNG, JPG, JPEG (Maks. 2MB)</p>
                            </div>
                            <input id="foto" name="foto" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" />
                        </label>
                    </div>
                    <!-- Wadah Preview Gambar -->
                    <div id="preview-container" class="hidden mt-3">
                        <p class="text-xs text-slate-400 mb-1">Preview Gambar Terpilih:</p>
                        <img id="image-preview" class="h-40 w-full object-cover rounded-lg border border-slate-200 shadow-sm">
                    </div>
                    @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end gap-3 border-t pt-6 mt-6">
                    <a href="{{ route('renungan') }}" class="px-5 py-2 rounded-lg text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition shadow">
                        Simpan Renungan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Script Javascript untuk Live Preview Gambar Bawaan -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image-preview');
            const container = document.getElementById('preview-container');
            output.src = reader.result;
            container.classList.remove('hidden');
        }
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection