<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = [

        'name',

        'description',

        'risk_level',

        'prevention',

        'treatment'

    ];

    public function symptoms()
    {
        return $this->belongsToMany(
            Symptom::class,
            'disease_symptom'
        );
    }
}