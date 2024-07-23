<?php

namespace App\Livewire\Products;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Subcategorie;
use Livewire\Component;

class SelectEditproducts extends Component
{
    public $categories;
    public $subcategories = [];
    public $brands = [];
    public $selectedCategory = null;
    public $selectedSubcategory = null;
    public $selectedBrand = null;
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->categories = Categorie::all();
        $this->subcategories = Subcategorie::where('categorie_id', $this->product->categorie_id)->get();
        $this->brands = Brand::where('subcategorie_id', $this->product->subcategorie_id)->get();
        $this->selectedCategory = $this->product->categorie_id;
        $this->selectedSubcategory = $this->product->subcategorie_id;
        $this->selectedBrand = $this->product->brand_id;
    }

    // Estos eventos de disparan a penas cambien su propiedad [wire:model="nombre_evento"] -> updatedNombre:evento

    public function updatedSelectedCategory($categoryId)
    {
        $this->subcategories = Subcategorie::where('categorie_id', $categoryId)->get();
        $this->selectedSubcategory = null;
        $this->selectedBrand = null;
        $this->brands = [];
    }

    public function updatedSelectedSubcategory($subcategoryId)
    {
        $this->brands = Brand::where('subcategorie_id', $subcategoryId)->get();
        $this->selectedBrand = null;
    }

    public function render()
    {
        return view('livewire.products.select-editproducts');
    }
}
