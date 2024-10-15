<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;




class AdvertisementsController extends Controller
{
    // Méthode pour le jobboard
    public function jobboard()
    {
        $advertisements = Advertisement::all(); // Récupère toutes les annonces
        return view('jobboard', compact('advertisements')); // Vue du jobboard
    }

    // Méthode pour le backoffice
    public function backoffice()
    {
        $advertisements = Advertisement::all(); // Récupère toutes les annonces
        return view('backoffice.backoffice_advertisements', compact('advertisements')); // Vue du backoffice
    }

    public function create()
    {
        return view('backoffice.backoffice_create'); // Vue du formulaire de création
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description_courte' => 'required',
            'description_longue' => 'required',
            'salary' => 'required|numeric',
            'location' => 'required',
            'company_id' => 'required|exists:companies,id',
            'posted_by' => 'required|exists:people,id',
        ]);

        Advertisement::create($validatedData); // Créer une nouvelle annonce
        return redirect()->route('backoffice_annonces')->with('success', 'Annonce créée avec succès');
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('backoffice.backoffice_edit', compact('advertisement'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'max:255',
            'description_courte' => 'nullable|string',
            'description_longue' => 'nullable|string',
            'salary' => 'numeric',
            'location' => 'string',
            'company_id' => 'exists:companies,id',
            'posted_by' => 'exists:people,id',
        ]);

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->update($validatedData); // Mettre à jour l'annonce
        return redirect()->route('backoffice_annonces')->with('success', 'Annonce mise à jour avec succès');
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete(); // Supprimer l'annonce
        return redirect()->route('backoffice_annonces')->with('success', 'Annonce supprimée avec succès');
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        return response()->json([
            'success' => true,
            'description_longue' => $advertisement->description_longue,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $location = $request->input('location');

        // Query the advertisements based on the search criteria
        $query = Advertisement::query();

        if ($keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        if ($location) {
            $query->where('location', $location);
        }

        $advertisements = $query->get(); // or use paginate() for pagination

        // Return the results to a view
        return view('advertisement.jobboard', compact('advertisements'));
    }

}
