<?php

namespace App\Http\Controllers\Admin\CategoriesBlogs;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategoriesBlogsController extends Controller
{
    public function index()
    {
        $admin = User::findOrFail(auth()->user()->id);
        $categorys = CategoryBlog::all();

        return view('admin.dashboard.categoriesBlogs.index', compact('categorys', 'admin'));
    }

    // Cuando usas Route model binding, el parametro debe coincidir con su modelo
    public function edit(CategoryBlog $categoryBlog)
    {
        return response()->json([
            'category' => $categoryBlog,
            'type' => 'success',
        ]);
    }

    public function store(Request $request)
    {
        $categorie = CategoryBlog::create([
            'name' => $request->categorie,
        ]);

        return response()->json([
            'type' => 'success',
            'data' => $categorie,
        ]);
    }

    public function update(Request $request)
    {
        $categorie = CategoryBlog::findOrFail($request->id);
        $categorie->name = $request->categorie;
        $categorie->save();

        return response()->json([
            'type' => 'success',
        ]);
    }

    public function destroy(CategoryBlog $categoryBlog)
    {
        try {
            $isRemoved = $categoryBlog->delete();

            return response()->json([
                'type' => $isRemoved,
            ]);
        } catch (QueryException $e) {
            // Manejar el error de restricción de clave foránea
            return response()->json(
                [
                    'error' => 'No se puede eliminar la categoría debido a que esta asociado a un blog.',
                    'message' => $e->getMessage(),
                ],
                400,
            );
        } catch (\Throwable $th) {
            // Manejar otros tipos de errores
            return response()->json(
                [
                    'error' => 'Ha ocurrido un error al eliminar la categoría del blog.',
                    'message' => $th->getMessage(),
                ],
                500,
            );
        }
    }

    public function getData()
    {
        $data = CategoryBlog::latest()->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}