<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    
    public function index(){
        $jeux = Jeu::all();
        return view('jeux.index', compact('jeux'));
    }
    /*
    //Envoie la vue create entreprise
    public function create()
    {
        return view('entreprises.create');
    }

    // Supprime une entreprise
    public function delete($entrepriseId)
    {
        $contact = Contact::where('entreprise_id', $entrepriseId);
        $contact->delete();
        $entreprise = Entreprise::where('id', $entrepriseId)->first();
        $entreprise->delete();
        return redirect()->route('entreprises.index');
    }


    //Fonction envoie en BDD
    public function store(Request $request)
    {
        $entreprise = new Entreprise();
        $entreprise->nom = $request->get('nom');
        $entreprise->adresse = $request->get('adresse');
        $entreprise->telephone = $request->get('telephone');
        $entreprise->mail = $request->get('mail');
        $entreprise->user_id = \Auth::user()->id;
        $entreprise->save();
        return redirect()->route('entreprises.index');
    }

    //Envoie la vue edit entreprise
    public function edit($entrepriseId)
    {
        $entreprise = Entreprise::where('id', $entrepriseId)->first();
        return view('entreprises.edit', compact('entreprise'));
    }

    //Fonction update BDD
    public function update(Request $request, $entrepriseId)
    {
        $entreprise = Entreprise::where('id', $entrepriseId)->first();
        $entreprise->nom = $request->get('nom');
        $entreprise->adresse = $request->get('adresse');
        $entreprise->telephone = $request->get('telephone');
        $entreprise->mail = $request->get('mail');
        $entreprise->user_id = \Auth::user()->id;
        $entreprise->save();

        return redirect()->route('entreprises.index');
    }

    //Affichage des éléments pour une entreprise
    public function show($entrepriseId)
    {
        $entreprise = Entreprise::where('id', $entrepriseId)->with('contact')->first();
        return view('entreprises.show', compact('entreprise'));
    }
    */
}
