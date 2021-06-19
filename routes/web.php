<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Rutas para los proveedores
Route::resource('provider', ProviderController::class)->middleware('auth');

//Rutas para los productos
Route::resource('product', ProductController::class)->middleware('auth');

//Rutas para las compras
Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create')->middleware('auth');
Route::post('purchase', [PurchaseController::class, 'store'])->name('purchase.store')->middleware('auth');
Route::post('purchase/{purchase}/insertProduct', [PurchaseController::class, 'insertProduct'])->name('purchase.insertProduct')->middleware('auth');
Route::get('purchase/', [PurchaseController::class, 'index'])->name('purchase.index')->middleware('auth');
Route::get('purchase/{purchase}/', [PurchaseController::class, 'show'])->name('purchase.show')->middleware('auth');