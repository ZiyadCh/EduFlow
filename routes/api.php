<?php

use App\Http\Controllers\API\V1\AuthController as V1AuthController;
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

});
