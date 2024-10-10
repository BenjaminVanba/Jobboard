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

    public function create()
    {
        return view('backoffice.backoffice_companies_create'); // Vue du formulaire de création
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'website' => 'required',
        ]);

        Company::create($validatedData); // Créer une nouvelle entreprise
        return redirect()->route('companies')->with('success', 'Annonce créée avec succès');
    }

    // public function edit($id)
    // {
    //     $advertisement = Advertisement::findOrFail($id);
    //     return view('backoffice.backoffice_edit', compact('advertisement')); // Vue d'édition
    // }

    // public function update(Request $request, $id)
    // {

    //     $validatedData = $request->validate([
    //         'title' => 'max:255',
    //         'description_courte',
    //         'description_longue',
    //         'salary' => 'numeric',
    //         'location',
    //         'company_id' => 'exists:companies,id',
    //         'posted_by' => 'exists:people,id',
    //     ]);

    //     $advertisement = Advertisement::findOrFail($id);
    //     $advertisement->update($validatedData); // Mettre à jour l'annonce
    //     return redirect()->route('backoffice_annonces')->with('success', 'Annonce mise à jour avec succès');
    // }

    // public function destroy($id)
    // {
    //     $advertisement = Advertisement::findOrFail($id);
    //     $advertisement->delete(); // Supprimer l'annonce
    //     return redirect()->route('backoffice_annonces')->with('success', 'Annonce supprimée avec succès');
    // }

    // public function show($id)
    // {
    //     $advertisement = Advertisement::findOrFail($id);

    //     return response()->json([
    //         'success' => true,
    //         'description_longue' => $advertisement->description_longue,
    //     ]);
    // }
}
