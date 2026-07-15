@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Tambah Kata Sambutan Pimpinan</h1>

    <form action="{{ route('admin.sambutan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 border border-gray-200 rounded-2xl shadow-sm">
        @csrf

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form untuk Mengambil Foto</label>
            <input type="file" name="foto" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-pmkBlue hover:file:bg-blue-100">
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Nama</label>
            <input type="text" name="nama" required placeholder="Masukkan nama..." class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Jabatan</label>
            <select name="jabatan" required class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5 bg-white">
                <option value="" disabled selected>-- Pilih Jabatan --</option>
                <option value="Ketua Komisi 1">Ketua Komisi 1</option>
                <option value="Wakil Ketua Komisi 1">Wakil Ketua Komisi 1</option>
            </select>
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Periode</label>
            <input type="text" name="periode" required placeholder="Masukkan periode (Contoh: 2026)..." class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
        </div>

        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Kata Sambutan</label>
            <textarea name="kata_sambutan" rows="5" required placeholder="Masukkan kalimat kata sambutan..." class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5"></textarea>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('beranda') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl">Batal</a>
            <button type="submit" class="bg-[#F28E2B] hover:bg-orange-600 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md">KIRIM</button>
        </div>
    </form>
</div>
@endsection