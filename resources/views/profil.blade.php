@extends('public')

@section('content')
<div class="w-full min-h-screen bg-white font-sans">

    <div class="relative w-full h-[60vh] md:h-[70vh] flex items-center justify-start overflow-hidden">
        
        <img src="{{ asset('images/foto-komisi.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="Foto Komisi 1 Pembinaan">

        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/80 via-blue-900/60 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 text-white w-full">
            <span class="text-sm md:text-base font-semibold tracking-wider text-yellow-400 uppercase">TENTANG KAMI</span>
            <h1 class="text-3xl md:text-5xl font-bold mt-2 tracking-tight">Komisi 1 Pembinaan</h1>
            <p class="text-xl md:text-2xl font-medium mt-1 text-gray-200">PMK Daniel</p>
        </div>
    </div>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-12 md:py-16 space-y-16">

            <section class="space-y-4 max-w-3xl"> 
                <h2 class="text-2xl font-bold text-gray-800">Penjelasan Komisi 1</h2>
                <div class="text-gray-600 leading-relaxed space-y-4 text-justify">
                    <p>
                        Komisi 1 Pembinaan PMK Daniel berfokus pada pengembangan kerohanian, multiplikasi murid, serta pembentukan karakter seluruh anggota. Melalui berbagai program terstruktur, komisi ini berkomitmen untuk menciptakan wadah bertumbuh yang sehat secara teologis dan aplikatif dalam kehidupan kampus.
                    </p>
                    <p>
                        Kami percaya bahwa pembinaan yang berakar pada Firman Tuhan akan menghasilkan pemimpin-pemimpin masa depan yang memiliki integritas tinggi dan berdampak bagi lingkungan sekitar.
                    </p>
                </div>
            </section>

            <section class="space-y-8">
                <h2 class="text-2xl font-bold text-gray-800">Program Kerja Komisi 1</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="bg-white overflow-hidden group">
                        <div class="w-full h-48 overflow-hidden rounded-xl bg-gray-200">
                            <img src="{{ asset('images/proker-1.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gambar Program Kerja 1">
                        </div>

                        <div class="pt-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Nama Program Kerja 1</h3>
                            <p class="text-sm text-gray-600 leading-relaxed text-justify">
                                Ini adalah penjelasan mengenai program kerja pertama. Menjelaskan tentang tujuan kegiatan, target pelaksanaan, serta output rohani yang ingin dicapai melalui program kerja ini.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden group">
                        <div class="w-full h-48 overflow-hidden rounded-xl bg-gray-200">
                            <img src="{{ asset('images/proker-2.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gambar Program Kerja 2">
                        </div>
                        <div class="pt-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Nama Program Kerja 2</h3>
                            <p class="text-sm text-gray-600 leading-relaxed text-justify">
                                Ini adalah penjelasan mengenai program kerja kedua. Menjelaskan secara ringkas esensi dari kegiatan pembinaan atau persekutuan yang dilaksanakan oleh Komisi 1.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden group">
                        <div class="w-full h-48 overflow-hidden rounded-xl bg-gray-200">
                            <img src="{{ asset('images/proker-3.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gambar Program Kerja 3">
                        </div>
                        <div class="pt-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Nama Program Kerja 3</h3>
                            <p class="text-sm text-gray-600 leading-relaxed text-justify">
                                Ini adalah penjelasan mengenai program kerja ketiga. Berisi detail aktivitas berkala yang menunjang pertumbuhan iman spiritual seluruh anggota PMK Daniel.
                            </p>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
@endsection