<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::factory(10)->create();
        User::create([
            'name' => 'Elwakeel',
            'email' => 'eelwakeel3@example.com',
            'phone' => '1234567890',
            'birth_date' => '1990-01-01',
            'last_donation_date' => '2023-01-01',
            'blood_type_id' => 1,
            'city_id' => 1,
            'is_active' => true,
            'password' => bcrypt('12345678'),
        ]);

    }
}
