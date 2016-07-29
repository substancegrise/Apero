<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;



class Apero extends Model
{
    // entité propriétaire car elle possède la clé étrangère

    protected $fillable=[

        'title', 'user_id', 'abstract', 'content', 'uri', 'status', 'category_id', 'date_event'
    ];

    public function getDateEventAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y-h:i');
    }

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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopesearch($query, $word)
    {
        return $query ->where('title', 'like', '%'.$word.'%')
                        ->orWhere('content', 'like','%'.$word.'%' );

    }

    public function  scopetime($query)
    {
        $now= Carbon::now();

        return $query->where('date_event', '>', $now);
    }



}
