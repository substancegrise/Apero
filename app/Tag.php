<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function apero()
    {
        return $this->belongsToMany('App\Apero');
    }
}
