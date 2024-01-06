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
                'name' => [
                    'ka' => 'ქართული',
                    'en' => 'Georgia',
                ]
            ],
            [
                'name' => [
                    'ka' => 'ინგლისური',
                    'en' => 'English',
                ]
            ],
        ]);

        $countries->each(function (array $country) {
            Language::factory()->create([
                'name' => $country['name'],
            ]);
        });
    }
}
