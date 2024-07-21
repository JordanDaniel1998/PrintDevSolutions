<?php

namespace App\Livewire\Products;

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

        // Eliminar la foto principal del producto
        $productImagen = 'public/uploads/' . $product->imagen;
        if (Storage::exists($productImagen)) {
            Storage::delete($productImagen);
        }

        $product->delete();


    }


    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.products.show-products', compact('products'));
    }
}