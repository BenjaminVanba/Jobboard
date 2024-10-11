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


    public function index()
    {
        $people = Person::all(); // Récupère toutes les entreprises
        return view('backoffice.backoffice_people', compact('people')); // Passe les données à la vue
    }


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
            'company_id' => 'nullable|integer',
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
                'company_id' => $request->company_id ?? null,
                'mot_de_passe' => Hash::make($request->mot_de_passe),
            ]);

            // Ajouter un log pour confirmer la création
            Log::info('Utilisateur créé avec succès: ' . $request->email);

            // Redirection après succès
            return redirect()->route('login')->with('success', 'Inscription réussie !');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'utilisateur: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'inscription.');
        }
    }



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


    //*********************************** CRUD People ***********************************************************************/


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
            'company_id' => 'nullable|integer',
            'mot_de_passe' => 'required|string|min:8', // Validation du mot de passe
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
            'company_id' => 'nullable|integer',
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

        return redirect()->route('people')->with('success', 'Personne mise à jour avec succès');
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect()->route('people')->with('success', 'Utilisateur supprimé avec succès');
    }
}
