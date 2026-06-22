<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [

        'user_id',

        'severity',

        'message',

        'is_sent'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}