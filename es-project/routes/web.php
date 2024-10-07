<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [DashboardController::class,'dashboard'])->name('dashboard');

Route::get('/', function () {
    return view('index');
});

Route::get('/login_card', function () {
    return view('login_card/index');
});
Route::get('/registration_card', function () {
    return view('registration_card/index');
});