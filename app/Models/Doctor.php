<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=[

        'hospital_id',

        'name',

        'specialization',

        'email',

        'phone',

        'experience'

    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}