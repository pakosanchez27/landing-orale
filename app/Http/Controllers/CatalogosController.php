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

    public function showIndustria(Request $request)
    {
        // ID de la industria 
        $id = $request->id;
        $industrias = new IndustriaModel();
        $industria = IndustriaModel::find($id);
        if ($industria === null) {
            echo json_encode([
                "code" => 404,
                "menssage" => "No se encontraron datos, ID incorrecto o inexistente"
            ]);
            return;
        }
        echo json_encode([
            "code" => 200,
            "data" => $industria

        ]);
    }

    public function updateIndustria(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'integer', 'exists:industrias,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:20'],
            'estado' => ['required', 'in:0,1'],
        ]);

        $industria = IndustriaModel::findOrFail($data['id']);
        $industria->update([
            'nombre' => $data['nombre'],
            'color' => $data['color'],
            'estado' => $data['estado'],
        ]);

        return response()->json([
            'code' => 200,
            'mensaje' => "Industria Actualizada",
        ]);
    }

    public function updateIndustriaEstado(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'integer', 'exists:industrias,id'],
            'estado' => ['required', 'in:0,1'],
        ]);

        $industria = IndustriaModel::findOrFail($data['id']);
        $industria->update([
            'estado' => $data['estado'],
        ]);

        return response()->json([
            'code' => 200,
            'mensaje' => $data['estado'] == 1 ? "Industria Activada" : "Industria Desactivada",
        ]);
    }
}
