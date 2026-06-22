<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class HospitalSeeder extends Seeder
{
    public function run(): void
    {
        Hospital::create([
            'name'=>'Apollo Hospital Ahmedabad',
            'address'=>'Ahmedabad',
            'latitude'=>23.0522,
            'longitude'=>72.5714,
            'phone'=>'9876543210',
            'icu_beds'=>15,
            'general_beds'=>100
        ]);

        Hospital::create([
            'name'=>'Civil Hospital Ahmedabad',
            'address'=>'Ahmedabad',
            'latitude'=>23.0400,
            'longitude'=>72.5600,
            'phone'=>'9876543211',
            'icu_beds'=>50,
            'general_beds'=>500
        ]);

        Hospital::create([
            'name'=>'Sterling Hospital',
            'address'=>'Ahmedabad',
            'latitude'=>23.0258,
            'longitude'=>72.5078,
            'phone'=>'9876543212',
            'icu_beds'=>20,
            'general_beds'=>150
        ]);
    }
}