<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK Daniel - Komisi 1 Pembinaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans flex flex-col min-h-screen">

    <nav class="bg-pmkBlue text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pmkBlue font-bold text-xs">
                        LOGO
                    </div>
                    <span class="font-bold text-sm sm:text-base tracking-wide">PMK Daniel Komisi 1</span>
                </div>

                <div class="hidden md:flex space-x-6 text-sm font-medium">
                    <a href="/beranda" class="hover:text-pmkOrange transition">Beranda</a>
                    <a href="/profil" class="hover:text-pmkOrange transition">Profil & Visi Misi</a>
                    <a href="/struktur" class="hover:text-pmkOrange transition">Struktur Organisasi</a>
                    <a href="/renungan" class="hover:text-pmkOrange transition">Renungan</a>
                </div>

                <div class="hidden md:block">
                    <a href="{{ route('login') }}" class="bg-pmkOrange hover:bg-opacity-95 text-white font-bold px-5 py-2 rounded-full text-xs shadow transition">
                        MASUK
                    </a>
                </div>

                <div class="md:hidden">
                    <button id="menu-btn" class="focus:outline-none text-white hover:text-pmkOrange">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-pmkBlue border-t border-blue-800 px-4 pt-2 pb-4 space-y-2">
            <a href="/beranda" class="block py-2 text-sm hover:text-pmkOrange">Beranda</a>
            <a href="/profil" class="block py-2 text-sm hover:text-pmkOrange">Profil & Visi Misi</a>
            <a href="/struktur" class="block py-2 text-sm hover:text-pmkOrange">Struktur Organisasi</a>
            <a href="/renungan" class="block py-2 text-sm hover:text-pmkOrange">Renungan</a>
            <div class="pt-2">
                <a href="{{ route('login') }}" class="block text-center bg-pmkOrange py-2 rounded-full font-bold text-sm">MASUK</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="bg-pmkBlue text-white border-t-4 border-pmkOrange py-8 px-4 mt-12 text-xs md:text-sm">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h4 class="font-bold text-base mb-2">Komisi 1 Pembinaan PMK Daniel</h4>
                <p class="text-gray-300 leading-relaxed">Wadah pembinaan rohani mahasiswa Kristen untuk bertumbuh, berakar, dan berbuah di dalam iman.</p>
            </div>
            <div>
                <h4 class="font-bold text-base mb-2">Tautan Cepat</h4>
                <ul class="space-y-1 text-gray-300">
                    <li><a href="/profil" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="/renungan" class="hover:underline">Renungan Harian</a></li>
                    <li><a href="/struktur" class="hover:underline">Pengurus Komisi</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-base mb-2">Kontak Kami</h4>
                <p class="text-gray-300">Email: info@pmkdaniel.org</p>
                <p class="text-gray-300">Instagram: @pmkdaniel_komisi1</p>
            </div>
        </div>
        <div class="text-center text-gray-400 mt-8 pt-4 border-t border-blue-800">
            &copy; {{ date('Y') }} Komisi 1 PMK Daniel. All Rights Reserved.
        </div>
    </footer>

    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>