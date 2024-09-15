<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/pets', 'App\Http\Controllers\PetController@index')->name('pet.index');
Route::get('/pets/create', 'App\Http\Controllers\PetController@create')->name('pet.create');
Route::post('/pets/save', 'App\Http\Controllers\PetController@save')->name('pet.save');
Route::get('/pets/{id}', 'App\Http\Controllers\PetController@show')->name('pet.show');
Route::delete('/pets/{id}/delete', 'App\Http\Controllers\PetController@delete')->name('pet.delete');
Route::get('/pets/{id}/edit', 'App\Http\Controllers\PetController@edit')->name('pet.edit');
Route::put('/pets/{id}/update', 'App\Http\Controllers\PetController@update')->name('pet.update');
