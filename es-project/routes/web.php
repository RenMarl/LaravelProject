<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Logout;
use App\Livewire\ManageFares;
use App\Livewire\UserFares;
use App\Livewire\Weather;

// Route::get('/', [DashboardController::class,'dashboard'])->name('dashboard');

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/adminrejrtretherothtuy54t9875089034ytf8j56y89f54908675gj9287g09586796htyty', ManageFares::class)->name('admin');
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/fares', UserFares::class)->name('fares');
    Route::get('/weather', Weather::class)->name('weather');  
});


