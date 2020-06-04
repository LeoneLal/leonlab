<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit_solde(){  
        $user = User::where('id', \Auth::user()->id)->first();
        return view('user.edit_solde', compact('user'));
    }

    public function update_solde(Request $request){

        $validatedData = $request->validate([
            'solde'=> 'required',
        ]);

        $prec_solde = \Auth::user()->solde;
        $user = User::where('id', \Auth::user()->id)->first();
        $user->solde = $prec_solde + $request->get('solde');
        $user->save();
        return redirect()->route('home');
    }

    public function update_profil(Request $request){
        $user = User::where('id', \Auth::user()->id)->first();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        return redirect()->route('home');
    }
}