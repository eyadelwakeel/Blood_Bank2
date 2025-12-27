<?php

namespace Database\Seeders;

use App\models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'تبرع بالدم'],
            ['name' => 'حالات طارئة'],
            ['name' => 'حملات التبرع'],
            ['name' => 'نصائح طبية'],
            ['name' => 'أخبار بنوك الدم'],
        ];

        Category::insert($categories);
    }
}
