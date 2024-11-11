<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('home', function () {
    return view('home');
})->name('home');

// Dashboard for Admin with auth and admin middleware
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('products', ProductsController::class);
});

// Cart Routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

// Products
Route::get('/perfumes', [ProductsController::class, 'products'])->name('product');
Route::get('/perfumes/{id}', [ProductsController::class, 'show'])->name('product.show');

Route::get('/categories', [CategoriesController::class, 'categories'])->name('categories');


// Authentication Routes
Auth::routes();
