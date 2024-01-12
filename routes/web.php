<?php

use App\Http\Controllers\Client\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

    Route::group(['prefix'=>'categories'],function(){
        Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
        Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
        Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
        Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
        Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
        Route::get('/{category}', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
        Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('category.delete');
    });

    Route::group(['prefix'=>'tags'],function(){
        Route::get('/', \App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
        Route::get('/create', \App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
        Route::post('/', \App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
        Route::get('/{tag}/edit', \App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
        Route::patch('/{tag}', \App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
        Route::get('/{tag}', \App\Http\Controllers\Tag\ShowController::class)->name('tag.show');
        Route::delete('/{tag}', \App\Http\Controllers\Tag\DeleteController::class)->name('tag.delete');
    });

    Route::group(['prefix'=>'colors'],function(){
        Route::get('/', \App\Http\Controllers\Color\IndexController::class)->name('color.index');
        Route::get('/create', \App\Http\Controllers\Color\CreateController::class)->name('color.create');
        Route::post('/', \App\Http\Controllers\Color\StoreController::class)->name('color.store');
        Route::get('/{color}/edit', \App\Http\Controllers\Color\EditController::class)->name('color.edit');
        Route::patch('/{color}', \App\Http\Controllers\Color\UpdateController::class)->name('color.update');
        Route::get('/{color}', \App\Http\Controllers\Color\ShowController::class)->name('color.show');
        Route::delete('/{color}', \App\Http\Controllers\Color\DeleteController::class)->name('color.delete');
    });

    Route::group(['prefix'=>'users'],function(){
        Route::get('/', \App\Http\Controllers\User\IndexController::class)->name('user.index');
        Route::get('/create', \App\Http\Controllers\User\CreateController::class)->name('user.create');
        Route::post('/', \App\Http\Controllers\User\StoreController::class)->name('user.store');
        Route::get('/{user}/edit', \App\Http\Controllers\User\EditController::class)->name('user.edit');
        Route::patch('/{user}', \App\Http\Controllers\User\UpdateController::class)->name('user.update');
        Route::get('/{user}', \App\Http\Controllers\User\ShowController::class)->name('user.show');
        Route::delete('/{user}', \App\Http\Controllers\User\DeleteController::class)->name('user.delete');
    });

    Route::group(['prefix'=>'products'],function(){
        Route::get('/', \App\Http\Controllers\Product\IndexController::class)->name('product.index');
        Route::get('/create', \App\Http\Controllers\Product\CreateController::class)->name('product.create');
        Route::post('/', \App\Http\Controllers\Product\StoreController::class)->name('product.store');
        Route::get('/{product}/edit', \App\Http\Controllers\Product\EditController::class)->name('product.edit');
        Route::patch('/{product}', \App\Http\Controllers\Product\UpdateController::class)->name('product.update');
        Route::get('/{product}', \App\Http\Controllers\Product\ShowController::class)->name('product.show');
        Route::delete('/{product}', \App\Http\Controllers\Product\DeleteController::class)->name('product.delete');
    });
    Route::group(['prefix'=>'orders'],function(){
        Route::get('/', \App\Http\Controllers\Order\IndexController::class)->name('order.index');
        Route::get('/create', \App\Http\Controllers\Order\CreateController::class)->name('order.create');
        Route::post('/', \App\Http\Controllers\Order\StoreController::class)->name('order.store');
        Route::get('/{order}/edit', \App\Http\Controllers\Order\EditController::class)->name('order.edit');
        Route::patch('/{order}', \App\Http\Controllers\Order\UpdateController::class)->name('order.update');
        Route::get('/{order}', \App\Http\Controllers\Order\ShowController::class)->name('order.show');
        Route::delete('/{order}', \App\Http\Controllers\Order\DeleteController::class)->name('order.delete');
    });


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{page}', MainController::class)->where('page','.*');



