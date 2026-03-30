<script src="{{ asset('/js/course.js') }}" defer></script>
@extends('layouts.app')


@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="mb-10 text-center md:text-left">
        <h1 class="text-3xl font-black text-slate-900">Available Courses</h1>
        <p class="text-slate-500">Simple, transparent learning for everyone.</p>
    </div>

    <div id="container" class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    </div>
</div>
@endsection
