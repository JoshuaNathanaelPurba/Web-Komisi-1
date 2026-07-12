<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - PMK Daniel</title>
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
<body class="bg-gray-100 font-sans antialiased min-h-screen flex items-center justify-center">

    <div class="w-full min-h-screen grid grid-cols-1 md:grid-cols-2 shadow-2xl overflow-hidden">
        
        <div class="bg-[#3B4197] text-white flex flex-col items-center justify-center p-8 md:p-16 order-2 md:order-1">
            <div class="w-full max-w-md bg-white/10 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-white/20">
                
                <h1 class="text-3xl font-bold text-center mb-6 tracking-wide">DAFTAR</h1>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="flex flex-col space-y-1">
                        <label for="email" class="text-sm font-semibold text-white">Email</label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-2.5 rounded-xl bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F28E2B] transition" 
                            placeholder="Masukkan email anda">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="password" class="text-sm font-semibold text-white">Password</label>
                        <input type="password" id="password" name="password" required 
                            class="w-full px-4 py-2.5 rounded-xl bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F28E2B] transition" 
                            placeholder="Buat password baru">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="password_confirmation" class="text-sm font-semibold text-white">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required 
                            class="w-full px-4 py-2.5 rounded-xl bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F28E2B] transition" 
                            placeholder="Ulangi password anda">
                    </div>

                    <div class="text-sm text-right pt-1">
                        <span class="text-gray-200">Sudah punya Akun?</span>
                        <a href="{{ route('login') }}" class="font-bold text-[#F28E2B] hover:underline ml-1">Masuk Sekarang</a>
                    </div>

                    <button type="submit" 
                        class="w-full py-3.5 mt-4 bg-[#F28E2B] hover:bg-[#d97c20] text-white font-bold rounded-xl shadow-lg transition duration-200 transform hover:scale-[1.02]">
                        DAFTAR
                    </button>
                </form>

            </div>
        </div>

        <div class="bg-[#3B4197] text-white border-b-4 border-[#484eb5] md:border-b-0 md:border-l-4 border-white/10 flex flex-col items-center justify-center p-8 md:p-12 space-y-4 order-1 md:order-2">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-[#3B4197] font-bold text-sm shadow-lg">
                LOGO
            </div>
            <div class="text-center">
                <h2 class="text-2xl md:text-3xl font-bold tracking-wider">Komisi 1 Pembinaan</h2>
                <p class="text-lg md:text-xl text-gray-200 font-medium mt-1">PMK Daniel</p>
            </div>
        </div>

    </div>

</body>
</html>