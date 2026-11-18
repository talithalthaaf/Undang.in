<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

//halaman Login
Route::view('/login', 'auth.login')->name('login');

//halaman Register
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

//proses Register
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register.store');