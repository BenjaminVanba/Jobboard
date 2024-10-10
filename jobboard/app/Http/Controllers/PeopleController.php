<?php

namespace App\Http\Controllers;


use Log;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Ajoutez cette ligne


class PeopleController extends Controller
{
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }


   
        // Traiter l'inscription
        public function register(Request $request)
        {
            // Validation des données
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:people',
                'phone' => 'required|string|max:15',
                'role' => 'required|string',
                'company_id' => 'nullable|integer', // Permettre la valeur null pour company_id
                'mot_de_passe' => 'required|string|min:8|confirmed',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            // Ajouter un log pour suivre l'inscription
            Log::info('Tentative d\'inscription pour: ' . $request->email);
    
            try {
                // Créer l'utilisateur
                Person::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'role' => $request->role,
                    'company_id' => $request->company_id ?? null, // Enregistrer null si non fourni
                    'mot_de_passe' => Hash::make($request->mot_de_passe), // Hachage du mot de passe
                ]);
    
                // Ajouter un log pour confirmer la création
                Log::info('Utilisateur créé avec succès: ' . $request->email);
    
                // Redirection après succès
                return redirect()->route('home')->with('success', 'Inscription réussie !');
            } catch (\Exception $e) {
                Log::error('Erreur lors de la création de l\'utilisateur: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'inscription.');
            }
        }
    


        public function showLoginForm()
        {
            return view('auth.login'); // Assurez-vous que cette vue existe
        }
    
    
        public function login(Request $request)
        {
            // Validation des données
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'mot_de_passe' => ['required'],
            ]);
        
            // Trouver l'utilisateur par email
            $user = Person::where('email', $credentials['email'])->first();
        
            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($user && Hash::check($credentials['mot_de_passe'], $user->mot_de_passe)) {
                Auth::login($user); // Authentifier l'utilisateur
                $request->session()->regenerate(); // Régénérer la session
                return redirect()->intended('/'); // Page après la connexion
            }
        
            return back()->withErrors(['email' => 'Les informations fournies sont incorrectes.']);
        }
        

        



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
