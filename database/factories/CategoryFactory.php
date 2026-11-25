<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true); // ex: "Électronique", "Vêtements Femme"

        return [
            'name'        => ucfirst($name),
            'slug'        => Str::slug($name),
            'color'       => $this->faker->safeHexColor(),           // #3B82F6
            'description' => $this->faker->optional(0.7)->paragraph(2),
            'is_active'   => $this->faker->boolean(90),              // 90% de chance d’être actif
        ];
    }
}
