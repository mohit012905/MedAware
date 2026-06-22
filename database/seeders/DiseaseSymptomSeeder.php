<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disease;
use App\Models\Symptom;

class DiseaseSymptomSeeder extends Seeder
{
    public function run(): void
    {
        $mapping = [
            'Flu' => [
                'Fever',
                'Cough',
                'Headache',
                'Body Pain',
                'Fatigue',
                'Sore Throat'
            ],

            'COVID-19' => [
                'Fever',
                'Dry Cough',
                'Difficulty Breathing',
                'Loss of Taste',
                'Loss of Smell',
                'Fatigue'
            ],

            'Dengue' => [
                'High Temperature',
                'Headache',
                'Joint Pain',
                'Skin Rash',
                'Persistent Fever'
            ],

            'Heart Attack' => [
                'Severe Chest Pain',
                'Shortness of Breath',
                'Sweating',
                'Rapid Heartbeat'
            ]
        ];

        foreach ($mapping as $diseaseName => $symptoms) {

            $disease = Disease::where('name', $diseaseName)->first();

            if (!$disease) {
                continue;
            }

            foreach ($symptoms as $symptomName) {

                $symptom = Symptom::where('name', $symptomName)->first();

                if ($symptom) {
                    $disease->symptoms()->attach($symptom->id);
                }
            }
        }
    }
}