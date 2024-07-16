<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $files = [];

    protected $listeners = ['fileAdded', 'fileRemoved'];

    public function fileAdded($file)
    {
        // Decodifica el archivo recibido
        $file = json_decode($file, true);
        $this->files[] = $file;
    }

    public $title;
    public $subTitle;
    public $description;
    public $imagen;
    public $description_short;
    public $price;
    public $stock;

    protected $rules = [
        'title' => 'required|max:30',
        'subTitle' => 'required|max:30',
        'description' => 'required|max:30',
        'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'description_short' => 'required|max:30',
        'price' => 'required|numeric|min:0|max:999999.99',
        'stock' => 'required|integer|min:0|max:999999',
        'files' => 'required'
    ];

    public function saveProduct()
    {
        $data = $this->validate($this->rules);

        dd($data);
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
