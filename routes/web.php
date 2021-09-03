<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/films', 301);
Route::resource('films', 'FilmController')->except(['edit']);
Route::resource('users', 'UserController')->except(['edit']);
Route::resource('professions', 'ProfessionController')->except(['edit']);
Route::resource('genres', 'GenreController')->except(['edit']);
Route::resource('countries', 'CountryController')->except(['edit']);
