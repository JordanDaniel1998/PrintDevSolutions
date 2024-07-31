<?php

namespace App\Http\Controllers\Admin\CategoriesProducts\Brands;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Subcategorie;
use App\Models\User;
use Illuminate\Http\Request;

class BrandsController extends Controller
{

    public function index()
    {
        $subcategories = Subcategorie::all();
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.categoriesProducts.brands.index', compact('subcategories', 'admin'));
    }

    public function edit(Brand $brand)
    {

        return response()->json([
            'brand' => $brand,
            'type' => 'success'
        ]);
    }

    public function update(Request $request){

        $brand = Brand::findOrFail($request->brand_id);
        $brand->name = $request->brand;
        $brand->subcategorie_id = $request->subcategorie_id;
        $brand->save();

        return response()->json([
            'type' => "success"
        ]);
    }


    public function store(Request $request){

        $brand = Brand::create([
            'subcategorie_id' => $request->id,
            'name' => $request->brand
        ]);

        return response()->json([
            'type' => 'success'
        ]);
    }

    public function destroy(Brand $brand){

        /* $isRemoved = $category->delete(); */
        $isRemoved = $brand->delete();

        return response()->json([
            'type' => $isRemoved,
        ]);
    }


    public function getData()
    {
        $data = Brand::latest()->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}