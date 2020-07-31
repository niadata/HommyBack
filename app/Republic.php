<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Republic extends Model
{
    use SoftDeletes; 
    
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function creatRepublic(RepublicRequest $request){
        $this->nameRepublic = $request->nameRepublic;
        $this->address = $request->address;
        $this->bedroom = $request->bedroom;
        $this->telephoneRepublic = $request->telephoneRepublic;
        $this->description = $request->description;
        $this->acessibility = $request->acessibility;
        $this->bathroom = $request->bathroom;
        $this->rules = $request->rules;
        $this->gender = $request->gender;
        $this->facillity = $request->facillity;
        $this->save();
    }
    
}
