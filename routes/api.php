<?php

use App\Http\Controllers\productController;
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

// show API
Route::get('/products', [ProductController::class, 'index']);

// Upload 
Route::post('/products', [productController::class, 'upload']);

// Update
Route::put("/products/edit/{id}", [productController::class, "update"]);

// Delete
Route::delete("/products/edit/{id}", [productController::class, "delete"]);


// Show
Route::get('/products/{id}', [ProductController::class, 'show']);