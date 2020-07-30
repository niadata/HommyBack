<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\UserRequest;


class CommentController extends Controller
{
    public function createComment(CommentRequest $request){
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
        return response()->json([$comment]);
    }
    public function deleteComment($id){
        /*Função que delta o comentário pelo id*/
    	Comment::destroy($id);
    	return response()->json(['Produto deletado']);
    }
    public function addComment($id, $comment_id){
        /*Função que adiciona um comentário pelo id e especifico */
        $user = User::findOrFail($id);
        $comment = Comment::findOrFail($comment_id);
        $comment->user_id = $id;
        $comment->save();
        return response()->json($comment);
    }

    public function removeComment($id, $comment_id){
        /*Função que remove um comentário pelo id e especifico */
        $user = User::findOrFail($id);
        $comment = Comment::findOrFail($comment_id);
        $comment->user_id = Null;
        $comment->save();
        return response()->json($comment);
    }
}


