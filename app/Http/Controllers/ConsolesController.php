<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jeu;

class ConsolesController extends Controller
{
    public function search($consoleId){
        $products = Jeu::where('console_id', '$consoleId');
        dd($products);

        return view('consoles.search')->with('jeux', $products);
    }
}
