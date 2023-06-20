<?php

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

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('manage', function () {
    return view('pages.ManageField');
});

Route::prefix('manage')->group(function () {
    Route::get('field', function () {
        return view('pages.ManageField');
    });
    Route::get('user', function () {
        return view('pages.ManageUser');
    });
});


Route::fallback(function () {
    return view('404');
});
