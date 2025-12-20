<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Governorate;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            'القاهرة',
            'الجيزة',
            'الإسكندرية',
            'الدقهلية',
            'البحر الأحمر',
            'البحيرة',
            'الفيوم',
            'الغربية',
            'الإسماعيلية',
            'المنوفية',
            'المنيا',
            'القليوبية',
            'الوادي الجديد',
            'السويس',
            'أسوان',
            'أسيوط',
            'بني سويف',
            'بورسعيد',
            'دمياط',
            'كفر الشيخ',
            'مطروح',
            'الأقصر',
            'قنا',
            'شمال سيناء',
            'جنوب سيناء',
            'سوهاج',
        ];

        foreach ($governorates as $governorate) {
            Governorate::create([
                'name' => $governorate,
            ]);
        }
    }
}

