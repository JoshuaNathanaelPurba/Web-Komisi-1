<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komisi 1 Pembinaan - PMK Daniel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pmkBlue: '#3B4197',
                        pmkOrange: '#F28E2B',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 antialiased flex flex-col min-h-screen">

    <nav class="bg-[#3B4197] text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <div class="flex items-center space-x-3 py-2 z-50">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center overflow-hidden flex-shrink-0 shadow-md">
                        <img src="{{ asset('images/Logo PMK Daniel.png') }}" class="w-full h-full object-cover" alt="Logo Komisi 1">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="text-xs sm:text-sm font-bold tracking-wider leading-tight">
                            Komisi 1 Pembinaan
                        </span>
                        <span class="text-[10px] sm:text-xs text-gray-200 font-medium tracking-wide">
                            PMK Daniel
                        </span>
                    </div>
                </div>
                
                <div class="hidden md:flex space-x-6 lg:space-x-8 text-sm font-semibold tracking-wide">
                    <a href="{{ route('beranda') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('beranda') || Request::is('/') || Request::is('penjelasan*') || Request::is('sambutan*') || Request::is('foto-komisi*') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Beranda</a>

                    <a href="{{ route('struktur') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('struktur*') || Request::is('anggota*') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Struktur</a>

                    <a href="{{ route('renungan') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('renungan*') || Request::is('detail-renungan*') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Renungan</a>

                    <a href="{{ route('profil') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('profil*') || Request::is('proker*') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Tentang</a>

                    <a href="{{ route('galeri') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('galeri*') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Galeri</a>
                </div>

                <div class="hidden md:block">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold px-6 py-2 rounded-full text-xs sm:text-sm shadow transition duration-300 transform hover:scale-105">
                                KELUAR
                            </button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-2 rounded-full text-xs sm:text-sm shadow transition duration-300 transform hover:scale-105">
                            MASUK
                        </a>
                    @endguest
                </div>

                <div class="md:hidden flex items-center z-50">
                    <button id="hamburger-btn" class="focus:outline-none text-white hover:text-orange-400 transition duration-200 p-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 bg-[#3B4197] z-40 w-full h-screen flex flex-col justify-between px-8 pt-28 pb-16 overflow-y-auto">
            
            <div class="flex flex-col space-y-6 text-center text-xl font-semibold">
                <a href="{{ route('beranda') }}" class="py-2 hover:text-orange-400 transition {{ Request::is('beranda') || Request::is('/') || Request::is('penjelasan*') || Request::is('sambutan*') || Request::is('foto-komisi*') ? 'text-orange-400 font-bold' : '' }}">Beranda</a>
                <a href="{{ route('struktur') }}" class="py-2 hover:text-orange-400 transition {{ Request::is('struktur*') || Request::is('anggota*') ? 'text-orange-400 font-bold' : '' }}">Struktur</a>
                <a href="{{ route('renungan') }}" class="py-2 hover:text-orange-400 transition {{ Request::is('renungan*') || Request::is('detail-renungan*') ? 'text-orange-400 font-bold' : '' }}">Renungan</a>
                <a href="{{ route('profil') }}" class="py-2 hover:text-orange-400 transition {{ Request::is('profil*') || Request::is('proker*') ? 'text-orange-400 font-bold' : '' }}">Tentang</a>
                <a href="{{ route('galeri') }}" class="py-2 hover:text-orange-400 transition {{ Request::is('galeri*') ? 'text-orange-400 font-bold' : '' }}">Galeri</a>
            </div>

            <div class="w-full mt-12">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-center bg-red-500 hover:bg-red-600 py-4 rounded-full font-bold text-base shadow-lg transition">
                            KELUAR
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="block text-center bg-orange-500 hover:bg-orange-600 py-4 rounded-full font-bold text-base shadow-lg transition">
                        MASUK
                    </a>
                @endguest
            </div>
            
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#3B4197] text-white border-t border-[#484eb5] mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center overflow-hidden flex-shrink-0 shadow-md">
                        <img src="{{ asset('images/Logo PMK Daniel.png') }}" class="w-full h-full object-cover" alt="Logo Komisi 1">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="text-base font-bold tracking-wider leading-tight">
                            Komisi 1 Pembinaan
                        </span>
                        <span class="text-sm text-gray-300 font-medium tracking-wide">
                            PMK Daniel
                        </span>
                    </div>
                </div>

                <div class="flex flex-col space-y-2">
                    <span class="text-sm font-bold tracking-wider text-orange-400 uppercase">Pintasan</span>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <a href="{{ route('beranda') }}" class="hover:text-orange-400 transition">Beranda</a>
                        <a href="{{ route('profil') }}" class="hover:text-orange-400 transition">Tentang</a>
                        <a href="{{ route('struktur') }}" class="hover:text-orange-400 transition">Struktur</a>
                        <a href="{{ route('galeri') }}" class="hover:text-orange-400 transition">Galeri</a>
                        <a href="{{ route('renungan') }}" class="hover:text-orange-400 transition">Renungan</a>
                    </div>
                </div>

                <div class="flex flex-col space-y-3 text-sm">
                    <span class="text-sm font-bold tracking-wider text-orange-400 uppercase">Kontak Kami</span>
                    <div class="space-y-2">
                        <div class="flex flex-col">
                            <span class="font-semibold text-gray-200">Ketua Komisi 1 (Jason Manuel):</span>
                            <a href="https://wa.me/6281359151676" target="_blank" class="hover:text-orange-400 transition inline-flex items-center space-x-1">
                                <span>+62 813-5915-1676</span>
                            </a>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-semibold text-gray-200">Wakil Ketua Komisi 1 (Joshua Nathanael Purba):</span>
                            <a href="https://wa.me/6281211360972" target="_blank" class="hover:text-orange-400 transition inline-flex items-center space-x-1">
                                <span>+62 812-1136-0972</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-t border-[#484eb5] mt-8 pt-6 text-center text-xs text-gray-300">
                <p>&copy; {{ date('Y') }} Komisi 1 Pembinaan PMK Daniel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            if (mobileMenu.classList.contains('hidden')) {
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            } else {
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            }
        });
    </script>
</body>
</html>