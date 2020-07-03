<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function __construct($body = '')
    {
        if($body != '')
            $this->body = $body;
    }
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
}
