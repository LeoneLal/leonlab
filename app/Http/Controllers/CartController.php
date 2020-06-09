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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('success', 'Le produit a été supprimé.');
    }


    public function pay(Request $request)
    {
        $user_id = \Auth::user()->id;

        $fiche = new Fiche();
        $fiche->prix_total = Cart::subtotal();
        $fiche->facture = 'A faire';
        $fiche->user_id = $user_id;
        $fiche->save();
        
        foreach(Cart::content() as $jeu){
            $ligne = new Ligne();
            $ligne->fiche_id = $fiche->id;
            $ligne->jeu_id = $jeu->model->id;
            $ligne->prix = $jeu->model->prix;
            $ligne->code = "azerty123";
            $ligne->save();            
        }

        
        $prec_solde = \Auth::user()->solde;
        $user = User::where('id', \Auth::user()->id)->first();
        $user->solde = $prec_solde - Cart::subtotal();
        $user->save(); 

        Cart::destroy();
        return redirect()->route('admin.index')->with('success', 'Commande validée.');
    }

}
