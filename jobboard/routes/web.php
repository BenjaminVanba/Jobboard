<?php

use App\Http\Controllers\AdvertisementsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
})->name('home');

Route::get('/jobboard', [AdvertisementsController::class, 'index'])->name('jobboard');

Route::get('/advertisements/{id}', [AdvertisementsController::class, 'show']);
