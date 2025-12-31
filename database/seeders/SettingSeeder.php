<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('settings')->insert([
            'phone' => '01011588455',
            'email' => 'info@app.com',
            'fb_url' => 'https://facebook.com/app',
            'x_url' => 'https://x.com/app',
            'app_store_url' => 'https://apps.apple.com/app',
            'youtube_url' => 'https://youtube.com/@app',
            'about_app' => 'This is a sample application that provides various features and functionalities to its users.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
