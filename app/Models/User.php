<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function attachRole(Role $role)
    {
        RoleUser::create([
                'role_id' => $role->id,
                'user_id' => $this->id
            ]
        );
    }

    public function isAdmin(): bool
    {
       return RoleUser::where([
           'user_id' => $this->id,
           'role_id' => Role::where('name', 'admin')->first()->id
       ])->count() > 0;
    }
}
