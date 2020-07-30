<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Republic;
use App\Http\Requests\UserRequest;

class User extends Authenticatable
{
    use Notifiable;
    
    public function republics(){
        return $this->hasMany('App\Republic');
    }

    public function republic(){
        return $this->hasOne('App\Republic');
    }

    public function createUser(UserRequest $request){
        /*Função que cria um usuario*/
            $this->name = $request->name;
            $this->email = $request->email;
            $this->email_verified_at = $request->email_verified_at;
            $this->password = $request->password;
            $this->save();
            return response()->json($this);

    }

    public function updateUser(UserRequest $request, $id){
        /*Função que permite um usuario alterar algum dado específico*/

        if($request->name){
        $this->name = $request->name;
        }
        if($request->email){
        $this->email = $request->email;
        }
        if($request->email_verified_at){
        $this->email_verified_at = $request->email_verified_at;
        }
        
        if($request->password){
        $this->password = $request->password;
        }
        $this->save();
    }


    public function republics(){
        return $this->hasMany('Republic');
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
