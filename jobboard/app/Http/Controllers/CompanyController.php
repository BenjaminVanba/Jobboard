<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all(); // Récupère toutes les entreprises
        return view('backoffice.backoffice_companies', compact('companies')); // Passe les données à la vue
    }
}
