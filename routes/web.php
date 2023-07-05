<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageFieldController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/dashboard', [HomeController::class, 'index']);

    Route::group(['middleware' => ['admin']], function () {
        Route::prefix('manage')->group(function () {
            Route::resource('user', ManageUserController::class);
            Route::resource('field', ManageFieldController::class);
        });
    });
});




Route::fallback(function () {
    return view('404');
});
