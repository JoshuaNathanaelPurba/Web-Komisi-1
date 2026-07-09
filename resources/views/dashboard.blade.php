@extends('public')

@section('content')
    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 bg-pmkBlue text-white p-6 rounded-2xl shadow-md">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold tracking-wide">Kontrol Admin Komisi 1</h1>
                <p class="text-xs text-blue-200 mt-1">Kelola publikasi konten renungan, data pengurus, dan dokumentasi aktivitas.</p>
            </div>
            <button class="bg-pmkOrange text-white text-xs font-bold px-4 py-2.5 rounded-lg shadow hover:bg-opacity-95 transition">
                + Tambah Konten Baru
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-5 border-b border-gray-100">
                <h3 class="font-bold text-gray-800 text-sm sm:text-base">Daftar Konten Aktif</h3>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 font-semibold">
                            <th class="p-4">No</th>
                            <th class="p-4">Judul Konten</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Tanggal Rilis</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-gray-700">
                        <tr>
                            <td class="p-4 font-medium">1</td>
                            <td class="p-4 font-semibold text-gray-900">Berakar di Dalam Kristus</td>
                            <td class="p-4"><span class="px-2 py-0.5 bg-blue-50 text-pmkBlue rounded text-xs font-medium">Renungan</span></td>
                            <td class="p-4">09 Jul 2026</td>
                            <td class="p-4"><span class="text-xs font-bold text-green-600 flex items-center gap-1">● Terbit</span></td>
                            <td class="p-4 text-center space-x-2">
                                <button class="text-pmkBlue hover:underline font-medium">Edit</button>
                                <button class="text-red-500 hover:underline font-medium">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-medium">2</td>
                            <td class="p-4 font-semibold text-gray-900">Camp Pembinaan Iman Kelompok 1</td>
                            <td class="p-4"><span class="px-2 py-0.5 bg-orange-50 text-pmkOrange rounded text-xs font-medium">Kegiatan</span></td>
                            <td class="p-4">12 Mar 2026</td>
                            <td class="p-4"><span class="text-xs font-bold text-green-600 flex items-center gap-1">● Terbit</span></td>
                            <td class="p-4 text-center space-x-2">
                                <button class="text-pmkBlue hover:underline font-medium">Edit</button>
                                <button class="text-red-500 hover:underline font-medium">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection