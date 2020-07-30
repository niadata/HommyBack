<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Republic extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    
}
