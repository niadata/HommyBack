<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locador;

class LocadorController extends Controller
{
    public function createLocador(Request $request){
        $locador = new Locador;
        /*Função que permite criar um locatário*/
        $locador->name = $request->name;
        $locador->email = $request->email;
        $locador->password = $request->password;
        $locador->email_verified_at = $request->email_verified_at;
        $locador->telephone = $request->telephone;
        $locador->gender = $request->gender;
        $locador->deficient = $request->deficient;
        $locador->cpf = $request->cpf;
        
        $locador->save();
        return response()->json($locador);
    }
    public function showLocador($id){
         /*Função que mostra a locatario pelo seu id*/
         $locador = Locador::find($id);
         if ($locador){
             return response()->success($locador);
         } else{
             $dado = "informação não encontrada";
             return response()->erro($dado);
         }
    }
    public function listLocador(){
        /*Função que permite listar todos os locatarios*/
        $locador = Locador::all();
        return response()->json($locador);
    }
    public function updateLocador(Request $request, $id){
        /*Função que permite alterar um dado especifico do locatario*/
        $locador = Locador::findOrFail($id);

        if($request->name){
            $locador->name = $request->name;
        }
        if($request->email){
            $locador->email = $request->email;
        }
        if($request->cpf){
            $locador->cpf = $request->cpf;
        }
        
        if($request->telephone){
            $locador->telephone = $request->telephone;
        }
        
        if($request->deficient){
            $locador->deficient = $request->deficient;
        }
        if($request->gender){
            $locador->gender = $request->gender;
        }
        $locador->save();
        return reponse()->json($locador);
        }
     
    public function deleteLocador($id){
        /*Função que permite deletar locatario*/
        Locador::destroy($id);
        return reponse()->json(['usuario Deletado']);
    }
}
