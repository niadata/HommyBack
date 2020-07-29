<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use User;


class Republic extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }
    // public function removeUsuario(){
    //     $this->user_id = NULL;
    //     $this->save();
    // }
    // public function userLocatario(){
    //     return $this->hasOne('App\User');
    // }
        
    // public function republicFavorite(){
    //     return $this->belongsToMany('App\User');
    // }
    // public function republicComment(){
    //     return $this->belongsToMany('App\User');
    // }



    // retorna usuario
    // mostrar proprietario
    // mostrar comentário
       

}
