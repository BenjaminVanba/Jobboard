<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all(); // Récupère toutes les entreprises
        return view('backoffice.backoffice_companies', compact('companies')); // Passe les données à la vue
    }

    public function create()
    {
        return view('backoffice.backoffice_companies_create'); // Vue du formulaire de création
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'required|numeric',
            'website' => 'required',
        ]);

        Company::create($validatedData); // Créer une nouvelle entreprise
        return redirect()->route('companies')->with('success', 'Entreprise créée avec succès');
    }

    public function edit($id)
    {
        $companies = Company::findOrFail($id);
        return view('backoffice.backoffice_companies_edit', compact('companies')); // Vue d'édition
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'required|numeric|digits:10',
            'website' => 'required|url'
        ]);

        $companies = Company::findOrFail($id);
        $companies->update($validatedData); // Mettre à jour l'annonce
        return redirect()->route('companies')->with('success', 'Entreprise mise à jour avec succès');
    }

    public function destroy($id)
    {
        $companies = Company::findOrFail($id);
        $companies->delete(); // Supprimer l'annonce
        return redirect()->route('companies')->with('success', 'Entreprise supprimée avec succès');
    }
 

}
