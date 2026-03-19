<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\DemosController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordSetupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosController;
use App\Models\DemoModel;
use App\Models\IndustriaModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/* =========================
   Rutas Publicas
   ========================= */

Route::get('/', function () {
    if (!Schema::hasTable('demos') || !Schema::hasTable('industrias')) {
        return view('pages.index', [
            'industriasConDemos' => collect(),
            'demos' => collect(),
        ]);
    }

    $demoIndustryIds = DemoModel::query()
        ->select('id_industria')
        ->distinct()
        ->pluck('id_industria');

    $industriasConDemos = IndustriaModel::query()
        ->whereIn('id', $demoIndustryIds)
        ->where('estado', 1)
        ->orderBy('nombre')
        ->get();

    $demos = DemoModel::query()
        ->with('industria')
        ->whereHas('industria', function ($query) {
            $query->where('estado', 1);
        })
        ->latest('id')
        ->take(9)
        ->get();

    return view('pages.index', compact('industriasConDemos', 'demos'));
});

Route::get('/nosotros', function () {
    return view('pages.nosotros');
});

Route::get('/demos', function () {
    if (!Schema::hasTable('demos') || !Schema::hasTable('industrias')) {
        return view('pages.demos', [
            'industriasConDemos' => collect(),
            'demos' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, 6),
            'industriaSeleccionada' => null,
        ]);
    }

    $demoIndustryIds = DemoModel::query()
        ->select('id_industria')
        ->distinct()
        ->pluck('id_industria');

    $industriasConDemos = IndustriaModel::query()
        ->whereIn('id', $demoIndustryIds)
        ->where('estado', 1)
        ->orderBy('nombre')
        ->get();

    $industriaSeleccionada = request('industria');

    $demos = DemoModel::query()
        ->with('industria')
        ->whereHas('industria', function ($query) {
            $query->where('estado', 1);
        })
        ->when($industriaSeleccionada, function ($query) use ($industriaSeleccionada) {
            $query->where('id_industria', $industriaSeleccionada);
        })
        ->latest('id')
        ->paginate(6)
        ->withQueryString();

    return view('pages.demos', compact('industriasConDemos', 'demos', 'industriaSeleccionada'));
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/blog-post', function () {
    return view('pages.blog-post');
})->name('blog.post');

Route::get('/faq', function () {
    return view('pages.faqs');
});

Route::get('/contacto', function () {
    return view('pages.contacto');
});

Route::get('/paquetes', function () {
    return view('pages.paquetes');
});

Route::get('/enviar-formulario', function () {
    return redirect('/contacto');
});

Route::post('/enviar-formulario', [FormularioController::class, 'enviar'])->name('enviar');

Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::get('/password/setup/{token}', [PasswordSetupController::class, 'create'])->name('password.setup');
Route::post('/password/setup', [PasswordSetupController::class, 'store'])->name('password.setup.store');
Route::get('/admin/perfil', [ProfileController::class, 'show'])->name('admin.profile');
Route::post('/admin/perfil', [ProfileController::class, 'update'])->name('admin.profile.update');

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/catalogos/industrias', [CatalogosController::class, 'industrias'])->name('admin.catalogos.industrias');
    Route::post('/admin/catalogos/industrias', [CatalogosController::class, 'saveIndustria'])->name('admin.catalogos.industrias.store');
    Route::post('/admin/catalogos/industria/seve', [CatalogosController::class, 'seveIndustria']);
    Route::post('/admin/catalogos/industria/show', [CatalogosController::class, 'showIndustria']);
    Route::post('/admin/catalogos/industria/update', [CatalogosController::class, 'updateIndustria'])->name('admin.catalogos.industrias.update');
    Route::post('/admin/catalogos/industria/estado', [CatalogosController::class, 'updateIndustriaEstado']);

    Route::get('/admin/demos', [DemosController::class, 'index'])->name('demos');
    Route::get('/admin/demo/create', [DemosController::class, 'create'])->name('demos.create');
    Route::post('/admin/demo/store', [DemosController::class, 'store'])->name('demos.store');
    Route::get('/admin/demo/{id}/edit', [DemosController::class, 'edit'])->name('demos.edit');
    Route::put('/admin/demo/{id}', [DemosController::class, 'update'])->name('demos.update');
    Route::delete('/admin/demo/{id}', [DemosController::class, 'destroy'])->name('demos.destroy');

    Route::get('/admin/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/admin/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/admin/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/admin/usuarios/{user}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/admin/usuarios/{user}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/admin/usuarios/{user}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
    Route::post('/admin/usuarios/{user}/reset-password', [UsuariosController::class, 'resetPassword'])->name('usuarios.reset-password');
});
