<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // Récupérer tous les emplois de la base de données
        $jobs = Job::all();

        // Passer les données à la vue
        return view('jobboard', ['jobs' => $jobs]);
    }
}
