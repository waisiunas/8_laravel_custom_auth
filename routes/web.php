<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login_view')->name('login');
    Route::post('/', 'login');
    Route::get('/register', 'register_view')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/dashboard', function () {
    return view('dasboard');
})->name('dashboard');
