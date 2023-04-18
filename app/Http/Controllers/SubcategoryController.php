<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::whereHas('category', function($query){
            $query->whereNotIn('type', [3, 4]);
        })->paginate(10);
        
        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNotIn('type', [3,4])->get();
        
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'category_id' => 'required',
            ]
        );

        $subcategory = new Subcategory();
        $subcategory->name = Str::upper($request->name);
        $subcategory->slug = Str::slug($request->name);
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        session()->flash('mensaje', 'La Subcategoria se genero con Exito');

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();

        return view('subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate(
            [
                'name' => 'required',
                'category_id' => 'required',
            ]
        );

        $subcategory->name = Str::upper($request->name);
        $subcategory->slug = Str::slug($request->name);
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        session()->flash('mensaje', 'La Subcategoria se actualizo con Exito');
        
        return redirect()->route('subcategory.index', $subcategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        session()->flash('mensaje', 'La Subcategoria se elimino con Exito');

        return redirect()->route('subcategory.index');
    }
}
