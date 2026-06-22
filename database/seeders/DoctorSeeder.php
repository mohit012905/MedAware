<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'hospital_id'=>1,
            'name'=>'Dr. Anjali Mehta',
            'specialization'=>'General Physician',
            'email'=>'anjali@medaware.com',
            'phone'=>'9991111111',
            'experience'=>10
        ]);

        Doctor::create([
            'hospital_id'=>2,
            'name'=>'Dr. Raj Patel',
            'specialization'=>'Cardiologist',
            'email'=>'raj@medaware.com',
            'phone'=>'9992222222',
            'experience'=>15
        ]);

        Doctor::create([
            'hospital_id'=>3,
            'name'=>'Dr. Neha Shah',
            'specialization'=>'Neurologist',
            'email'=>'neha@medaware.com',
            'phone'=>'9993333333',
            'experience'=>8
        ]);
    }
}