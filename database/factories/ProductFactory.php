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
    public function definition()
    {
        $category_ids = Category::pluck('id')->toArray();
        return [
            'name' => fake()->name(),
            'description' => fake()->text,
            'category_id' => fake()->randomElement($category_ids),
            'price' => fake()->numberBetween(1,100),
            'timeDelivery' => fake()->numberBetween(1,10)."-".fake()->numberBetween(1,10),
            'images' => fake()->imageUrl,
        ];
    }
}
