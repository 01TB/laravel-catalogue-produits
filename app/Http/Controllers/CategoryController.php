<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug|max:255',
            'color' => 'required|max:255',
            'description' => 'nullable',
            'is_active' => 'boolean',
        ]);

        $category = new Category();
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->color = $validatedData['color'];
        $category->description = $validatedData['description'] ?? null;
        $category->is_active = $validatedData['is_active'] ?? true;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,' . $id . '|max:255',
            'color' => 'required|max:255',
            'description' => 'nullable',
            'is_active' => 'boolean',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->color = $validatedData['color'];
        $category->description = $validatedData['description'] ?? null;
        $category->is_active = $validatedData['is_active'] ?? true;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}
