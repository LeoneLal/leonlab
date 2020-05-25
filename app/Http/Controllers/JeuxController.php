<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jeu;
use App\Console;

class JeuxController extends Controller
{

    public function index(){
        $consoles = Console::all();
        $jeux = Jeu::all();
        $jeux = DB::table('jeux')->paginate(16);
        return view('welcome', compact('consoles', 'jeux'), ['jeux' => $jeux]);
    }
/*
    public function search(){
        $q = request()->input('q');
        
        $jeux = Jeu::where('nom', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->paginate(6);
        

        return view('jeux.search')->with('jeux', $jeux);
    }
    */

    public function search()
    {
        request()->validate([
            'q' => 'required|min:3'
        ]);

        $q = request()->input('q');
        $consoles = Console::all();
        $products = Jeu::where('nom', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(2);
        return view('jeux.search')->with('jeux', $products);
    }
}
