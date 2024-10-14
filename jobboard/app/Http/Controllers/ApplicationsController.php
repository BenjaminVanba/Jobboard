<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Advertisement;
use App\Models\Application;
use App\Models\Person;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;




class ApplicationsController extends Controller
{
    // ************************************** CRUD *********************************************************
    public function index()
    {
        $applications = Application::all(); // Récupère toutes les applications
        return view('backoffice.backoffice_application', compact('applications')); // Passe les données à la vue
    }

    public function create()
    {
        return view('backoffice.backoffice_application_create'); // Vue du formulaire de création
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'phone' => 'required|string|max:20',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
            'advertisement_id' => 'required|integer|exists:advertisements,id',
        ]);

        Application::create($validatedData); // Créer une nouvelle entreprise
        return redirect()->route('applications')->with('success', 'Application créée avec succès');
    }

    public function edit($id)
    {
        $application = Application::findOrFail($id);
        return view('backoffice.backoffice_application_edit', compact('application')); // Vue d'édition
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'phone' => 'required|string|max:20',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
            'advertisement_id' => 'required|integer|exists:advertisements,id',
        ]);

        $application = Application::findOrFail($id);
        $application->update($validatedData); // Mettre à jour l'annonce
        return redirect()->route('applications')->with('success', 'Candidature mise à jour avec succès');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete(); // Supprimer l'annonce
        return redirect()->route('applications')->with('success', 'Candidature supprimée avec succès');
    }

    //*********************************     FIN DU CRUD  *************************************/

    public function showApplicationForm($id)
    {
        // Récupération de l'annonce
        $advertisement = Advertisement::find($id);

        // Vérifiez si l'annonce existe
        if (!$advertisement) {
            return redirect()->route('home')->with('error', 'Annonce non trouvée.');
        }

        // Récupérer l'utilisateur connecté
        $user = Auth::check() ? Auth::user() : null;

        // Passez les données à la vue
        return view('apply', [
            'advertisement' => $advertisement,
            'user' => $user, // Passer l'utilisateur s'il est connecté
        ]);
    }



    public function submitApplication(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        // Enregistrer la candidature
        $application = new Application();  // Initialiser l'objet avant de l'utiliser
        $application->advertisement_id = $id; // ID de l'annonce
        $application->first_name = $request->first_name; // Prénom
        $application->last_name = $request->last_name; // Nom de famille
        $application->email = $request->email;
        $application->phone = $request->phone;

        // Ajouter le champ applicant_id s'il est connecté
        if (Auth::check()) {
            $application->applicant_id = Auth::id(); // Utiliser l'ID de l'utilisateur authentifié
            Log::info('Applicant ID from Auth: ' . Auth::id());
        } else {
            $application->applicant_id = null; // Si non connecté
            Log::info('No user is logged in.');
        }

        // Définir le statut automatiquement à "pending"
        $application->status = 'pending';

        // Sauvegarder le CV
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $application->cv = $cvPath;
        }

        // Sauvegarder la lettre de motivation (facultatif)
        $application->cover_letter = $request->cover_letter;

        // Enregistrement de la candidature
        $application->save();

        // Redirection après soumission
        return redirect()->route('home')->with('success', 'Votre candidature a été soumise avec succès.');
    }
}
