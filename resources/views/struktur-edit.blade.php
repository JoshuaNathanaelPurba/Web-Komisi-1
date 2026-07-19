@extends('public')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('struktur') }}" class="text-sm font-semibold text-blue-600 hover:underline flex items-center gap-1">
                &larr; Kembali ke Struktur Organisasi
            </a>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-slate-200 p-6 sm:p-10 text-left">
            <div class="border-b pb-4 mb-6">
                <h2 class="text-2xl font-black text-slate-800">Perbarui Bagan Struktur</h2>
                <p class="text-slate-500 text-sm mt-1">Unggah file gambar bagan struktur organisasi baru untuk menggantikan yang lama.</p>
            </div>

            <!-- Form Menggunakan Method PUT -->
            <form action="{{ route('admin.bagan.update', $bagan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Tampilan Bagan Saat Ini jika ada -->
                @if($bagan->path_foto)
                    <div class="space-y-2" id="current-bagan-container">
                        <label class="text-sm font-bold text-slate-700 block">Bagan Struktur Saat Ini:</label>
                        <div class="border border-slate-200 rounded-lg p-2 bg-slate-100 max-h-60 overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('storage/' . $bagan->path_foto) }}" class="max-h-56 object-contain rounded" alt="Bagan Sekarang">
                        </div>
                    </div>
                @endif

                <!-- Input File Upload Gambar Baru -->
                <div class="space-y-2">
                    <label for="foto_bagan" class="text-sm font-bold text-slate-700 block">Unggah Gambar Bagan Baru <span class="text-red-500">*</span></label>
                    <div class="flex items-center justify-center w-full">
                        <label for="foto_bagan" class="flex flex-col items-center justify-center w-full h-36 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition">
                            <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                <svg class="w-8 h-8 mb-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mb-1 text-xs text-slate-500 font-semibold">Klik untuk memilih gambar baru</p>
                                <p class="text-[10px] text-slate-400">PNG, JPG, JPEG, GIF (Maks. 5MB)</p>
                            </div>
                            <input id="foto_bagan" name="foto_bagan" type="file" class="hidden" accept="image/*" required onchange="previewImage(event)" />
                        </label>
                    </div>

                    <!-- Wadah Preview Gambar Baru -->
                    <div id="preview-container" class="hidden mt-4">
                        <p class="text-xs text-slate-400 mb-1">Pratinjau Gambar Baru:</p>
                        <div class="border border-slate-200 rounded-lg p-2 bg-slate-50 max-h-60 overflow-hidden flex items-center justify-center">
                            <img id="image-preview" class="max-h-56 object-contain rounded">
                        </div>
                    </div>
                    @error('foto_bagan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit / Aksi -->
                <div class="flex justify-end gap-3 border-t pt-6 mt-6">
                    <a href="{{ route('struktur') }}" class="px-5 py-2 rounded-lg text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition shadow">
                        Simpan Perubahan
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
            
            // Berikan efek transparan pada foto lama sebagai indikator diganti
            const oldPhoto = document.getElementById('current-bagan-container');
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