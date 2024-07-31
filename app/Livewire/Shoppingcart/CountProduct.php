<?php

namespace App\Livewire\Shoppingcart;

use Livewire\Component;

class CountProduct extends Component
{
    public $count;

    protected $listeners = ['countProducts'];

    public function mount(){
        $this->count = 0;
    }

    public function countProducts(){
        $this->count = count(session('cart', []));
    }

    public function render()
    {
        return view('livewire.shoppingcart.count-product', [
            'count' => $this->count
        ]);
    }
}