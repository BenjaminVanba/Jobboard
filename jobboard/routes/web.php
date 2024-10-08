<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
})->name('home');

Route::get('/jobboard', [CompanyController::class, 'index'])->name('jobboard');
