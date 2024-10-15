<?php

namespace App\Http\Controllers;


use Log;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PeopleController extends Controller
{

    // Récupère toutes les entreprises
    public function index()
    {
        $people = Person::all();
        return view('backoffice.backoffice_people', compact('people')); // Passe les données à la vue
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }


    // *************************** Inscription des utilisateurs ************************ 


    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
            'company_id' => 'nullable|integer',
            'mot_de_passe' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Créer l'utilisateur
            Person::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'company_id' => $request->company_id ?? null,
                'mot_de_passe' => Hash::make($request->mot_de_passe),
            ]);

            // Redirection après succès
            return redirect()->route('login')->with('success', 'Inscription réussie !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'inscription.');
        }
    }

    // *************************** Fin d'inscription des utilisateurs ************************ 







    // *************************** Connexion des utilisateurs ************************

    public function showLoginForm()
    {
        return view('auth.login');
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

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if ($user && Hash::check($credentials['mot_de_passe'], $user->mot_de_passe)) {
            Auth::login($user); // Authentifier l'utilisateur
            $request->session()->regenerate(); // Régénérer la session


            // Vérifie si l'utilisateur est un administrateur
            if ($user->role === 'admin') {
                return redirect()->route('backoffice.index'); // Redirige vers le tableau de bord admin
            }

            return redirect()->intended('/'); // Redirige les utilisateurs connectés sur la homepage
        }

        return back()->withErrors(['email' => 'Les informations fournies sont incorrectes.']);
    }

    // *************************** Fin connexion des utilisateurs ************************

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    // *************************** CRUD utilisateurs ************************


    public function create()
    {
        return view('backoffice.backoffice_people_create'); // Vue du formulaire de création
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
            'company_id' => 'nullable|integer|exists:companies,id',
            'mot_de_passe' => 'required|string|min:8',
        ]);

        // Hashage du mot de passe après la validation
        $validatedData['mot_de_passe'] = Hash::make($request->mot_de_passe);

        // Création de la nouvelle personne avec les données validées
        Person::create($validatedData);

        // Redirection après la création avec un message de succès
        return redirect()->route('people')->with('success', 'Personne créée avec succès');
    }

    public function edit($id)
    {
        $person = Person::findOrFail($id);
        return view('backoffice.backoffice_people_edit', compact('person'));
    }


    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people,email,' . $id,
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
            'company_id' => 'nullable|integer|exists:companies,id',
        ]);

        $person = Person::findOrFail($id);

        $person->first_name = $validatedData['first_name'];
        $person->last_name = $validatedData['last_name'];
        $person->email = $validatedData['email'];
        $person->phone = $validatedData['phone'];
        $person->role = $validatedData['role'];
        $person->company_id = $validatedData['company_id'];

        if ($request->filled('mot_de_passe')) {
            $person->mot_de_passe = Hash::make($request->mot_de_passe);
        }

        $person->save();

        return redirect()->route('people')->with('success', 'Utilisateur mise à jour avec succès');
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect()->route('people')->with('success', 'Utilisateur supprimé avec succès');
    }
}
