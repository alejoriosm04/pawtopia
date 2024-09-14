<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/pets', 'App\Http\Controllers\PetController@index')->name('pet.index');
