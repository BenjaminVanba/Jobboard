<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    use HasFactory;

    protected $fillable = [
        'advertisement_id',  // ID de l'offre d'emploi
        'applicant_id',      // ID du candidat
        'status',            // Statut de la candidature (par exemple: en attente, acceptée, rejetée)
        'first_name',        // Prénom du candidat
        'last_name',         // Nom de famille du candidat
        'email',             // Email du candidat
        'phone',             // Numéro de téléphone du candidat
        'cv',                // Chemin vers le CV du candidat
        'cover_letter'       // Lettre de motivation (facultative)
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Person::class, 'applicant_id');
    }
}
