<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthLog extends Model
{
    protected $fillable = [

        'user_id',

        'disease',

        'risk_level',

        'recommendation',

        'log_date'

    ];

    protected $casts = [

        'log_date'=>'date'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}