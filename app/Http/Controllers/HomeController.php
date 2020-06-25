<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Fiche;
use App\Ligne;
use App\Jeu;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return home view
     */
    public function index()
    {
        /**
         * Checking if a comment already exist
         */
        $existing_comment = Comment::selectRaw('user_id , jeu_id')
        ->where('user_id', \Auth::user()->id)
        ->get(); 
        $statut = false;
        


        $user =  User::where( 'id', \Auth::user()->id)->first();
        $line = Ligne::whereHas('Card', function($query){
            return $query->where('user_id', \Auth::user()->id);
        })->with('Game')->with('Card')->get();
        return view('home', compact('user', 'line', 'existing_comment'));


    }
}
