<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageFieldController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/dashboard', [HomeController::class, 'index']);

    Route::resource('manage/user', ManageUserController::class);
    Route::resource('manage/field', ManageFieldController::class);
});


Route::fallback(function () {
    return view('404');
});
