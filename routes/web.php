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
Route::resource('films', 'FilmController');
Route::resource('users', 'UserController');
Route::resource('professions', 'ProfessionController');
Route::resource('genres', 'GenreController');
Route::resource('countries', 'CountryController');
Route::resource('taglines', 'TaglineController');
