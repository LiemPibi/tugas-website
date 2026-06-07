<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/create', 'create')->name('products.create');
    Route::get('/edit/{id}', 'edit')->name('products.edit');
    Route::post('/store', 'store')->name('products.store');
    Route::post('/update/{id}', 'update')->name('products.update');
    Route::get('/show/{id}', 'show')->name('products.show');
});


Route::prefix('articles')->controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('articles');
    Route::patch('/comments/{comment}', 'updateComment')->name('articles.comments.update');
    Route::delete('/comments/{comment}', 'destroyComment')->name('articles.comments.destroy');
    Route::get('/{slug}', 'show')->name('articles.show');
});
