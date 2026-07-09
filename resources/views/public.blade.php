<nav class="bg-[#3B4197] text-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            <div class="flex items-center space-x-3 py-2">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#3B4197] font-bold text-xs flex-shrink-0 shadow-md">
                    LOGO
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
                <a href="{{ route('beranda') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('beranda') || Request::is('/') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Beranda</a>
                <a href="{{ route('struktur') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('struktur') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Struktur</a>
                <a href="{{ route('renungan') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('renungan') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Renungan</a>
                <a href="{{ route('profil') }}" class="hover:text-orange-400 transition duration-200 {{ Request::is('profil') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : '' }}">Tentang</a>
                <a href="#" class="hover:text-orange-400 transition duration-200">Galeri</a>
            </div>

            <div class="hidden md:block">
                <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-2 rounded-full text-xs sm:text-sm shadow transition duration-300 transform hover:scale-105">
                    MASUK
                </a>
            </div>

            <div class="md:hidden flex items-center">
                <button id="hamburger-btn" class="focus:outline-none text-white hover:text-orange-400 transition duration-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#2e337a] border-t border-[#484eb5] px-4 pt-2 pb-6 space-y-3 shadow-inner">
        <a href="{{ route('beranda') }}" class="block py-2 text-sm font-medium hover:text-orange-400 transition">Beranda</a>
        <a href="{{ route('struktur') }}" class="block py-2 text-sm font-medium hover:text-orange-400 transition">Struktur</a>
        <a href="{{ route('renungan') }}" class="block py-2 text-sm font-medium hover:text-orange-400 transition">Renungan</a>
        <a href="{{ route('profil') }}" class="block py-2 text-sm font-medium hover:text-orange-400 transition">Tentang</a>
        <a href="#" class="block py-2 text-sm font-medium hover:text-orange-400 transition">Galeri</a>
        <div class="pt-2 border-t border-[#484eb5]">
            <a href="{{ route('login') }}" class="block text-center bg-orange-500 hover:bg-orange-600 py-2.5 rounded-full font-bold text-sm shadow transition">
                MASUK
            </a>
        </div>
    </div>
</nav>

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