<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word();

        $details = [
            'en' => json_encode([
                [
                    'title' => fake()->word,
                    'desc' => fake()->paragraph(rand(1, 3))
                ],
                [
                    'title' => fake()->word,
                    'desc' => fake()->paragraph(rand(1, 2))
                ],
                [
                    'title' => fake()->word,
                    'desc' => fake()->paragraph(rand(1, 3))
                ],
            ]),
            'ka' => json_encode([
                [
                    'title' => fake()->word,
                    'desc' => fake()->paragraph(rand(2, 4))
                ],
                [
                    'title' => fake()->word,
                    'desc' => fake()->paragraph(rand(1, 2))
                ],
                [
                    'title' => fake()->word,
                    'desc' => fake()->paragraph(rand(2, 3))
                ],
            ])
        ];

        $withSale = fake()->boolean();
        $price = fake()->numberBetween(4000, 5000);
        $salePrice = $withSale ? $price - fake()->numberBetween(100, 3000) : null;

        return [
            'name' => [
                'en' => $name,
                'ka' => $name
            ],
            'slug' => $name,
            'with_sale' => $withSale,
            'price' => $price,
            'sale_price' => $salePrice,
            'details' => $details,
            'category_id' => Category::all()->random()->id
        ];
    }
}
