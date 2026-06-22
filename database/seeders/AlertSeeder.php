<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alert;

class AlertSeeder extends Seeder
{
    public function run(): void
    {
        Alert::create([
            'user_id'=>1,
            'severity'=>'Critical',
            'message'=>'Possible Heart Attack Detected. Visit nearest hospital immediately.',
            'is_sent'=>true
        ]);

        Alert::create([
            'user_id'=>1,
            'severity'=>'High',
            'message'=>'High Fever with Breathing Difficulty detected.',
            'is_sent'=>false
        ]);

        Alert::create([
            'user_id'=>1,
            'severity'=>'Medium',
            'message'=>'Possible Flu Symptoms.',
            'is_sent'=>false
        ]);
    }
}