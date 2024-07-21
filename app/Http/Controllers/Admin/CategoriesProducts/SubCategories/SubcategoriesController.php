<?php

namespace App\Http\Controllers\Admin\CategoriesProducts\SubCategories;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Subcategorie;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();

        return view('admin.dashboard.categoriesProducts.subcategories.index', compact('categories'));
    }

    public function edit(Subcategorie $subcategorie)
    {

        return response()->json([
            'subcategory' => $subcategorie,
            'type' => 'success'
        ]);
    }

    public function update(Request $request){

        $subcategorie = Subcategorie::findOrFail($request->subcategorie_id);
        $subcategorie->name = $request->subcategorie;
        $subcategorie->categorie_id = $request->categorie_id;
        $subcategorie->save();

        return response()->json([
            'type' => "success"
        ]);
    }


    public function store(Request $request){

        $subcategory = Subcategorie::create([
            'categorie_id' => $request->id,
            'name' => $request->subcategory
        ]);

        return response()->json([
            'type' => 'success'
        ]);
    }

    public function destroy(Subcategorie $subcategorie){

        /* $isRemoved = $category->delete(); */
        $isRemoved = $subcategorie->delete();

        return response()->json([
            'type' => $isRemoved,
        ]);
    }


    public function getData()
    {
        $data = Subcategorie::latest()->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
