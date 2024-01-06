<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = collect([
            [
                'code' => 'ka',
                'name' => [
                    'ka' => 'ქართული',
                    'en' => 'Georgia',
                ]
            ],
            [
                'code' => 'en',
                'name' => [
                    'ka' => 'ინგლისური',
                    'en' => 'English',
                ]
            ],
        ]);

        $countries->each(function (array $country) {
            Language::factory()->create([
                'name' => json_encode($country['name']),
                'code' => $country['code']
            ]);
        });
    }
}
