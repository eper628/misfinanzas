<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereNotIn('type', [3, 4])->paginate(10);
        
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            ]
        );

        $category = new Category();

        $category->type = $request->type;
        $category->name = Str::upper($request->name);
        $category->slug = Str::slug($request->name);
        $category->save();

        session()->flash('mensaje', 'La Categoria se genero con Exito');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $subcategories = Subcategory::where('category_id', $category->id)->get();

        return view('category.show', compact('category', 'subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
            'name' => 'required',
            ]
        );

        $category->type = $request->type;
        $category->name = Str::upper($request->name);
        $category->slug = Str::slug($request->name);
        $category->save();
        
        session()->flash('mensaje', 'La Categoria se actualizo con Exito');
        
        return redirect()->route('category.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('mensaje', 'La Categoria se elimino con Exito');

        return redirect()->route('category.index');
    }
}
