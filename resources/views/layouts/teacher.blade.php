<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Flow | Teacher Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/auth/user.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-slate-900">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <div class="flex items-center">
                    <div class="text-xl font-extrabold text-blue-600 tracking-tight ">Edu Flow</div>
                    <span class="ml-3 px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase rounded-md tracking-wider">Teacher Panel</span>
                </div>

                <div class="flex items-center space-x-6">

                    <div class="flex items-center space-x-3 shrink-0">
                        <div class="text-right hidden sm:block">
                            <p id="username" class="text-sm font-bold leading-none italic">loading...</p>
                            <p id="userrole" class="text-xs text-slate-400">Enseignant</p>
                        </div>
                    </div>

                    <button onclick="logout()" class="text-xs font-bold text-slate-400 hover:text-red-500 transition border-l pl-6 border-slate-200">
                        Déconnexion
                    </button>
                </div>

            </div>
        </div>
    </nav>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <script>
        function logout() {
            localStorage.removeItem("token");
            window.location.href = "/login";
        }
    </script>
</body>
</html>
