<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\DemosController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordSetupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/* =========================
   Rutas Publicas
   ========================= */

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/nosotros', function () {
    return view('pages.nosotros');
});

Route::get('/demos', function () {
    return view('pages.demos');
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
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/catalogos/industrias', [CatalogosController::class, 'industrias'])->name('admin.catalogos.industrias');
    Route::post('/admin/catalogos/industrias', [CatalogosController::class, 'saveIndustria'])->name('admin.catalogos.industrias.store');
    Route::post('/admin/catalogos/industria/seve', [CatalogosController::class, 'seveIndustria']);
    Route::post('/admin/catalogos/industria/show', [CatalogosController::class, 'showIndustria']);
    Route::post('/admin/catalogos/industria/update', [CatalogosController::class, 'updateIndustria'])->name('admin.catalogos.industrias.update');
    Route::post('/admin/catalogos/industria/estado', [CatalogosController::class, 'updateIndustriaEstado']);

    Route::get('/admin/demos', [DemosController::class, 'index'])->name('demos');
    Route::get('/admin/demo/create', [DemosController::class, 'create'])->name('demos.create');

    Route::get('/admin/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/admin/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/admin/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/admin/usuarios/{user}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/admin/usuarios/{user}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/admin/usuarios/{user}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
    Route::post('/admin/usuarios/{user}/reset-password', [UsuariosController::class, 'resetPassword'])->name('usuarios.reset-password');
});
