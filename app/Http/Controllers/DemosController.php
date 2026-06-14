<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioDemosRequest;
use App\Models\DemoModel;
use App\Models\IndustriaModel;
use App\Services\CloudinaryImageService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;

class DemosController extends Controller
{
    public function __construct(private readonly CloudinaryImageService $cloudinary)
    {
    }

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

        // La imagen se sube a Cloudinary y la BD conserva la URL segura.
        try {
            $storedImagePath = $this->storeDemoImage($request);
        } catch (Throwable $exception) {
            return back()
                ->withInput()
                ->withErrors(['imagen' => $exception->getMessage()]);
        }

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

        try {
            $storedImagePath = $this->storeDemoImage($request);
        } catch (Throwable $exception) {
            return back()
                ->withInput()
                ->withErrors(['imagen' => $exception->getMessage()]);
        }

        if ($storedImagePath !== null) {
            $this->deleteDemoImage($demo->imagen);
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

        $this->deleteDemoImage($demo->imagen);

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
        $base64Image = $request->input('imagen_base64');

        if (!$base64Image) {
            return null;
        }

        if (!preg_match('/^data:image\/([a-zA-Z0-9.+-]+);base64,/', $base64Image, $matches)) {
            return null;
        }

        return $this->cloudinary->uploadDataUri(
            $base64Image,
            (string) config('services.cloudinary.demo_folder', 'oraleweb/demos'),
            'demo'
        );
    }

    private function deleteDemoImage(?string $imagePath): void
    {
        if (!$imagePath) {
            return;
        }

        if ($this->cloudinary->isCloudinaryUrl($imagePath)) {
            $this->cloudinary->deleteByUrl($imagePath);
            return;
        }

        $relativePath = $this->normalizeDemoImagePath($imagePath);

        if (!$relativePath) {
            return;
        }

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }

    private function normalizeDemoImagePath(string $imagePath): ?string
    {
        $path = trim($imagePath);

        if ($path === '') {
            return null;
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            $path = parse_url($path, PHP_URL_PATH) ?: '';
        }

        $path = trim(str_replace('\\', '/', $path), '/');

        if ($path === '') {
            return null;
        }

        if (str_starts_with($path, 'storage/')) {
            return substr($path, strlen('storage/'));
        }

        if (str_starts_with($path, 'img/demos/')) {
            return 'demos/' . basename($path);
        }

        if (str_starts_with($path, 'demos/')) {
            return $path;
        }

        return null;
    }
}
