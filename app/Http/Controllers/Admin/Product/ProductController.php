<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FileIluminate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.products.index');
    }

    public function create()
    {
        return view('admin.dashboard.products.create');
    }

    public function store(Request $request)
    {
        $path = storage_path('app/public/uploads');
        // Crear el directorio si no existe
        if (!FileIluminate::exists($path)) {
            Storage::makeDirectory('public/uploads', 0777, true);
        }

        // Imagen principal
        $manager = new ImageManager(new Driver());
        $imagen = $request->file('imagen');
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();
        $imagenServidor = $manager->read($imagen);
        $imagenServidor->cover(1000, 1000);
        $imagenServidor->save(storage_path('app/public/uploads/' . $nombreImagen));

        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'description_short' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images' => 'required|string',
        ]);

        $product = Product::create([
            'title' => $request->title,
            'subTitle' => $request->subTitle,
            'description' => $request->description,
            'description_short' => $request->description_short,
            'imagen' => $nombreImagen,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Galería de imagenes
        $imagesArray = json_decode($request->images, true);
        // Verifica que haya sido decodificado correctamente
        if (json_last_error() === JSON_ERROR_NONE) {
            foreach ($imagesArray as $image) {
                File::create([
                    'product_id' => $product->id,
                    'title' => pathinfo($image, PATHINFO_FILENAME),
                    'imagen' => $image,
                ]);
            }
        }
    }
}