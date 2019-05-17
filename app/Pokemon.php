<?php

namespace TRAINERPOKEMON;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{

    protected $table = 'pokemon';

    protected $fillable = [
        'name',
        'type',
        'level',
        'nickname',
    ];

    public function trainer()
    {
        return $this->belongsTo('\TRAINERPOKEMON\Trainer');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
