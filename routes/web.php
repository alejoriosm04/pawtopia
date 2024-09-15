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
Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name('admin.categories.delete');
Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name('admin.categories.edit');
Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.categories.update');
