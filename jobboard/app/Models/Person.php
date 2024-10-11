<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Person extends Authenticatable
{
    use Notifiable;


    protected $table = 'people';


    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'role', 'company_id', 'mot_de_passe'];

    protected $hidden = ['mot_de_passe', 'remember_token'];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function postedAdvertisements()
    {
        return $this->hasMany(Advertisement::class, 'posted_by');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'applicant_id');
    }
}
