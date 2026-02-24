<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GovernorateSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\BloodTypeSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PostSedeer;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            
            BloodTypeSeeder::class,
            GovernorateSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            PostSedeer::class,
            SettingSeeder::class,
            ContactUsSeeder::class,
            DonationRequestSeeder::class,
            
            
        ]);
    }
}
