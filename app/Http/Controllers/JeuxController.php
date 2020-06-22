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
                ->paginate(10);
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
        $game = new Jeu();
        $game->nom = $request->get('name');
        $game->slug = $request->get('picture');
        $game->description = $request->get('description');
        $game->console_id = $request->get('console');
        $game->prix = $request->get('prix');
        $game->stock = $request->get('stock');
        $game->save();
        return redirect()->route('admin.games');
    }

    public function show($jeuId)
    {
        $console =  Console::all();
        $jeu = Jeu::where('id', $jeuId)->with('console')->first();
        return view('jeux.show', compact('jeu', 'console'));
    }

    public function edit($gameId){

        $consoles = Console::all();
        $game = Jeu::where('id', $gameId)->with('console')->first();
    
        if( \Auth::user()->role == 1)
            return view('jeux.edit', compact('game', 'consoles'));
        else
            return redirect()->route('jeux.index');
    }

    public function update(Request $request, $gameId)
    {
        $game = Jeu::where('id', $gameId)->first();
        $game->nom = $request->get('name');
        $game->slug = $request->get('picture');
        $game->description = $request->get('description');
        $game->console_id = $request->get('console');
        $game->prix = $request->get('prix');
        $game->stock = $request->get('stock');
        $game->save();
        return redirect()->route('jeux.create');
        
    }

    //Delete a contact from the company
    public function delete($jeuId){
        $jeu = Jeu::where('id', $jeuId)->first();
        $jeu->delete();
        if( \Auth::user()->role == 1)
            return redirect()->route('admin.games');
        else
            return redirect()->route('jeux.index');
    }

}