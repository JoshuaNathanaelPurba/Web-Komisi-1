<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PMK Daniel</title>
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
        
        <div class="bg-[#3B4197] text-white flex flex-col items-center justify-center p-8 md:p-12 space-y-4">
            <!-- Logo PMK Daniel -->
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-[#3B4197] font-bold text-sm shadow-lg">
                LOGO
            </div>
            <div class="text-center">
                <h2 class="text-2xl md:text-3xl font-bold tracking-wider">Komisi 1 Pembinaan</h2>
                <p class="text-lg md:text-xl text-gray-200 font-medium mt-1">PMK Daniel</p>
            </div>
        </div>

        <div class="bg-[#F28E2B] text-white flex flex-col items-center justify-center p-8 md:p-16">
            <div class="w-full max-w-md bg-white/10 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-white/20">
                
                <h1 class="text-3xl font-bold text-center mb-8 tracking-wide">LOGIN</h1>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div class="flex flex-col space-y-1">
                        <label for="email" class="text-sm font-semibold text-white">Email</label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-3 rounded-xl bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B4197] transition" 
                            placeholder="Masukkan email anda">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="password" class="text-sm font-semibold text-white">Password</label>
                        <input type="password" id="password" name="password" required 
                            class="w-full px-4 py-3 rounded-xl bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B4197] transition" 
                            placeholder="Masukkan password anda">
                    </div>

                    <div class="text-sm text-right">
                        <span class="text-gray-100">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="font-bold text-[#3B4197] hover:underline ml-1">Daftar Sekarang</a>
                    </div>

                    <button type="submit" 
                        class="w-full py-3.5 mt-4 bg-[#3B4197] hover:bg-[#2d3278] text-white font-bold rounded-xl shadow-lg transition duration-200 transform hover:scale-[1.02]">
                        LOGIN
                    </button>
                </form>

            </div>
        </div>

    </div>

</body>
</html>