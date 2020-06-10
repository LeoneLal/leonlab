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
        return view('index', compact('consoles', 'jeux'), ['jeux' => $jeux]);
    }

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

    public function create(){
        $consoles = Console::all();
        if( \Auth::user()->role == 1)
            return view('jeux.create', compact('consoles'));
        else
            return redirect()->route('jeux.index');
    }

    public function store(Request $request)
    {
        $jeu = new Jeu();
        $jeu->nom = $request->get('name');
        $jeu->slug = $request->get('picture');
        $jeu->description = $request->get('description');
        $jeu->console_id = $request->get('console');
        $jeu->prix = $request->get('prix');
        $jeu->stock = $request->get('stock');
        $jeu->save();
        return redirect()->route('jeux.create');
    }

    public function show($jeuId)
    {
        $console =  Console::all();
        $jeu = Jeu::where('id', $jeuId)->with('console')->first();
        return view('jeux.show', compact('jeu', 'console'));
    }

    public function edit($gameId){
        $game = Jeu::where('id', $gameId)->with('console')->first();
        if( \Auth::user()->role == 1)
            return view('jeux.edit', compact('game'));
        else
            return redirect()->route('jeux.index');
    }

    public function update(Request $request)
    {
        
        $game = Jeu::where('id',$jeu->model->id)->first();
    }

}