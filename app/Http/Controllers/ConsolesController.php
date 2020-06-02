<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jeu;
use App\Console;

class ConsolesController extends Controller
{
    public function search($consoleId){
        $consoles = Console::all();
        $jeux = DB::table('jeux')->where('console_id', $consoleId)->get();

      
        return view('consoles.search',compact('jeux', 'consoles'))->with('jeux', $jeux);
    }

    public function create(){
        return view('consoles.create');
    }

    public function store(Request $request){

        $console = new Console();
        $console->console = $request->get('console');
        $console->slug = $request->get('picture');
        $console->save();
        return redirect()->route('admin.index');

    }
}
