<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdvertisementsController;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
})->name('home');

Route::get('/jobboard', [AdvertisementsController::class, 'index'])->name('jobboard');

Route::get('/advertisements/{id}', [AdvertisementsController::class, 'show']);