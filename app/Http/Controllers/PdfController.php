<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use PDF;

class PdfController extends Controller
{
    public function receipt(){
        $username = \Auth::user()->name;
        $mytime = Carbon::now();
        return view('pdf.facture', compact('mytime', 'username'));
    }

    public function print(){
        $username = \Auth::user()->name;
        $mytime = Carbon::now();
       /* $pdf = PDF::loadView('pdf.facture', compact('mytime', 'username'));
        return $pdf->download("Facture.pdf");
*/
        
        return PDF::loadView('pdf.facture', compact('mytime', 'username'))
        ->setPaper('a4')
        ->setWarnings(false)
        ->save(public_path("factures/fichier.pdf"))
        ->stream();
            }
}
