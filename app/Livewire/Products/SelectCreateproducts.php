<?php

namespace App\Livewire\Products;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Subcategorie;
use Livewire\Component;

class SelectCreateproducts extends Component
{

    public $categories;
    public $subcategories = [];
    public $brands = [];
    public $selectedCategory;
    public $selectedSubcategory;
    public $selectedBrand;


    public function mount()
    {
        $this->categories = Categorie::all();
        /* $this->subcategories = Subcategorie::all();
        $this->brands = Brand::all(); */
        $this->selectedCategory = null;
        $this->selectedSubcategory = null;
        $this->selectedBrand = null;
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
        return view('livewire.products.select-createproducts');
    }
}
