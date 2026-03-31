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
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 gap-4">


            <div class="flex items-center space-x-8 shrink-0">
                <div class="text-xl font-extrabold text-blue-600 tracking-tight italic">Edu Flow</div>
                <div class="hidden lg:flex space-x-4">
                        <a href="feed" class="text-blue-600 font-semibold border-b-2 border-blue-600 px-1 pt-1 text-sm">Home</a>
                        <a href="my-courses" class="text-slate-500 hover:text-blue-600 px-1 pt-1 text-sm transition">Mes Coures</a>
                        <a href="courses" class="text-slate-500 hover:text-blue-600 px-1 pt-1 text-sm transition">Coures</a>
                        <a href="saved" class="text-slate-500 hover:text-blue-600 px-1 pt-1 text-sm transition">Saved</a>
                </div>
            </div>
   <div class="flex-1 max-w-md hidden sm:block">
                <div class="relative flex">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                    </span>
                    <input
                        type="text"
                        id="searchCourse"
                        placeholder="Search courses..."
                        class="block w-full pl-9 pr-3 py-1.5 bg-gray-100 border-transparent rounded-xl text-sm placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                    >
                    <button class="block pl-9 pr-3 py-1.5 bg-gray-100 border-transparent rounded-xl text-sm placeholder-gray-500 transition" type="submit" id="searchBtn">Find</button>
                </div>
            </div>



            <div class="flex items-center space-x-4 shrink-0">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold leading-none">John Doe</p>
                    <p class="text-xs text-slate-400">Student</p>
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


