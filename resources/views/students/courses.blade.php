@extends('layouts.student')
<script src="{{ asset('/js/courses/courses-card.js') }}" defer></script>
<script type="module" src="{{ asset('/js/courses/show-courses.js') }}" defer></script>
<script src="{{ asset('/js/courses/search.js') }}" defer></script>

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="mb-10 text-center md:text-left">
        <h1 class="text-3xl font-black text-slate-900">Courses Disponibles</h1>
    </div>

    <div id="container" class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    </div>
</div>
@endsection
