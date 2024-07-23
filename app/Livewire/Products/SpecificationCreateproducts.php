<?php

namespace App\Livewire\Products;

use Livewire\Component;

class SpecificationCreateproducts extends Component
{
    public $specifications = [['key' => '', 'value' => '']];

    public function addSpecification()
    {
        // Agregar el nuevo array en l aultima posicion
        $this->specifications[] = ['key' => '', 'value' => ''];
    }

    public function removeSpecification($index)
    {
        // Elimina un elemento con el indice especificado
        unset($this->specifications[$index]);
        $this->specifications = array_values($this->specifications); // Re-index array
    }

    public function render()
    {
        return view('livewire.products.specification-createproducts');
    }
}
