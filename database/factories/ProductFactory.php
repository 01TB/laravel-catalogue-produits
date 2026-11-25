<?php
// database/factories/ProductFactory.php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->words(3, true) . ' ' . $this->faker->randomElement(['Pro', 'Ultra', 'X', '2025', 'Premium', 'Edition']),
            'price'       => $this->faker->randomFloat(2, 9.99, 1499.99),
            'category_id' => null, // Très important : on met null ici, recycle() le remplacera
            'description' => $this->faker->optional(0.85)->paragraphs(3, true),
            'is_active'   => $this->faker->boolean(88),
        ];
    }
}
