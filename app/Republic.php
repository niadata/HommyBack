<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use User;


class Republic extends Model
{
     public function users(){
        return $this->belongsToMany('App\User');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function republicComment(){
        return $this->hasMany('App\Comment');
    }
        
        
        
 }
 
