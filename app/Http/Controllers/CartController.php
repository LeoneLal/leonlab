<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Fiche;
use App\Jeu;
use App\Ligne;
use App\User;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        return view('cart.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use($request){
            return $cartItem->id === $request->product_id;
        });

        if($duplicata->isNotEmpty()) {
            return redirect()->route('jeux.index')->with('warning', 'Le jeu est déjà dans le panier !');
        }
        
        $product = Jeu::find($request->product_id);

        Cart::add($product->id, $product->nom, 1, $product->prix)
            ->associate('App\Jeu');

        

        return redirect()->route('jeux.index')->with('success', 'Le jeu est ajouté au panier !');
        
    }

}
