<?php

namespace App\Livewire\Shoppingcart;

use Livewire\Component;

class Resume extends Component
{
    public $deliveryMethod;
    public $subTotal;
    public $igv;
    public $total;
    public $impuesto;

    public function calculateSubTotal($carts)
    {
        $subTotal = 0;

        foreach ($carts as $item) {
            $subTotal = $subTotal + $item['quantity'] * round($item['price'] - ($item['discount'] / 100) * $item['price'], 2);
        }

        return $subTotal;
    }

    public function updatedDeliveryMethod($value)
    {
        $carts = session('cart', []);
        if ($value == 'express') {
            $this->subTotal = $this->calculateSubTotal($carts) + 15;
        }
        if ($value == 'recoger') {
            $this->subTotal = 1.1 * $this->calculateSubTotal($carts);
        }

        $this->impuesto = 0.18 * $this->subTotal;

        $this->total = $this->subTotal + $this->impuesto;

        session(['subTotal' => $this->subTotal, 'total' => $this->total, 'type' => $value, 'impuesto' => $this->impuesto]);
    }

    public function redirectToNext()
    {
        if ($this->deliveryMethod) {
            return redirect()->route('carrito.create');
        }

        $this->dispatch('showAlertCart');
    }

    public function mount()
    {
        $this->subTotal = 0;
        $this->igv = 0;
        $this->total = 0;
        $this->impuesto = 0;
    }

    public function render()
    {
        return view('livewire.shoppingcart.resume');
    }
}