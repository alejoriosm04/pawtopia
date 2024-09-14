<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/pets', 'App\Http\Controllers\PetController@index')->name('pet.index');
Route::get('/pets/{id}', 'App\Http\Controllers\PetController@show')->name('pet.show');
