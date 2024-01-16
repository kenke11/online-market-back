<?php

namespace Database\Factories;

use App\Models\ProductSpecification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specification>
 */
class SpecificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word;

        $specificationName = [
            'en' => $name,
            'ka' => $name
        ];

        $paragraph = fake()->paragraph(1, 1);

        $desc = [
            'en' => $paragraph,
            'ka' => $paragraph
        ];

        return [
            'name' => $specificationName,
            'is_color' => false,
            'color_value' => null,
            'specification_description' => $desc,
            'product_specification_id' => ProductSpecification::all()->random()->id
        ];
    }
}
