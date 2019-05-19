<?php

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

Route::get('/', "TrainerController@index")->name('index');

Route::resource('/trainers', 'TrainerController')->middleware('auth', 'role:admin');
Route::resource('/pokemons', 'PokemonController')->except(['create']);

Route::get('pokemons/create/{trainer}', 'PokemonController@create')->name('pokemons.create');

// En caso de no usar 
// php artisan make:controller TrainerController --resource 

// Route::get('trainers/create',"TrainerController@create")->name('trainers.create');
// Route::get('/trainers/show/{id}', "TrainerController@show")->name('trainers.show');
// Route::get('trainers/edit/{id}',"TrainerController@edit")->name('trainers.edit');
// Route::put('trainers/update/{id}',"TrainerController@update")->name('trainers.update');
// Route::post('/trainers/store', "TrainerController@store")->name('trainers.store');
// Route::delete('/trainers/destroy/{trainer}', "TrainerController@destroy")->name('trainers.destroy');

Route::get('locale/{lang}', 'LocaleController@changeLocale')->name('locale'); //traduccion

Auth::routes();

Route::get('/home', 'TrainerController@index')->name('home');
