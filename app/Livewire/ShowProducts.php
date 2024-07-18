<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowProducts extends Component
{
    #[On('deleteProductById')]
    public function deleteProductById(Product $product)
    {
        // Eliminar la galeria de imagenes del producto
        foreach ($product->files as $file) {
            $filePath = 'public/uploads/' . $file->imagen;
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        // Eliminar la foto principal
        $productImagen = 'public/uploads/' . $product->imagen;
        if (Storage::exists($productImagen)) {
            Storage::delete($productImagen);
        }

        $product->delete();
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.show-products', compact('products'));
    }
}