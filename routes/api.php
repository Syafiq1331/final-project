<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\features\LahanController;
use App\Http\Controllers\api\features\ProfileController;
use App\Models\Lahan;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/lahan', LahanController::class);
    Route::apiResource('/profile', ProfileController::class);
});
