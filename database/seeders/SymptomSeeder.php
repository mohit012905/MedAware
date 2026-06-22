<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Symptom;

class SymptomSeeder extends Seeder
{
    public function run(): void
    {
        $symptoms = [

            'Fever',
            'Headache',
            'Cough',
            'Cold',
            'Sneezing',
            'Runny Nose',
            'Sore Throat',
            'Body Pain',
            'Fatigue',
            'Weakness',
            'Vomiting',
            'Nausea',
            'Diarrhea',
            'Constipation',
            'Abdominal Pain',
            'Chest Pain',
            'Difficulty Breathing',
            'Shortness of Breath',
            'Wheezing',
            'Rapid Heartbeat',
            'High Blood Pressure',
            'Low Blood Pressure',
            'Dizziness',
            'Loss of Balance',
            'Blurred Vision',
            'Loss of Vision',
            'Eye Pain',
            'Ear Pain',
            'Hearing Loss',
            'Skin Rash',
            'Itching',
            'Swelling',
            'Joint Pain',
            'Muscle Pain',
            'Back Pain',
            'Neck Pain',
            'Loss of Appetite',
            'Weight Loss',
            'Weight Gain',
            'Night Sweats',
            'Chills',
            'Excessive Thirst',
            'Frequent Urination',
            'Burning Urination',
            'Blood in Urine',
            'Blood in Stool',
            'Persistent Cough',
            'Dry Cough',
            'Wet Cough',
            'Loss of Taste',
            'Loss of Smell',
            'Confusion',
            'Seizure',
            'Fainting',
            'Anxiety',
            'Depression',
            'Insomnia',
            'Memory Loss',
            'Slurred Speech',
            'Numbness',
            'Paralysis',
            'Bleeding',
            'Bruising',
            'Palpitations',
            'Sweating',
            'Cold Sweats',
            'High Blood Sugar',
            'Low Blood Sugar',
            'Dehydration',
            'Shivering',
            'Persistent Fever',
            'Yellow Skin',
            'Yellow Eyes',
            'Difficulty Swallowing',
            'Hoarseness',
            'Swollen Lymph Nodes',
            'Red Eyes',
            'Burning Eyes',
            'Dry Skin',
            'Hair Loss',
            'Mouth Ulcers',
            'Bad Breath',
            'Tooth Pain',
            'Difficulty Walking',
            'Hand Tremors',
            'Leg Swelling',
            'Foot Pain',
            'Frequent Headache',
            'Migraines',
            'Irregular Heartbeat',
            'Persistent Vomiting',
            'Difficulty Speaking',
            'High Temperature',
            'Cold Hands',
            'Cold Feet',
            'Persistent Fatigue',
            'Breathing Difficulty',
            'Chest Tightness',
            'Severe Chest Pain',
            'Loss of Consciousness'
        ];

        foreach ($symptoms as $symptom)
        {
            Symptom::create([
                'name'=>$symptom
            ]);
        }
    }
}