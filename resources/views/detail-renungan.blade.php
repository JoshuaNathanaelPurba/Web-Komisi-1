@extends('public')

@section('content')
    <div class="bg-white max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-left space-y-8">

        <div class="space-y-2">
            <span class="text-xs font-bold uppercase tracking-widest text-pmkBlue block">Renungan</span>
            <div class="text-xs text-gray-400 font-medium">
                Kamis, 09 Juli 2026
            </div>
        </div>

        <div class="w-full aspect-video sm:h-[400px] bg-gray-100 rounded-2xl overflow-hidden border border-gray-200 shadow-sm">
            <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?q=80&w=1200&auto=format&fit=crop" 
                 alt="Gambar Tema Renungan" class="w-full h-full object-cover">
        </div>

        <div class="space-y-2 border-b border-gray-100 pb-6 flex justify-between items-end">
            <div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Berakar di Dalam Kristus
                </h1>
                <p class="text-base font-bold text-pmkBlue italic mt-1">
                    Kolose 2:6-7
                </p>
            </div>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="flex gap-2">
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-bold py-2 px-4 rounded-xl shadow-sm">Edit</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-2 px-4 rounded-xl shadow-sm">Hapus</button>
                </div>
            @endif
        </div>

        <article class="prose max-w-none text-gray-700 text-base sm:text-lg leading-relaxed space-y-6">
            <p>
                "Hendaklah hidupmu tetap di dalam Dia. Hendaklah kamu berakar di dalam Dia dan dibangun di atas Dia, bertambah teguh dalam iman yang telah diajarkan kepadamu, dan hendaklah hatimu melimpah dengan syukur."
            </p>
            <p>
                [Bagian ini berisi seluruh penjelasan ayat dan isi renungan secara lengkap.]
            </p>
        </article>

        <div class="pt-6 border-t border-gray-100 flex justify-start">
            <a href="{{ route('renungan') }}" class="text-sm font-bold text-pmkBlue hover:text-pmkOrange transition flex items-center gap-2">
                &larr; Kembali ke Daftar    
            </a>
        </div>

    </div>
@endsection