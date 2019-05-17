<?php

namespace TRAINERPOKEMON;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{

    public function pokemons()
    {
        return $this->hasMany('\TRAINERPOKEMON\Pokemon');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
