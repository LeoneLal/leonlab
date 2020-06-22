<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function create(){
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = $request->get('user');
        $comment->jeu_id = $request->get('jeu');
        $comment->console_id = $request->get('console');
        $comment->created_at = $request->get('date');
        $comment->note = $request->get('note');
        $comment->avis = $request->get('comment');
        $comment->save();
        return view('jeux.show', compact('jeu'));
    }
}
