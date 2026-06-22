<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable=[
        'name',
        'address',
        'latitude',
        'longitude',
        'phone',
        'icu_beds',
        'general_beds'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}