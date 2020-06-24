<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Jeu;

class CommentsController extends Controller
{
    public function create(){
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->jeu_id = $request->get('jeu');
        $comment->note = $request->get('note');
        $comment->avis = $request->get('comment');
        $comment->save();
        if( \Auth::user()->role == 1)
            return redirect()->route('admin.games');
        else
            return redirect()->route('jeux.index');
    }
}
