<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');  // Remplacez 'contact' par le nom correct de votre vue
    }

    public function send(Request $request)
    {
        // Validation des données
        $request->validate([
            'message' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
        ]);

       // Envoi de l'email à vous-même
    Mail::raw("Nom: {$request->name}\nEmail: {$request->email}\nMessage: {$request->message}", function($message) use ($request) {
        $message->to('mariemjarrar06@gmail.com')  // Remplacez par votre adresse email
                ->subject($request->subject)
                ->from($request->email, $request->name);
    });
        // Retourner une réponse ou rediriger avec un message de succès
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
