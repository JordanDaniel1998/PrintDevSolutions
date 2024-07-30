<?php

namespace App\Livewire\Shoppingcart;

use App\Models\Blog;
use App\Models\Information;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShoppingCart extends Component
{
    protected $listeners = ['addProductToCart', 'quantityUpdatedIncart', 'refreshCart'];
    public $quantity;
    public $cart = [];
    public $igv;

    public function handleIncrement($id)
    {
        $this->cart = session('cart', []);

        if (isset($this->cart[$id])) {
            $stock = Product::findOrFail($id)->stock;

            if ($stock > $this->cart[$id]['quantity']) {
                $this->cart[$id]['quantity'] = $this->cart[$id]['quantity'] + 1;
            }
            session(['cart' => $this->cart]);
            $this->dispatch('updatedQuantityFromShopping');
        }
    }

    public function deleteProductFromCart($id)
    {
        $this->cart = session('cart', []);
        if (isset($this->cart[$id])) {
            unset($this->cart[$id]);
        }
        session(['cart' => $this->cart]);
        $this->dispatch('refreshAfterDelete', $id);
    }

    public function handleDecrement($id)
    {
        $this->cart = session('cart', []);

        if (isset($this->cart[$id])) {
            if ($this->cart[$id]['quantity'] > 1) {
                $this->cart[$id]['quantity'] = $this->cart[$id]['quantity'] - 1;
            }
            session(['cart' => $this->cart]);
            $this->dispatch('updatedQuantityFromShopping');
        }
    }

    public function refreshCart()
    {
        $this->cart = session('cart', []);
    }

    public function mount()
    {
        $this->cart = session('cart', []);
        $this->igv = 0.18;
    }

    public function calculateSubTotal()
    {
        $subTotal = 0;

        foreach ($this->cart as $item) {
            $subTotal = $subTotal + $item['quantity'] * round($item['price'] - ($item['discount'] / 100) * $item['price'], 2);
        }

        return $subTotal;
    }

    public function calculateDiscountSubTotal()
    {
        $discount = 0;

        foreach ($this->cart as $item) {
            $discount = $discount + round(($item['discount'] / 100) * $item['price'], 2);
        }

        return $discount;
    }

    public function render()
    {
        /*   session()->forget('cart'); */
        $subTotal = $this->calculateSubTotal();

        return view('livewire.shoppingcart.shopping-cart', ['carts' => $this->cart, 'subTotal' => $subTotal]);
    }
}