<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['advertisement_id', 'applicant_id', 'status'];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Person::class, 'applicant_id');
    }
}
