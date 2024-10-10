<?php

use App\Http\Controllers\AdvertisementsController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;


Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
})->name('home');

Route::get('/jobboard', [AdvertisementsController::class, 'jobboard'])->name('jobboard');

Route::get('/advertisements/{id}', [AdvertisementsController::class, 'show']);

Route::get('/backoffice/backoffice_advertisements', [AdvertisementsController::class, 'backoffice'])->name("backoffice_annonces");

Route::get('/backoffice', function () {
    return view('backoffice.index'); // Chemin vers votre index
})->name('backoffice.index');


// ************** CRUD Annonces backoffice Annonces *********************** 

// créer une nouvelle annonce 
Route::get('/backoffice/create', [AdvertisementsController::class, 'create'])->name('advertisement.create');

// // enregistrer une nouvelle annonce
Route::post('/backoffice', [AdvertisementsController::class, 'store'])->name('advertisement.store');

// // modifier une annonce (formulaire)
Route::get('/backoffice/{id}/edit', [AdvertisementsController::class, 'edit'])->name('advertisement.edit');

// // mettre à jour une annonce
Route::put('/backoffice/{id}', [AdvertisementsController::class, 'update'])->name('advertisement.update');

// // supprimer une annonce
Route::delete('/backoffice/{id}', [AdvertisementsController::class, 'destroy'])->name('advertisement.delete');

// ************** CRUD Annonces backoffice Entreprises *********************

Route::get('/backoffice/backoffice_companies', [CompanyController::class, 'index'])->name("companies");

Route::get('/register', [PeopleController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [PeopleController::class, 'register']);

Route::get('/login', [PeopleController::class, 'showLoginForm'])->name('login');

Route::post('/login', [PeopleController::class, 'login']);


Route::post('/logout', [PeopleController::class, 'logout'])->name('logout');
