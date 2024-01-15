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

        return [
            'name' => [
                'en' => $name,
                'ka' => $name
            ],
            'slug' => $name,
            'price' => fake()->numberBetween(100, 5000),
            'details' => $details,
            'category_id' => Category::all()->random()->id
        ];
    }
}
