<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/locales', [LocaleController::class, 'index'])->name('locale');

Route::get('/categories', [CategoryController::class, 'index'])->name('get.category');

Route::get('/products/sales', [ProductController::class, 'getProductsBySale'])->name('get.sale_products');
Route::get('/products/categories', [ProductController::class, 'getProductsByCategories'])->name('get.categories_products');

Route::get('/products/category/{category}', [ProductController::class, 'getProductsByCategory'])->name('get.product.by-category');
Route::get('/products/category/{category}/sub-category/{subCategory}', [ProductController::class, 'getProductsBySubCategory'])->name('get.product.by-sub-category');

Route::get('/products/filter/category/{category}', [ProductController::class, 'getProductFilterByCategory'])->name('get.product.filter.by-category');
Route::get('/products/filter/category/{category}/sub-category/{subCategory}', [ProductController::class, 'getProductFilterBySubCategory'])->name('get.product.filter.by-sub-category');

Route::get('/products/category/{categorySlug}/product/{productSlug}', [ProductController::class, 'getProduct'])->name('get.product');
