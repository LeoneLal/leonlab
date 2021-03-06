<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jeu;
use App\Console;
use App\Comment;

class GameController extends Controller
{
    /**
     * Home page of the website
     */
    public function index(){
        $consoles = Console::all();
        $jeux = Jeu::all();
        $jeux = DB::table('jeux')->paginate(16);
        return view('index', compact('consoles', 'jeux'), ['jeux' => $jeux]);
    }

    /**
     * Search bar function
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
                ->paginate(10);
        return view('jeux.search')->with('jeux', $products);
    }

    /**
     * Create game view
     */
    public function create(){
        $consoles = Console::all();
        if( \Auth::user()->role == 1)
            return view('jeux.create', compact('consoles'));
        else
            return redirect()->route('jeux.index');
    }

    /**
     * Create new game in the database
     */
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

    /**
     * Game description page
     */
    public function show($jeuId)
    {
        
        $console =  Console::all();
        $jeu = Jeu::where('id', $jeuId)->with('console')->first();

        
        
        $number = Comment::where('jeu_id', $jeuId)->avg('note');
        $note = number_format( $number, 2);

        $comments = Comment::where('jeu_id', $jeuId)->with('User')->get();
        return view('jeux.show', compact('jeu', 'console', 'comments', 'note'));
    }

    /**
     * Update game page
     */
    public function edit($gameId){

        $consoles = Console::all();
        $game = Jeu::where('id', $gameId)->with('console')->first();
    
        if( \Auth::user()->role == 1)
            return view('jeux.edit', compact('game', 'consoles'));
        else
            return redirect()->route('jeux.index');
    }

    /**
     * Update the game in the database
     */
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
        return redirect()->route('admin.games');
        
    }

    //Delete a game
    public function delete($jeuId){
        $jeu = Jeu::where('id', $jeuId)->first();
        $jeu->delete();
        if( \Auth::user()->role == 1)
            return redirect()->route('admin.games');
        else
            return redirect()->route('jeux.index');
    }

}