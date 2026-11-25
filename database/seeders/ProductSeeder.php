<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère toutes les catégories déjà créées
        $categories = Category::all();

        // Sécurité au cas où (ne devrait jamais arriver)
        if ($categories->isEmpty()) {
            $categories = Category::factory(10)->create();
        }

        // Méthode magique + state() pour forcer category_id
        Product::factory()
            ->count(30)
            ->recycle($categories)
            ->state(function () use ($categories) {
                return [
                    'category_id' => $categories->random()->id,
                ];
            })
            ->create();
    }
}
