<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/status', function () {
    return response()->json(['status' => 'API Café funcionando ☕']);
});

Route::apiResource('products', ProductController::class);


use App\Http\Controllers\Api\CategoryController;

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);

use App\Models\Product;
use Illuminate\Http\Request;

Route::get('/products', function () {
    return Product::with('category')->get();
});

Route::post('/products', function (Request $request) {
    return Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
    ]);
});
