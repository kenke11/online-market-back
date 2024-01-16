<?php

namespace Database\Seeders;

use App\Models\ProductSpecification;
use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSpecification::all()->each(function ($group) {
            $numbers = rand(1, 2);

            for ($i = 0; $numbers > $i; $i++) {
                Specification::factory()->create([
                    'product_specification_id' => $group->id,
                ]);
            }
        });
    }
}
