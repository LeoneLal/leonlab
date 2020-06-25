<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Fiche;
use PDF;

class PdfController extends Controller
{
    /**
     * PDF view
     */
    public function receipt(){
        $username = \Auth::user()->name;
        $mytime = Carbon::now();
        $fiche = Fiche::all()->last();
        $number = $fiche->id;
        return view('pdf.bill', compact('mytime', 'username', 'number'));
    }

    /**
     * Print a PDF
     */
    public function print(){
        $username = \Auth::user()->name;
        $mytime = Carbon::now();
        $fiche = Fiche::all()->last();
        $number = $fiche->id;
        $pdf =  PDF::loadView('pdf.bill', compact('mytime', 'username', 'number'))
        ->setPaper('a4')
        ->setWarnings(false)
        ->save(public_path("factures/Facture$number.pdf"));
        return redirect()->route('jeux.index');
    }

    public function download($number){
        $pathToFile = public_path("factures/Facture$number.pdf");
        return response()->file($pathToFile);
    }

}
