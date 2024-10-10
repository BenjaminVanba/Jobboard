<?php

use App\Http\Controllers\AdvertisementsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
})->name('home');

Route::get('/jobboard', [AdvertisementsController::class, 'index'])->name('jobboard');

Route::get('/advertisements/{id}', [AdvertisementsController::class, 'show']);



use App\Http\Controllers\PeopleController;

Route::get('/register', [PeopleController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PeopleController::class, 'register']);

Route::get('/login', [PeopleController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PeopleController::class, 'login']);


Route::post('/logout', [PeopleController::class, 'logout'])->name('logout');



