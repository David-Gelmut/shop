<?php

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
Route::post('/feedback', \App\Http\Controllers\API\FeedbackController::class);
Route::get('/categories',\App\Http\Controllers\API\Category\IndexController::class);
Route::post('/products',\App\Http\Controllers\API\Product\IndexController::class);
Route::post('/products/cart',\App\Http\Controllers\API\Product\CartIndexController::class);
Route::get('/products/filters',\App\Http\Controllers\API\Product\FilterListController::class);
Route::get('/products/{product}',\App\Http\Controllers\API\Product\ShowController::class);
Route::post('/products/cart/order',\App\Http\Controllers\API\Product\CartOrderController::class);
