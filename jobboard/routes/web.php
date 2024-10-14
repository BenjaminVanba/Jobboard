<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AdvertisementsController;


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

// Route pour créer une nouvelle entreprise
Route::get('/backoffice/backoffice_companies_create', [CompanyController::class, 'create'])->name('company.create');

// Route pour enregistrer une nouvelle entreprise
Route::post('/backoffice/backoffice_companies', [CompanyController::class, 'store'])->name('company.store');

// Route pour éditer une entreprise
Route::get('/backoffice/backoffice_companies/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');

// Route pour mettre à jour une entreprise
Route::put('/backoffice/backoffice_companies/{id}', [CompanyController::class, 'update'])->name('company.update');

// Route pour supprimer une entreprise
Route::delete('/backoffice/backoffice_companies/{id}', [CompanyController::class, 'destroy'])->name('company.delete');


// ************** CRUD Annonces backoffice Utilisateurs *********************

Route::get('/backoffice/backoffice_people', [PeopleController::class, 'index'])->name("people");

// Route pour créer une nouvelle personne
Route::get('/backoffice/backoffice_people_create', [PeopleController::class, 'create'])->name('people.create');

// Route pour enregistrer une nouvelle personne
Route::post('/backoffice/backoffice_people', [PeopleController::class, 'store'])->name('people.store');

// Route pour éditer une personne
Route::get('/backoffice/backoffice_people/{id}/edit', [PeopleController::class, 'edit'])->name('people.edit');

// Route pour enregistrer l'édition
Route::put('/backoffice/backoffice_people/{id}', [PeopleController::class, 'update'])->name('people.update');

// Route pour supprimer une entreprise
Route::delete('/backoffice/backoffice_people/{id}', [PeopleController::class, 'destroy'])->name('people.delete');

// ************** CRUD Annonces backoffice Candidatures *********************

Route::get('/backoffice/backoffice_application', [ApplicationsController::class, 'index'])->name("applications");

// Route pour créer une nouvelle candidature

Route::get('/backoffice/backoffice_application_create', [ApplicationsController::class, 'create'])->name("applications.create");

// Route pour enregistrer une nouvelle personne

Route::post('/backoffice/backoffice_application', [ApplicationsController::class, 'store'])->name('applications.store');

// Route pour éditer une candidature
Route::get('/backoffice/backoffice_application/{id}/edit', [ApplicationsController::class, 'edit'])->name('applications.edit');

// Route pour enregistrer la candidature
Route::put('/backoffice/backoffice_application/{id}', [ApplicationsController::class, 'update'])->name('applications.update');

// Route pour supprimer une entreprise
Route::delete('/backoffice/backoffice_application/{id}', [ApplicationsController::class, 'destroy'])->name('applications.delete');


// *************** Connexion / Deconnexion *********************

Route::get('/register', [PeopleController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [PeopleController::class, 'register']);

Route::get('/login', [PeopleController::class, 'showLoginForm'])->name('login');

Route::post('/login', [PeopleController::class, 'login']);

Route::post('/logout', [PeopleController::class, 'logout'])->name('logout');




// Route pour afficher le formulaire de candidature
Route::get('/advertisement/{id}/apply', [ApplicationsController::class, 'showApplicationForm'])->name('apply');

// Route pour soumettre la candidature
Route::post('/advertisement/{id}/apply', [ApplicationsController::class, 'submitApplication'])->name('job.submitApplication');





Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
