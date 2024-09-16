<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
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
Route::get('/pets', 'App\Http\Controllers\PetController@index')->name('pet.index');
Route::get('/pets/create', 'App\Http\Controllers\PetController@create')->name('pet.create');
Route::post('/pets/save', 'App\Http\Controllers\PetController@save')->name('pet.save');
Route::get('/pets/{id}', 'App\Http\Controllers\PetController@show')->name('pet.show');
Route::delete('/pets/{id}/delete', 'App\Http\Controllers\PetController@delete')->name('pet.delete');
Route::get('/pets/{id}/edit', 'App\Http\Controllers\PetController@edit')->name('pet.edit');
Route::put('/pets/{id}/update', 'App\Http\Controllers\PetController@update')->name('pet.update');
Route::get('/cart', 'App\Http\Controllers\ShoppingCartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\ShoppingCartController@add')->name('cart.add');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\ShoppingCartController@remove')->name('cart.remove');
route::post('/cart/update', 'App\Http\Controllers\ShoppingCartController@update')->name('cart.update');

