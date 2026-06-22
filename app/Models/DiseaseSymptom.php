<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseSymptom extends Model
{
    protected $table='disease_symptom';

    protected $fillable=[

        'disease_id',

        'symptom_id'

    ];
}