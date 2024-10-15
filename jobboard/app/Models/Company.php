<?php

namespace App\Models;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'email', 'phone', 'website'];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
