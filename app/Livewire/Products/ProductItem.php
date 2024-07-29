<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductItem extends Component
{
    public $product = null;
    public $quantity = 1;
    public $codigo = null;

    public function mount(Product $product)
    {
        $cart = session('cart', []);
        $this->product = $product;
        if (isset($cart[$this->product->id])) {
            $this->quantity = $cart[$this->product->id]['quantity'];
        }
    }

    protected $listeners = ['updatedQuantityFromShopping', 'refreshAfterDelete'];

    public function updatedQuantityFromShopping()
    {
        $cart = session('cart', []);
        // Producto actual que se muestra en la vista
        $this->quantity = $cart[$this->product->id]['quantity'];
    }

    public function handleIncrement()
    {
        $product = Product::findOrFail($this->product->id);
        if ($this->quantity < $product->stock) {
            $this->quantity = $this->quantity + 1;
        }
    }

    public function handleDecrement()
    {
        if ($this->quantity > 1) {
            $this->quantity = $this->quantity - 1;
        }
    }

    public function handleColor($codigo)
    {
        $this->codigo = $codigo;
    }

    public function refreshAfterDelete($id)
    {
        if ($this->product->id == $id) {
            $this->quantity = 1;
        }
    }

    public function addProductToCartFromProductItem(Product $product, $quantity, $codigo)
    {
        $cart = session('cart', []);

        $cart[$product->id] = [
            'id' => $product->id,
            'title' => $product->title,
            'quantity' => $quantity,
            'image' => $product->imagen,
            'sku' => $product->sku,
            'price' => $product->price,
            'color' => $codigo,
        ];
        session(['cart' => $cart]);
        $this->dispatch('refreshCart');
    }

    public function render()
    {
        $this->product = Product::with([
            'files' => function ($query) {
                $query->latest()->limit(4);
            },
        ])->find($this->product->id);

        return view('livewire.products.product-item', [
            'product' => $this->product,
        ]);
    }
}