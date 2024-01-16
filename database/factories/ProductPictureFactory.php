<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPicture>
 */
class ProductPictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $img = fake()->unique()->image();
        $destinationPath = 'images/products/' . hash('sha256', fake()->unique()->firstName()) . '.jpg';
        Storage::disk('public')->put($destinationPath, file_get_contents($img));

        return [
            'product_id' => Product::all()->random()->id,
            'is_main' => 0,
            'picture_url' => $destinationPath
        ];

    }
}
