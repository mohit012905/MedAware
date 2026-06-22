<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthLog;

class HealthLogSeeder extends Seeder
{
    public function run(): void
    {

        HealthLog::create([

            'user_id'=>1,

            'disease'=>'Flu',

            'risk_level'=>'Low',

            'recommendation'=>'Drink water, take rest and monitor symptoms.',

            'log_date'=>now()

        ]);

        HealthLog::create([

            'user_id'=>1,

            'disease'=>'COVID-19',

            'risk_level'=>'High',

            'recommendation'=>'Visit doctor immediately and isolate yourself.',

            'log_date'=>now()

        ]);

        HealthLog::create([

            'user_id'=>1,

            'disease'=>'Heart Attack',

            'risk_level'=>'Critical',

            'recommendation'=>'Go to nearest hospital immediately.',

            'log_date'=>now()

        ]);

    }
}