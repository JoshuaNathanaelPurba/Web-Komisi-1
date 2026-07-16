@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Unggah Gambar Bagan Struktur</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 text-xs font-semibold">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.bagan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 border border-gray-200 rounded-2xl shadow-sm">
        @csrf
        <div class="flex flex-col space-y-1.5">
            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">File Gambar Bagan Struktur</label>
            <input type="file" name="foto_bagan" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-xs text-gray-400 mt-1">Gunakan gambar resolusi tinggi (Maksimal file 5MB).</p>
        </div>
        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('struktur') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl">Batal</a>
            <button type="submit" class="bg-[#3B4197] hover:bg-blue-900 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md">KIRIM</button>
        </div>
    </form>
</div>
@endsection