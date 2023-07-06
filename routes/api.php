<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\features\FieldController;
use App\Http\Controllers\api\features\HomeController;
use App\Http\Controllers\api\features\LahanController;
use App\Http\Controllers\api\features\ProfileController;
use App\Http\Controllers\api\features\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/lahan', LahanController::class);
    Route::apiResource('/profile', ProfileController::class);
    Route::apiResource('/field', FieldController::class);
    Route::apiResource('/dashboard', HomeController::class);
});
