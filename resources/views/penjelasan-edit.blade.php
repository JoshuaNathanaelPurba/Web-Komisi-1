@extends('public')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12 text-left">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Edit Penjelasan Komisi 1</h1>

    <form action="#" method="POST" class="space-y-6 bg-white p-6 border border-gray-200 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')
        <div class="flex flex-col space-y-1.5">
            <label for="konten" class="text-sm font-bold text-slate-700 uppercase tracking-wider">Form Pengisian Edit Penjelasan Komisi 1 Baru</label>
            <textarea id="konten" name="konten" rows="6" required class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">[Penjelasan komisi 1 lama yang akan diedit...]</textarea>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('beranda') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2.5 px-4 rounded-xl">Batal</a>
            <button type="submit" class="bg-[#3B4197] hover:bg-blue-900 text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-md">KIRIM</button>
        </div>
    </form>
</div>
@endsection