<?php

use Illuminate\Http\Request;
use TRAINERPOKEMON\Http\Resources\Pokemon as PokemonResource;
use TRAINERPOKEMON\Pokemon;
use TRAINERPOKEMON\Http\Resources\User as UserResource;
use TRAINERPOKEMON\User;
use TRAINERPOKEMON\Http\Resources\PokemonCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO: Crear los resources para las respuestas
//      php artisan make:resource Trainer
//      php artisan make:resource TrainerCollection
//      php artisan make:resource Pokemon
//      php artisan make:resource PokemonCollection