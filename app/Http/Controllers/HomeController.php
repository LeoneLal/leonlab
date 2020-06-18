<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Fiche;
use App\Ligne;
use App\Jeu;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =  DB::table('users')->where( 'id', \Auth::user()->id)->first();
        $line = Ligne::whereHas('Card', function($query){
            return $query->where('user_id', \Auth::user()->id);
        })->with('Game')->with('Card')->get();
        return view('home', compact('user', 'line'));
    }
}
