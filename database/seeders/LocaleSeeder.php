<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = collect(['en', 'ka']);

        $locales->each(function ($locale) {
            Locale::factory()->create([
                'code' => $locale
            ]);
        });
    }
}
