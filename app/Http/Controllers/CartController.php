<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\New_purchase;
use App\Fiche;
use App\Jeu;
use App\Ligne;
use App\User;
use PDF;


class CartController extends Controller
{
    /**
     * Cart view
     */
    public function index()
    {
        $user = \Auth::user();
        return view('cart.index', compact('user'));
    }

    /**
     * Add a game to the cart
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
     * Remove game from cart
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('success', 'Le produit a été supprimé.');
    }

    public function pay(Request $request)
    {
        /**
         * Creation of the activation code of the game
         */
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        $user_id = \Auth::user()->id;
        /**
         * Add cart to the database only if it's not empty
         */
        if( Cart::count() > 0)
        {
            $username = \Auth::user()->name;
            $mytime = Carbon::now();
            $fiche = Fiche::all()->last();
            $number = Fiche::count() + 1;
            $pdf =  PDF::loadView('pdf.bill', compact('mytime', 'username', 'number'))
            ->setPaper('a4')
            ->setWarnings(false)
            ->save(public_path("factures/Facture$number.pdf"));

            /**
             * Adding the card to the BDD
             */
            $fiche = new Fiche();
            $fiche->prix_total = Cart::subtotal();
            $fiche->facture = "Facture$number.pdf";
            $fiche->user_id = $user_id;
            $fiche->save();

            /**
             * Adding each line of the card to the database
             * Updating stocks
             */
            foreach(Cart::content() as $jeu){
                $chaineAleatoire = '';
                for ($i = 0; $i < 10; $i++)
                {
                    $chaineAleatoire .= $caracteres[rand(0, strlen($caracteres) - 1)];
                }

                $ligne = new Ligne();
                $ligne->fiche_id = $fiche->id;
                $ligne->jeu_id = $jeu->model->id;
                $ligne->prix = $jeu->model->prix;
                $ligne->code = $chaineAleatoire;
                $ligne->save();     
                
                $game = Jeu::where('id',$jeu->model->id)->first();
                $game->stock = $jeu->model->stock - 1;
                $game->save();
            }

            /**
             * Sending email facture
             */
            $last_file = Fiche::all()->last();
            $facture = "Facture$number.pdf";
            $games = "tableau des jeux";
            $codes = Ligne::where('fiche_id', $last_file->id)->with('Game')->get();

            Mail::to(\Auth::user())
            ->send( new New_purchase($codes, $facture));

            /**
             * Updating user's balance
             */
            $prec_solde = \Auth::user()->solde;
            $user = User::where('id', \Auth::user()->id)->first();
            $user->solde = $prec_solde - Cart::subtotal();
            $user->save(); 

            Cart::destroy();
            return redirect()->route('home')->with('success', 'Commande validée.');

        }else{
            return redirect()->route('home');
        }
        
    }

}
