<?php

namespace App\Models;
use App\Enums\UserType;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function isSuper() {
        if ($this->user_type == UserType::SuperAdmin)
            return true;
        return false;
    }
    public function isAdmin() {
        if ($this->user_type == UserType::Admin)
            return true;
        return false;
    }
}
