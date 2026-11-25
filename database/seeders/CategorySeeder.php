<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Catégories fixes (toujours les mêmes, slugs garantis uniques)
        Category::factory()
            ->count(10) // on ne crée qu'une fois chaque ligne du sequence
            ->sequence(
                ['name' => 'Electronique',      'slug' => 'electronique',      'color' => '#3B82F6'],
                ['name' => 'Vêtements',         'slug' => 'vetements',         'color' => '#EF4444'],
                ['name' => 'Maison & Jardin',   'slug' => 'maison-jardin',     'color' => '#10B981'],
                ['name' => 'Sport & Loisirs',   'slug' => 'sport-loisirs',     'color' => '#F59E0B'],
                ['name' => 'Beauté & Santé',    'slug' => 'beaute-sante',      'color' => '#EC4899'],
                ['name' => 'Livres',            'slug' => 'livres',            'color' => '#8B5CF6'],
                ['name' => 'Jouets & Jeux',     'slug' => 'jouets-jeux',       'color' => '#F97316'],
                ['name' => 'Alimentation',      'slug' => 'alimentation',      'color' => '#84CC16'],
                ['name' => 'Auto & Moto',       'slug' => 'auto-moto',         'color' => '#6366F1'],
                ['name' => 'Bricolage',         'slug' => 'bricolage',         'color' => '#0EA5E9'],
            )
            ->create();

    }
}
