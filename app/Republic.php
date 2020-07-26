<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Republic extends Model
{
    public function locador(){
        return $this->hasMany('App\Locador');
    }
}
