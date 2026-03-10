<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\DemosController;
use Illuminate\Support\Facades\Route;


/* =========================
   Rutas Públicas
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



Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/catalogos/industrias', [CatalogosController::class, 'industrias'])->name('admin.catalogos.industrias');
Route::post('/admin/catalogos/industrias', [CatalogosController::class, 'saveIndustria'])->name('admin.catalogos.industrias.store');
Route::post('/admin/catalogos/industria/seve', [CatalogosController::class, 'seveIndustria']);


Route::get('admin/demos', [DemosController::class, 'index'])->name('demos');
