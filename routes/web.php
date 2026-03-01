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

