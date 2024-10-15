<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


// Route pour le tableau de bord du backoffice
Route::get('/backoffice', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('backoffice.index'); // Chemin vers la vue backoffice/index.blade.php
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('backoffice.index');
// ************** CRUD Annonces backoffice Annonces *********************** 

// Créer une nouvelle annonce 
Route::get('/backoffice/create', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(AdvertisementsController::class)->create();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('advertisement.create');

// Enregistrer une nouvelle annonce
Route::post('/backoffice', function (Request $request) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(AdvertisementsController::class)->store($request);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('advertisement.store');

// Modifier une annonce (formulaire)
Route::get('/backoffice/{id}/edit', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(AdvertisementsController::class)->edit($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('advertisement.edit');

// Mettre à jour une annonce
Route::put('/backoffice/{id}', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(AdvertisementsController::class)->update($request, $id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('advertisement.update');

// Supprimer une annonce
Route::delete('/backoffice/{id}', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(AdvertisementsController::class)->destroy($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('advertisement.delete');

// ************** CRUD Annonces backoffice Entreprises *********************

Route::get('/backoffice/backoffice_companies', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(CompanyController::class)->index();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name("companies");

// Route pour créer une nouvelle entreprise
Route::get('/backoffice/backoffice_companies_create', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(CompanyController::class)->create();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('company.create');

// Route pour enregistrer une nouvelle entreprise
Route::post('/backoffice/backoffice_companies', function (Request $request) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(CompanyController::class)->store($request);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('company.store');

// Route pour éditer une entreprise
Route::get('/backoffice/backoffice_companies/{id}/edit', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(CompanyController::class)->edit($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('company.edit');

// Route pour mettre à jour une entreprise
Route::put('/backoffice/backoffice_companies/{id}', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(CompanyController::class)->update($request, $id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('company.update');

// Route pour supprimer une entreprise
Route::delete('/backoffice/backoffice_companies/{id}', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(CompanyController::class)->destroy($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('company.delete');

// ************** CRUD Annonces backoffice Utilisateurs *********************

Route::get('/backoffice/backoffice_people', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(PeopleController::class)->index();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name("people");

// Route pour créer une nouvelle personne
Route::get('/backoffice/backoffice_people_create', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(PeopleController::class)->create();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('people.create');

// Route pour enregistrer une nouvelle personne
Route::post('/backoffice/backoffice_people', function (Request $request) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(PeopleController::class)->store($request);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('people.store');



// Route pour éditer une personne
Route::get('/backoffice/backoffice_people/{id}/edit', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(PeopleController::class)->edit($id);
    }
    return app(PeopleController::class)->edit($id);
    return redirect('/')->withErrors('Accès refusé.');
})->name('people.edit');

// Route pour enregistrer l'édition
Route::put('/backoffice/backoffice_people/{id}', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(PeopleController::class)->update($request, $id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('people.update');

// Route pour supprimer une personne
Route::delete('/backoffice/backoffice_people/{id}', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(PeopleController::class)->destroy($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('people.delete');

// ************** CRUD Annonces backoffice Candidatures *********************

Route::get('/backoffice/backoffice_application', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(ApplicationsController::class)->index();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name("applications");

// Route pour créer une nouvelle candidature
Route::get('/backoffice/backoffice_application_create', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(ApplicationsController::class)->create();
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name("applications.create");

// Route pour enregistrer une nouvelle candidature
Route::post('/backoffice/backoffice_application', function (Request $request) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(ApplicationsController::class)->store($request);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('applications.store');

// Route pour éditer une candidature
Route::get('/backoffice/backoffice_application/{id}/edit', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(ApplicationsController::class)->edit($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('applications.edit');

// Route pour enregistrer la candidature
Route::put('/backoffice/backoffice_application/{id}', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(ApplicationsController::class)->update($request, $id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('applications.update');

// Route pour supprimer une candidature
Route::delete('/backoffice/backoffice_application/{id}', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(ApplicationsController::class)->destroy($id);
    }
    return redirect('/')->withErrors('Accès refusé.');
})->name('applications.delete');

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



use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
