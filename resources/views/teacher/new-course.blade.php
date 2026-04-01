@extends('layouts.teacher')

@section('content')

    <div class="w-full flex justify-center px-6">
<form id="loginForm" class=" bg-white w-1/2 p-8 rounded-3xl border border-slate-200 shadow-sm space-y-5">
            <div>
                <label for="nom" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">nom</label>
                <input type="text" name="nom" id="nom"class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
            </div>

            <div>
                <label for="field" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Domaine</label>
                <input type="text" id="field"
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
            </div>

            <div>
                <label for="price" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Prix</label>
                <input type="number" id="price"
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
            </div>

            <div>
                <label for="desc" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Description</label>
                <textarea type="text" id="desc"
                    class="w-full px-4 py-3 bg-gray-100 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
                </textarea>
            </div>

            <button type="submit"
                class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl shadow-lg shadow-blue-100 transition-all transform active:scale-[0.98]">
            Confirmer
            </button>

        </form>
            </div>
@endsection
