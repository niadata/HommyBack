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
    public function creatRepublic(Request $request){
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
    
    public function searchRepublic(Request $request) { 
        $republic = Republic::query(); // Gera um objeto do tipo Builder    like()
        if ($request->address)
            $republic->where('address','LIKE','%'.$request->address.'%');
        if ($request->nameRepublic)
            $republic->where('nameRepublic','LIKE','%'.$request->nameRepublic.'%');
        if ($request->bedroom)
            $republic->where('bedroom','<>','%'.$request->bedroom.'%');
        $search = $republic->get();
        return response()->json($search);
    }
}
