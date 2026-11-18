
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Halaman Login
Route::view('/login', 'auth.login')->name('login');
