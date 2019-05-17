<?php

namespace TRAINERPOKEMON;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this
            ->belongsToMany('TRAINERPOKEMON\User', 'role_user', 'role_id', 'user_id')
            ->withTimestamps();
    }
}
