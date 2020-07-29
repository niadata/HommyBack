<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function createUser(UserRequest $request){
    	$user = new User;
    	$user->createUser($request);
        return response()->json($user);
    }

    public function updateUser(UserRequest $request, $id){
    	$user = User::findOrFail($id);
    	$user->updateUser($request);
    	return response()->json([$user]);
    }

    public function showUser($id){
        /*Função que mostra o usuario por id*/
        $user = User::find($id);
        if ($user){
            return response()->success($user);
        } else{
            $dado = "informação não encontrada";
            return response()->erro($dado);
        }
    }
    public function listUser(){
        /*Função que lista todos os usuarios*/
        $user = User::all();
        return response()->json($user);
    }
    
    public function deleteRepublic($id){
        /*Função que permite um usuário ser deletado*/
        Republic::destroy($id);
        return reponse()->json(['usuario Deletado']);
    }
}







// public function switchToAdvertiser($id) {
//     $user = User::findOrFail($id);
//      $user->verify = 1;
//      $user->save();
//      return response()->json(['Usuário virou ANUNCIANTE']);
//  }

// public function alugar($user_id, $republic_id){
//     $user = User::findOrFail($user_id);
//     $user->alugar($republic_id);
//     return response()->json($user);
// }

// public function removeAluguel($republic_id, $user_id){
//     $republic = Republic::findOrFail($republic_id);
//     $user = User::findOrFail($user_id);
//     $user->removeAluguel();
//     $republic->removeUsuario();
//     return response()->json([$user, $republic]);
// }

// public function favoritarRep($user_id, $republic_id){
//     $user = User::findOrFail($user_id);
//     $user->repFavoritadaUser()->attach($republic_id);
//     return response()->json(["S2"]);
// }

// public function desfavoritarRep($user_id, $republic_id){
//     $user = User::findOrFail($user_id);
//     $user->repFavoritadaUser()->detach($republic_id);
//     return response()->json(["S/2"]);
// }

// public function listFavRep($id){
//     $user = User::findOrFail($id);
//     return response()->json($user->repFavoritadaUser);
// }