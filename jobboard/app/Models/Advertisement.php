<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['title', 'description_courte', 'description_longue', 'salary', 'location', 'company_id', 'posted_by'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function postedBy()
    {
        return $this->belongsTo(Person::class, 'posted_by');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
