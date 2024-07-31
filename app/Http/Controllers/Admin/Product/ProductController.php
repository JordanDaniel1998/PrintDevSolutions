<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\File;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Subcategorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FileIluminate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $admin = User::findOrFail(auth()->user()->id);
        $products = Product::latest()->get();

        return view('admin.dashboard.products.index', compact('products', 'admin'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.products.create', compact('categories', 'admin'));
    }

    private function generateSku($name)
    {
        $sku = strtoupper(substr($name, 0, 3)) . time();
        return $sku;
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'description_short' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images' => 'required|string|max:255',
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'brand' => 'required|integer|integer',
            'discount' => 'required|numeric|min:0|max:100',
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
                'categorie_id' => $request->category,
                'subcategorie_id' => $request->subcategory,
                'brand_id' => $request->brand,
                'discount' => $request->discount,
                'sku' => $this->generateSku($request->title),
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

            // Extraer y organizar las especificaciones
            $specifications = [];
            foreach ($request->all() as $key => $value) {
                // strpos($key, 'specifications_') -> (specifications_0_key, specifications_) devuelve la posición en la que encuentra la primera letra de la cadena a buscar
                if (strpos($key, 'specifications_') === 0) {
                    // explode -> divide la cadena por el separador que se coloque
                    $index = explode('_', $key)[1]; // specifications_0_key -> 0, 1, 2, ..
                    $subKey = explode('_', $key)[2] ?? null; // specifications_0_value -> key o value

                    // $specifications = [0 => ['specification_key' => $value, 'specification_value' => $value], ......]
                    if ($subKey === 'key') {
                        $specifications[$index]['specification_key'] = $value;
                    } elseif ($subKey === 'value') {
                        $specifications[$index]['specification_value'] = $value;
                    }
                }
            }

            // Insertar las especificaciones usando la relación
            $product->specifications()->createMany(array_filter($specifications, fn($spec) => !empty($spec['specification_key']) && !empty($spec['specification_value'])));

            // Filtrar colores no vacios
            /* $colors = array_filter($request->colors, fn($color) => !empty($color)); */
            // Genera un arreglo asociativo con códigos únicos como claves
            $formattedColors = array_map(fn($color) => ['codigo' => $color], $request->colors);
            // Inserta los colores
            $product->attributes()->createMany($formattedColors);

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

        // Categorias
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $brands = Brand::all();

        $admin = User::findOrFail(auth()->user()->id);

        return view('admin.dashboard.products.edit', compact('product', 'files', 'categories', 'subcategories', 'brands', 'admin'));
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
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'brand' => 'required|integer',
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        try {
            // Empieza con la transacción
            DB::beginTransaction();

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
            $product->categorie_id = $request->category;
            $product->subcategorie_id = $request->subcategory;
            $product->brand_id = $request->brand;
            $product->discount = $request->discount;
            $product->sku = $this->generateSku($request->title);
            $product->save();

            // Extraer y organizar las especificaciones
            $specifications = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'specifications_') === 0) {
                    $parts = explode('_', $key);
                    $index = $parts[1];
                    $subKey = $parts[2] ?? null;

                    if ($subKey === 'key') {
                        $specifications[$index]['specification_key'] = $value;
                    } elseif ($subKey === 'value') {
                        $specifications[$index]['specification_value'] = $value;
                    }
                }
            }

            // Filtrar especificaciones válidas, es decir aquellas que no son vacías
            $validSpecifications = array_filter($specifications, function ($spec) {
                return !empty($spec['specification_key']) && !empty($spec['specification_value']);
            });
            // Primero eliminamos las especificaciones antiguas
            $product->specifications()->delete();
            // Luego insertamos las nuevas especificaciones
            $product->specifications()->createMany($validSpecifications);


            $formattedColors = array_map(fn($color) => ['codigo' => $color], $request->colors);
            $product->attributes()->delete();
            $product->attributes()->createMany($formattedColors);

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

    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategorie::where('categorie_id', $categoryId)->get();

        return response()->json([
            'subcategories' => $subcategories,
        ]);
    }

    public function getBrands($subcategoryId)
    {
        $brands = Brand::where('subcategorie_id', $subcategoryId)->get();

        return response()->json([
            'brands' => $brands,
        ]);
    }
}