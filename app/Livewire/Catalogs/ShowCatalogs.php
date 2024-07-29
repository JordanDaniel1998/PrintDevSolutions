<?php

namespace App\Livewire\Catalogs;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Subcategorie;
use Livewire\Component;

class ShowCatalogs extends Component
{

    public $subcategories = [];
    public $brands = [];
    public $selectedCategory = null;
    public $selectedSubCategory = null;
    public $selectedBrand = null;
    public $allProducts = false;
    public $selectedOrders = null;

    public function filterSubCategoryByCategory($id){
        $this->selectedCategory = $id;
        $this->subcategories = Subcategorie::where('categorie_id', $id)->get();
        $this->dispatch('filterProductsByCategory', $id);
        $this->allProducts = true;
    }

    public function filterBrandBySubCategory($id){
        $this->selectedSubCategory = $id;
        $this->brands = Brand::where('subcategorie_id', $id)->get();
        $this->dispatch('filterProductsBySubCategory', $id);
        $this->allProducts = true;
    }

    public function filterByBrand($id){
        $this->selectedBrand = $id;
        $this->dispatch('filterProductsByBrands', $id);
        $this->allProducts = true;
    }

    public function filterByAscPrices(){
        $this->selectedOrders = 'asc_prices';
        $this->dispatch('filterProductsByAscPrices');
    }

    public function filterByDescPrices(){
        $this->selectedOrders = 'desc_prices';
        $this->dispatch('filterProductsByDescPrices');
    }

    public function filterByProductDiscount(){
        $this->selectedOrders = 'discount_products';
        $this->dispatch('filterProductsByDiscount');
    }

    public function filterByProductsRecent(){
        $this->selectedOrders = 'recent_products';
        $this->dispatch('filterProductsByRecent');
    }

    public function filterByProductsLaunch(){
        $this->selectedOrders = 'launch_products';
        $this->dispatch('filterProductsByLaunch');
    }

    public function resetFilter(){
        $this->reset(['selectedCategory', 'selectedSubCategory', 'selectedBrand', 'allProducts']);
        $this->dispatch('resetFilterProducts');
    }

    public function render()
    {

        $categories = Categorie::all();

        return view('livewire.catalogs.show-catalogs', compact('categories'));
    }
}