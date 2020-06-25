<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    public $timestamps = false;

	protected $name = 'lignes';
	
	protected $fillable = [
		'id',
		'fiche_id',
		'jeu_id',
		'prix',
		'code',
		'created_at',
	];

	public function Card()
	{
		return $this->belongsTo(Fiche::class, 'fiche_id');
	}

	public function Game()
	{
		return $this->belongsTo(Jeu::class, "jeu_id");
	}

}
