<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jeu;
use App\Console;

class JeuxController extends Controller
{

    public function index(){
        $consoles = Console::all();
        $jeux = Jeu::all();
        return view('welcome', compact('consoles', 'jeux'));
    }
}
