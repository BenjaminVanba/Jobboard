<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all(); // Récupère toutes les annonces
        return view('backoffice', compact('advertisements')); // Vue backoffice
    }

    public function create()
    {
        return view('backoffice_create');
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
        return redirect()->route('backoffice')->with('success', 'Annonce créée avec succès');
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('backoffice_edit', compact('advertisement')); // Vue d'édition
    }

    public function update(Request $request, $id)
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
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete(); // Supprimer l'annonce
        return redirect()->route('backoffice')->with('success', 'Annonce supprimée avec succès');
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        return response()->json([
            'success' => true,
            'description_longue' => $advertisement->description_longue,
        ]);
    }
}
