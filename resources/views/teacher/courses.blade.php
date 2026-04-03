
</script>
@extends('layouts.teacher')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-black text-slate-900">Mes Cours </h1>
        <button  class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-blue-200 hover:bg-blue-700 transition">
            <a href="course-form">+ Nouveau Cours</a>

        </button>
    </div>

    <div id="container" class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        </div>
@endsection
