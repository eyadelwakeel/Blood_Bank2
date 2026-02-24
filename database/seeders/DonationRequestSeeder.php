<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DonationRequest;
use App\Models\User;
use App\Models\BloodType;
use App\Models\City;

class DonationRequestSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $bloodType = BloodType::first();
        $city = City::first();

        DonationRequest::create([
            'name' => 'John Doe',
            'age' => 30,
            'blood_type_id' => $bloodType->id ?? 1,
            'longitude' => 33.2357,
            'latitude' => 30.0444,
            'city_id' => $city->id ?? 1,
            'phone' => '01000000001',
            'notes' => 'Urgent donation required',
            'hospital_name' => 'Al Salam Hospital',
            'bags_number' => 2,
            'user_id' => $user->id ?? 1,
        ]);

        DonationRequest::create([
            'name' => 'Jane Smith',
            'age' => 25,
            'blood_type_id' => $bloodType->id ?? 1,
            'longitude' => 32.2400,
            'latitude' => 29.0500,
            'city_id' => $city->id ?? 1,
            'phone' => '01000000002',
            'notes' => 'Blood needed for surgery',
            'hospital_name' => 'Nile Hospital',
            'bags_number' => 3,
            'user_id' => $user->id ?? 1,
        ]);
    }
}