<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{

    public $timestamps = false;

    protected $table="jeux";

    protected $fillable=[
        'id', 
        'nom',
        'slug', 
        'description', 
        'photo',
        'console_id', 
        'prix',
        'note', 
        'stock'
    ];


    public function console()
    {
        return $this->belongsTo(console::class, "id");
    }
}
