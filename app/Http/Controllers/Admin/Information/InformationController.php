<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::all()->first();

        return view('admin.information.index', compact('informations'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            Information::where('id', 1)->update($data);

            return redirect()
                ->back()
                ->with([
                    'message' => 'Información actualizada',
                    'type' => 'success',
                ]);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with([
                    'message' => '¡Error! No se ah podido actualizar la información',
                    'type' => 'error',
                ]);
        }
    }
}