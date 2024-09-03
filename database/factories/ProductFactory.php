<?php

namespace Database\Factories;

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
        return [
            'code_no' => $this->faker->ean8,
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->numberBetween(3000,300000),
            'discount' => rand(0,50),
            'description' => $this->faker->paragraph,
            'in_stock' => rand(0,1),
            'category_id' => rand(1,10),
        ];
    }
}
