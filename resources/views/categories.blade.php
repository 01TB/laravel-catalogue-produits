<!DOCTYPE html>
<html>
<head>
    <title>Catégorie</title>
</head>
<body>
    <h1>Liste des catégories</h1>
    <ul>
        @foreach($categories as $category)
            <li>
                <strong>{{ $category->name }}</strong> ({{ $category->slug }})
                <p>Couleur : {{ $category->color }}</p>
                <p>{{ $category->description }}</p>
                <br>
            </li>
        @endforeach
    </ul>
</body>
</html>
