<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileIluminate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PartnersController extends Controller
{
    public function index()
    {
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.partners.index', compact('admin'));
    }

    public function create()
    {
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.partners.create', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pathUploads = storage_path('app/public/partners');

        // Crear el directorio si no existe
        if (!FileIluminate::exists($pathUploads)) {
            Storage::makeDirectory('public/partners', 0777, true);
        }

        $manager = new ImageManager(new Driver());
        $imagen = $request->file('imagen');
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();
        $imagenServidor = $manager->read($imagen);
        $imagenServidor->coverDown(160, 80, 'center');
        $imagenServidor->save(storage_path('app/public/partners/' . $nombreImagen));

        $partner = Partner::create([
            'title' => $request->title,
            'description' => $request->description,
            'imagen' => $nombreImagen,
        ]);

        return redirect()->route('partners.index');
    }

    public function edit(Partner $partner)
    {
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.partners.edit', compact('partner', 'admin'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Imagen principal
        $path = storage_path('app/public/partners');
        // Crear el directorio si no existe
        if (!FileIluminate::exists($path)) {
            Storage::makeDirectory('public/partners', 0777, true);
        }

        if ($request->hasFile('imagen')) {
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
            $imagenServidor = $manager->read($imagen);
            $imagenServidor->coverDown(160, 40, 'center');
            $imagenServidor->save(storage_path('app/public/partners/' . $nombreImagen));

            // Borrar la imagen antigua del storage
            $filePath = 'public/partners/' . $partner->imagen;
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        } else {
            $nombreImagen = $partner->imagen;
        }

        $partner->title = $request->title;
        $partner->description = $request->description;
        $partner->imagen = $nombreImagen;

        $partner->save();

        return redirect()->route('partners.index');
    }

    public function visible(Request $request)
    {
        try {
            $partner = Partner::findOrFail($request->id);
            $partner->visible = $request->visible;
            $partner->save();

            return response()->json([
                'success' => $partner->visible ? 1 : 0,
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

    public function destroy(Partner $partner)
    {
        try {
            // Eliminar la foto principal
            $partnerImagen = 'public/partners/' . $partner->imagen;
            if (Storage::exists($partnerImagen)) {
                Storage::delete($partnerImagen);
            }

            $isRemove = $partner->delete();

            return response()->json(['isRemove' => $isRemove]);
        } catch (\Exception $th) {
            return response()->json(['message' => 'Error al eliminar el producto.'], 500);
        }
    }
}