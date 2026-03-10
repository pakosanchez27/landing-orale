<?php

namespace App\Http\Controllers;

use App\Models\IndustriaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function industrias()
    {
        $industrias = IndustriaModel::all();
        return view('admin.industrias', compact('industrias'));
    }

    public function saveIndustria(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:20'],
            'estado' => ['required', 'in:0,1'],
        ]);

        IndustriaModel::create($data);

        return response()->json([
            'code' => 200,
            'mensaje' => "Industria Creada",
        ]);
    }
}
