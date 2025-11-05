<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de productos (CRUD completo)
Route::resource('products', ProductController::class);

// Rutas de compras (solo index, create, store)
Route::resource('purchases', PurchaseController::class)
    ->only(['index', 'create', 'store']);

// Rutas de ventas (solo index, create, store)
Route::resource('sales', SaleController::class)
    ->only(['index', 'create', 'store']);

// Ruta adicional para el dashboard/home
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
