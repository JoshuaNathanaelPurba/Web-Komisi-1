@extends('public')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-6">
            <a href="{{ route('renungan') }}" class="text-sm font-semibold text-blue-600 hover:underline flex items-center gap-1">
                &larr; Kembali ke Daftar Renungan
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-slate-200 p-6 sm:p-10 text-left">
            <div class="border-b pb-4 mb-6">
                <h2 class="text-2xl font-black text-slate-800">Edit Renungan</h2>
                <p class="text-slate-500 text-sm mt-1">Lakukan perubahan pada data renungan yang dipilih.</p>
            </div>

            <form action="{{ route('admin.renungan.update', $renungan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-1">
                    <label for="judul" class="text-sm font-bold text-slate-700 block">Judul Renungan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $renungan->judul) }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none @error('judul') border-red-500 @enderror">
                    @error('judul')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="ayat_alkitab" class="text-sm font-bold text-slate-700 block">Ayat Alkitab <span class="text-slate-400 font-normal">(Opsional)</span></label>
                    <input type="text" name="ayat_alkitab" id="ayat_alkitab" value="{{ old('ayat_alkitab', $renungan->ayat_alkitab) }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">
                </div>

                <div class="space-y-1">
                    <label for="isi" class="text-sm font-bold text-slate-700 block">Isi Renungan <span class="text-red-500">*</span></label>
                    <textarea name="isi" id="isi" rows="8" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none @error('isi') border-red-500 @enderror">{{ old('isi', $renungan->isi) }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-3">
                    <label for="foto" class="text-sm font-bold text-slate-700 block">Ubah Foto <span class="text-slate-400 font-normal">(Biarkan kosong jika tidak ingin mengganti)</span></label>
                    
                    @if($renungan->foto)
                        <div class="mb-2" id="current-photo-container">
                            <p class="text-xs text-slate-400 mb-1">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $renungan->foto) }}" class="h-36 w-full object-cover rounded-lg border border-slate-200">
                        </div>
                    @endif

                    <div class="flex items-center justify-center w-full">
                        <label for="foto" class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition">
                            <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                <svg class="w-6 h-6 mb-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mb-0.5 text-xs text-slate-500 font-semibold">Pilih file baru untuk mengganti</p>
                                <p class="text-[10px] text-slate-400">PNG, JPG, JPEG (Maks. 2MB)</p>
                            </div>
                            <input id="foto" name="foto" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" />
                        </label>
                    </div>

                    <div id="preview-container" class="hidden mt-3">
                        <p class="text-xs text-slate-400 mb-1">Preview Gambar Baru:</p>
                        <img id="image-preview" class="h-36 w-full object-cover rounded-lg border border-slate-200 shadow-sm">
                    </div>
                    @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 border-t pt-6 mt-6">
                    <a href="{{ route('renungan') }}" class="px-5 py-2 rounded-lg text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-lg text-sm font-bold text-white bg-yellow-500 hover:bg-yellow-600 transition shadow">
                        Perbarui Renungan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image-preview');
            const container = document.getElementById('preview-container');
            output.src = reader.result;
            container.classList.remove('hidden');
            
            // Sembunyikan foto lama jika sedang melihat pratinjau baru
            const oldPhoto = document.getElementById('current-photo-container');
            if (oldPhoto) {
                oldPhoto.classList.add('opacity-40');
            }
        }
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection