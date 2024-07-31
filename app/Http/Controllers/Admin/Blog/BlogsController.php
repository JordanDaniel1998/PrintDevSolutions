<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FileIluminate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogsController extends Controller
{
    public function index()
    {
        $admin = User::findOrFail(auth()->user()->id);

        return view('admin.dashboard.blogs.index', compact('admin'));
    }

    public function create()
    {
        $categories = CategoryBlog::all();
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.blogs.create', compact('categories', 'admin'));
    }

    public function edit(Blog $blog)
    {
        $categories = CategoryBlog::all();
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.dashboard.blogs.edit', compact('categories', 'blog', 'admin'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'description_short' => 'required|string|max:255',
            'category' => 'required|integer',
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
                $imagenServidor->cover(1000, 500);
                $imagenServidor->save(storage_path('app/public/uploads/' . $nombreImagen));
            } else {
                $nombreImagen = $blog->imagen;
            }

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->subTitle = $request->subTitle;
            $blog->description_short = $request->description_short;
            $blog->imagen = $nombreImagen;
            $blog->keywords = $request->keywords;
            $blog->category_blog_id = $request->category;
            $blog->save();

            DB::commit();

            return redirect()->route('articles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(['message' => '¡Error! No se pudo editar el blog']);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subTitle' => 'required|string|max:255',
            'keywords' => 'required|string',
            'description_short' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|integer',
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
            $imagenServidor->coverDown(1000, 500, 'center');
            $imagenServidor->save(storage_path('app/public/uploads/' . $nombreImagen));

            $blog = Blog::create([
                'title' => $request->title,
                'description' => $request->description,
                'keywords' => $request->keywords,
                'description_short' => $request->description_short,
                'imagen' => $nombreImagen,
                'subTitle' => $request->subTitle,
                'category_blog_id' => $request->category,
            ]);

            DB::commit();

            return redirect()->route('articles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(['message' => '¡Error! No se pudo guardar el blog']);
        }
    }

    public function visible(Request $request)
    {
        try {
            /* dd($request); */
            $blog = Blog::findOrFail($request->id);
            $blog->visible = $request->visible;
            $blog->save();

            return response()->json([
                'success' => $blog->visible ? 1 : 0,
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

    public function destroy(Blog $blog)
    {
        try {
            // Eliminar la foto principal
            $blogImagen = 'public/uploads/' . $blog->imagen;
            if (Storage::exists($blogImagen)) {
                Storage::delete($blogImagen);
            }

            $type = $blog->delete();

            return response()->json(['type' => $type]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el blog.'], 500);
        }
    }

    public function getData()
    {
        $data = Blog::latest()->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}