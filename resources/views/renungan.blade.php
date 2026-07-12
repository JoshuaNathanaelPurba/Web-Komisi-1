@extends('public')

@section('content')
    <div class="relative w-full overflow-hidden shadow-sm border-b border-gray-200">
        <img src="https://marketplace.canva.com/YPVy4/MAGugoYPVy4/1/tl/canva-open-bible-on-wooden-surface-MAGugoYPVy4.jpg" 
             alt="Background Renungan" 
             class="w-full h-auto object-contain block">

        <div class="absolute inset-0 bg-slate-950/50 backdrop-blur-[0.5px]"></div>
        
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 text-left">
                <span class="text-sm sm:text-lg lg:text-xl font-bold uppercase tracking-widest text-yellow-300 block mb-1 sm:mb-2">
                    Renungan
                </span>
                <h1 class="text-3xl sm:text-6xl lg:text-7xl font-black tracking-tight text-yellow-400 leading-none mb-2 sm:mb-4 drop-shadow-md">
                    PMK Daniel
                </h1>
                <p class="text-base sm:text-2xl lg:text-3xl text-yellow-100/95 font-light max-w-2xl hidden xs:block tracking-wide">
                    Renungan PMK Daniel
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10 text-left">
        
        <section class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <form action="#" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <div class="flex flex-col space-y-1.5">
                    <label for="search" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Cari Judul Renungan</label>
                    <input type="text" id="search" name="search" placeholder="Masukkan judul..." 
                           class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label for="month" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Bulan</label>
                    <select id="month" name="month" class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
                        <option value="">Semua Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="07" selected>Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label for="year" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Tahun</label>
                    <select id="year" name="year" class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
                        <option value="2026" selected>2026</option>
                        <option value="2025">2025</option>
                    </select>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label for="sort" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Urutkan Berdasarkan</label>
                    <select id="sort" name="sort" class="w-full text-sm border-gray-300 rounded-xl focus:ring-pmkBlue focus:border-pmkBlue px-4 py-2.5">
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
            </form>
        </section>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between group">
                <div>
                    <div class="h-48 bg-gray-100 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?q=80&w=400&auto=format&fit=crop" 
                             alt="Gambar Tema Renungan" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="text-xs text-gray-400 font-medium block">09 Juli 2026</span>

                        <h3 class="font-bold text-lg text-slate-900 group-hover:text-pmkBlue transition">
                            Berakar di Dalam Kristus
                        </h3>

                        <p class="text-xs font-bold text-pmkBlue italic">Kolose 2:6-7</p>
                        
                        <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed pt-1">
                            Hendaklah hidupmu tetap di dalam Dia. Hendaklah kamu berakar di dalam Dia dan dibangun di atas Dia, bertambah teguh dalam iman...
                        </p>
                    </div>
                </div>
               <div class="p-5 pt-0 border-t border-gray-50 mt-4 flex justify-end">
                    <a href="{{ route('renungan.detail') }}" class="text-xs font-bold text-pmkBlue hover:text-pmkOrange transition flex items-center gap-1">
                        Lihat Detail <span class="text-sm">&rarr;</span>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between group">
                <div>
                    <div class="h-48 bg-gray-100 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1447069387593-a5de0862481e?q=80&w=400&auto=format&fit=crop" 
                             alt="Gambar Tema Renungan" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="text-xs text-gray-400 font-medium block">08 Juli 2026</span>
                        
                        <h3 class="font-bold text-lg text-slate-900 group-hover:text-pmkBlue transition">
                            Ketaatan yang Berbuah
                        </h3>
                        
                        <p class="text-xs font-bold text-pmkBlue italic">Yohanes 15:5</p>
                        
                        <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed pt-1">
                            Akulah pokok anggur dan kamulah ranting-rantingnya. Barangsiapa tinggal di dalam Aku dan Aku di dalam dia, ia berbuah banyak...
                        </p>
                    </div>
                </div>

                <div class="p-5 pt-0 border-t border-gray-50 mt-4 flex justify-end">
                    <a href="{{ route('renungan.detail') }}" class="text-xs font-bold text-pmkBlue hover:text-pmkOrange transition flex items-center gap-1">
                        Lihat Detail <span class="text-sm">&rarr;</span>
                    </a>
                </div>
            </div>

        </section>

    </div>
@endsection