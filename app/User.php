<?php

namespace TRAINERPOKEMON;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this
            ->belongsToMany('TRAINERPOKEMON\Role', 'role_user', 'user_id', 'role_id')
            ->withTimestamps();
    }

    /**
     * Para saber si el usuario tiene un rol especifico
     *
     * @param $role Nombre del role
     */
    public function hasRole($role)
    {
        // Forma larga
        // if($this->roles()->where('name', $role)->first() !== null){
        //     return true;
        // }  
        // return false;

        // Forma corta
        return $this->roles()->where('name', $role)->first() !== null;
    }

    /**
     * Para saber si el usuario posee alguno de los roles
     * 
     * @param roles array de roles o un solo role
     */
    public function hasAnyRoles($roles)
    {
        if (is_array($roles)) {

            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else return $this->hasRole($roles);

        return false;
    }

    /**
     * Autorizar roles
     * 
     * @param $roles los roles que se van a permitir
     */

    public function authorizeRoles($roles){
        if($this->hasAnyRoles($roles)){
            return true;
        }

        abort(401, 'No tiene permiso compa');
    }

    public function isAdmin(){
        return $this->hasRole('admin');
    }
}
