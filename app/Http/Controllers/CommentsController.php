<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Jeu;
use App\Ligne;

class CommentsController extends Controller
{
    /**
     * Comment creation
     */
    public function create($gameId){
        $game = Jeu::where('id', $gameId)->first();

        /**
         * Checking if the member has already written a comment on this game
         */
        $existing_comment = Comment::selectRaw('user_id , jeu_id')
        ->where('user_id', \Auth::user()->id)
        ->get();
        $statut = false;

        foreach($existing_comment as $comment){
            if($comment->jeu_id == $gameId){
                $statut = true;
                break;
            }
            else{
                $statut = false;
            }
        }
        if($statut == false){
            return view('comments.create', compact('game'));
        }
        else{
            return redirect()->route('home');
        }

        
    }
    /**
     * Sending comment to the database
     */
    public function store(Request $request)
    {

        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->jeu_id = $request->get('jeu');
        $comment->note = $request->get('note');
        $comment->avis = $request->get('avis');
        $comment->save();
            
        return redirect()->route('home');
    }

    /**
     * Edit comment function
     */
    public function edit($gameId){
        $comment = Comment::where('user_id', \Auth::user()->id)
        ->where('jeu_id', $gameId)
        ->first();

        return view('comments.edit', compact('comment'));
    }

    /**
     * Updating comment in the database
     */
    public function update(Request $request, $commentId){

        $comment =  Comment::where('id', $commentId)->first();
        $comment->note = $request->get('note');
        $comment->avis = $request->get('avis');
        $comment->save();
        
        return redirect()->route('home');
    }
}
