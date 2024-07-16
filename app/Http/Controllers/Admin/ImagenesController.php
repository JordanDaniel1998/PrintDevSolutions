<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileIluminate;
use Illuminate\Support\Facades\Storage;


class ImagenesController extends Controller
{
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $request->validate([
            'file' => 'required|array', // Validar que 'file' sea un array
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar cada archivo en el array
        ]);

        $path = storage_path('app/public/uploads');
        if (!FileIluminate::exists($path)) {
            Storage::makeDirectory('public/uploads', 0777, true);
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {

                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $nameWithExtension = pathinfo($imageName, PATHINFO_FILENAME);

                $imagenServidor = $manager->read($file);
                $imagenServidor->cover(1000, 1000);
                $imagenServidor->save(storage_path('app/public/uploads/' . $imageName));

            }
        }

        return response()->json([
            'nameOfImage' => $imageName,
            'nameWithExtension' => $nameWithExtension
        ], 200);

    }

    public function destroy(Request $request)
    {
        $datos = $request->name;
        return response()->json(['imagen' => $datos]);

    }
}