<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('user.create');
Route::post('/users', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
Route::get('/users/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::put('/users/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

