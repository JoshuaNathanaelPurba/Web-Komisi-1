@extends('public')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12 text-left">
    <a href="{{ route('renungan') }}" class="text-sm text-gray-500 hover:text-slate-900 font-medium inline-flex items-center gap-1 mb-6 transition">
        &larr; Kembali ke Halaman Renungan
    </a>

    @if($renungan)
        <article class="space-y-6">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                {{ $renungan->judul }}
            </h1>

            <div class="text-xs sm:text-sm text-gray-400 font-medium border-b border-gray-100 pb-4">
                Diterbitkan pada: <span class="text-gray-600">{{ $renungan->created_at->format('d F Y') }}</span>
            </div>

            @if($renungan->foto)
                <div class="w-full h-auto max-h-[450px] bg-gray-50 rounded-2xl overflow-hidden border border-gray-200 shadow-sm mb-6">
                    <img src="{{ asset('storage/' . $renungan->foto) }}" alt="{{ $renungan->judul }}" class="w-full h-full object-cover">
                </div>
            @endif

            @if($renungan->ayat_alkitab)
                <div class="bg-gray-50 border-l-4 border-[#3B4197] p-4 my-4 rounded-r-xl">
                    <p class="font-bold text-slate-700 text-sm uppercase tracking-wider mb-1">Ayat Alkitab:</p>
                    <p class="text-gray-700 italic text-base sm:text-lg">
                        {{ $renungan->ayat_alkitab }}
                    </p>
                </div>
            @endif

            <div class="text-gray-700 text-base sm:text-lg leading-relaxed text-justify whitespace-pre-line pt-2">
                {!! $renungan->isi !!}
            </div>
            
        </article>
    @else
        <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-300 text-gray-400 italic">
            Data renungan tidak ditemukan atau sudah dihapus.
        </div>
    @endif
</div>
@endsection