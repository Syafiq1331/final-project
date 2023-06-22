<?php

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


Route::resource('/dashboard', HomeController::class);
Route::resource('/manage/user', ManageUserController::class);
Route::resource('/manage/field', ManageFieldController::class);



Route::fallback(function () {
    return view('404');
});
