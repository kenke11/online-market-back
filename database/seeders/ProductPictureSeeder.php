<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::all()->each(function ($product) {
            $numbers = rand(1, 3);

            for ($i = 0; $numbers > $i; $i++) {
                ProductPicture::factory()->create([
                    'product_id' => $product->id,
                    'is_main' => !$i
                ]);
            }
        });
    }
}
