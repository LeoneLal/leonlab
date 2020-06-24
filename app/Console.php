<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $table="consoles";

    protected $fillable=[
        'id', 
        'console',
        'slug',
    ];

    public $timestamps = false;
    
    public function jeu()
    {
        return $this->hasMany(jeu::class);
    }

    public function Card()
	{
		return $this->belongsTo(Fiche::class, 'fiche_id');
	}
}
