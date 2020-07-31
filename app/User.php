<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
Use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes; 

    public function republics(){
        return $this->hasMany('App\Republic');
    }

    public function republic(){
        return $this->hasOne('App\Republic');
    }
    public function createUser($request){
        //Modifica os dados localmente
        $this->name =$request->name;
        $this->password = $request->password;
        $this->email = $request->email;
        //Modifica os dados no BD
    $this->save();
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
