<?php

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
