<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


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

Route::get('/', function () {
    return view('home');
});

Route::get('home', function () {
    return view('home');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::resource('products', ProductsController::class);
});

Route::get('/perfumes', [ProductsController::class, 'products'])->name('product');

Route::get('/perfumes/{id}', [ProductsController::class, 'show'])->name('product.show');


Auth::routes();
