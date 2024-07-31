<?php

namespace App\Livewire\Shoppingcart;

use Livewire\Component;

class CountProduct extends Component
{
    public $count;

    protected $listeners = ['countProducts'];

    public function mount(){
        $this->count = count(session('cart', []));
    }

    public function countProducts(){
        $this->count = count(session('cart', []));
    }

    public function render()
    {
        /* $this->count = count(session('cart', [])); */
        return view('livewire.shoppingcart.count-product');
    }
}