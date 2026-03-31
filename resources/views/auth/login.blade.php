<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduFlow | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen text-slate-900">

    <div class="w-full max-w-md px-6">
        <div class="text-center mb-8">
            <div class="text-3xl font-extrabold text-blue-600 mb-2">Edu Flow</div>
        </div>

        <form action="api/v1/login" method="POST" class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-5">
            <div>
                <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Email</label>
                <input type="email" name="email" id="email" placeholder="votre@email.com"
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
            </div>

            <button type="submit"
                class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl shadow-lg shadow-blue-100 transition-all transform active:scale-[0.98]">
                Se connecter
            </button>

            <p class="text-center text-sm text-slate-500 pt-2">
                Pas encore de compte ? <a href="register" class="text-blue-600 font-bold hover:underline">S'inscrire</a>
            </p>
        </form>
    </div>

</body>
</html>

