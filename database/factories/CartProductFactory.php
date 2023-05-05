<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartProduct>
 */
class CartProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_ids = Product::pluck('id')->toArray();
        $cart_ids = Cart::pluck('id')->toArray();

        $product_id = fake()->randomElement($product_ids);
        $cart_id = fake()->randomElement($cart_ids);

        $price = Product::findOrFail($product_id)->price;

        return [
            'product_id' => $product_id,
            'cart_id' => $cart_id,
            'price' => $price,
            'image_logo' => fake()->imageUrl,
            'image_content' => fake()->imageUrl,
            'company_name' => fake()->name,
            'width' => fake()->numberBetween(1,100),
            'height' => fake()->numberBetween(1,100),
            'phone' => fake()->phoneNumber,
            'website' => fake()->url,
            'email' => fake()->email,
            'social_media_details' => fake()->text,
            'more_details' => fake()->text,
        ];
    }
}
