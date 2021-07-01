<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
    return view('inicio');
})->name('inicio');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Rutas para la verificacion por correos
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Rutas para los proveedores
Route::resource('provider', ProviderController::class)->middleware('auth');

//Rutas para los productos
Route::resource('product', ProductController::class)->middleware('verified');

//Rutas para las compras
Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create')->middleware('auth');
Route::post('purchase', [PurchaseController::class, 'store'])->name('purchase.store')->middleware('auth');
Route::post('purchase/{purchase}/insertProduct', [PurchaseController::class, 'insertProduct'])->name('purchase.insertProduct')->middleware('auth');
Route::get('purchase/', [PurchaseController::class, 'index'])->name('purchase.index')->middleware('auth');
Route::get('purchase/{purchase}/', [PurchaseController::class, 'show'])->name('purchase.show')->middleware('auth');