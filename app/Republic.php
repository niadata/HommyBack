<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
    public function createRepublic(Request $request){
        $this->nameRepublic = $request->nameRepublic;
        $this->address = $request->address;
        $this->bedroom = $request->bedroom;
        $this->telephoneRepublic = $request->telephoneRepublic;
        $this->description = $request->description;
        $this->acessibility = $request->acessibility;
        $this->bathroom = $request->bathroom;
        $this->rules = $request->rules;
        $this->gender = $request->gender;
        $this->users_id = $request->users_id;
        $this->facillity = $request->facillity;
        if($request->photo !=null){ 
            If (!Storage::exists('localPhotos/')){
                Storage::makeDirectory('localPhotos/', 0755,true);
                    $file = $request->file('photo');
                    $file = rand().'.'.$file->getClientOriginalExtension();
                    $path = $file->storeAs('localPhoto',$filename);
                    $this->photo=$path;
            }
            
        }
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

    public function photos(Request $request){
        If (!Storage::exists('localPhotos/'))
        Storage::makeDirectory('localPhotos/',true);

            $file=$request->file('photo');
            $file=rand().'.'.$file->getClientOriginalExtension();
            $file=$request->storeAs('localPhoto',$filename);
            $this->photo=$path;
        return response()->json($search);
    }
    public function contrut(){
        $this->middleware('ROULES');
    }
}


 // 

            // $image = base64_decode($request->photo);
            // $filename = uniqid();
            // $path = storage_path('app/localPhoto',$filename);
            // file_put_contents($path, $image);
            // $this->photo=$path;