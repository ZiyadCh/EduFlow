<?php

use App\Http\Controllers\API\V1\AuthController as V1AuthController;
use App\Http\Controllers\API\V1\CourseController as V1CourseController;
use App\Http\Controllers\API\V1\GroupController as V1GroupController;
use App\Http\Controllers\API\V1\InterestController;
use App\Http\Controllers\API\V1\StudentController;
use App\Http\Middleware\IsStudent;
use App\Http\Middleware\IsTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::post('/register', [V1AuthController::class,'register']);
    Route::post('/login', [V1AuthController::class,'login']);
    Route::get('/logout', [V1AuthController::class,'logout']);

    Route::middleware('auth:api')->get('/user', function () {
        return auth('api')->user();
    });


    Route::apiResource('courses', V1CourseController::class)->only(['index', 'show']);

    Route::middleware(['auth:api',IsTeacher::class])->group(function () {
        Route::apiResource('courses', V1CourseController::class)->except(['index', 'show']);
    });

    Route::middleware(['auth:api',IsStudent::class])->group(function () {
        Route::post('/enroll/{course_id}', [StudentController::class,'enroll']);
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::apiResource('groups', V1GroupController::class);
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::post('favorite/{course}', [StudentController::class,'favorite'])->name('favorite');
        Route::get('favorites', [StudentController::class,'showFavorites'])->name('showFavorites');

        Route::apiResource('interests', InterestController::class);

    });

    Route::delete('/course/unenroll/{course_id}', [StudentController::class,'unenroll'])->name('unenroll');

});
