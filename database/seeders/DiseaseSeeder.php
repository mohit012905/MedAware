<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disease;

class DiseaseSeeder extends Seeder
{
    public function run(): void
    {

        Disease::create([

            'name'=>'Flu',

            'description'=>'Influenza viral infection',

            'risk_level'=>'Low',

            'prevention'=>'Vaccination, hygiene',

            'treatment'=>'Rest and fluids'

        ]);

        Disease::create([

            'name'=>'COVID-19',

            'description'=>'Coronavirus disease',

            'risk_level'=>'High',

            'prevention'=>'Mask, vaccination',

            'treatment'=>'Doctor consultation'

        ]);

        Disease::create([

            'name'=>'Dengue',

            'description'=>'Mosquito-borne viral disease',

            'risk_level'=>'High',

            'prevention'=>'Avoid mosquito bites',

            'treatment'=>'Immediate medical care'

        ]);

        Disease::create([

            'name'=>'Malaria',

            'description'=>'Mosquito-borne parasitic disease',

            'risk_level'=>'High',

            'prevention'=>'Mosquito nets',

            'treatment'=>'Antimalarial medicine'

        ]);

        Disease::create([

            'name'=>'Asthma',

            'description'=>'Respiratory disease',

            'risk_level'=>'Medium',

            'prevention'=>'Avoid allergens',

            'treatment'=>'Inhaler'

        ]);

        Disease::create([

            'name'=>'Heart Attack',

            'description'=>'Emergency heart condition',

            'risk_level'=>'Critical',

            'prevention'=>'Healthy lifestyle',

            'treatment'=>'Emergency hospitalization'

        ]);

        Disease::create([

            'name'=>'Stroke',

            'description'=>'Brain blood supply blockage',

            'risk_level'=>'Critical',

            'prevention'=>'Control blood pressure',

            'treatment'=>'Immediate emergency care'

        ]);

    }
}