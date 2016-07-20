<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Apero extends Model
{
    // entité propriétaire car elle possède la clé étrangère

    protected $fillable=[
        'title', 'user_id', 'abstract', 'content', 'uri', 'status', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

   
}
