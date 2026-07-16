@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Edit Program Kerja Komisi 1</h1>

    <form action="{{ route('admin.proker.update', $proker->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 ...">
        @csrf
        @method('PUT')

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Ganti Foto Program Kerja</label>
            <input type="file" name="foto_proker" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-pmkBlue hover:file:bg-blue-100">
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Nama Program Kerja</label>
            {{-- UBAH VALUE MENJADI DINAMIS --}}
            <input type="text" name="nama_proker" value="{{ old('nama_proker', $proker->nama_proker) }}" required class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Penjelasan Program Kerja</label>
            {{-- UBAH ISI TEXTAREA MENJADI DINAMIS --}}
            <textarea name="penjelasan_proker" rows="5" required class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">{{ old('penjelasan_proker', $proker->penjelasan_proker) }}</textarea>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('beranda') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl">Batal</a>
            <button type="submit" class="bg-[#F28E2B] hover:bg-orange-600 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md">KIRIM</button>
        </div>
    </form>
</div>
@endsection