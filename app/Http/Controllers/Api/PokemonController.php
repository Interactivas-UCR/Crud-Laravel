<?php

namespace TRAINERPOKEMON\Http\Controllers\Api;

use Illuminate\Http\Request;
use TRAINERPOKEMON\Http\Controllers\Controller;
use TRAINERPOKEMON\Pokemon;
use TRAINERPOKEMON\Http\Resources\PokemonCollection;

class PokemonController extends Controller
{
    /**
     * Display the pokemon list as a json object
     *
     * @return PokemonCollection 
     */
    public function index()
    {
        return new PokemonCollection(Pokemon::all());
    }
}
