<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    // Une catégorie possède plusieurs produits
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Méthode pour compter les produits (utilisée dans la vue categories/index)
    public function getProductsCountAttribute(): int
    {
        return $this->products()->count();
    }
}
