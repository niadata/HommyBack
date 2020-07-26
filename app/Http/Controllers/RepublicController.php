<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;

class RepublicController extends Controller
{
    public function createRepublic(Request $request){
        /*Função que cria uma republica*/
        $republic = new Republic;
        $republic->nameRepublic = $request->nameRepublic;
        $republic->address = $request->address;
        $republic->bedroom = $request->bedroom;
        $republic->telephoneRepublic = $request->telephoneRepublic;
        $republic->description = $request->description;
        $republic->acessibility = $request->acessibility;
        $republic->bathroom = $request->bathroom;
        $republic->rules = $request->rules;
        $republic->gender = $request->gender;
        $republic->facillity = $request->facillity;
        $republic->save();
        return response()->json($republic);
    }
    public function showRepublic($id){
        /*Função que mostra a republica atraves do id*/
        $republic = Republic::find($id);
        if ($republic){
            return response()->success($republic);
        } else{
            $dado = "informação não encontrada";
            return response()->erro($dado);
        }
    }
    public function listRepublic(){
        /*Função que lista todas as republicas cadastradas*/
        $republic = Republic::all();
        return response()->json($republic);
    }
    public function updateRepublic(Request $request, $id){
        /*Função que altera algum dado especifico de uma republica*/
        $republic = Republic::findOrFail($id);

        if($request->nameRepublic){
            $republic->nameRepublic = $request->nameRepublic;
        }
        if($request->address){
            $republic->address = $request->address;
        }
        if($request->bedroom){
            $republic->bedroom = $request->bedroom;
        }
        
        if($request->telephoneRepublic){
            $republic->dtelephoneRepublic = $request->telephoneRepublic;
        }
        
        if($request->description){
            $republic->description = $request->description;
        }
        if($request->acessibility){
            $republic->acessibility = $request->acessibility;
        }
        if($request->bathroom){
            $republic->bathroom = $request->bathroom;
        }
        if($request->rules){
            $republic->rules = $request->rules;
        }
        if($request->gender){
            $republic->gender = $request->gender;
        }
        if($request->facillity){
            $republic->facillity = $request->facillity;
        }
        $republic->save();
        return reponse()->json($republic);
        }
    
    public function deleteRepublic($id){
        /*Função que permite deletar a uma republica*/
        Republic::destroy($id);
        return reponse()->json(['Produto Deletado']);
    }
}
