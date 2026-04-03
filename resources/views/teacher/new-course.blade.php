@extends('layouts.teacher')
@section('content')

<script type="module" src="{{ asset('js/courses/create-course.js') }}" defer></script>

    <div class="w-full flex justify-center px-4 py-8 sm:px-6 lg:px-8">

        <form id="courseForm" class="bg-white w-full sm:w-10/12 md:w-8/12 lg:w-1/2 p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-5">

            <h2 class="text-xl font-black text-slate-800 mb-2 px-1">Créer un nouveau cours</h2>

            <div>
                <label for="name" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nom du cours</label>
                <input type="text" name="name" id="name" placeholder="ex: Laravel Mastery" required
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="field" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Domaine</label>
                    <input type="text" name="field" id="field" placeholder="ex: Développement" required
                        class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
                </div>
                <div>
                    <label for="price" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Prix (DH)</label>
                    <input type="number" name="price" id="price" required step="0.01" min="0" placeholder="0.00"
                        class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
                </div>
            </div>

            <div>
                <label for="desc" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Description</label>
                <textarea name="desc" id="desc" required rows="4" placeholder="Décrivez le contenu du cours..."
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none"></textarea>
            </div>

            <button type="submit"
                class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl shadow-lg shadow-blue-100 transition-all transform active:scale-[0.98] mt-4">
                Confirmer la création
            </button>
        </form>
    </div>
@endsection
