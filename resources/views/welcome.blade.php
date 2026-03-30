@extends('layouts.app')

@php
    $courses = [
        (object)['title' => 'Mastering Laravel 11', 'teacher' => 'Taylor Otwell', 'price' => 49.99],
        (object)['title' => 'Advanced UI Components', 'teacher' => 'Adam Wathan', 'price' => 29.00],
        (object)['title' => 'Database Design Pro', 'teacher' => 'Aaron Francis', 'price' => 55.50],
        (object)['title' => 'React Native Mastery', 'teacher' => 'Dan Abramov', 'price' => 19.99],
        (object)['title' => 'Serverless Functions', 'teacher' => 'Sarah Drasner', 'price' => 35.00],
    ];
@endphp

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
