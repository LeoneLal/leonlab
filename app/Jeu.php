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
        'console_id', 
        'prix',
        'avis',
        'note'
    ];

    
    public $timestamps = false;

    public function console()
    {
        return $this->hasMany(console::class);
    }
}
