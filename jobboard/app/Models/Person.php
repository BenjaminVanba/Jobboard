<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'role', 'company_id'];

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
