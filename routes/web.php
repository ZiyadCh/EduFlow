<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/courses', function () {
    return view('students.courses');
});

Route::get('/teacher/dashboard', function () {
    return view('teacher.courses');
});

Route::get('/teacher/course-form', function () {
    return view('teacher.new-course');
});
