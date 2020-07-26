<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locador extends Model
{
    public function republic(){
        return $this->belongsTo('App\Republic');
    }
}
