<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function createComment(Request $request){
        /*Função que criar um comentário e permite curtir*/
        $comment = new Comment;
        $comment->commentary = $request->commentary;
        $comment->like = $request->like;
        $comment->save();
        return response()->json($comment);
    }

    public function showComment($id){
         /*Função que mostra um comentário atraves do id*/
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }
    public function listComment(){
         /*Função que lista todos os comentário*/
        $comment = Comment::all();
        return response()->json($comment);
    }

}
