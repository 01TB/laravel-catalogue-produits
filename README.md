# Catalogue produits – Laravel 12

Application web de gestion d'un catalogue (produits et catégories) réalisée en **Laravel 12 / PHP 8.2** dans le cadre du cours de Web avancé de Licence 3 à l'IT University (Antananarivo, décembre 2025).

## Fonctionnalités

- CRUD complet des **catégories** (slug, activation) et des **produits**
- Relations Eloquent : une catégorie `hasMany` produits, un produit `belongsTo` une catégorie
- **Eager loading** (`Product::with('category')`) pour éviter le problème des requêtes N+1
- Liste des produits avec **recherche** par nom, **filtre** par catégorie, **tri** par prix et **pagination**
- **Validation** des formulaires avec des Form Requests (`StoreProductRequest`, `UpdateProductRequest`) : nom unique, prix > 0, catégorie existante
- Vues **Blade** avec un layout commun (Bootstrap 5), messages flash de confirmation
- Migrations, factories et seeders pour générer des données de test

## Structure

```
app/Http/Controllers/   CategoryController, ProductController
app/Http/Requests/      règles de validation des produits
app/Models/             Category, Product (relations, casts, $fillable)
database/               migrations, factories, seeders
resources/views/        layouts/app.blade.php, categories/*, products/*
routes/web.php          routes groupées par ressource
```

## Lancer le projet avec Docker

L'environnement comprend trois conteneurs : PHP-FPM 8.2, Nginx 1.25 et MySQL 8.

```bash
cp .env.example .env
# dans .env : DB_CONNECTION=mysql, DB_HOST=mysql, DB_DATABASE=laravel,
#             DB_USERNAME=laravel, DB_PASSWORD=root
docker compose up -d --build
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

L'application est ensuite disponible sur http://localhost:8000.

## Stack

PHP 8.2 · Laravel 12 · Eloquent ORM · Blade · Bootstrap 5 · MySQL 8 · Docker (PHP-FPM, Nginx)
