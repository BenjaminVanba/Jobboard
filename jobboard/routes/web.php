<?php

use App\Http\Controllers\AdvertisementsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
})->name('home');

Route::get('/jobboard', [AdvertisementsController::class, 'index'])->name('jobboard');

Route::get('/advertisements/{id}', [AdvertisementsController::class, 'show']);

Route::get('/backoffice', [AdvertisementsController::class, 'index'])->name("backoffice");

// ************** CRUD Annonces backoffice *********************** 

// créer une nouvelle annonce 
Route::get('/backoffice/create', [AdvertisementsController::class, 'create'])->name('advertisement.create');

// enregistrer une nouvelle annonce
Route::post('/backoffice', [AdvertisementsController::class, 'store'])->name('advertisement.store');

// modifier une annonce (formulaire)
Route::get('/backoffice/{id}/edit', [AdvertisementsController::class, 'edit'])->name('advertisement.edit');

// mettre à jour une annonce
Route::put('/backoffice/{id}', [AdvertisementsController::class, 'update'])->name('advertisement.update');

// supprimer une annonce
Route::delete('/backoffice/{id}', [AdvertisementsController::class, 'destroy'])->name('advertisement.delete');
