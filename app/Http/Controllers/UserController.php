<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Fiche;
use App\Ligne;

class UserController extends Controller
{

    public function show($userId){
        $user =  User::where( 'id', $userId)->first();
        $line = Ligne::whereHas('Card', function($query) use ($userId){
            return $query->where('user_id', $userId);
        })->with('Game')->with('Card')->get();

        return view('user.show', compact('user', 'line'));
    }

    /**
     * Solde edition
     */
    public function edit_solde(){  
        $user = User::where('id', \Auth::user()->id)->first();
        return view('user.edit_solde', compact('user'));
    }

    public function update_solde(Request $request){

        
        
        $prec_solde = \Auth::user()->solde;
        $user = User::where('id', \Auth::user()->id)->first();
        if($request->get('solde') != null){
            $user->solde = $prec_solde + $request->get('solde');
        }else if($request->get('solde_moins') != null){
            $user->solde = $prec_solde - $request->get('solde_moins');
        }
        $user->save();
        return redirect()->route('home');
    }
    /**
     * Profile edition by the member
     */
    public function update_profil(Request $request){
        
        $user = User::where('id', \Auth::user()->id)->first();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        if( \Auth::user()->role == 1)
            return redirect()->route('home');
        else
            return redirect()->route('jeux.index');
    }

    /**
     * Profile edition by the administrator
     */
    public function edit($memberId){
        $user = User::where('id', $memberId)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $memberId){
        $user = User::where('id', $memberId)->first();
        $user->name = $request->get('name');
        $user->email = $request->get('mail');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->solde = $request->get('solde');
        $user->save();
        if( \Auth::user()->role == 1)
            return redirect()->route('admin.members');
        else
            return redirect()->route('jeux.index');
    }

    /**
     * Deleting a member
     */
    public function delete($memberId){
        $member = User::where('id', $memberId)->first();
        $member->delete();
        if( \Auth::user()->role == 1)
            return redirect()->route('admin.members');
        else
            return redirect()->route('jeux.index');
    }
}
