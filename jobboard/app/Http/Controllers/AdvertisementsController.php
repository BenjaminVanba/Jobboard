<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all(); // Récupère toutes les annonces
        return view('jobboard', compact('advertisements')); // Passe les données à la vue
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
