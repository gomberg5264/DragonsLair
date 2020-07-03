<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    function __construct(array $attributes = [])
    {
        if($attributes != [])
        {
            $this->email = $attributes['email'];
            $this->username = $attributes['username'];
            $this->password = $attributes['password'];
        }
    }
    public function posts()
    {
        return $this->hasMany('App\models\Post');
    }
}
