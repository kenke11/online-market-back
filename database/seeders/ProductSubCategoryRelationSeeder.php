<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ProductSubCategoryRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $subCategories = SubCategory::all();

        foreach ($products as $product) {
            $randomCategories = $subCategories->random(rand(1, 5));
            $product->subCategories()->attach($randomCategories);
        }
    }
}
