<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FileIluminate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.dashboard.products.create');
    }

    public function store(Request $request)
    {
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

        try {
            // Empieza con la transacción
            DB::beginTransaction();

            $pathUploads = storage_path('app/public/uploads');

            // Crear el directorio si no existe
            if (!FileIluminate::exists($pathUploads)) {
                Storage::makeDirectory('public/uploads', 0777, true);
            }

            // Imagen principal
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
            $imagenServidor = $manager->read($imagen);
            $imagenServidor->cover(1000, 1000);
            $imagenServidor->save(storage_path('app/public/uploads/' . $nombreImagen));

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
                        'product_id' => $product->id, // $product->id
                        'title' => pathinfo($image, PATHINFO_FILENAME),
                        'imagen' => $image,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            // Si ocurre un error, deshace todos los cambios realizados en la transacción
            DB::rollBack();
            return redirect()
                ->back()
                ->with(['message' => 'error']);
        }
    }

    public function edit(Product $product)
    {
        // Obtenemos el array de imagenes
        $files = $product->files->pluck('imagen')->toArray();
        // Convertimos a cadena de texto
        $files = json_encode($files);

        return view('admin.dashboard.products.edit', compact('product', 'files'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'description_short' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images' => 'required|string',
        ]);

        // Imagen principal
        $path = storage_path('app/public/uploads');
        // Crear el directorio si no existe
        if (!FileIluminate::exists($path)) {
            Storage::makeDirectory('public/uploads', 0777, true);
        }

        if ($request->hasFile('imagen')) {
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
            $imagenServidor = $manager->read($imagen);
            $imagenServidor->cover(1000, 1000);
            $imagenServidor->save(storage_path('app/public/uploads/' . $nombreImagen));
        } else {
            $nombreImagen = $product->imagen;
        }

        // Agregamos la nueva galería de imagenes
        $imagesArray = json_decode($request->images, true);
        // Verifica que haya sido decodificado correctamente
        if (json_last_error() === JSON_ERROR_NONE) {
            foreach ($product->files as $file) {
                // Si la imagen de la bd esta contenida en el nuevo array de imagenes, no se elimina del storage, pero si se elimina de la bd
                if (!in_array($file->imagen, $imagesArray)) {
                    // Eliminar del storage las imagenes previas
                    $filePath = 'public/uploads/' . $file->imagen;

                    if (Storage::exists($filePath)) {
                        Storage::delete($filePath);
                    }
                }
                // Eliminar la imagen en la bd
                $file->delete();
            }

            // Agrega las nuevas imagenes
            foreach ($imagesArray as $image) {
                File::create([
                    'product_id' => $product->id,
                    'title' => pathinfo($image, PATHINFO_FILENAME),
                    'imagen' => $image,
                ]);
            }
        }

        // Actualizar el producto

        $product->title = $request->title;
        $product->subTitle = $request->subTitle;
        $product->description = $request->description;
        $product->description_short = $request->description_short;
        $product->imagen = $nombreImagen;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        try {
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

            $isRemove = $product->delete();

            return response()->json(['isRemove' => $isRemove]);
        } catch (\Exception $th) {
            return response()->json(['message' => 'Error al eliminar el producto.'], 500);
        }
    }

    public function visible(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->visible = $request->visible;
            $product->save();

            return response()->json([
                'success' => $product->visible ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function highlighted(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->destacado = $request->highlighted;
            $product->save();

            return response()->json([
                'success' => $product->destacado ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }
}