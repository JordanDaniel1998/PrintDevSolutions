<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class SpecificationEditproducts extends Component
{
    public $product;
    public $specifications = [];

    public function mount(Product $product)
    {
        // Cargar el producto y sus especificaciones
        $this->product = Product::with('specifications')->findOrFail($product->id);
        $this->specifications = $this->product->specifications
            ->map(function ($spec) {
                return [
                    'key' => $spec->specification_key,
                    'value' => $spec->specification_value,
                ];
            })
            ->toArray();
    }

    public function addSpecification()
    {
        $this->specifications[] = ['specification_key' => '', 'specification_value' => ''];
    }

    public function removeSpecification($index)
    {
        unset($this->specifications[$index]);
        $this->specifications = array_values($this->specifications); // Reindexa el array
    }

    public function render()
    {
        return view('livewire.products.specification-editproducts');
    }
}