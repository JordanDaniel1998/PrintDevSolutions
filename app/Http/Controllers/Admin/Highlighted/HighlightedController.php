<?php

namespace App\Http\Controllers\Admin\Highlighted;

use App\Http\Controllers\Controller;
use App\Models\Highlighted;
use Illuminate\Http\Request;

class HighlightedController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.highlighted.index');
    }

    public function store(Request $request)
    {
        $highlighteds = Highlighted::create([
            'metrics' => $request->metrics,
            'highlighted' => $request->highlighted,
        ]);

        return response()->json([
            'type' => 'success',
        ]);

        return view('admin.dashboard.highlighted.index');
    }

    public function edit(Request $request)
    {
        $highlighted = Highlighted::findOrFail($request->id);

        return response()->json([
            'highlighted' => $highlighted,
            'type' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $highlighted = Highlighted::findOrFail($request->id);
        $highlighted->metrics = $request->metrics;
        $highlighted->highlighted = $request->highlighted;

        $highlighted->save();

        return response()->json([
            'type' => 'success',
        ]);
    }

    public function destroy(Highlighted $highlighted)
    {
        $isRemoved = $highlighted->delete();

        return response()->json([
            'type' => $isRemoved,
        ]);
    }

    public function getData()
    {
        $data = Highlighted::latest()->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}