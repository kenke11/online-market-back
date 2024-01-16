<?php

namespace Database\Seeders;

use App\Models\ProductPicture;
use App\Models\ProductSpecification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(LocaleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(CategorySubCategoryRelationSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductSubCategoryRelationSeeder::class);
        $this->call(ProductPictureSeeder::class);
        $this->call(ProductSpecificationSeeder::class);
    }
}
