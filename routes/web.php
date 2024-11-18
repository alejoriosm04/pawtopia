<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware([App\Http\Middleware\SetLocale::class])->group(function () {

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
    Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
    Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

    Route::get('/language/{locale}', 'App\Http\Controllers\HomeController@switchLanguage')->name('language.switch');

    Route::middleware(['auth', 'App\Http\Middleware\AdminMiddleware'])->group(function () {
        Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
        Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
        Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
        Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
        Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
        Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
        Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name('admin.category.index');
        Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name('admin.category.store');
        Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name('admin.category.delete');
        Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name('admin.category.edit');
        Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.category.update');
        Route::get('/admin/species', 'App\Http\Controllers\Admin\AdminSpeciesController@index')->name('admin.species.index');
        Route::post('/admin/species/store', 'App\Http\Controllers\Admin\AdminSpeciesController@store')->name('admin.species.store');
        Route::delete('/admin/species/{id}/delete', 'App\Http\Controllers\Admin\AdminSpeciesController@delete')->name('admin.species.delete');
        Route::get('/admin/species/{id}/edit', 'App\Http\Controllers\Admin\AdminSpeciesController@edit')->name('admin.species.edit');
        Route::put('/admin/species/{id}/update', 'App\Http\Controllers\Admin\AdminSpeciesController@update')->name('admin.species.update');
        Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('user.create');
        Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
        Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
        Route::post('/users', 'App\Http\Controllers\UserController@store')->name('user.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/cart/purchase', 'App\Http\Controllers\ShoppingCartController@purchase')->name('shoppingcart.purchase');
        Route::get('/user/orders', 'App\Http\Controllers\UserController@orders')->name('user.orders');
        Route::get('/cart/total', 'App\Http\Controllers\ShoppingCartController@getTotal')->name('cart.total');
    });

    Route::get('/cart', 'App\Http\Controllers\ShoppingCartController@index')->name('cart.index');
    Route::post('/cart/add/{id}', 'App\Http\Controllers\ShoppingCartController@add')->name('cart.add');
    Route::get('/cart/remove/{id}', 'App\Http\Controllers\ShoppingCartController@remove')->name('cart.remove');
    Route::post('/cart/update', 'App\Http\Controllers\ShoppingCartController@update')->name('cart.update');
    Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
    Route::get('/products/species/{species}', 'App\Http\Controllers\ProductController@filterBySpecies')->name('product.filterBySpecies');
    Route::get('/products/category/{category}', 'App\Http\Controllers\ProductController@filterByCategory')->name('product.filterByCategory');
    Route::get('/products/brand/{brand}', 'App\Http\Controllers\ProductController@filterByBrand')->name('product.filterByBrand');
    Route::get('/search', 'App\Http\Controllers\ProductController@search')->name('product.search');

    Route::middleware(['auth'])->group(function () {
        Route::post('/favorites/add/{id}', 'App\Http\Controllers\UserController@addToFavorites')->name('favorites.add');
        Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
        Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
        Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('order.save');
        Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
        Route::delete('/orders/{id}/delete', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
        Route::get('/orders/{id}/edit', 'App\Http\Controllers\OrderController@edit')->name('order.edit');
        Route::put('/orders/{id}/update', 'App\Http\Controllers\OrderController@update')->name('order.update');
        Route::get('/orders/{id}/pdf', 'App\Http\Controllers\OrderController@pdf')->name('order.pdf');
        Route::get('/pets', 'App\Http\Controllers\PetController@index')->name('pet.index');
        Route::get('/pets/create', 'App\Http\Controllers\PetController@create')->name('pet.create');
        Route::post('/pets/save', 'App\Http\Controllers\PetController@save')->name('pet.save');
        Route::get('/pets/recommendations', 'App\Http\Controllers\PetController@getRecommendations')->name('pets.recommendations');
        Route::get('/pets/{id}', 'App\Http\Controllers\PetController@show')->name('pet.show');
        Route::delete('/pets/{id}/delete', 'App\Http\Controllers\PetController@delete')->name('pet.delete');
        Route::get('/pets/{id}/edit', 'App\Http\Controllers\PetController@edit')->name('pet.edit');
        Route::put('/pets/{id}/update', 'App\Http\Controllers\PetController@update')->name('pet.update');
        Route::get('/users/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
        Route::get('/users/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
        Route::put('/users/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    });

});

Auth::routes([]);

