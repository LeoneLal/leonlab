<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeuxController extends Controller
{
    protected $table="jeux";

    protected $fillable=[
        'id', 
        'nom', 
        'description', 
        'photo', 
        'prix',
        'avis',
        'note'
    ];
}
