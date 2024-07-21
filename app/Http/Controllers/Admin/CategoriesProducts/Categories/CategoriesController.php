<?php

namespace App\Http\Controllers\Admin\CategoriesProducts\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.dashboard.categoriesProducts.categories.index', compact('categories'));
    }

    public function edit(Request $request)
    {
        $categorie = Categorie::findOrFail($request->id);

        return response()->json([
            'categorie' => $categorie,
            'type' => 'success'
        ]);
    }

    public function store(Request $request){

        $categorie = Categorie::create([
            'name' => $request->categorie
        ]);

        return response()->json([
            'type' => 'success'
        ]);
    }

    public function update(Request $request){

        $categorie = Categorie::findOrFail($request->id);
        $categorie->name = $request->categorie;
        $categorie->save();

        return response()->json([
            'type' => 'success'
        ]);
    }

    public function destroy(Categorie $categorie){

        /* $isRemoved = $category->delete(); */
        $isRemoved = $categorie->delete();

        return response()->json([
            'type' => $isRemoved,
        ]);
    }

    public function getData()
    {
        $data = Categorie::latest()->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}