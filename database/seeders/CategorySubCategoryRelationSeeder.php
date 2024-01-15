<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategorySubCategoryRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        foreach ($subCategories as $subCategory) {
            $randomCategories = $categories->random(rand(1, $categories->count()));
            $subCategory->categories()->attach($randomCategories);
        }
    }
}
