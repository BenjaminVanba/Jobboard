<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user(); // Récupérez l'utilisateur authentifié
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Passe les données à la vue
        return view('profiledit', compact('user'));
    }



    public function update(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people,email,' . Auth::id(), // L'email doit être unique , sans pour autant prendre en compte celui de l'utilisateur actuel
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed', // Mot de passe facultatif et doit être confirmé
        ]);

        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['user' => 'Veuillez vous connecter pour continuer.']);
        }

        // Récupére l'utilisateur connecté
        $user = Auth::user(); // Récupère l'utilisateur connecté

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        if ($request->filled('password')) {
            $user->mot_de_passe = bcrypt($request->input('password')); // Hash le mot de passe
        }

        // Enregistrez les modifications
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Votre compte a été mis à jour avec succès.');
    }
}
