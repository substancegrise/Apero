<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function apero()
    {
        return $this->hasMany('App\Apero');
    }
}
