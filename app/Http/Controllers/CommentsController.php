<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Jeu;
use App\Ligne;

class CommentsController extends Controller
{
    public function create($gameId){
        $game = Jeu::where('id', $gameId)->first();
        return view('comments.create', compact('game'));
    }
    
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->jeu_id = $request->get('jeu');
        $comment->note = $request->get('note');
        $comment->avis = $request->get('avis');
        $comment->save();
        if( \Auth::user()->role == 1)
            return redirect()->route('home');
        else
            return view('index');
    }
}
