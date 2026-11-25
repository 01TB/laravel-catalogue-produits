<!DOCTYPE html>
<html>
<head>
    <title>Catégories</title>
</head>
<body>
    <h1><strong>{{ $category->name }}</strong></h1>
    <p>Couleur : {{ $category->color }}</p>
    <p>{{ $category->description }}</p>
</body>
</html>
