<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    public $timestamps = false;

    protected $table="consoles";

    protected $fillable=[
        'id', 
        'console',
        'slug',
    ];
    
    public function jeu()
    {
        return $this->hasMany(jeu::class);
    }

    public function Card()
	{
		return $this->belongsTo(Fiche::class, 'fiche_id');
	}
}
