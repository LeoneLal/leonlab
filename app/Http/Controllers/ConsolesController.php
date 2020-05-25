<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jeu;

class ConsolesController extends Controller
{
    public function search($consoleId){
        $jeux = Jeu::where('console_id', '2');
      
        return view('consoles.search',compact('jeux'))->with('jeux', $jeux);
    }
}
