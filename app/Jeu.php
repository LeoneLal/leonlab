<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table="jeux";

    protected $fillable=[
        'id', 
        'nom',
        'slug', 
        'description', 
        'photo', 
        'prix',
        'avis',
        'note'
    ];
}
