@extends('public')

@section('content')

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-2xl sm:text-3xl font-bold text-pmkBlue">Struktur Organisasi Pengurus</h1>
            <p class="text-sm text-gray-500">Komisi 1 Pembinaan PMK Daniel</p>
        </div>

        <div class="flex flex-col items-center justify-center gap-4 mb-16">
            <div class="bg-pmkBlue text-white font-bold px-6 py-3 rounded-xl shadow text-sm w-48 text-center border-b-4 border-pmkOrange">
                Ketua Komisi
            </div>
            <div class="w-0.5 h-6 bg-gray-300"></div>
            <div class="bg-pmkOrange text-white font-bold px-6 py-3 rounded-xl shadow text-sm w-48 text-center">
                Wakil Ketua
            </div>
            <div class="w-0.5 h-6 bg-gray-300"></div>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full max-w-3xl">
                <div class="bg-gray-100 text-gray-800 font-semibold p-3 rounded-lg text-center text-xs">Sekretaris</div>
                <div class="bg-gray-100 text-gray-800 font-semibold p-3 rounded-lg text-center text-xs">Bendahara</div>
                <div class="bg-gray-100 text-gray-800 font-semibold p-3 rounded-lg text-center text-xs">Divisi Acara</div>
            </div>
        </div>

        <h2 class="text-lg font-bold text-gray-800 mb-6 text-center border-b pb-2">Kenali Pengurus Kami</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @for ($i = 1; $i <= 4; $i++)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center">
                <div class="w-24 h-24 sm:w-28 sm:h-28 bg-gray-200 rounded-full mx-auto mb-4 overflow-hidden flex items-center justify-center text-gray-400 font-medium text-xs">
                    Foto Pengurus
                </div>
                <h4 class="font-bold text-sm text-gray-900">Nama Pengurus {{$i}}</h4>
                <p class="text-xs text-pmkOrange font-medium mt-1">Jabatan Inti / Staf</p>
            </div>
            @endfor
        </div>
    </div>
@endsection