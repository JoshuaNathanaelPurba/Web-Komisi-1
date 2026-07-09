@extends('public')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="text-center max-w-xl mx-auto mb-10">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-pmkBlue">Renungan Harian</h1>
            <p class="text-sm text-gray-500 mt-2">Segarkan rohanimu setiap hari melalui perenungan kebenaran firman Tuhan yang dinamis.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex justify-between text-xs text-gray-400 mb-2">
                        <span>Kamis, 09 Juli 2026</span>
                        <span class="bg-orange-50 text-pmkOrange font-bold px-2 py-0.5 rounded">Baru</span>
                    </div>
                    <h3 class="font-bold text-base sm:text-lg text-gray-900 mb-1">Berakar di Dalam Kristus</h3>
                    <p class="text-xs text-pmkBlue font-bold italic mb-3">Kolose 2:6-7</p>
                    <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed">Hendaklah hidupmu tetap di dalam Dia. Hendaklah kamu berakar di dalam Dia dan dibangun di atas Dia, bertambah teguh dalam iman yang telah diajarkan kepadamu...</p>
                </div>
                <div class="pt-4 border-t border-gray-50 mt-4 flex justify-end">
                    <a href="#" class="text-xs font-bold text-pmkBlue hover:text-pmkOrange transition">Baca Renungan Lengkap &rarr;</a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex justify-between text-xs text-gray-400 mb-2">
                        <span>Rabu, 08 Juli 2026</span>
                    </div>
                    <h3 class="font-bold text-base sm:text-lg text-gray-900 mb-1">Ketaatan yang Berbuah</h3>
                    <p class="text-xs text-pmkBlue font-bold italic mb-3">Yohanes 15:5</p>
                    <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed">Akulah pokok anggur dan kamulah ranting-rantingnya. Barangsiapa tinggal di dalam Aku dan Aku di dalam dia, ia berbuah banyak, sebab di luar Aku kamu tidak dapat berbuat apa-apa...</p>
                </div>
                <div class="pt-4 border-t border-gray-50 mt-4 flex justify-end">
                    <a href="#" class="text-xs font-bold text-pmkBlue hover:text-pmkOrange transition">Baca Renungan Lengkap &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection