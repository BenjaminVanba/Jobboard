<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth; // Ajoutez ceci en haut du fichier

use Illuminate\Http\Request;
use App\Models\Person; // Assuming 'Person' model is used for users

class ProfileController extends Controller
{
    public function edit()
    {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user(); // Récupérez l'utilisateur authentifié
        } else {
            // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
    
        // Passez les données à la vue
        return view('profiledit', compact('user'));
    }
    


    public function update(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'phone' => 'required|string|max:20',
        ]);
    
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['user' => 'Veuillez vous connecter pour continuer.']);
        }
    
        // Récupérez l'utilisateur connecté
        $user = Auth::user(); // Utilisez Auth::user() pour obtenir l'utilisateur connecté
    
        // Mettez à jour les informations de l'utilisateur
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
    
        // Enregistrez les modifications
        $user->save();
    
        // Redirigez avec un message de succès
        return redirect()->route('profile.edit')->with('success', 'Votre compte a été mis à jour avec succès.');
    }
    
    
    
}
