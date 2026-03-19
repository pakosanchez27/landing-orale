<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioDemosRequest;
use App\Models\DemoModel;
use App\Models\IndustriaModel;
use App\Support\PublicUploadPath;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DemosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industriaId = request('industria');

        $demos = DemoModel::with(['industria', 'usuario'])
            ->when($industriaId, function ($query) use ($industriaId) {
                $query->where('id_industria', $industriaId);
            })
            ->orderByDesc('id')
            ->get();

        $industrias = IndustriaModel::where('estado', 1)->orderBy('nombre')->get();

        return view('admin.demos.demos', compact('demos', 'industrias', 'industriaId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industrias = IndustriaModel::where('estado', 1)->orderBy('nombre')->get();

        return view('admin.demos.create', compact('industrias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormularioDemosRequest $request)
    {
        $data = $request->validated();
        $demo = new DemoModel();

        // El formulario envia "industria", pero la tabla almacena "id_industria".
        $data['id_industria'] = $data['industria'];
        unset($data['industria']);
        $data['id_usuario'] = auth()->id();

        // La imagen se mueve manualmente a public/img/demos y se guarda la ruta relativa.
        $storedImagePath = $this->storeDemoImage($request);

        if ($storedImagePath !== null) {
            $data['imagen'] = $storedImagePath;
        }

        // La tabla usa create_at/update_at personalizados, por eso se asignan aqui.
        $data['create_at'] = Carbon::now();
        $data['update_at'] = Carbon::now();
        $data['id_usuario'] = Auth::user()->id;
        // fill() carga los atributos permitidos por el modelo y save() ejecuta el insert.
        $demo->fill($data);
        $demo->save();

        return redirect()->route('demos')->with('status', 'Demo creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $demo = DemoModel::findOrFail($id);
        abort_unless($this->canManageDemo($demo), 403);
        $industrias = IndustriaModel::where('estado', 1)->orderBy('nombre')->get();

        return view('admin.demos.edit', compact('demo', 'industrias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormularioDemosRequest $request, string $id)
    {
        $data = $request->validated();
        $demo = DemoModel::findOrFail($id);
        abort_unless($this->canManageDemo($demo), 403);

        $data['id_industria'] = $data['industria'];
        unset($data['industria']);

        $storedImagePath = $this->storeDemoImage($request);

        if ($storedImagePath !== null) {
            $data['imagen'] = $storedImagePath;
        } else {
            unset($data['imagen']);
        }

        $data['update_at'] = Carbon::now();

        $demo->fill($data);
        $demo->save();

        return redirect()->route('demos')->with('status', 'Demo actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $demo = DemoModel::findOrFail($id);
        abort_unless($this->canManageDemo($demo), 403);

        $imagePath = PublicUploadPath::make($demo->imagen ?? '');

        if ($demo->imagen && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $demo->delete();

        return redirect()->route('demos')->with('status', 'Demo eliminada');
    }

    private function canManageDemo(DemoModel $demo): bool
    {
        $user = auth()->user();

        if (!$user) {
            return false;
        }

        return (int) $user->role_id === 0 || (int) $user->id === (int) $demo->id_usuario;
    }

    private function storeDemoImage(FormularioDemosRequest $request): ?string
    {
        $directory = PublicUploadPath::make('img/demos');

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $base64Image = $request->input('imagen_base64');

        if (!$base64Image) {
            return null;
        }

        if (!preg_match('/^data:image\/([a-zA-Z0-9.+-]+);base64,/', $base64Image, $matches)) {
            return null;
        }

        $extension = strtolower($matches[1]);
        $encoded = substr($base64Image, strpos($base64Image, ',') + 1);
        $binary = base64_decode($encoded, true);

        if ($binary === false) {
            return null;
        }

        $filename = uniqid('demo_', true) . '.' . $extension;
        file_put_contents($directory . DIRECTORY_SEPARATOR . $filename, $binary);

        return 'img/demos/' . $filename;
    }
}
