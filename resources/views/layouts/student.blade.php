<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlatform Mockup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-slate-900">
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <div class="text-xl font-extrabold text-blue-600 tracking-tight italic">Edu Flow</div>
                    <div class="hidden md:flex space-x-4">
                        <a href="#" class="text-blue-600 font-semibold border-b-2 border-blue-600 px-1 pt-1 text-sm">Dashboard</a>
                        <a href="#" class="text-slate-500 hover:text-blue-600 px-1 pt-1 text-sm transition">Saved</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-bold leading-none">John Doe</p>
                        <p class="text-xs text-slate-400">Student Account</p>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-slate-900 flex items-center justify-center text-white font-bold shadow-lg">JD</div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>
</body>
</html>
