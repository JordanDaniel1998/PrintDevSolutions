<?php

namespace App\Livewire\Catalogs;

use App\Models\Categorie;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProducts extends Component
{
    use WithPagination; // Uso de la paginación en livewire

    public $category_id;
    public $subcategory_id;
    public $brand_id;
    public $filter_type = null;

    protected $listeners = ['filterProductsByCategory', 'filterProductsBySubCategory', 'filterProductsByBrands', 'resetFilterProducts', 'filterProductsByAscPrices', 'filterProductsByDescPrices', 'filterProductsByDiscount', 'filterProductsByRecent', 'filterProductsByLaunch'];

    public function filterProductsByCategory($id)
    {
        $this->category_id = $id;
    }

    public function filterProductsBySubCategory($id)
    {
        $this->subcategory_id = $id;
    }

    public function filterProductsByBrands($id)
    {
        $this->brand_id = $id;
    }

    public function resetFilterProducts(){
        $this->reset(['category_id', 'subcategory_id', 'brand_id']);
    }

    public function filterProductsByAscPrices(){
        $this->filter_type = 'asc_prices';
    }

    public function filterProductsByDescPrices(){
        $this->filter_type = 'desc_prices';
    }

    public function filterProductsByDiscount(){
        $this->filter_type = 'discount_products';
    }

    public function filterProductsByRecent(){
        $this->filter_type = 'recent_products';
    }

    public function filterProductsByLaunch(){
        $this->filter_type = 'launch_products';
    }

    public function render()
    {
        $products = Product::when($this->category_id, function ($query) {
            $query->where('categorie_id', $this->category_id);
        })
        ->when($this->subcategory_id, function ($query) {
                $query->where('subcategorie_id', $this->subcategory_id);
        })
        ->when($this->brand_id, function ($query) {
            $query->where('brand_id', $this->brand_id);
        })
        ->when($this->filter_type === 'asc_prices', function ($query) {
            $query->orderBy('price', 'asc');
        })
        ->when($this->filter_type === 'desc_prices', function ($query) {
            $query->orderBy('price', 'desc');
        })
        ->when($this->filter_type === 'discount_products', function ($query) {
            $query->where('discount', '>', 0);
        })
        ->when($this->filter_type === 'recent_products', function ($query) {
            $query->latest();
        })
        ->when($this->filter_type === 'launch_products', function ($query) {
            $query->where('destacado', 1);
        })
        ->where('visible', 1)
        ->paginate(3);


        return view('livewire.catalogs.filter-products', compact('products'));
    }
}