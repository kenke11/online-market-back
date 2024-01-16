<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Database\Seeder;

class ProductSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $numbers = rand(1, 3);

        for ($i = 0; $numbers > $i; $i++) {
            $name = fake()->unique()->word();
            $groupName = [
                'en' => $name,
                'ka' => $name
            ];

            Product::all()->each(function ($product) use ($groupName) {
                ProductSpecification::factory()->create([
                    'product_id' => $product->id,
                    'group_name' => $groupName
                ]);
            });
        }
    }
}
